<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

/**
 * Class PostSource
 *
 * @package Coderun\Contracts\Vk\Post
 */
class PostSource
{
    protected string $type;

    /**
     * Get type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return PostSource
     */
    public function setType(string $type): PostSource
    {
        $this->type = $type;
        return $this;
    }
}
