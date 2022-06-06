<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('accueil');
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
