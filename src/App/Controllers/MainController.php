<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;
use KobeniFramework\Database\Kobeni;

class MainController extends Controller{

    public $kobeni;
    public $req;

    public function __construct() {
        $this->kobeni = new Kobeni();
        $this->req = $this->getRequestData();
    }

}