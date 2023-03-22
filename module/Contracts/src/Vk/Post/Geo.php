<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

/**
 * Class Geo
 *
 * @package Coderun\Contracts\Vk\Post
 */
class Geo
{
    protected string $type;
    protected string $coordinates;

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
     * @return Geo
     */
    public function setType(string $type): Geo
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get coordinates
     *
     * @return string
     */
    public function getCoordinates(): string
    {
        return $this->coordinates;
    }

    /**
     * @param string $coordinates
     *
     * @return Geo
     */
    public function setCoordinates(string $coordinates): Geo
    {
        $this->coordinates = $coordinates;
        return $this;
    }
}
