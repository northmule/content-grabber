<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

if (PHP_SAPI !== 'cli') {
    echo PHP_EOL;
    echo 'Only in the mode "cli"';
    echo PHP_EOL;
}

/** @var ContainerBuilder $container */
$container = require __DIR__. '/../config/cli-config.php';
$entityManager = $container->get(EntityManager::class);
$commands = [
    // Migrations commands
    $container->get(\Doctrine\Migrations\Tools\Console\Command\CurrentCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\DiffCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\ExecuteCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\GenerateCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\LatestCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\ListCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\MigrateCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\RollupCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\StatusCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\UpToDateCommand::class),
    $container->get(\Doctrine\Migrations\Tools\Console\Command\VersionCommand::class),
];
$helperSet = ConsoleRunner::createHelperSet(
    $entityManager
);

ConsoleRunner::run($helperSet, $commands);