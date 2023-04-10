<?php

declare(strict_types=1);

namespace Coderun\WordPress\Service;

use Coderun\Common\Service\Serializer;
use Coderun\Contracts\WordPress\Comment\Comment;
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
     * @param EndpointComment $endpoint
     * @param ModuleOptions   $options
     * @param Serializer      $serializer
     */
    public function __construct(EndpointComment $endpoint, ModuleOptions $options, Serializer $serializer)
    {
        $this->endpoint = $endpoint;
        $this->options = $options;
        $this->serializer = $serializer;
    }
    
    /**
     * @return string
     */
    protected function getContractName(): string
    {
        return Comment::class;
    }
    
}