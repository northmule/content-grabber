<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Post;

use Coderun\Contracts\ContractInterface;
use Coderun\Contracts\Vk\Attachment;

/**
 * Class Post
 *
 * @package Coderun\Contracts\Vk
 *
 * @see https://vk.com/dev/objects/post
 */
class Post implements ContractInterface
{
    protected int $id;
    protected int $fromId;
    protected int $isPinned;
    protected bool $isFavorite;
    protected int $ownerId;
    protected int $createdBy;
    protected int $date;
    protected int $markedAsAds;
    protected string $postType;
    protected string $text;
    protected int $replyOwnerId;
    protected int $replyPostId;
    protected int $friendsOnly;
    protected int $can_pin;
    /** @var array<int, Attachment> */
    protected array $attachments;
    /** @var array<int, Post */
    protected array $copyHistory;
    protected Geo $geo;
    protected int $signerId;
    protected PostSource $postSource;
    /**
     *
     * @var Comments
     */
    protected Comments $comments;
    protected Copyright $copyright;
    protected Likes $likes;
    protected Reposts $reposts;
    protected Views $views;
    protected string $hash;
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
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get fromId
     *
     * @return int
     */
    public function getFromId(): int
    {
        return $this->fromId;
    }

    /**
     * @param int $fromId
     *
     * @return Post
     */
    public function setFromId(int $fromId): Post
    {
        $this->fromId = $fromId;
        return $this;
    }

    /**
     * Get isPinned
     *
     * @return int
     */
    public function getIsPinned(): int
    {
        return $this->isPinned;
    }

    /**
     * @param int $isPinned
     *
     * @return Post
     */
    public function setIsPinned(int $isPinned): Post
    {
        $this->isPinned = $isPinned;
        return $this;
    }

    /**
     * Get isFavorite
     *
     * @return bool
     */
    public function isFavorite(): bool
    {
        return $this->isFavorite;
    }

    /**
     * @param bool $isFavorite
     *
     * @return Post
     */
    public function setIsFavorite(bool $isFavorite): Post
    {
        $this->isFavorite = $isFavorite;
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
     * @return Post
     */
    public function setOwnerId(int $ownerId): Post
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return int
     */
    public function getCreatedBy(): int
    {
        return $this->createdBy;
    }

    /**
     * @param int $createdBy
     *
     * @return Post
     */
    public function setCreatedBy(int $createdBy): Post
    {
        $this->createdBy = $createdBy;
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
     * @return Post
     */
    public function setDate(int $date): Post
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get markedAsAds
     *
     * @return int
     */
    public function getMarkedAsAds(): int
    {
        return $this->markedAsAds;
    }

    /**
     * @param int $markedAsAds
     *
     * @return Post
     */
    public function setMarkedAsAds(int $markedAsAds): Post
    {
        $this->markedAsAds = $markedAsAds;
        return $this;
    }

    /**
     * Get postType
     *
     * @return string
     */
    public function getPostType(): string
    {
        return $this->postType;
    }

    /**
     * @param string $postType
     *
     * @return Post
     */
    public function setPostType(string $postType): Post
    {
        $this->postType = $postType;
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
     * @return Post
     */
    public function setText(string $text): Post
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get replyOwnerId
     *
     * @return int
     */
    public function getReplyOwnerId(): int
    {
        return $this->replyOwnerId;
    }

    /**
     * @param int $replyOwnerId
     *
     * @return Post
     */
    public function setReplyOwnerId(int $replyOwnerId): Post
    {
        $this->replyOwnerId = $replyOwnerId;
        return $this;
    }

    /**
     * Get replyPostId
     *
     * @return int
     */
    public function getReplyPostId(): int
    {
        return $this->replyPostId;
    }

    /**
     * @param int $replyPostId
     *
     * @return Post
     */
    public function setReplyPostId(int $replyPostId): Post
    {
        $this->replyPostId = $replyPostId;
        return $this;
    }

    /**
     * Get friendsOnly
     *
     * @return int
     */
    public function getFriendsOnly(): int
    {
        return $this->friendsOnly;
    }

    /**
     * @param int $friendsOnly
     *
     * @return Post
     */
    public function setFriendsOnly(int $friendsOnly): Post
    {
        $this->friendsOnly = $friendsOnly;
        return $this;
    }

    /**
     * Get can_pin
     *
     * @return int
     */
    public function getCanPin(): int
    {
        return $this->can_pin;
    }

    /**
     * @param int $can_pin
     *
     * @return Post
     */
    public function setCanPin(int $can_pin): Post
    {
        $this->can_pin = $can_pin;
        return $this;
    }

    /**
     * Get attachments
     *
     * @return array
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @param array $attachments
     *
     * @return Post
     */
    public function setAttachments(array $attachments): Post
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * Get copyHistory
     *
     * @return array
     */
    public function getCopyHistory(): array
    {
        return $this->copyHistory;
    }

    /**
     * @param array $copyHistory
     *
     * @return Post
     */
    public function setCopyHistory(array $copyHistory): Post
    {
        $this->copyHistory = $copyHistory;
        return $this;
    }

    /**
     * Get geo
     *
     * @return Geo
     */
    public function getGeo(): Geo
    {
        return $this->geo;
    }

    /**
     * @param Geo $geo
     *
     * @return Post
     */
    public function setGeo(Geo $geo): Post
    {
        $this->geo = $geo;
        return $this;
    }

    /**
     * Get signerId
     *
     * @return int
     */
    public function getSignerId(): int
    {
        return $this->signerId;
    }

    /**
     * @param int $signerId
     *
     * @return Post
     */
    public function setSignerId(int $signerId): Post
    {
        $this->signerId = $signerId;
        return $this;
    }

    /**
     * Get postSource
     *
     * @return PostSource
     */
    public function getPostSource(): PostSource
    {
        return $this->postSource;
    }

    /**
     * @param PostSource $postSource
     *
     * @return Post
     */
    public function setPostSource(PostSource $postSource): Post
    {
        $this->postSource = $postSource;
        return $this;
    }

    /**
     * Get comments
     *
     * @return Comments
     */
    public function getComments(): Comments
    {
        return $this->comments;
    }

    /**
     * @param Comments $comments
     *
     * @return Post
     */
    public function setComments(Comments $comments): Post
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Get copyright
     *
     * @return Copyright
     */
    public function getCopyright(): Copyright
    {
        return $this->copyright;
    }

    /**
     * @param Copyright $copyright
     *
     * @return Post
     */
    public function setCopyright(Copyright $copyright): Post
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * Get likes
     *
     * @return Likes
     */
    public function getLikes(): Likes
    {
        return $this->likes;
    }

    /**
     * @param Likes $likes
     *
     * @return Post
     */
    public function setLikes(Likes $likes): Post
    {
        $this->likes = $likes;
        return $this;
    }

    /**
     * Get reposts
     *
     * @return Reposts
     */
    public function getReposts(): Reposts
    {
        return $this->reposts;
    }

    /**
     * @param Reposts $reposts
     *
     * @return Post
     */
    public function setReposts(Reposts $reposts): Post
    {
        $this->reposts = $reposts;
        return $this;
    }

    /**
     * Get views
     *
     * @return Views
     */
    public function getViews(): Views
    {
        return $this->views;
    }

    /**
     * @param Views $views
     *
     * @return Post
     */
    public function setViews(Views $views): Post
    {
        $this->views = $views;
        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return Post
     */
    public function setHash(string $hash): Post
    {
        $this->hash = $hash;
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
     * @return Post
     */
    public function setType(string $type): Post
    {
        $this->type = $type;
        return $this;
    }
}
