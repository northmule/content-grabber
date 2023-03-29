<?php

declare(strict_types=1);

namespace Coderun\WordPress\Http;

use Coderun\WordPress\Auth\AuthInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client as HttpClient;

use function sprintf;

/**
 * Class Client
 *
 * @package Coderun\WordPress\Http
 */
class Client
{
    protected AuthInterface $credentials;
    protected HttpClient $httpClient;

    /**
     * @param AuthInterface $credentials
     * @param HttpClient    $httpClient
     */
    public function __construct(AuthInterface $credentials, HttpClient $httpClient)
    {
        $this->credentials = $credentials;
        $this->httpClient = $httpClient;
    }

    /**
     * @param string           $site
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(string $site, RequestInterface $request): ResponseInterface
    {
        $request = $this->credentials->addCredentials($request);

        $request = $request->withUri(
            new Uri(sprintf('%s%s', $site, $request->getUri()))
        );

        return $this->httpClient->send($request);
    }
}
