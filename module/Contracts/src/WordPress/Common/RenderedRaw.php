<?php

declare(strict_types=1);

namespace Coderun\Contracts\WordPress\Common;

/**
 * Class RenderedRaw
 *
 * @package Coderun\Contracts\WordPress\Common
 */
class RenderedRaw
{
    protected string $rendered;
    protected string $raw;
    protected bool $protected = false;
    protected int $blockVersion;
    
    /**
     * Get rendered
     *
     * @return string
     */
    public function getRendered(): string
    {
        return $this->rendered;
    }
    
    /**
     * @param string $rendered
     *
     * @return RenderedRaw
     */
    public function setRendered(string $rendered): RenderedRaw
    {
        $this->rendered = $rendered;
        return $this;
    }
    
    /**
     * Get raw
     *
     * @return string
     */
    public function getRaw(): string
    {
        return $this->raw;
    }
    
    /**
     * @param string $raw
     *
     * @return RenderedRaw
     */
    public function setRaw(string $raw): RenderedRaw
    {
        $this->raw = $raw;
        return $this;
    }
    
    /**
     * Get protected
     *
     * @return bool
     */
    public function isProtected(): bool
    {
        return $this->protected;
    }
    
    /**
     * @param bool $protected
     *
     * @return RenderedRaw
     */
    public function setProtected(bool $protected): RenderedRaw
    {
        $this->protected = $protected;
        return $this;
    }
    
    /**
     * Get blockVersion
     *
     * @return int
     */
    public function getBlockVersion(): int
    {
        return $this->blockVersion;
    }
    
    /**
     * @param int $blockVersion
     *
     * @return RenderedRaw
     */
    public function setBlockVersion(int $blockVersion): RenderedRaw
    {
        $this->blockVersion = $blockVersion;
        return $this;
    }

}