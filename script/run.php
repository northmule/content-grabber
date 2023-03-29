<?php

/**
 * Забриает записи и передаёт их на сайт WP
 */
declare(strict_types=1);

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
    
    /**
     * @param ContainerInterface $container
     *
     * @throws NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
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
        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->container->get(\Doctrine\ORM\EntityManager::class);
        /** @var \Coderun\ORM\Repository\Common $postRepository */
        $postRepository = $entityManager->getRepository(\Coderun\ORM\Entity\ProcessedPost::class);

        try {
            /** @var Coderun\Contracts\Vk\Response\Response $itemMap */
            foreach ($this->getVkResponseMap() as $group => $itemMap) {
                foreach ($itemMap->getItems() as $item) {
                    $param = new \Coderun\WordPress\ValueObject\Post([
                        'title' => mb_strimwidth($item->getText(), 0, 50, '...'),
                        'content' => $templatePost->compose($item),
                        'status' => 'publish',
                        'categories' => $options->getOptions()->getCategoryIds(),
                    ]);
                    if (empty($param->getTitle())) {
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
                    
                    $postEndpoint->create($param);
                }
                $entityManager->flush();
            }
            return;
        } catch (Throwable $e) {
            throw $e;
        } finally {
        
        }
        
    }
    
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getVkResponseMap(): \Coderun\Vkontakte\Collection\ResponseMap
    {
        /** @var ContentHandler $handler */
        $handler = $this->container->get(ContentHandler::class);
        return $handler->get();
    }
    
}

(new GrabberRun($container))();
