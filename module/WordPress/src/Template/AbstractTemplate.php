<?php

declare(strict_types=1);

namespace Coderun\WordPress\Template;

use Coderun\Contracts\Vk\Common\Group;
use Coderun\Contracts\Vk\Post\Post as PostContract;
use DateTime;
use Twig\Environment;

/**
 * Class AbstractTemplate
 *
 * @package Coderun\WordPress\Template
 */
abstract class AbstractTemplate
{
    protected Environment $twig;

    /**
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    
    /**
     * @param PostContract $post
     * @param Group|null   $group
     *
     * @return mixed
     */
    abstract public function compose(PostContract $post, ?Group $group): string;

    /**
     * @return DateTime
     */
    protected function getCreateDateTime(): DateTime
    {
        return new DateTime('now');
    }
}
