<?php

namespace App\Middleware;

use KobeniFramework\Middleware\Middleware;

class TestMiddleware extends Middleware
{
    public function handle($next)
    {
        $isAllowed = false;

        if (!$isAllowed) {
            return $this->json([
                'status' => 'error',
                'message' => 'Access denied by middleware'
            ], 403);
        }

        return $next();
    }
}