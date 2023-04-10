<?php

declare(strict_types=1);

namespace Coderun\Contracts\WordPress\Post;

use Coderun\Contracts\ContractInterface;
use Coderun\Contracts\WordPress\Common\RenderedRaw;

/**
 * Class Post
 */
class Post implements ContractInterface
{
    protected int $id;
    protected string $date;
    protected string $dateGmt;
    protected RenderedRaw $guid;
    protected string $slug;
    protected string $status;
    protected string $type;
    protected string $link;
    protected RenderedRaw $title;
    protected RenderedRaw $content;
    protected RenderedRaw $excerpt;
    protected int $author;
    /** @var array<int, int> */
    protected array $categories;
    protected string $generatedSlug;
    
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
     * @return Post
     */
    public function setDate(string $date): Post
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
     * @return Post
     */
    public function setDateGmt(string $dateGmt): Post
    {
        $this->dateGmt = $dateGmt;
        return $this;
    }
    
    /**
     * Get guid
     *
     * @return RenderedRaw
     */
    public function getGuid(): RenderedRaw
    {
        return $this->guid;
    }
    
    /**
     * @param RenderedRaw $guid
     *
     * @return Post
     */
    public function setGuid(RenderedRaw $guid): Post
    {
        $this->guid = $guid;
        return $this;
    }
    
    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
    
    /**
     * @param string $slug
     *
     * @return Post
     */
    public function setSlug(string $slug): Post
    {
        $this->slug = $slug;
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
     * @return Post
     */
    public function setStatus(string $status): Post
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
     * @return Post
     */
    public function setType(string $type): Post
    {
        $this->type = $type;
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
     * @return Post
     */
    public function setLink(string $link): Post
    {
        $this->link = $link;
        return $this;
    }
    
    /**
     * Get title
     *
     * @return RenderedRaw
     */
    public function getTitle(): RenderedRaw
    {
        return $this->title;
    }
    
    /**
     * @param RenderedRaw $title
     *
     * @return Post
     */
    public function setTitle(RenderedRaw $title): Post
    {
        $this->title = $title;
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
     * @return Post
     */
    public function setContent(RenderedRaw $content): Post
    {
        $this->content = $content;
        return $this;
    }
    
    /**
     * Get excerpt
     *
     * @return RenderedRaw
     */
    public function getExcerpt(): RenderedRaw
    {
        return $this->excerpt;
    }
    
    /**
     * @param RenderedRaw $excerpt
     *
     * @return Post
     */
    public function setExcerpt(RenderedRaw $excerpt): Post
    {
        $this->excerpt = $excerpt;
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
     * @return Post
     */
    public function setAuthor(int $author): Post
    {
        $this->author = $author;
        return $this;
    }
    
    /**
     * Get categories
     *
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
    
    /**
     * @param array $categories
     *
     * @return Post
     */
    public function setCategories(array $categories): Post
    {
        $this->categories = $categories;
        return $this;
    }
    
    /**
     * Get generatedSlug
     *
     * @return string
     */
    public function getGeneratedSlug(): string
    {
        return $this->generatedSlug;
    }
    
    /**
     * @param string $generatedSlug
     *
     * @return Post
     */
    public function setGeneratedSlug(string $generatedSlug): Post
    {
        $this->generatedSlug = $generatedSlug;
        return $this;
    }

}