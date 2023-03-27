<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\ValueObject;

use function array_filter;

/**
 * Class WallGet
 *
 * @package Coderun\Vkontakte\ValueObject
 */
class WallGet
{
    /** @var string  */
    protected string $ownerId;
    /** @var string  */
    protected string $domain;
    /** @var string  */
    protected string $offset;
    /** @var string  */
    protected string $count;
    /** @var string  */
    protected string $extended;
    /** @var string  */
    protected string $fields;

    public function __construct(array $params)
    {
        $this->ownerId = (string) ($params['owner_id'] ?? '');
        $this->domain = (string) ($params['domain'] ?? '');
        $this->offset = (string) ($params['offset'] ?? '0');
        $this->count = (string) ($params['count'] ?? '5');
        $this->extended = (string) ($params['extended'] ?? '1');
        $this->fields = (string) ($params['fields'] ?? 'description');
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $params = [
            'owner_id' => $this->ownerId,
            'domain'   => $this->domain,
            'offset'   => $this->offset,
            'count'    => $this->count,
            'extended' => $this->extended,
            'fields'   => $this->fields,
        ];
        return array_filter($params);
    }

    /**
     * Get ownerId
     *
     * @return string
     */
    public function getOwnerId(): string
    {
        return $this->ownerId;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * Get offset
     *
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
     * Get count
     *
     * @return string
     */
    public function getCount(): string
    {
        return $this->count;
    }

    /**
     * Get extended
     *
     * @return string
     */
    public function getExtended(): string
    {
        return $this->extended;
    }

    /**
     * Get fields
     *
     * @return string
     */
    public function getFields(): string
    {
        return $this->fields;
    }
}
