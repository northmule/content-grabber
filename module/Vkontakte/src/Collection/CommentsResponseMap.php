<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Collection;

use Coderun\Contracts\Vk\Response\CommentsResponse;
use Ramsey\Collection\Map\TypedMap;

/**
 * Class CommentsResponseMap
 *
 * @package Coderun\Vkontakte\Collection
 *
 * @extends CommentsResponseMap<string, CommentsResponse>
 */
class CommentsResponseMap extends TypedMap
{
    /**
     * {@inheritDoc}
     *
     * @param array<string, CommentsResponse> $response
     */
    public function __construct(array $response = [])
    {
        parent::__construct('string', CommentsResponse::class, $response);
    }
}
