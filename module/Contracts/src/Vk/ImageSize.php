<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk;

/**
 * Class ImageSize
 *
 * @package Coderun\Contracts\Vk
 */
class ImageSize
{
    protected int $height;
    protected string $type;
    protected int $width;
    protected string $url;

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return ImageSize
     */
    public function setHeight(int $height): ImageSize
    {
        $this->height = $height;
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
     * @return ImageSize
     */
    public function setType(string $type): ImageSize
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get width
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return ImageSize
     */
    public function setWidth(int $width): ImageSize
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return ImageSize
     */
    public function setUrl(string $url): ImageSize
    {
        $this->url = $url;
        return $this;
    }
}
