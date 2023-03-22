<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Handler;

use Coderun\Vkontakte\Options\Options;
use Coderun\Vkontakte\Service\ReceiveContent;
use Coderun\Vkontakte\ValueObject\Authorization;
use Coderun\Common\ValueObject\Video;
use Coderun\Vkontakte\ValueObject\WallGet;

/**
 * Class Content
 *
 * @package Coderun\Vkontakte\Handler
 */
class Content
{
    /** @var Options  */
    protected Options $options;
    /** @var ReceiveContent  */
    protected ReceiveContent $service;

    /**
     * @param Options        $options
     * @param ReceiveContent $service
     */
    public function __construct(Options $options, ReceiveContent $service)
    {
        $this->options = $options;
        $this->service = $service;
    }


    public function get()
    {
        $response = [];
        foreach ($this->options->getDomains() as $domain) {
            $response[] = $this->service->receive(new WallGet([
                'domain' => $domain,
            ]));
        }

        return $response;
    }
}
