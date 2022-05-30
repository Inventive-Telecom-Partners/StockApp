<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function in(){
        return view('StockIn');
    }

    public function out(){
        return view('StockOut');
    }

    public function login(){
        return view('Login');
    }
}
