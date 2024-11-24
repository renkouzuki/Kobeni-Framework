<?php

namespace KobeniFramework\Routing;

class Route
{
    protected $method;
    protected $route;
    protected $action;

    public function __construct($method, $route, $action)
    {
        $this->method = $method;
        $this->route = $route;
        $this->action = $action;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getAction()
    {
        return $this->action;
    }
}
