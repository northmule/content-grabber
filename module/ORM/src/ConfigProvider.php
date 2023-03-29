<?php

declare(strict_types=1);

namespace Coderun\ORM;

/**
 * ConfigProvider
 */
class ConfigProvider
{
    /** @var string  */
    public const NAME = 'ORM';
    /** @var string  */
    public const CONFIG_KEY = 'config_' . self::NAME;

    /**
     * @return array<string, array<array<string>>>
     */
    public function __invoke(): array
    {
        return [
            'dependencies'   => $this->getDependencies(),
            self::CONFIG_KEY => $this->getConfig(),
        ];
    }

    /**
     * @return array<string, array<string,string>>
     */
    protected function getDependencies(): array
    {
        return [
            'aliases'    => [],
            'invokables' => [],
            'reflection' => [],
            'factories'  => [
                ModuleOptions::class => ModuleOptionsFactory::class,
            ],
        ];
    }

    /**
     * @return array<string,string>
     */
    protected function getConfig(): array
    {
        return [];
    }
}
