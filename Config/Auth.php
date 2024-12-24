<?php

return [
    'jwt_secret' => getenv('JWT_SECRET'),
    'token_lifetime' => 3600,
    'refresh_token_lifetime' => 604800,
    'session_lifetime' => 7200,
    'session_name' => 'kbn_session'
];