<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk\Comment;

use Coderun\Contracts\ContractInterface;
use Coderun\Contracts\Vk\Attachment;
use Coderun\Contracts\Vk\Common\Profiles;

/**
 * Class Comment
 *
 * @package Coderun\Contracts\Vk\Comment
 *
 * @see https://vk.com/dev/objects/comment
 */
class Comment implements ContractInterface
{
    protected int $id;
    protected int $fromId;
    
    protected int $date;
    protected string $text;
    protected int $replyToUser;
    protected int $replyToComment;
    /** @var array<int, Attachment> */
    protected array $attachments;
    protected array $parentsStack;
    /** @var array<int, Profiles */
    protected array $profiles;
    
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
     * @return Comment
     */
    public function setId(int $id): Comment
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
     * @return Comment
     */
    public function setFromId(int $fromId): Comment
    {
        $this->fromId = $fromId;
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
     * @return Comment
     */
    public function setDate(int $date): Comment
    {
        $this->date = $date;
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
     * @return Comment
     */
    public function setText(string $text): Comment
    {
        $this->text = $text;
        return $this;
    }
    
    /**
     * Get replyToUser
     *
     * @return int
     */
    public function getReplyToUser(): int
    {
        return $this->replyToUser;
    }
    
    /**
     * @param int $replyToUser
     *
     * @return Comment
     */
    public function setReplyToUser(int $replyToUser): Comment
    {
        $this->replyToUser = $replyToUser;
        return $this;
    }
    
    /**
     * Get replyToComment
     *
     * @return int
     */
    public function getReplyToComment(): int
    {
        return $this->replyToComment;
    }
    
    /**
     * @param int $replyToComment
     *
     * @return Comment
     */
    public function setReplyToComment(int $replyToComment): Comment
    {
        $this->replyToComment = $replyToComment;
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
     * @return Comment
     */
    public function setAttachments(array $attachments): Comment
    {
        $this->attachments = $attachments;
        return $this;
    }
    
    /**
     * Get parentsStack
     *
     * @return array
     */
    public function getParentsStack(): array
    {
        return $this->parentsStack;
    }
    
    /**
     * @param array $parentsStack
     *
     * @return Comment
     */
    public function setParentsStack(array $parentsStack): Comment
    {
        $this->parentsStack = $parentsStack;
        return $this;
    }
    
    /**
     * Get profiles
     *
     * @return array
     */
    public function getProfiles(): array
    {
        return $this->profiles;
    }
    
    /**
     * @param array $profiles
     *
     * @return Comment
     */
    public function setProfiles(array $profiles): Comment
    {
        $this->profiles = $profiles;
        return $this;
    }
    
    
}