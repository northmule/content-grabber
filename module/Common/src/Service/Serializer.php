<?php

declare(strict_types=1);

namespace Coderun\Common\Service;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

use function array_merge;

/**
 * Class Serializer
 *
 * @package Coderun\Common\Service
 */
class Serializer
{
    
    protected SymfonySerializer $serializer;
    
    /**
     * @param SymfonySerializer $serializer
     */
    public function __construct(SymfonySerializer $serializer)
    {
        $this->serializer = $serializer;
    }
    
    /**
     * @param mixed       $data
     * @param string      $type
     * @param string|null $format
     * @param array       $context
     *
     * @return mixed
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function denormalize(mixed $data, string $type, string $format = 'array', array $context = []): mixed
    {
       return $this->serializer->denormalize(
            $data,
            $type,
            $format,
            array_merge([
                AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => true,
            ], $context),
        );
    }
    
}