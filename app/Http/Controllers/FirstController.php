<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirstController extends Controller
{
    public function show(){
        echo "controller work show";
    }

    public function hide(){
        echo "controller work hide";
    }

    /*protected $request;
    public function __construct(Request $request){
        $this->request = $request;
    }*/

    public function contact(Request $request){
        echo "<br /><br /><br />";
        echo "<pre>";
        print_r($request->all());
        echo "</pre>";

        /*$request->all(); // покажет все параметры
        $request->only('name', 'email'); // покажет определенные параметры
        $request->except('password'); // покажет все параметры, кроме указанных*/

        return view('template.contact', ['title' => 'Contact']);
    }
}