<?php

/**
 * Забриает записи и передаёт их на сайт WP
 */
declare(strict_types=1);

use Coderun\Contracts\Vk\Comment\Comment;
use Coderun\Contracts\Vk\Post\Post;
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
    protected \Doctrine\ORM\EntityManager $entityManager;
    
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
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $this->entityManager = $this->container->get(\Doctrine\ORM\EntityManager::class);
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
        /** @var \Coderun\WordPress\Template\Post $templatePost */
        $templatePost = $this->container->get(\Coderun\WordPress\Template\Post::class);
        /** @var \Coderun\ORM\Repository\Common $postRepository */
        $postRepository = $this->entityManager->getRepository(\Coderun\ORM\Entity\ProcessedPost::class);

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
                    $postEntity = $postRepository->findOneBy(
                        [
                            'source' => $group,
                            'sourceItemId' => $item->getId(),
                            'destination' => $options->getOptions()->getSite(),
                        ]
                    );
                    
                    if ($postEntity instanceof \Coderun\ORM\Entity\ProcessedPost) {
                        if ($postEntity->getWordpressPostId() != null) {
                            usleep(1200000); // VK "Too many requests per second"
                            $this->processComments($postEntity->getWordpressPostId(), $item, $postEntity);
                        }
                        continue;
                    }
                    /** @var \Coderun\Contracts\WordPress\Post\Post $wpPost */
                    $wpPost = $postEndpoint->create($paramWpPost);
                    
                    $processedPost = new \Coderun\ORM\Entity\ProcessedPost();
                    $processedPost->setSource((string)$group);
                    $processedPost->setSourceItemId((string)$item->getId());
                    $processedPost->setDestination($options->getOptions()->getSite());
                    $processedPost->setWordpressPostId($wpPost->getId());
                    $this->entityManager->persist($processedPost);
                    
                    $this->processComments($wpPost->getId(), $item, $processedPost);
                   
                }
                $this->entityManager->flush();
            }
            return;
        } catch (Throwable $e) {
            $this->logger->error($e->getMessage(), $e->getTrace());
            $this->entityManager->flush();
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
    
    /**
     * Добавляет комментарии к WP записи из комментариев ВК
     *
     * @param int                               $wpPostId
     * @param Post                              $vkPost
     * @param \Coderun\ORM\Entity\ProcessedPost $postEntity
     *
     * @return void
     * @throws NotFoundExceptionInterface
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    protected function processComments(int $wpPostId, Post $vkPost, \Coderun\ORM\Entity\ProcessedPost $postEntity)
    {
        /** @var \Coderun\WordPress\Service\CreateComment $commentEndpoint */
        $commentEndpoint = $this->container->get(
            \Coderun\WordPress\Service\CreateComment::class
        );
        /** @var \Coderun\ORM\Repository\Common $postRepository */
        $commentRepository = $this->entityManager->getRepository(\Coderun\ORM\Entity\ProcessedComment::class);
        $comments = $this->getVKCommentsResponseMap(
            $vkPost->getOwnerId(), $vkPost->getId()
        );
        if ($comments->count() === 0) {
            return;
        }
        /** @var Comment $comment */
        foreach ($comments as $comment) {
            if (empty($comment->getText())) {
                continue;
            }
            
            $commentEntity = $postEntity->getComments()->filter(
                static function (\Coderun\ORM\Entity\ProcessedComment $commentEntity) use ($comment)
                {
                    return intval($commentEntity->getSourceItemId()) === $comment->getId();
                }
            )->first();
            
            if ($commentEntity instanceof \Coderun\ORM\Entity\ProcessedComment) {
                continue;
            }
            
            $paramWpComment = new \Coderun\WordPress\ValueObject\Comment([
                'author_name' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'content' => $comment->getText(),
                'post' => $wpPostId,
                'author_email' => 'jora@mail.ru',
            ]);
            /** @var \Coderun\Contracts\WordPress\Comment\Comment $wpComment */
            $wpComment = $commentEndpoint->create($paramWpComment);
            
            $commentEntityNew = new \Coderun\ORM\Entity\ProcessedComment();
            $commentEntityNew->setSourceItemId(strval($comment->getId()));
            $commentEntityNew->setPost($postEntity);
            $this->entityManager->persist($commentEntityNew);
        }
    }
    
}

(new GrabberRun($container))();
