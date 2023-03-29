<?php

declare(strict_types=1);

namespace Coderun\ORM\Entity;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;
use Ramsey\Uuid\Uuid;

/**
 *
 * @package Coderun\ORM\Entity
 */
trait CommonFields
{
    #[
        Id(),
        Column(name:'id', type:'bigint', nullable:false),
        GeneratedValue(strategy: 'IDENTITY')
    ]
    protected string $id;
    #[
        Column(name:'created_at', type:Types::DATETIME_MUTABLE, nullable:false),
    ]
    protected ?DateTime $createdAt = null;
    #[
        Column(name:'updated_at', type:Types::DATETIME_MUTABLE, nullable:false),
    ]
    protected ?DateTime $updatedAt = null;
    #[
        Column(name: 'uuid', type: Types::GUID, unique: true, nullable: false, options: ['comment' => 'Уникальный код']),
    ]
    protected string $uuid;

    /**
     * Get createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Get updatedAt
     *
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Pre persist and pre update events
     *
     * @return void
     *
     */
    #[
        PrePersist(),
        PreUpdate()
    ]
    public function preFlushModifiedAt(): void
    {
        $updatedAt = new \DateTime();
        if ($this->createdAt === null) {
            $this->createdAt = $updatedAt;
        }
        $this->updatedAt = $updatedAt;
        $this->uuid = Uuid::uuid4()->toString();
    }
}
