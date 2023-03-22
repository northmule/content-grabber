<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Coderun\Vkontakte\Handler\Content as ContentHandler;
use Psr\Container\NotFoundExceptionInterface;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/** @var ContainerInterface  $container */
$container = require 'config/container.php';

final class VkGrabber
{
    /** @var ContentHandler */
    protected ContentHandler $handler;

    /**
     * @param ContainerInterface $container
     *
     * @throws NotFoundExceptionInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     */
    public function __construct(ContainerInterface $container)
    {
        $this->handler = $container->get(ContentHandler::class);
    }
    
    
    /**
     *
     * @return void
     * @throws Exception
     */
    public function __invoke()
    {
        try {
            $this->handler->get();
        } catch (Throwable $e) {
            echo $e->getMessage();
        } finally {
        
        }

    }


    
}

(new VkGrabber($container))();
