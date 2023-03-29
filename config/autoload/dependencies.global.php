<?php

declare(strict_types=1);

/**
 * @see https://www.doctrine-project.org/projects/doctrine-orm-module/en/5.3/user-guide.html#user-guide
 * @see https://github.com/Roave/psr-container-doctrine
 */
return [
    'dependencies' => [
        'aliases' => [
            'doctrine.connection.orm_default' => \Doctrine\DBAL\Connection::class,
            'doctrine.configuration.orm_default'=>  \Doctrine\ORM\Configuration::class,
            'doctrine.driver.orm_default' =>  \Doctrine\DBAL\Driver\PDO\SQLite\Driver::class,
            'doctrine.entitymanager.orm_default'=>  \Doctrine\ORM\EntityManager::class,
            'doctrine.eventmanager.orm_default' =>  \Doctrine\Common\EventManager::class,
        ],
        'invokables' => [],
        'factories' => [
            // main
            Doctrine\ORM\EntityManager::class => Roave\PsrContainerDoctrine\EntityManagerFactory::class,
            Doctrine\DBAL\Connection::class => Roave\PsrContainerDoctrine\ConnectionFactory::class,
            Doctrine\ORM\Configuration::class => Roave\PsrContainerDoctrine\ConfigurationFactory::class,
            Doctrine\DBAL\Driver\PDO\SQLite\Driver::class => Roave\PsrContainerDoctrine\DriverFactory::class,
            Doctrine\Common\EventManager::class => Roave\PsrContainerDoctrine\EventManagerFactory::class,
            Doctrine\Migrations\Configuration\Migration\ConfigurationLoader::class => Roave\PsrContainerDoctrine\Migrations\ConfigurationLoaderFactory::class,
            // Commands
            Doctrine\Migrations\Tools\Console\Command\CurrentCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\DiffCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\ExecuteCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\GenerateCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\LatestCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\ListCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\MigrateCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\RollupCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\StatusCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\UpToDateCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,
            Doctrine\Migrations\Tools\Console\Command\VersionCommand::class => Roave\PsrContainerDoctrine\Migrations\CommandFactory::class,

            Doctrine\Migrations\DependencyFactory::class => Roave\PsrContainerDoctrine\Migrations\DependencyFactoryFactory::class,
        ],
    ],

];
