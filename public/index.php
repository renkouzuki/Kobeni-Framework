<?php
define('KOBENI_START', microtime(true));

// Check PHP version
if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    die('Kobeni Framework requires PHP 8.0 or higher. Current version: ' . PHP_VERSION);
}

require __DIR__ . '/../vendor/autoload.php';

use KobeniFramework\Routing\Router;
use KobeniFramework\Environment\EnvLoader;

// load environment variables
EnvLoader::load(__DIR__ . '/../.env');

// initialize router
$router = new Router();

// load routes
require __DIR__ . '/../routes/web.php';
require __DIR__ . '/../routes/api.php';

// handle the request
try {
    $router->dispatch(
        $_SERVER['REQUEST_METHOD'],
        $_SERVER['REQUEST_URI']
    );
} catch (Exception $e) {
    // check any exceptions
    header('HTTP/1.1 500 Internal Server Error');
    if (getenv('APP_DEBUG') === 'true') {
        echo json_encode([
            'error' => 'Internal Server Error',
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
    } else {
        echo json_encode([
            'error' => 'Internal Server Error',
            'message' => 'An unexpected error occurred'
        ]);
    }
}