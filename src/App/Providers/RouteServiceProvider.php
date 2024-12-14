<?php

namespace App\Providers;

use KobeniFramework\Providers\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $router = $this->app->getRouter();
        
        $this->loadWebRoutes($router);
        $this->loadApiRoutes($router);
    }

    protected function loadWebRoutes($router)
    {
        require $this->app->getBasePath() . '/routes/web.php';
    }

    protected function loadApiRoutes($router)
    {
        require $this->app->getBasePath() . '/routes/api.php';
    }
}