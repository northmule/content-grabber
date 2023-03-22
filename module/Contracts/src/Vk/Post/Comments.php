<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

/**
 * Class Comments
 *
 * @package Coderun\Contracts\Vk\Post
 */
class Comments
{
    protected int $count;
    protected int $canPost;
    protected bool $groupsCanPost;
    protected int $canClose;
    protected int $canOpen;

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
     * @return Comments
     */
    public function setCount(int $count): Comments
    {
        $this->count = $count;
        return $this;
    }

    /**
     * Get canPost
     *
     * @return int
     */
    public function getCanPost(): int
    {
        return $this->canPost;
    }

    /**
     * @param int $canPost
     *
     * @return Comments
     */
    public function setCanPost(int $canPost): Comments
    {
        $this->canPost = $canPost;
        return $this;
    }

    /**
     * Get groupsCanPost
     *
     * @return bool
     */
    public function isGroupsCanPost(): bool
    {
        return $this->groupsCanPost;
    }

    /**
     * @param bool $groupsCanPost
     *
     * @return Comments
     */
    public function setGroupsCanPost(bool $groupsCanPost): Comments
    {
        $this->groupsCanPost = $groupsCanPost;
        return $this;
    }

    /**
     * Get canClose
     *
     * @return int
     */
    public function getCanClose(): int
    {
        return $this->canClose;
    }

    /**
     * @param int $canClose
     *
     * @return Comments
     */
    public function setCanClose(int $canClose): Comments
    {
        $this->canClose = $canClose;
        return $this;
    }

    /**
     * Get canOpen
     *
     * @return int
     */
    public function getCanOpen(): int
    {
        return $this->canOpen;
    }

    /**
     * @param int $canOpen
     *
     * @return Comments
     */
    public function setCanOpen(int $canOpen): Comments
    {
        $this->canOpen = $canOpen;
        return $this;
    }
}
