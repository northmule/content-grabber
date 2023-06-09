<?php

declare(strict_types=1);

namespace Coderun\Contracts;

/**
 * ConfigProvider
 */
class ConfigProvider
{
    /** @var string  */
    public const NAME = 'contracts';
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
            'invokables' => [],
            'reflection' => [],
            'factories'  => [],
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
