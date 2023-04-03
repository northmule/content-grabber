<?php

declare(strict_types=1);

namespace Coderun\WordPress\Endpoint;

use Coderun\WordPress\Http\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

use function sprintf;
use function http_build_query;
use function json_encode;
use function str_starts_with;

/**
 * Class AbstractEndpoint
 *
 * @see https://developer.wordpress.org/rest-api/reference/
 *
 * @package Coderun\WordPress\Endpoint
 */
abstract class AbstractEndpoint implements EndpointInterface
{
    protected Client $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    abstract protected function getEndpoint(): string;

    /**
     * @param string     $site
     * @param int|null   $id
     * @param array|null $params
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function get(string $site, ?int $id = null, ?array $params = null)
    {
        $uri = $this->getEndpoint();

        if ($id !== null) {
            $uri .= sprintf('/%s', $id);
        }
        if ($params !== null) {
            $uri .= sprintf('?%s', http_build_query($params));
        }

        $request = new Request('GET', $uri);

        $response = $this->client->send($site, $request);

        if ($this->isValidResponse($response)) {
            return json_decode($response->getBody()->getContents(), true);
        }

        throw new \RuntimeException('Unexpected response');
    }

    /**
     * @param string $site
     * @param array  $data
     *
     * @return array
     * @throws GuzzleException
     */
    public function save(string $site, array $data)
    {
        $url = $this->getEndpoint();

        if (isset($data['id'])) {
            $url .= sprintf('/%s', $data['id']);
            unset($data['id']);
        }

        $request = new Request(
            'POST',
            $url,
            ['Content-Type' => 'application/json'],
            json_encode($data)
        );

        $response = $this->client->send($site, $request);

        if ($this->isValidResponse($response)) {
            return json_decode($response->getBody()->getContents(), true);
        }

        throw new \RuntimeException('Unexpected response');
    }

    /**
     * @param ResponseInterface $response
     *
     * @return bool
     */
    protected function isValidResponse(ResponseInterface $response): bool
    {
        if (
            $response->hasHeader('Content-Type')
            && str_starts_with(
                $response->getHeader('Content-Type')[0] ?? '',
                'application/json'
            )
        ) {
            return true;
        }
        return false;
    }
}
