<?php

if (!file_exists('.env') && file_exists('.env.example')) {
    copy('.env.example', '.env');
    echo "Created .env file\n";
}