<?php

declare(strict_types=1);

namespace Coderun\ORM\Entity;

use Coderun\ORM\Repository\Common;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * Class ProcessedComment
 *
 * @package Coderun\ORM\Entity
 */
#[
    Entity(repositoryClass: Common::class),
    HasLifecycleCallbacks(),
    Table(
        name:'processed_comment',
        indexes: [
            'name'    => 'source_item_id_idx',
            'columns' => [
                'source_item_id',
            ],
        ],
        options: ['comment' => 'История комментариев']
    )
]
class ProcessedComment implements EntityInterface
{
    use CommonFields;
    
    #[Column(name:'source_item_id', type: Types::STRING, nullable:true, options: ['comment' => 'Идентификатор комментария ВК'])]
    protected string $sourceItemId;
    #[
        ManyToOne(targetEntity: ProcessedPost::class, fetch: 'LAZY', inversedBy: 'comments'),
        JoinColumn(name:'post', referencedColumnName: 'id', nullable: true)
    ]
    protected ?ProcessedPost $post = null;
    
    /**
     * Get sourceItemId
     *
     * @return string
     */
    public function getSourceItemId(): string
    {
        return $this->sourceItemId;
    }
    
    /**
     * @param string $sourceItemId
     *
     * @return ProcessedComment
     */
    public function setSourceItemId(string $sourceItemId): ProcessedComment
    {
        $this->sourceItemId = $sourceItemId;
        return $this;
    }
    
    /**
     * Get post
     *
     * @return ProcessedPost|null
     */
    public function getPost(): ?ProcessedPost
    {
        return $this->post;
    }
    
    /**
     * @param ProcessedPost|null $post
     *
     * @return ProcessedComment
     */
    public function setPost(?ProcessedPost $post): ProcessedComment
    {
        $this->post = $post;
        return $this;
    }
    
}