<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\ValueObject;

use Coderun\Common\Trait\FillPropertyFromArray;
use Coderun\Common\Trait\ToArray;

/**
 * Class WallGetComments
 *
 * @package Coderun\Vkontakte\ValueObject
 * @see https://dev.vk.com/method/wall.getComments
 */
class WallGetComments
{
    
    use ToArray;
    use FillPropertyFromArray;
    
    protected int $ownerId;
    protected int $postId;
    protected int $needLikes = 1;
    protected int $startCommentId = 0;
    protected int $offset = 0;
    protected int $count = 100;
    protected string $sort = 'asc';
    protected int $previewLength = 0;
    protected int $extended = 1;
    
    /**
     * @param array<string, mixed> $params
     */
    public function __construct(array $params)
    {
        $this->fillProperty($params);
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
     * Get postId
     *
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }
    
    /**
     * Get needLikes
     *
     * @return int
     */
    public function getNeedLikes(): int
    {
        return $this->needLikes;
    }
    
    /**
     * Get startCommentId
     *
     * @return int
     */
    public function getStartCommentId(): int
    {
        return $this->startCommentId;
    }
    
    /**
     * Get offset
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }
    
    /**
     * Get count
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
    
    /**
     * Get sort
     *
     * @return string
     */
    public function getSort(): string
    {
        return $this->sort;
    }
    
    /**
     * Get previewLength
     *
     * @return int
     */
    public function getPreviewLength(): int
    {
        return $this->previewLength;
    }
    
    /**
     * Get extended
     *
     * @return int
     */
    public function getExtended(): int
    {
        return $this->extended;
    }
}
