<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return json_encode(["message" => "Welcome to the Home Page!"]);
    }
}
