<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Service\Factory;

use Coderun\Vkontakte\ModuleOptions;
use Coderun\Vkontakte\Service\ReceiveComment as ReceiveCommentService;
use Psr\Container\ContainerInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use VK\Client\VKApiClient;

/**
 * Class ReceiveContent
 *
 * @package Coderun\Vkontakte\Service
 */
class ReceiveComment
{
    /**
     * Create service
     *
     * @param ContainerInterface   $container
     * @param string               $requestedName
     * @param array<string, mixed> $options
     * @return ReceiveCommentService
     */
    public function __invoke(
        ContainerInterface $container,
        string $requestedName,
        array $options = []
    ): ReceiveCommentService {
        /** @var ModuleOptions $config */
        $config = $container->get(ModuleOptions::class);
        $client = new VKApiClient($config->getOptions()->getApiVersion());
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
        $serializer = new Serializer([$arrayNormalizer, $normalizer]);
        return new ReceiveCommentService($config->getOptions()->getAccessToken(), $client, $serializer);
    }
}
