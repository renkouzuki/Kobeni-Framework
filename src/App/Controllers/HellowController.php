<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;

class HellowController extends Controller
{
    protected function needsDatabase()
    {
        return false;
    }

    public function hello()
    {
        return $this->view('hello', [
            'title' => 'KOBENI'
        ]);
    }
}
