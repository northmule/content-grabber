<?php

declare(strict_types=1);

namespace Coderun\WordPress\Endpoint;

/**
 * Class Comment
 *
 * @package Coderun\WordPress\Endpoint
 *
 * @see https://developer.wordpress.org/rest-api/reference/comments/#create-a-comment
 */
class Comment extends AbstractEndpoint
{
    /** @var string  */
    protected const URL = '/wp-json/wp/v2/comments';
    
    /**
     * @return string
     */
    protected function getEndpoint(): string
    {
        return self::URL;
    }
}