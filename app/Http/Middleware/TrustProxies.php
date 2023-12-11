<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
<<<<<<< HEAD
    protected $proxies;
=======
    protected $proxies = '*';
>>>>>>> origin/main

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers =
<<<<<<< HEAD
        Request::HEADER_X_FORWARDED_FOR |
=======
    Request::HEADER_X_FORWARDED_FOR |
>>>>>>> origin/main
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_AWS_ELB;
}
