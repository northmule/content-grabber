<?php

declare(strict_types=1);

namespace Coderun\ORM\Entity;

use Coderun\ORM\Repository\Common;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Common\Collections\Collection;

#[
    Entity(repositoryClass: Common::class),
    HasLifecycleCallbacks(),
    Table(
        name:'processed_post',
        indexes: [
            'name'    => 'source_item_id_idx',
            'columns' => [
                'source',
                'source_item_id',
            ],
        ],
        options: ['comment' => 'История постинга']
    )
]
class ProcessedPost implements EntityInterface
{
    use CommonFields;

    #[Column(name:'destination', type: Types::STRING, nullable:true, options: ['comment' => 'Идентификатор назначения (домен wp например)'])]
    protected string $destination;
    #[Column(name:'source_item_id', type: Types::STRING, nullable:true, options: ['comment' => 'Идентификатор записи из источника (ID запис VK)'])]
    protected string $sourceItemId;
    #[Column(name:'source', type: Types::STRING, nullable:true, options: ['comment' => 'Идентификатор источника(ИД группы\domain VK)'])]
    protected string $source;
    
    /** @var Collection<int, ProcessedComment> */
    #[
        OneToMany(mappedBy: 'post', targetEntity: ProcessedComment::class, fetch: 'LAZY'),
    ]
    protected Collection $comments;
    #[Column(name: 'wordpress_post_id', type: Types::INTEGER, nullable: true, options: ['comment' => 'ID созданной записи в WordPress'])]
    protected ?int $wordpressPostId = null;
    
    /**
     *
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }
    
    
    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     *
     * @return ProcessedPost
     */
    public function setDestination(string $destination): ProcessedPost
    {
        $this->destination = $destination;
        return $this;
    }

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
     * @return ProcessedPost
     */
    public function setSourceItemId(string $sourceItemId): ProcessedPost
    {
        $this->sourceItemId = $sourceItemId;
        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return ProcessedPost
     */
    public function setSource(string $source): ProcessedPost
    {
        $this->source = $source;
        return $this;
    }
    
    /**
     * Get comments
     *
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }
    
    /**
     * @param Collection $comments
     *
     * @return ProcessedPost
     */
    public function setComments(Collection $comments): ProcessedPost
    {
        $this->comments = $comments;
        return $this;
    }
    
    /**
     * Get wordpressPostId
     *
     * @return int|null
     */
    public function getWordpressPostId(): ?int
    {
        return $this->wordpressPostId;
    }
    
    /**
     * @param int|null $wordpressPostId
     *
     * @return ProcessedPost
     */
    public function setWordpressPostId(?int $wordpressPostId): ProcessedPost
    {
        $this->wordpressPostId = $wordpressPostId;
        return $this;
    }

}
