<?php

declare(strict_types=1);

namespace Coderun\WordPress\Service;

use Coderun\WordPress\Endpoint\EndpointInterface;
use Coderun\WordPress\ModuleOptions;
use Coderun\WordPress\ValueObject\ParamsInterface;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class AbstractCreate
 *
 * @package Coderun\WordPress\Service
 */
class AbstractCreate
{
    protected EndpointInterface $endpoint;
    protected ModuleOptions $options;
    
    /**
     * @return array<mixed>
     *
     * @throws GuzzleException
     */
    public function create(ParamsInterface $params): array
    {
        return $this->endpoint->save(
            $this->options->getOptions()->getSite(),
            $params->toArray()
        );
    }
}