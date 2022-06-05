<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user');
    }

    public function profile(){
        return view('profile');
    }

    public function stock(){
        return view('stock');
    }

    public function charts(){
        return view('charts');
    }

    public function report(){
        return view('report');
    }

    public function logout(){
        return view('logout');
    }

    public function admin(){
        return view('/layout/admin');
    }

    public function chartsAdmin(){
        return view('/chartsAdmin');
    }

    public function sales(){
        return view('ebay');
    }

    public function adduser(){
        return view('addUser');
    }

    public function manage(){
        return view('manage');
    }

    public function hist(){
        return view('hist');
    }
}
