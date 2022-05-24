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

}
