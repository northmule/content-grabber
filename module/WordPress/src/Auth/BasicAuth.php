<?php

declare(strict_types=1);

namespace Coderun\WordPress\Auth;

use Psr\Http\Message\RequestInterface;

use function base64_encode;

/**
 * Class BasicAuth
 *
 * @package Coderun\WordPress\Auth
 */
class BasicAuth implements AuthInterface
{
    /**
     * @var string
     */
    protected string $username;
    /**
     * @var string
     */
    protected string $password;

    /**
     * WpBasicAuth constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function addCredentials(RequestInterface $request): RequestInterface
    {
        return $request->withHeader(
            'Authorization',
            'Basic ' . base64_encode($this->username . ':' . $this->password)
        );
    }
}
