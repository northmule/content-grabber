<?php

declare(strict_types=1);

namespace Coderun\Common\Exception;

use function sprintf;
use function get_class;

/**
 * Class InvalidArgumentException
 *
 * @package Coderun\Common\Exception
 */
class InvalidArgumentException extends \InvalidArgumentException implements ExceptionInterface
{
    
    /**
     * @param string $name
     * @param object $object
     *
     * @return InvalidArgumentException
     */
    public static function propertyNotExist(string $name, object $object): InvalidArgumentException
    {
        return new self(sprintf('the property "%s" does not exist in the current class "%s"', $name, get_class($object)));
    }
    
    /**
     * @param string $typeName
     *
     * @return InvalidArgumentException
     */
    public static function typeNotDefined(string $typeName): InvalidArgumentException
    {
        return new self(sprintf('The type is not defined: "%s"', $typeName));
    }
}