<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk;

use Coderun\Contracts\Vk\Common\Image;

/**
 * Class Sticker
 *
 * @package Coderun\Contracts\Vk
 *
 * @see https://dev.vk.com/reference/objects/sticker
 */
class Sticker implements AttachmentInterface
{
    protected int $productId;
    protected int $stickerId;
    /** @var array<int, Image> */
    protected array $images;
    
    protected array $imagesWithBackground;
    protected string $animationUrl;
    protected bool $isAllowed;
    
    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }
    
    /**
     * @param int $productId
     *
     * @return Sticker
     */
    public function setProductId(int $productId): Sticker
    {
        $this->productId = $productId;
        return $this;
    }
    
    /**
     * Get stickerId
     *
     * @return int
     */
    public function getStickerId(): int
    {
        return $this->stickerId;
    }
    
    /**
     * @param int $stickerId
     *
     * @return Sticker
     */
    public function setStickerId(int $stickerId): Sticker
    {
        $this->stickerId = $stickerId;
        return $this;
    }
    
    /**
     * Get images
     *
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }
    
    /**
     * @param array $images
     *
     * @return Sticker
     */
    public function setImages(array $images): Sticker
    {
        $this->images = $images;
        return $this;
    }
    
    /**
     * Get imagesWithBackground
     *
     * @return array
     */
    public function getImagesWithBackground(): array
    {
        return $this->imagesWithBackground;
    }
    
    /**
     * @param array $imagesWithBackground
     *
     * @return Sticker
     */
    public function setImagesWithBackground(array $imagesWithBackground
    ): Sticker {
        $this->imagesWithBackground = $imagesWithBackground;
        return $this;
    }
    
    /**
     * Get animationUrl
     *
     * @return string
     */
    public function getAnimationUrl(): string
    {
        return $this->animationUrl;
    }
    
    /**
     * @param string $animationUrl
     *
     * @return Sticker
     */
    public function setAnimationUrl(string $animationUrl): Sticker
    {
        $this->animationUrl = $animationUrl;
        return $this;
    }
    
    /**
     * Get isAllowed
     *
     * @return bool
     */
    public function isAllowed(): bool
    {
        return $this->isAllowed;
    }
    
    /**
     * @param bool $isAllowed
     *
     * @return Sticker
     */
    public function setIsAllowed(bool $isAllowed): Sticker
    {
        $this->isAllowed = $isAllowed;
        return $this;
    }
    
}