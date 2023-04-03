<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Collection;

use Ramsey\Collection\Map\TypedMap;
use Coderun\Contracts\Vk\Comment\Comment;

/**
 * Class CommentsResponseMap
 *
 * @package Coderun\Vkontakte\Collection
 *
 * @extends CommentsResponseMap<string, Comment>
 */
class CommentsResponseMap extends TypedMap
{
    /**
     * {@inheritDoc}
     *
     * @param array<string, Comment> $response
     */
    public function __construct(array $response = [])
    {
        parent::__construct('int', Comment::class, $response);
    }
}
