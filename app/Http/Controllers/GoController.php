<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoController extends Controller
{
    public function index(){

        return view('home');//main view and the same with the other ones
    }

    
    public function faq(){

        return view('faq');
    }

    
    public function catalog(){

        return view('catalog');
    }
}
