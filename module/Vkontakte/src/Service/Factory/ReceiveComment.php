<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Service\Factory;

use Coderun\Vkontakte\ModuleOptions;
use Coderun\Vkontakte\Service\ReceiveComment as ReceiveCommentService;
use Psr\Container\ContainerInterface;
use VK\Client\VKApiClient;

/**
 * Class ReceiveContent
 *
 * @package Coderun\Vkontakte\Service
 */
class ReceiveComment
{
    /**
     * Create service
     *
     * @param ContainerInterface   $container
     * @param string               $requestedName
     * @param array<string, mixed> $options
     * @return ReceiveCommentService
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): ReceiveCommentService {
        /** @var ModuleOptions $config */
        $config = $container->get(ModuleOptions::class);
        $client = new VKApiClient($config->getOptions()->getApiVersion());
        $serializer = $container->get(\Coderun\Common\Service\Serializer::class);
        return new ReceiveCommentService($config->getOptions()->getAccessToken(), $client, $serializer);
    }
}
