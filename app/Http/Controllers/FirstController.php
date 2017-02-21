<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class FirstController extends Controller
{
    public function show(){
        echo "controller work show";
    }

    public function hide(){
        echo "controller work hide";
    }
}