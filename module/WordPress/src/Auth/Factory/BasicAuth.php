<?php

declare(strict_types=1);

namespace Coderun\WordPress\Auth\Factory;

use Coderun\WordPress\ModuleOptions;
use Coderun\WordPress\Auth\BasicAuth as BasicAuthService;
use Psr\Container\ContainerInterface;

/**
 * Class BasicAuth
 *
 * @package Coderun\WordPress\Auth\Factory
 */
class BasicAuth
{
    /**
     * Create service
     *
     * @param ContainerInterface   $container
     * @param string               $requestedName
     * @param array<string, mixed> $options
     * @return BasicAuthService
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): BasicAuthService {
        /** @var ModuleOptions $config */
        $config = $container->get(ModuleOptions::class);

        return new BasicAuthService($config->getOptions()->getUser(), $config->getOptions()->getPassword());
    }
}
