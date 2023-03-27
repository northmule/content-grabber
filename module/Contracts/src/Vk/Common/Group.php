<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Common;

/**
 * Class Group
 *
 * @package Coderun\Contracts\Vk\Common
 */
class Group
{
    protected int $id;
    protected string $description;
    protected string $name;
    protected string $screen_name;
    protected int $is_closed;
    protected string $type;
    protected string $photo_50;
    protected string $photo_100;
    protected string $photo_200;

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
     * @return Group
     */
    public function setId(int $id): Group
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Group
     */
    public function setDescription(string $description): Group
    {
        $this->description = $description;
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
     * @return Group
     */
    public function setName(string $name): Group
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get screen_name
     *
     * @return string
     */
    public function getScreenName(): string
    {
        return $this->screen_name;
    }

    /**
     * @param string $screen_name
     *
     * @return Group
     */
    public function setScreenName(string $screen_name): Group
    {
        $this->screen_name = $screen_name;
        return $this;
    }

    /**
     * Get is_closed
     *
     * @return int
     */
    public function getIsClosed(): int
    {
        return $this->is_closed;
    }

    /**
     * @param int $is_closed
     *
     * @return Group
     */
    public function setIsClosed(int $is_closed): Group
    {
        $this->is_closed = $is_closed;
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
     * @return Group
     */
    public function setType(string $type): Group
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get photo_50
     *
     * @return string
     */
    public function getPhoto50(): string
    {
        return $this->photo_50;
    }

    /**
     * @param string $photo_50
     *
     * @return Group
     */
    public function setPhoto50(string $photo_50): Group
    {
        $this->photo_50 = $photo_50;
        return $this;
    }

    /**
     * Get photo_100
     *
     * @return string
     */
    public function getPhoto100(): string
    {
        return $this->photo_100;
    }

    /**
     * @param string $photo_100
     *
     * @return Group
     */
    public function setPhoto100(string $photo_100): Group
    {
        $this->photo_100 = $photo_100;
        return $this;
    }

    /**
     * Get photo_200
     *
     * @return string
     */
    public function getPhoto200(): string
    {
        return $this->photo_200;
    }

    /**
     * @param string $photo_200
     *
     * @return Group
     */
    public function setPhoto200(string $photo_200): Group
    {
        $this->photo_200 = $photo_200;
        return $this;
    }
}
