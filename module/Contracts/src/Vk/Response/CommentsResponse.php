<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Response;

use Coderun\Contracts\Vk\Comment\Comment;
use Coderun\Contracts\Vk\Common\Group;
use Coderun\Contracts\Vk\Common\Profiles;

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
    /** @var array<int, Profiles */
    protected array $profiles;
    
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
     * @return CommentsResponse
     */
    public function setCount(int $count): CommentsResponse
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
     * @return CommentsResponse
     */
    public function setItems(array $items): CommentsResponse
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
     * @return CommentsResponse
     */
    public function setGroups(array $groups): CommentsResponse
    {
        $this->groups = $groups;
        return $this;
    }
    
    /**
     * Get profiles
     *
     * @return array
     */
    public function getProfiles(): array
    {
        return $this->profiles;
    }
    
    /**
     * @param array $profiles
     *
     * @return CommentsResponse
     */
    public function setProfiles(array $profiles): CommentsResponse
    {
        $this->profiles = $profiles;
        return $this;
    }

}
