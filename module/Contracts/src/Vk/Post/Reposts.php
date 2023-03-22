<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

/**
 * Class Reposts
 *
 * @package Coderun\Contracts\Vk\Post
 */
class Reposts
{
    protected int $count;
    protected int $userReposted;

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
     * @return Reposts
     */
    public function setCount(int $count): Reposts
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Get userReposted
     *
     * @return int
     */
    public function getUserReposted(): int
    {
        return $this->userReposted;
    }

    /**
     * @param int $userReposted
     *
     * @return Reposts
     */
    public function setUserReposted(int $userReposted): Reposts
    {
        $this->userReposted = $userReposted;
        return $this;
    }
}
