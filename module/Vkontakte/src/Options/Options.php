<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Options;

use Laminas\Stdlib\AbstractOptions;

use function explode;

/**
 * Class Options
 *
 * @package Coderun\Vkontakte\Options
 */
class Options extends AbstractOptions
{
    /** @var string  */
    protected string $accessToken;
    /** @var array<int, string>  */
    protected array $ownerIds;
    /** @var array<int, string> */
    protected array $domains;
    protected string $apiVersion;

    /**
     * Get accessToken
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Get ownerIds
     *
     * @return array
     */
    public function getOwnerIds(): array
    {
        return $this->ownerIds;
    }

    /**
     * Get domains
     *
     * @return array
     */
    public function getDomains(): array
    {
        return $this->domains;
    }

    /**
     * Get apiVersion
     *
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }


    /**
     * @param string $accessToken
     *
     * @return Options
     */
    protected function setAccessToken(string $accessToken): Options
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @param array $ownerIds
     *
     * @return Options
     */
    protected function setOwnerIds(array $ownerIds): Options
    {
        $this->ownerIds = $ownerIds;
        return $this;
    }

    /**
     * @param array $domains
     *
     * @return Options
     */
    protected function setDomains(array $domains): Options
    {
        $this->domains = $domains;
        return $this;
    }

    /**
     * @param string $apiVersion
     *
     * @return Options
     */
    protected function setApiVersion(string $apiVersion): Options
    {
        $this->apiVersion = $apiVersion;
        return $this;
    }
}
