<?php
require __DIR__ . '/../vendor/autoload.php';

$app = new KobeniFramework\Foundation\Application(
    realpath(__DIR__ . '/..')
);

$app->initialize();

return $app;