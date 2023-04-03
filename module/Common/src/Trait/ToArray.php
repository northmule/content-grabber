<?php

declare(strict_types=1);

namespace Coderun\Common\Trait;

use ReflectionClass;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

use function array_filter;

/**
 * Class ToArray
 *
 * @package Coderun\Common\Trait
 */
trait ToArray
{
    
    /**
     * @return array<string, mixed>
     */
    public function toArray(bool $filterEmpty = false): array
    {
        $params = [];
        $class = new ReflectionClass($this);
        $converter = new CamelCaseToSnakeCaseNameConverter();
        foreach ($class->getProperties() as $property) {
            $name = $converter->normalize($property->getName());
            $params[$name] = $property->getValue($this);
        }
        return $filterEmpty ? array_filter($params) : $params;
    }
}