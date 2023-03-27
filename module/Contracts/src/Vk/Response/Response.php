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
class Response implements ContractInterface
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
     * @return Response
     */
    public function setCount(int $count): Response
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Get items
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     *
     * @return Response
     */
    public function setItems(array $items): Response
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
     * @return Response
     */
    public function setGroups(array $groups): Response
    {
        $this->groups = $groups;
        return $this;
    }
}
