<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index(){
        return view('admin/charts');
    }

    public function chartsAdmin(){
        return view('admin/chartsAdmin');
    }

}
