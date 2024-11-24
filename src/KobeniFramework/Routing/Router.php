<?php

namespace KobeniFramework\Routing;
use PDO;
use PDOException;

class Router
{
    protected $routes = [];

    public function addRoute($method, $route, $action)
    {
        $this->routes[] = new Route($method, $route, $action);
    }

    public function dispatch($method, $uri)
    {
        foreach ($this->routes as $route) {
            if ($route->getMethod() == strtoupper($method) && $route->getRoute() == $uri) {
                $response = $this->callAction($route->getAction());
                $this->sendResponse($response);
            }
        }
        $this->handleNotFound();
    }

    public function connectDatabase()
    {
        $config = require __DIR__ . '/../../../Config/Database.php';

        $dbHost = $config['DB_HOST'];
        $dbPort = $config['DB_PORT'];
        $dbName = $config['DB_DATABASE'];
        $dbUsername = $config['DB_USERNAME'];
        $dbPassword = $config['DB_PASSWORD'];

        $dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName";

        try {
            $pdo = new PDO($dsn, $dbUsername, $dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    private function callAction($action)
    {
        list($controller, $method) = explode('@', $action);

        $controllerInstance = new $controller();
        return $controllerInstance->$method();
    }

    private function handleNotFound()
    {
        header("HTTP/1.1 404 Not Found");

        $response = json_encode(["error" => "404 Not Found"]);
        $this->sendResponse($response);
    }

    private function sendResponse($response)
    {
        echo $response;
        exit();
    }
}
