<?php

namespace KobeniFramework\Console;

class ServeCommand
{
    public function handle()
    {
        $host = 'localhost';
        $port = 8000;

        echo "Starting server at http://$host:$port...\n";

        $command = "php -S $host:$port -t public";

        exec($command);
    }
}
