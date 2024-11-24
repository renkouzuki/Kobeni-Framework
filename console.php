<?php

require __DIR__ . '/vendor/autoload.php';

use KobeniFramework\Console\ServeCommand;

$command = $argv[1] ?? null;

if ($command === 'serve') {
    $serveCommand = new ServeCommand();
    $serveCommand->handle();
} else {
    echo "Unknown command: $command\n";
    exit(1);
}
