<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Handler\Factory;

use Coderun\Vkontakte\ModuleOptions;
use Coderun\Vkontakte\Service\ReceiveContent;
use Psr\Container\ContainerInterface;
use Coderun\Vkontakte\Handler\Content as ContentHandler;

/**
 * Class Content
 *
 * @package Coderun\Vkontakte\Handler
 */
class Content
{
    /**
     * Create service
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array              $options
     * @return ContentHandler
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): ContentHandler {
        /** @var ModuleOptions $config */
        $config = $container->get(ModuleOptions::class);
        $service = $container->get(ReceiveContent::class);
        return new ContentHandler($config->getOptions(), $service);
    }
}
