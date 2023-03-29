<?php

declare(strict_types=1);

namespace Coderun\WordPress\Endpoint;

/**
 * Class Post
 *
 * @package Coderun\WordPress\Endpoint
 */
class Post extends AbstractEndpoint
{
    /** @var string  */
    protected const URL = '/wp-json/wp/v2/posts';

    /**
     * @return string
     */
    protected function getEndpoint(): string
    {
        return self::URL;
    }
}
