<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        return view('admin/stock');
    }

    public function manage(){
        return view('admin/manage');
    }
}
