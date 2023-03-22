<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

/**
 * Class Views
 *
 * @package Coderun\Contracts\Vk\Post
 */
class Views
{
    protected int $count;

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
     * @return Views
     */
    public function setCount(int $count): Views
    {
        $this->count = $count;
        return $this;
    }
}
