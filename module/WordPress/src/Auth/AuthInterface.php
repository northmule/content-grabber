<?php

declare(strict_types=1);

namespace Coderun\WordPress\Auth;

use Psr\Http\Message\RequestInterface;

interface AuthInterface
{
    public function addCredentials(RequestInterface $request): RequestInterface;
}