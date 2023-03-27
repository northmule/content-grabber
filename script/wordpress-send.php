<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/** @var ContainerInterface  $container */
$container = require 'config/container.php';

final class WordPressSend
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
        try {
            /** @var \Coderun\WordPress\Service\CreatePost $postEndpoint */
            $postEndpoint = $this->container->get(\Coderun\WordPress\Service\CreatePost::class);
            /** @var \Coderun\WordPress\ModuleOptions $options */
            $options = $this->container->get(\Coderun\WordPress\ModuleOptions::class);
            $result = $postEndpoint->create(new \Coderun\WordPress\ValueObject\Post([
                'title' => 'API пост из скрипта',
                'content' => 'Парам пам пам ',
                'status' => 'publish',
                'categories' => $options->getOptions()->getCategoryIds(),
            ]));
            return;
        } catch (Throwable $e) {
            echo $e->getMessage();
        } finally {
        
        }
        
    }
    
    
    
}

(new WordPressSend($container))();
