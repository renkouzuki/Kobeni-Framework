<?php

namespace App\Middleware;

use KobeniFramework\Auth\Exceptions\AuthenticationException;
use KobeniFramework\Auth\HasAuthentication;
use KobeniFramework\Middleware\Middleware;

class AuthMiddleware extends Middleware
{
    use HasAuthentication;

    public function handle($next)
    {
        if (!$this->auth->check()) {
            throw new AuthenticationException('Unauthenticated');
        }

        return $next();
    }
}