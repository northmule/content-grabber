<?php

declare(strict_types=1);

namespace Coderun\Contracts;

/**
 * ConfigProvider
 */
class ConfigProvider
{
    /** @var string  */
    public const CONFIG_KEY = 'contracts_config';

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
            'factories'  => [],
        ];
    }
}
