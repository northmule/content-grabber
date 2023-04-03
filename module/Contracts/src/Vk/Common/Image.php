<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Common;

/**
 * Class Image
 *
 * @package Coderun\Contracts\Vk\Common
 */
class Image
{
    protected string $url;
    protected int $width;
    protected int $height;
    
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
     * @return Image
     */
    public function setUrl(string $url): Image
    {
        $this->url = $url;
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
     * @return Image
     */
    public function setWidth(int $width): Image
    {
        $this->width = $width;
        return $this;
    }
    
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
     * @return Image
     */
    public function setHeight(int $height): Image
    {
        $this->height = $height;
        return $this;
    }
    
}