<?php

declare(strict_types=1);

namespace Coderun\WordPress\Options;

use Laminas\Stdlib\AbstractOptions;

/**
 * Class Strategy
 *
 * @package Coderun\WordPress\Options
 */
class Strategy extends AbstractOptions
{
    /** @var string Группа ВК, должна быть настроена в ВК */
    protected string $groupVk;
    /**
     * ИД категорий WP для назначения опубликованной записи
     *
     * @var array<int, int>
     */
    protected array $categoryWpIds;

    /**
     * Get groupVk
     *
     * @return string
     */
    public function getGroupVk(): string
    {
        return $this->groupVk;
    }

    /**
     * Get categoryWpIds
     *
     * @return array
     */
    public function getCategoryWpIds(): array
    {
        return $this->categoryWpIds;
    }

    /**
     * @param string $groupVk
     *
     * @return Strategy
     */
    protected function setGroupVk(string $groupVk): Strategy
    {
        $this->groupVk = $groupVk;
        return $this;
    }

    /**
     * @param array $categoryWpIds
     *
     * @return Strategy
     */
    protected function setCategoryWpIds(array $categoryWpIds): Strategy
    {
        $this->categoryWpIds = $categoryWpIds;
        return $this;
    }
}
