<?php

declare(strict_types=1);

namespace Coderun\WordPress\ValueObject;

use Coderun\Common\Trait\ToArray;
use Ramsey\Uuid\Uuid;

/**
 * Class Post
 *
 * @package Coderun\WordPress\ValueObject
 */
class Post implements ParamsInterface
{
    
    use ToArray;
    
    protected string $guid;
    protected string $title;
    protected string $content;
    protected string $status;
    protected array $categories;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->guid = Uuid::uuid4()->toString();
        $this->title = $data['title'] ?? '';
        $this->content = $data['content'] ?? '';
        $this->status = $data['status'] ?? 'draft';
        $this->categories = $data['categories'] ?? [];
    }

    /**
     * Get guid
     *
     * @return string
     */
    public function getGuid(): string
    {
        return $this->guid;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * Get status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
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
}
