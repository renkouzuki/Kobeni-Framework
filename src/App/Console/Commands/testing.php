<?php

namespace App\Console\Commands;

use KobeniFramework\Console\Command;

class testing extends Command
{
    protected $signature = 'command:name';
    protected $description = 'Command description';

    public function handle()
    {
        $this->info('Command is working!');
    }
}