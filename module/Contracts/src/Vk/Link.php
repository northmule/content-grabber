<?php

declare(strict_types=1);

namespace Coderun\Contracts\Vk;

/**
 * Class Link
 *
 * @package Coderun\Contracts\Vk
 */
class Link implements AttachmentInterface
{
    protected string $url;
    protected string $description;
    protected bool $isFavorite;
    protected string $title;
    protected string $target;

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return Link
     */
    public function setUrl(string $url): Link
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Link
     */
    public function setDescription(string $description): Link
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get isFavorite
     *
     * @return bool
     */
    public function isFavorite(): bool
    {
        return $this->isFavorite;
    }

    /**
     * @param bool $isFavorite
     *
     * @return Link
     */
    public function setIsFavorite(bool $isFavorite): Link
    {
        $this->isFavorite = $isFavorite;
        return $this;
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
     * @param string $title
     *
     * @return Link
     */
    public function setTitle(string $title): Link
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     *
     * @return Link
     */
    public function setTarget(string $target): Link
    {
        $this->target = $target;
        return $this;
    }
}
