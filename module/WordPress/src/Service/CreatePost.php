<?php

declare(strict_types=1);

namespace Coderun\WordPress\Service;

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
     */
    public function __construct(EndpointPost $endpoint, ModuleOptions $options)
    {
        $this->endpoint = $endpoint;
        $this->options = $options;
    }

}
