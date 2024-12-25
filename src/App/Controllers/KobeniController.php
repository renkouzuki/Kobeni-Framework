<?php

namespace App\Controllers;

use KobeniFramework\Controllers\Controller;

class KobeniController extends Controller{

    public $kobeni;
    public $req;

    public function error($code , $message){

        if (is_string($code)) {
            $code = match($code) {
                '42S02' => 404,  
                '23000' => 409,  
                '42S22' => 400,  
                '22001' => 400, 
                default => 500   
            };
        }

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