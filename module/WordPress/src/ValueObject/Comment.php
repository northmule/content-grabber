<?php

declare(strict_types=1);

namespace Coderun\WordPress\ValueObject;

use Coderun\Common\Trait\ToArray;

/**
 * Class Comment
 *
 * @package Coderun\WordPress\ValueObject
 */
class Comment implements ParamsInterface
{
    
    use ToArray;
    
    protected string $authorName;
    protected string $content;
    protected string $authorEmail;
    protected int $post;
    
    public function __construct(array $data)
    {
        $this->authorName = $data['author_name'] ?? '';
        $this->content = $data['content'] ?? '';
        $this->post = $data['post'] ?? 0;
        $this->authorEmail = $data['author_email'] ?? '';
    }
    
    /**
     * Get authorName
     *
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }
    
    /**
     * Get content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
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
     * Get authorEmail
     *
     * @return string
     */
    public function getAuthorEmail(): string
    {
        return $this->authorEmail;
    }
    

    
}