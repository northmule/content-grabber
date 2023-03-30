<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Service;

use Coderun\Contracts\Vk\Response\PostsResponse;
use Coderun\Vkontakte\ValueObject\WallGet;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use VK\Client\VKApiClient;
use VK\Exceptions\Api\VKApiBlockedException;
use VK\Exceptions\VKApiException;
use VK\Exceptions\VKClientException;
use Symfony\Component\Serializer\Serializer;

/**
 * Class ReceiveContent
 */
class ReceiveContent
{
    /** @var VKApiClient  */
    protected VKApiClient $client;
    /** @var string  */
    protected string $accessToken;
    protected Serializer $serializer;

    /**
     * @param VKApiClient $client
     */
    public function __construct(string $accessToken, VKApiClient $client, Serializer $serializer)
    {
        $this->accessToken = $accessToken;
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param WallGet $params
     *
     * @return PostsResponse
     * @throws VKApiBlockedException
     * @throws VKApiException
     * @throws VKClientException|ExceptionInterface
     */
    public function receive(WallGet $params): PostsResponse
    {
        $response = $this->client->wall()->get($this->accessToken, $params->toArray());
        return $this->serializer->denormalize(
            $response,
            PostsResponse::class,
            'array',
            [
                AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => true,
            ]
        );
    }
}
