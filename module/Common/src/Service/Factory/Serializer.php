<?php

declare(strict_types=1);

namespace Coderun\Common\Service\Factory;

use Coderun\Common\Service\Serializer as SerializerService;
use Psr\Container\ContainerInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as  SymfonySerializer;

/**
 * Class Serializer
 *
 * @package Coderun\Vkontakte\Service
 */
class Serializer
{
    /**
     * Create service
     *
     * @param ContainerInterface   $container
     * @param string               $requestedName
     * @param array<string, mixed> $options
     * @return SerializerService
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): SerializerService {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader());
        $reflectionExtractor = new ReflectionExtractor();
        $phpDocExtractor = new PhpDocExtractor();
        $propertyTypeExtractor = new PropertyInfoExtractor(
            [$reflectionExtractor],
            [$phpDocExtractor, $reflectionExtractor],
            [$phpDocExtractor],
            [$reflectionExtractor],
            [$reflectionExtractor]
        );

        $normalizer = new ObjectNormalizer(
            $classMetadataFactory,
            new CamelCaseToSnakeCaseNameConverter(),
            null,
            $propertyTypeExtractor
        );
        $arrayNormalizer = new ArrayDenormalizer();
        return new SerializerService(new SymfonySerializer([$arrayNormalizer, $normalizer]));
    }
}
