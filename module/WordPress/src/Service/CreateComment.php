<?php

declare(strict_types=1);

namespace Coderun\WordPress\Service;

use Coderun\WordPress\Endpoint\Comment as EndpointComment;
use Coderun\WordPress\ModuleOptions;

/**
 * Class CreateComment
 *
 * @package Coderun\WordPress\Service
 */
class CreateComment extends AbstractCreate
{

    /**
     * @param EndpointComment  $endpoint
     * @param ModuleOptions $options
     */
    public function __construct(EndpointComment $endpoint, ModuleOptions $options)
    {
        $this->endpoint = $endpoint;
        $this->options = $options;
    }
}