<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Collection;

use Coderun\Contracts\Vk\Response\Response;
use Ramsey\Collection\Map\TypedMap;

/**
 * Class ResponseMap
 *
 * @package Coderun\Vkontakte\Collection
 *
 * @extends ResponseMap<string, Response>
 */
class ResponseMap extends TypedMap
{
    /**
     * {@inheritDoc}
     *
     * @param array<string, Response> $response
     */
    public function __construct(array $response = [])
    {
        parent::__construct('string', Response::class, $response);
    }
}
