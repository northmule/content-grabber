<?php

declare(strict_types=1);

namespace Coderun\ORM;

use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

/**
 * Class EntityManagerFactory
 *
 * @package Coderun\ORM
 */
class EntityManagerFactory
{
    /**
     * Create service
     *
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array<mixed>       $options
     * @return EntityManager
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): EntityManager {
        return new EntityManager(
            $container->get(\Doctrine\DBAL\Connection::class),
            $container->get(\Doctrine\ORM\Configuration::class),
            $container->get(\Doctrine\Common\EventManager::class),
        );
    }
}
