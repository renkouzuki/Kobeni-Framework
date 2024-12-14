<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;

class WebController extends Controller
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
