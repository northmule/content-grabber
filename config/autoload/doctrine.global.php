<?php

declare(strict_types=1);

/**
 * @see https://www.doctrine-project.org/projects/doctrine-orm-module/en/5.3/user-guide.html#user-guide
 * @see https://github.com/Roave/psr-container-doctrine/blob/3.10.x/example/full-config.php
 */

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\FilesystemCache;

return [
    'doctrine' => [
        'driver' => [
            'default_driver' => [
                'class' => Doctrine\Persistence\Mapping\Driver\MappingDriverChain::class,
                'cache' => 'array',
                'drivers' => ['Coderun\ORM\Entity' => 'app_entity'],
            ],
            'app_entity' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AttributeDriver::class,
                'cache' => 'array',
                'paths' => [
                    'module/ORM/src/Entity',
                ],
            ]
        ],
        'configuration' => [
            'orm_default' => [
                'metadata_cache'    => 'array',
                'query_cache'       => 'array',
                'result_cache'      => 'array',
                'hydration_cache'   => 'array',
                'driver'            => 'default_driver',
                'generate_proxies'  => true,
                'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'   => 'Coderun\DoctrineORMModule\Proxy',
                'filters'           => [],
            ],
        ],
        'connection' => [
            'orm_default' => [
                'driver_class' => \Doctrine\DBAL\Driver\PDO\SQLite\Driver::class,
                'driverOptions' => [],
                'params' => [
                    'path' => 'data/database/content_grabber.sqlite',
                    'memory' => false,
                    'user'     => 'test',
                    'password' => 'test',
                ],
            ],
        ],
        'entity_manager' => [
            'orm_default' => [
                'connection'    => 'orm_default',
                'configuration' => 'orm_default',
            ],
        ],
        'event_manager' => [
            'orm_default' => [
                'subscribers' => [],
                'listeners' => [],
            ],
        ],
        'cache' => [
            'array' => [
                'class' => ArrayCache::class,
                'namespace' => 'psr-container-doctrine',
            ],
            'filesystem' => [
                'class' => FilesystemCache::class,
                'directory' => 'data/cache/DoctrineCache',
                'namespace' => 'psr-container-doctrine',
            ],
        ],
        'migrations' => [
            'orm_default' => [
                'table_storage' => [
                    'table_name' => 'migrations_executed',
                    'version_column_name' => 'version',
                    'version_column_length' => 255,
                    'executed_at_column_name' => 'executed_at',
                    'execution_time_column_name' => 'execution_time',
                ],
                'migrations_paths' => [
                    'Coderun\Doctrine\Migrations' => 'data/migrations',
                ],
                'all_or_nothing' => true,
                'check_database_platform' => true,
            ],
        ]
    ]
];