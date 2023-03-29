<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk;

/**
 * Class Photo
 *
 * @package Coderun\Contracts\Vk
 */
class Photo implements AttachmentInterface
{
    protected int $id;
    protected int $albumId;
    protected int $ownerId;
    protected int $userId;
    protected string $photo75;
    protected string $photo130;
    protected string $photo604;
    protected string $photo807;
    protected string $photo1280;
    protected int $width;
    protected int $height;
    protected string $text;
    protected int $date;
    protected string $accessKey;
    protected int $post_id;
    /** @var array<int, ImageSize> */
    protected array $sizes;
    protected bool $has_tags;

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
     * @return Photo
     */
    public function setId(int $id): Photo
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get albumId
     *
     * @return int
     */
    public function getAlbumId(): int
    {
        return $this->albumId;
    }

    /**
     * @param int $albumId
     *
     * @return Photo
     */
    public function setAlbumId(int $albumId): Photo
    {
        $this->albumId = $albumId;
        return $this;
    }

    /**
     * Get ownerId
     *
     * @return int
     */
    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    /**
     * @param int $ownerId
     *
     * @return Photo
     */
    public function setOwnerId(int $ownerId): Photo
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     *
     * @return Photo
     */
    public function setUserId(int $userId): Photo
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Get photo75
     *
     * @return string
     */
    public function getPhoto75(): string
    {
        return $this->photo75;
    }

    /**
     * @param string $photo75
     *
     * @return Photo
     */
    public function setPhoto75(string $photo75): Photo
    {
        $this->photo75 = $photo75;
        return $this;
    }

    /**
     * Get photo130
     *
     * @return string
     */
    public function getPhoto130(): string
    {
        return $this->photo130;
    }

    /**
     * @param string $photo130
     *
     * @return Photo
     */
    public function setPhoto130(string $photo130): Photo
    {
        $this->photo130 = $photo130;
        return $this;
    }

    /**
     * Get photo604
     *
     * @return string
     */
    public function getPhoto604(): string
    {
        return $this->photo604;
    }

    /**
     * @param string $photo604
     *
     * @return Photo
     */
    public function setPhoto604(string $photo604): Photo
    {
        $this->photo604 = $photo604;
        return $this;
    }

    /**
     * Get photo807
     *
     * @return string
     */
    public function getPhoto807(): string
    {
        return $this->photo807;
    }

    /**
     * @param string $photo807
     *
     * @return Photo
     */
    public function setPhoto807(string $photo807): Photo
    {
        $this->photo807 = $photo807;
        return $this;
    }

    /**
     * Get photo1280
     *
     * @return string
     */
    public function getPhoto1280(): string
    {
        return $this->photo1280;
    }

    /**
     * @param string $photo1280
     *
     * @return Photo
     */
    public function setPhoto1280(string $photo1280): Photo
    {
        $this->photo1280 = $photo1280;
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
     * @return Photo
     */
    public function setWidth(int $width): Photo
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
     * @return Photo
     */
    public function setHeight(int $height): Photo
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return Photo
     */
    public function setText(string $text): Photo
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get date
     *
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return Photo
     */
    public function setDate(int $date): Photo
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get accessKey
     *
     * @return string
     */
    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

    /**
     * @param string $accessKey
     *
     * @return Photo
     */
    public function setAccessKey(string $accessKey): Photo
    {
        $this->accessKey = $accessKey;
        return $this;
    }

    /**
     * Get post_id
     *
     * @return int
     */
    public function getPostId(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     *
     * @return Photo
     */
    public function setPostId(int $post_id): Photo
    {
        $this->post_id = $post_id;
        return $this;
    }

    /**
     * Get sizes
     *
     * @return array
     */
    public function getSizes(): array
    {
        return $this->sizes;
    }

    /**
     * @param array $sizes
     *
     * @return Photo
     */
    public function setSizes(array $sizes): Photo
    {
        $this->sizes = $sizes;
        return $this;
    }

    /**
     * Get has_tags
     *
     * @return bool
     */
    public function isHasTags(): bool
    {
        return $this->has_tags;
    }

    /**
     * @param bool $has_tags
     *
     * @return Photo
     */
    public function setHasTags(bool $has_tags): Photo
    {
        $this->has_tags = $has_tags;
        return $this;
    }

    /**
     * @return array<int, ImageSize
     */
    public function sortedSizeInDesOrder(): array
    {
        $sizes = $this->sizes;
        usort(
            $sizes,
            static function (ImageSize $size1, ImageSize $size2): int {
                if ($size1->getWidth() == $size2->getWidth()) {
                    return 0;
                }
                return $size1->getWidth() < $size2->getWidth() ? 1 : -1;
            }
        );
        return $sizes;
    }
}
