<?php
return [
    'name' => getenv('APP_NAME') ?: 'Kobeni Framework',
    'env' => getenv('APP_ENV') ?: 'local',
    'debug' => getenv('APP_DEBUG') ?: true,
    'url' => getenv('APP_URL') ?: 'http://localhost',
    'timezone' => getenv('APP_TIMEZONE') ?: 'UTC',
];