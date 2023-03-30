<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Collection;

use Coderun\Contracts\Vk\Response\PostsResponse;
use Ramsey\Collection\Map\TypedMap;

/**
 * Class PostsResponseMap
 *
 * @package Coderun\Vkontakte\Collection
 *
 * @extends PostsResponseMap<string, PostsResponse>
 */
class PostsResponseMap extends TypedMap
{
    /**
     * {@inheritDoc}
     *
     * @param array<string, PostsResponse> $response
     */
    public function __construct(array $response = [])
    {
        parent::__construct('string', PostsResponse::class, $response);
    }
}
