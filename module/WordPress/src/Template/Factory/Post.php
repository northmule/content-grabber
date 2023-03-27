<?php

declare(strict_types=1);

namespace Coderun\WordPress\Template\Factory;

use Coderun\WordPress\ModuleOptions;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Coderun\WordPress\Template\Post as PostTemplate;

/**
 * Class Post
 *
 * @package Coderun\WordPress\Template
 */
class Post
{
    /**
     * Create service
     *
     * @param ContainerInterface   $container
     * @param string               $requestedName
     * @param array<string, mixed> $options
     * @return PostTemplate
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): PostTemplate {
        /** @var ModuleOptions $config */
        $config = $container->get(ModuleOptions::class);
        $loader = new FilesystemLoader($config->getOptions()->getTemplates());
        $twig = new Environment($loader, [
            'cache' => $config->getOptions()->getCachePath(),
        ]);
        return new PostTemplate($twig);
    }
}
