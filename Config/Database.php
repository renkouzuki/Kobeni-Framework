<?php

return [
    'DB_HOST' => getenv('DB_HOST') ?: '127.0.0.1',
    'DB_PORT' => getenv('DB_PORT') ?: '3306',
    'DB_DATABASE' => getenv('DB_DATABASE') ?: 'example',
    'DB_USERNAME' => getenv('DB_USERNAME') ?: 'root',
    'DB_PASSWORD' => getenv('DB_PASSWORD') ?: '',
];