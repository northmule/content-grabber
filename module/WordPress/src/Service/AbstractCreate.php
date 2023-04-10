<?php

declare(strict_types=1);

namespace Coderun\WordPress\Service;

use Coderun\Common\Service\Serializer;
use Coderun\Contracts\ContractInterface;
use Coderun\WordPress\Endpoint\EndpointInterface;
use Coderun\WordPress\ModuleOptions;
use Coderun\WordPress\ValueObject\ParamsInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 * Class AbstractCreate
 *
 * @package Coderun\WordPress\Service
 */
abstract class AbstractCreate
{
    protected EndpointInterface $endpoint;
    protected ModuleOptions $options;
    
    protected Serializer $serializer;
    
    /**
     * @param ParamsInterface $params
     *
     * @return ContractInterface
     *
     * @throws ExceptionInterface
     */
    public function create(ParamsInterface $params): ContractInterface
    {
        $response =  $this->endpoint->save(
            $this->options->getOptions()->getSite(),
            $params->toArray()
        );
        return $this->serializer->denormalize(
            $response,
            $this->getContractName(),
        );
    }
    
    /**
     * Класс для денормализации
     *
     * @return string
     */
   protected abstract function getContractName():string;
}