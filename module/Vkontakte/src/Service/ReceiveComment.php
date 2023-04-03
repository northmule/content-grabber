<?php

declare(strict_types=1);

namespace Coderun\Vkontakte\Service;

use Coderun\Contracts\Vk\Response\CommentsResponse;
use Coderun\Vkontakte\ValueObject\WallGetComments;
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
class ReceiveComment
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
     * @param WallGetComments $params
     *
     * @return CommentsResponse
     * @throws VKApiBlockedException
     * @throws VKApiException
     * @throws VKClientException|ExceptionInterface
     */
    public function receive(WallGetComments $params): CommentsResponse
    {
        $response = $this->client->wall()->getComments($this->accessToken, $params->toArray());
        return $this->serializer->denormalize(
            $response,
            CommentsResponse::class,
            'array',
            [
                AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => true,
            ]
        );
    }
}
