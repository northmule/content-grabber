<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

/**
 * Class Copyright
 *
 * @package Coderun\Contracts\Vk\Post
 */
class Copyright
{
    protected int $id;
    protected string $link;
    protected string $name;
    protected string $type;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Copyright
     */
    public function setId(int $id): Copyright
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     *
     * @return Copyright
     */
    public function setLink(string $link): Copyright
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Copyright
     */
    public function setName(string $name): Copyright
    {
        $this->name = $name;
        return $this;
    }

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
     * @return Copyright
     */
    public function setType(string $type): Copyright
    {
        $this->type = $type;
        return $this;
    }
}
