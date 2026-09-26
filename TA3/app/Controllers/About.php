<?php

namespace App\Controllers;

class about extends BaseController
{
    public function index(): string
    {
        return view('about_msg.php');
    }
}