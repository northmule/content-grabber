<?php

declare(strict_types=1);

namespace Coderun\WordPress;

use Coderun\WordPress\Auth\BasicAuth;
use Coderun\WordPress\Auth\Factory\BasicAuth as BasicAuthFactory;
use Coderun\WordPress\Endpoint\Post as PostEndpoint;
use Coderun\WordPress\Http\Client as HttpClient;
use Coderun\WordPress\Http\Factory\Client as HttpClientFactory;
use Coderun\WordPress\Service\CreatePost as CreatePostService;
use Coderun\WordPress\Template\Post as PostTemplate;
use Coderun\WordPress\Template\Factory\Post as PostTemplateFactory;

/**
 * ConfigProvider
 */
class ConfigProvider
{
    /** @var string  */
    public const NAME = 'wordpress';
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
            'reflection' => [
                PostEndpoint::class,
                CreatePostService::class,
            ],
            'factories'  => [
                ModuleOptions::class => ModuleOptionsFactory::class,
                BasicAuth::class     => BasicAuthFactory::class,
                HttpClient::class    => HttpClientFactory::class,
                PostTemplate::class => PostTemplateFactory::class,
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
