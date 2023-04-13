<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
   public function about(){
    $name='apple';
    return view('test/about',['name'=> $name]);
   }
}