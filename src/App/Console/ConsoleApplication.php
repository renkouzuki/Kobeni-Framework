<?php

namespace App\Console;

use KobeniFramework\Console\Application as BaseApplication;

class ConsoleApplication extends BaseApplication
{
    protected function registerDefaultCommands()
    {
        parent::registerDefaultCommands();
        $this->registerCustomCommands();
    }

    protected function registerCustomCommands()
    {
        $commandsPath = __DIR__ . '/Commands';
        if (!is_dir($commandsPath)) {
            return;
        }

        foreach (scandir($commandsPath) as $file) {
            if ($file === '.' || $file === '..') continue;

            $class = 'App\\Console\\Commands\\' . pathinfo($file, PATHINFO_FILENAME);
            if (class_exists($class)) {
                $this->add(new $class());
            }
        }
    }
}