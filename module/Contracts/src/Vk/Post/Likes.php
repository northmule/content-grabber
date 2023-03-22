<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

/**
 * Class Likes
 *
 * @package Coderun\Contracts\Vk\Post
 */
class Likes
{
    protected int $count;
    protected int $userLikes;
    protected int $canLike;
    protected int $canPublish;
    protected bool $repostDisabled;

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
     * @return Likes
     */
    public function setCount(int $count): Likes
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Get userLikes
     *
     * @return int
     */
    public function getUserLikes(): int
    {
        return $this->userLikes;
    }

    /**
     * @param int $userLikes
     *
     * @return Likes
     */
    public function setUserLikes(int $userLikes): Likes
    {
        $this->userLikes = $userLikes;
        return $this;
    }

    /**
     * Get canLike
     *
     * @return int
     */
    public function getCanLike(): int
    {
        return $this->canLike;
    }

    /**
     * @param int $canLike
     *
     * @return Likes
     */
    public function setCanLike(int $canLike): Likes
    {
        $this->canLike = $canLike;
        return $this;
    }

    /**
     * Get canPublish
     *
     * @return int
     */
    public function getCanPublish(): int
    {
        return $this->canPublish;
    }

    /**
     * @param int $canPublish
     *
     * @return Likes
     */
    public function setCanPublish(int $canPublish): Likes
    {
        $this->canPublish = $canPublish;
        return $this;
    }

    /**
     * Get repostDisabled
     *
     * @return bool
     */
    public function isRepostDisabled(): bool
    {
        return $this->repostDisabled;
    }

    /**
     * @param bool $repostDisabled
     *
     * @return Likes
     */
    public function setRepostDisabled(bool $repostDisabled): Likes
    {
        $this->repostDisabled = $repostDisabled;
        return $this;
    }
}
