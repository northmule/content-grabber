<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Handler\Factory;

use Coderun\Vkontakte\ModuleOptions;
use Coderun\Vkontakte\Service\ReceiveComment;
use Psr\Container\ContainerInterface;
use Coderun\Vkontakte\Handler\Comment as CommentHandler;

/**
 * Class Comment
 *
 * @package Coderun\Vkontakte\Handler
 */
class Comment
{
    /**
     * Create service
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array              $options
     * @return CommentHandler
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): CommentHandler {
        /** @var ModuleOptions $config */
        $config = $container->get(ModuleOptions::class);
        $service = $container->get(ReceiveComment::class);
        return new CommentHandler($config->getOptions(), $service);
    }
}
