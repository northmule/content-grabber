<?php

declare(strict_types=1);

namespace Coderun\WordPress\Service;

use Coderun\Common\Service\Serializer;
use Coderun\Contracts\WordPress\Post\Post;
use Coderun\WordPress\Endpoint\Post as EndpointPost;
use Coderun\WordPress\ModuleOptions;

/**
 * Class CreatePost
 *
 * @package Coderun\WordPress\Service
 */
class CreatePost extends AbstractCreate
{
    
    /**
     * @param EndpointPost  $endpoint
     * @param ModuleOptions $options
     * @param Serializer    $serializer
     */
    public function __construct(EndpointPost $endpoint, ModuleOptions $options, Serializer $serializer)
    {
        $this->endpoint = $endpoint;
        $this->options = $options;
        $this->serializer = $serializer;
    }
    
    
    protected function getContractName(): string
    {
        return Post::class;
    }
    
}
