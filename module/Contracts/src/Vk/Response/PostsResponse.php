<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Response;

use Coderun\Contracts\ContractInterface;
use Coderun\Contracts\Vk\Common\Group;
use Coderun\Contracts\Vk\Post\Post;

/**
 * Class Response
 *
 * @package Coderun\Contracts\Vk\Response
 */
class PostsResponse implements ContractInterface
{
    protected int $count;
    /**
     * @var array<int, Post>
     */
    protected array $items;
    /** @var array<int, Group> */
    protected array $groups;

    /**
     * Get count
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return PostsResponse
     */
    public function setCount(int $count): PostsResponse
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Get items
     *
     * @return array<int, Post>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     *
     * @return PostsResponse
     */
    public function setItems(array $items): PostsResponse
    {
        $this->items = $items;
        return $this;
    }

    /**
     * Get groups
     *
     * @return array
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     *
     * @return PostsResponse
     */
    public function setGroups(array $groups): PostsResponse
    {
        $this->groups = $groups;
        return $this;
    }
    
    /**
     * @return Group|null
     */
    public function getFirstGroup(): ?Group
    {
        return $this->getGroups()[0] ?? null;
    }
}
