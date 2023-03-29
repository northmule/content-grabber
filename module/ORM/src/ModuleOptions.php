<?php

declare(strict_types=1);

namespace Coderun\ORM;

use Coderun\ORM\Options\Options;
use Laminas\Stdlib\AbstractOptions;

/**
 * Class ModuleOptions
 *
 * @package Coderun\ORM;
 */
class ModuleOptions extends AbstractOptions
{
    /** @var Options  */
    protected Options $options;

    /**
     * ModuleOptions constructor.
     *
     * @param null|array<string, mixed> $options
     */
    public function __construct($options = null)
    {
        $this->options = new Options($options);
    }

    /**
     * Get options
     *
     * @return Options
     */
    public function getOptions(): Options
    {
        return $this->options;
    }
}
