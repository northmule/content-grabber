<?php

declare(strict_types=1);

namespace Coderun\Vkontakte;

/**
 * ConfigProvider
 */
class ConfigProvider
{
    /** @var string  */
    public const CONFIG_KEY = 'vkontakte_config';

    /**
     * @return array<string, array<array<string>>>
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    /**
     * @return array<string, array<string,string>>
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [],
            'reflection' => [],
            'factories'  => [
                ModuleOptions::class                             => ModuleOptionsFactory::class,
                \Coderun\Vkontakte\Service\ReceiveContent::class => \Coderun\Vkontakte\Service\Factory\ReceiveContent::class,
                \Coderun\Vkontakte\Handler\Content::class        => \Coderun\Vkontakte\Handler\Factory\Content::class,

            ],
        ];
    }
}
