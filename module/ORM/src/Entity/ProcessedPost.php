<?php

declare(strict_types=1);

namespace Coderun\ORM\Entity;

use Coderun\ORM\Repository\Common;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Table;

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

    /**
     * Идентификатор назначения (домен wp например)
     */
    #[Column(name:'destination', type: Types::STRING, nullable:true)]
    protected string $destination;
    /**
     * Идентификатор записи из источника (ID запис VK)
     */
    #[Column(name:'source_item_id', type: Types::STRING, nullable:true)]
    protected string $sourceItemId;
    /**
     * Идентификатор источника(ИД группы\domain VK)
     */
    #[Column(name:'source', type: Types::STRING, nullable:true)]
    protected string $source;

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
}
