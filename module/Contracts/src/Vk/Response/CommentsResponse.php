<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Response;

use Coderun\Contracts\Vk\Comment\Comment;
use Coderun\Contracts\Vk\Common\Group;

/**
 * Class CommentsResponse
 *
 * @package Coderun\Contracts\Vk\Response
 */
class CommentsResponse
{
    protected int $count;
    /**
     * @var array<int, Comment>
     */
    protected array $items;
    /** @var array<int, Group> */
    protected array $groups;
}