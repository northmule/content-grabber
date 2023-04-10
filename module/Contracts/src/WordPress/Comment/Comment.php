<?php

declare(strict_types=1);

namespace Coderun\Contracts\WordPress\Comment;

use Coderun\Contracts\ContractInterface;
use Coderun\Contracts\WordPress\Common\RenderedRaw;

/**
 * Class Comment
 *
 * @package Coderun\Contracts\WordPress\Comment
 */
class Comment implements ContractInterface
{
    protected int $id;
    protected int $post;
    protected int $parent;
    protected int $author;
    protected string $string;
    protected string $authorEmail;
    protected string $authorUrl;
    protected string $authorIp;
    protected string $authorUserAgent;
    protected string $date;
    protected string $dateGmt;
    protected RenderedRaw $content;
    protected string $link;
    protected string $status;
    protected string $type;
    /** @var array<int, string> */
    protected array $authorAvatarUrls;
    
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
     * Get post
     *
     * @return int
     */
    public function getPost(): int
    {
        return $this->post;
    }
    
    /**
     * @param int $post
     *
     * @return Comment
     */
    public function setPost(int $post): Comment
    {
        $this->post = $post;
        return $this;
    }
    
    /**
     * Get parent
     *
     * @return int
     */
    public function getParent(): int
    {
        return $this->parent;
    }
    
    /**
     * @param int $parent
     *
     * @return Comment
     */
    public function setParent(int $parent): Comment
    {
        $this->parent = $parent;
        return $this;
    }
    
    /**
     * Get author
     *
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }
    
    /**
     * @param int $author
     *
     * @return Comment
     */
    public function setAuthor(int $author): Comment
    {
        $this->author = $author;
        return $this;
    }
    
    /**
     * Get string
     *
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }
    
    /**
     * @param string $string
     *
     * @return Comment
     */
    public function setString(string $string): Comment
    {
        $this->string = $string;
        return $this;
    }
    
    /**
     * Get authorEmail
     *
     * @return string
     */
    public function getAuthorEmail(): string
    {
        return $this->authorEmail;
    }
    
    /**
     * @param string $authorEmail
     *
     * @return Comment
     */
    public function setAuthorEmail(string $authorEmail): Comment
    {
        $this->authorEmail = $authorEmail;
        return $this;
    }
    
    /**
     * Get authorUrl
     *
     * @return string
     */
    public function getAuthorUrl(): string
    {
        return $this->authorUrl;
    }
    
    /**
     * @param string $authorUrl
     *
     * @return Comment
     */
    public function setAuthorUrl(string $authorUrl): Comment
    {
        $this->authorUrl = $authorUrl;
        return $this;
    }
    
    /**
     * Get authorIp
     *
     * @return string
     */
    public function getAuthorIp(): string
    {
        return $this->authorIp;
    }
    
    /**
     * @param string $authorIp
     *
     * @return Comment
     */
    public function setAuthorIp(string $authorIp): Comment
    {
        $this->authorIp = $authorIp;
        return $this;
    }
    
    /**
     * Get authorUserAgent
     *
     * @return string
     */
    public function getAuthorUserAgent(): string
    {
        return $this->authorUserAgent;
    }
    
    /**
     * @param string $authorUserAgent
     *
     * @return Comment
     */
    public function setAuthorUserAgent(string $authorUserAgent): Comment
    {
        $this->authorUserAgent = $authorUserAgent;
        return $this;
    }
    
    /**
     * Get date
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
    
    /**
     * @param string $date
     *
     * @return Comment
     */
    public function setDate(string $date): Comment
    {
        $this->date = $date;
        return $this;
    }
    
    /**
     * Get dateGmt
     *
     * @return string
     */
    public function getDateGmt(): string
    {
        return $this->dateGmt;
    }
    
    /**
     * @param string $dateGmt
     *
     * @return Comment
     */
    public function setDateGmt(string $dateGmt): Comment
    {
        $this->dateGmt = $dateGmt;
        return $this;
    }
    
    /**
     * Get content
     *
     * @return RenderedRaw
     */
    public function getContent(): RenderedRaw
    {
        return $this->content;
    }
    
    /**
     * @param RenderedRaw $content
     *
     * @return Comment
     */
    public function setContent(RenderedRaw $content): Comment
    {
        $this->content = $content;
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
     * @return Comment
     */
    public function setLink(string $link): Comment
    {
        $this->link = $link;
        return $this;
    }
    
    /**
     * Get status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
    
    /**
     * @param string $status
     *
     * @return Comment
     */
    public function setStatus(string $status): Comment
    {
        $this->status = $status;
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
     * @return Comment
     */
    public function setType(string $type): Comment
    {
        $this->type = $type;
        return $this;
    }
    
    /**
     * Get authorAvatarUrls
     *
     * @return array
     */
    public function getAuthorAvatarUrls(): array
    {
        return $this->authorAvatarUrls;
    }
    
    /**
     * @param array $authorAvatarUrls
     *
     * @return Comment
     */
    public function setAuthorAvatarUrls(array $authorAvatarUrls): Comment
    {
        $this->authorAvatarUrls = $authorAvatarUrls;
        return $this;
    }

}