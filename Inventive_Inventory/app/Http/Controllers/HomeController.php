<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function in(){
        return view('stockIn');
    }

    public function out(){
        return view('stockOut');
    }

    public function login(){
        return view('login');
    }
    public function research(){
        return view('research');
    }
}
