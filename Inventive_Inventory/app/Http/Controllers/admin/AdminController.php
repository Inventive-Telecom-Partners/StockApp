<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('/layout/admin');
    }

    public function logout(){
        return view('admin/logout');
    }

}
