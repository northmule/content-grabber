<?php

declare(strict_types=1);

namespace Coderun\WordPress\Http\Factory;

use Coderun\WordPress\Auth\BasicAuth;
use Coderun\WordPress\Http\Client as ClientService;
use GuzzleHttp\Client as HttpClient;
use Psr\Container\ContainerInterface;

/**
 * Class Client
 *
 * @package Coderun\WordPress\Http\Factory
 */
class Client
{
    /**
     * Create service
     *
     * @param ContainerInterface  $container
     * @param string              $requestedName
     * @param array<string,mixed> $options
     * @return ClientService
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): ClientService {
        return new ClientService(
            $container->get(BasicAuth::class),
            new HttpClient()
        );
    }
}
