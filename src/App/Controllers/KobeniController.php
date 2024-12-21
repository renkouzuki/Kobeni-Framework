<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;

class KobeniController extends Controller{

    public $kobeni;
    public $req;

    public function error($code , $message){
        return $code === 422 ? json_decode($message, true) : $message;
    }
}