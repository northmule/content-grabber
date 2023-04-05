<?php

/**
 * Забриает записи и передаёт их на сайт WP
 */
declare(strict_types=1);

use Coderun\Contracts\Vk\Comment\Comment;
use Coderun\Vkontakte\Handler\Comment as CommentHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Coderun\Vkontakte\Handler\Content as ContentHandler;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/** @var ContainerInterface  $container */
$container = require 'config/container.php';

final class GrabberRun
{
    protected ContainerInterface $container;
    protected Logger $logger;
    
    /**
     * @param ContainerInterface $container
     *
     * @throws NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->logger = new Logger('run');
        $this->logger->pushHandler(
            new StreamHandler(
                'data/log/run.log',
                Logger::DEBUG)
        );
    }
    
    /**
     *
     * @return void
     * @throws Exception
     */
    public function __invoke()
    {
        /** @var \Coderun\WordPress\ModuleOptions $options */
        $options = $this->container->get(\Coderun\WordPress\ModuleOptions::class);
        /** @var \Coderun\WordPress\Service\CreatePost $postEndpoint */
        $postEndpoint = $this->container->get(\Coderun\WordPress\Service\CreatePost::class);
        /** @var \Coderun\WordPress\Service\CreateComment $commentEndpoint */
        $commentEndpoint = $this->container->get(\Coderun\WordPress\Service\CreateComment::class);
        /** @var \Coderun\WordPress\Template\Post $templatePost */
        $templatePost = $this->container->get(\Coderun\WordPress\Template\Post::class);
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->container->get(\Doctrine\ORM\EntityManager::class);
        /** @var \Coderun\ORM\Repository\Common $postRepository */
        $postRepository = $entityManager->getRepository(\Coderun\ORM\Entity\ProcessedPost::class);

        try {
            /** @var Coderun\Contracts\Vk\Response\PostsResponse $itemMap */
            foreach ($this->getVkResponseMap() as $group => $itemMap) {
                $postStrategy = $options->getOptions()->getStrategys()[$group] ?? null;
                if (!$postStrategy instanceof \Coderun\WordPress\Options\Strategy) {
                    continue;
                }
                foreach ($itemMap->getItems() as $item) {
                    $paramWpPost = new \Coderun\WordPress\ValueObject\Post([
                        'title' => mb_strimwidth($item->getText(), 0, 50, '...'),
                        'content' => $templatePost->compose($item, $itemMap->getFirstGroup()),
                        'status' => 'publish',
                        'categories' => $postStrategy->getCategoryWpIds(),
                    ]);
                    if (empty($paramWpPost->getTitle())) {
                        continue;
                    }
                    $countExist = $postRepository->count(
                        [
                            'source' => $group,
                            'sourceItemId' => $item->getId(),
                            'destination' => $options->getOptions()->getSite(),
                        ]
                    );
                    if ($countExist !== 0) {
                        continue;
                    }
                    $processedPost = new \Coderun\ORM\Entity\ProcessedPost();
                    $processedPost->setSource((string)$group);
                    $processedPost->setSourceItemId((string)$item->getId());
                    $processedPost->setDestination($options->getOptions()->getSite());
                    $entityManager->persist($processedPost);
                    
                    $wpPost = $postEndpoint->create($paramWpPost);
                    $postId = $wpPost['id'];
                    
                    $comments = $this->getVKCommentsResponseMap($item->getOwnerId(), $item->getId());
                    if ($comments->count() === 0) {
                        continue;
                    }
                    /** @var Comment $comment */
                    foreach ($comments as $comment) {
                        if (empty($comment->getText())) {
                            continue;
                        }
                        $paramWpComment = new \Coderun\WordPress\ValueObject\Comment([
                            'author_name' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                            'content' => $comment->getText(),
                            'post' => $postId,
                            'author_email' => 'jora@mail.ru',
                        ]);
                        $commentEndpoint->create($paramWpComment);
                    }
                   
                }
                $entityManager->flush();
            }
            return;
        } catch (Throwable $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            throw $e;
        } finally {
            echo PHP_EOL.'script finish'.PHP_EOL;
        }
        
    }
    
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getVkResponseMap(): \Coderun\Vkontakte\Collection\PostsResponseMap
    {
        /** @var ContentHandler $handler */
        $handler = $this->container->get(ContentHandler::class);
        return $handler->get();
    }
    
    protected function getVKCommentsResponseMap(int $ownerId, int $postId): \Coderun\Vkontakte\Collection\CommentsResponseMap
    {
        /** @var CommentHandler $handler */
        $handler = $this->container->get(CommentHandler::class);
        return $handler->get(ownerId: $ownerId, postId: $postId);
    }
    
}

(new GrabberRun($container))();
