<?php

declare(strict_types=1);

namespace Coderun\WordPress\Options;

use Laminas\Stdlib\AbstractOptions;

/**
 * Class Options
 *
 * @package Coderun\WordPress\Options
 */
class Options extends AbstractOptions
{
    /** @var string  */
    protected string $user;
    /** @var string */
    protected string $password;
    protected string $site;
    protected array $categoryIds;
    protected array $templates;
    protected string $cachePath;
    /** @var array<string, Strategy> */
    protected array $strategys = [];

    /**
     * Get user
     *
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * Get categoryIds
     *
     * @return array
     */
    public function getCategoryIds(): array
    {
        return $this->categoryIds;
    }

    /**
     * Get templates
     *
     * @return array
     */
    public function getTemplates(): array
    {
        return $this->templates;
    }

    /**
     * Get cachePath
     *
     * @return string
     */
    public function getCachePath(): string
    {
        return $this->cachePath;
    }

    /**
     * Get strategys
     *
     * @return array<string, Strategy>
     */
    public function getStrategys(): array
    {
        return $this->strategys;
    }

    /**
     * @param string $user
     *
     * @return Options
     */
    protected function setUser(string $user): Options
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param string $password
     *
     * @return Options
     */
    protected function setPassword(string $password): Options
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $site
     *
     * @return Options
     */
    protected function setSite(string $site): Options
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @param array $categoryIds
     *
     * @return Options
     */
    protected function setCategoryIds(array $categoryIds): Options
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @param array $templates
     *
     * @return Options
     */
    protected function setTemplates(array $templates): Options
    {
        $this->templates = $templates;
        return $this;
    }

    /**
     * @param string $cachePath
     *
     * @return Options
     */
    protected function setCachePath(string $cachePath): Options
    {
        $this->cachePath = $cachePath;
        return $this;
    }

    /**
     * @param array $strategys
     *
     * @return Options
     */
    protected function setStrategys(array $strategys): Options
    {
        foreach ($strategys as $strategy) {
            $strategy = new Strategy($strategy);
            $this->strategys[$strategy->getGroupVk()] = $strategy;
        }

        return $this;
    }
}
