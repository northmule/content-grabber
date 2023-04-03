<?php

declare(strict_types=1);

namespace Coderun\Common\Trait;

use Coderun\Common\Exception\InvalidArgumentException;
use ReflectionProperty;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

use function intval;
use function strval;

/**
 * Class FillPropertyFromArray
 *
 * @package Coderun\Common\Trait
 */
trait FillPropertyFromArray
{
    
    /**
     * @param array<string, mixed> $params
     *
     * @return void
     */
    public function fillProperty(array $params): void
    {
        $converter = new CamelCaseToSnakeCaseNameConverter();
        foreach ($params as $name => $value) {
            $name = $converter->denormalize($name);
            if (!property_exists($this, $name)) {
                throw InvalidArgumentException::propertyNotExist($name, $this);
            }
            $property = new ReflectionProperty($this, $name);
            $typeName = $property->getType()->getName();
            $this->$name = $this->leadToType($typeName, $value);
        }
    }
    
    /**
     * @param string $typeName
     * @param mixed  $value
     *
     * @return string|int
     */
    protected function leadToType(string $typeName, mixed $value):string|int
    {
        return match ($typeName) {
            'int' => intval($value),
            'string' => strval($value),
            default => throw InvalidArgumentException::typeNotDefined($typeName),
        };
    }
}