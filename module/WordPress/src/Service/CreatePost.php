<?php

declare(strict_types=1);

namespace Coderun\WordPress\Service;

use Coderun\WordPress\Endpoint\Post as EndpointPost;
use Coderun\WordPress\ModuleOptions;
use Coderun\WordPress\ValueObject\Post;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class CreatePost
 *
 * @package Coderun\WordPress\Service
 */
class CreatePost
{
    protected EndpointPost $endpoint;
    protected ModuleOptions $options;
    
    /**
     * @param EndpointPost  $endpoint
     * @param ModuleOptions $options
     */
    public function __construct(EndpointPost $endpoint, ModuleOptions $options)
    {
        $this->endpoint = $endpoint;
        $this->options = $options;
    }
    
    
    /**
     * @return array<mixed>
     *
     * @throws GuzzleException
     */
    public function create(Post $params): array
    {
        return $this->endpoint->save(
            $this->options->getOptions()->getSite(),
            $params->toArray()
        );
    }
}