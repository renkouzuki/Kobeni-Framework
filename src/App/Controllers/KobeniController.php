<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;

class KobeniController extends Controller{

    public $kobeni;
    public $req;

    public function error($code , $message){
        return $this->json([
            'status' => false,
            'message' => $code === 422 ? json_decode($message, true) : $message
        ],$code);
    }

    public function response($data = null){
        return $this->json([
            'status' => true,
            'message' => 'success',
            'data' => $data
        ],200);
    }
}