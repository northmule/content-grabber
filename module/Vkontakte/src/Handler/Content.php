<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Handler;

use Coderun\Vkontakte\Collection\PostsResponseMap;
use Coderun\Vkontakte\Options\Options;
use Coderun\Vkontakte\Service\ReceiveContent;
use Coderun\Vkontakte\ValueObject\WallGet;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;

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


    /**
     * @throws VKApiBlockedException
     * @throws VKApiException
     * @throws ExceptionInterface
     * @throws VKClientException
     */
    public function get(): PostsResponseMap
    {
        $responseMap = new PostsResponseMap();
        foreach ($this->options->getDomains() as $domain) {
            $responseMap->offsetSet($domain, $this->service->receive(new WallGet([
                'domain' => $domain,
            ])));
        }
        foreach ($this->options->getOwnerIds() as $ownerId) {
            $responseMap->offsetSet($ownerId, $this->service->receive(new WallGet([
                'owner_id' => $ownerId,
            ])));
        }
        return $responseMap;
    }
}
