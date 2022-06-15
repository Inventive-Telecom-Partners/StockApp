<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Shelf;
use App\Models\Level;

class ChartController extends Controller
{
    public function index(){
        return view('admin/charts');
    }

    public function chartsAdmin(){
        $changeLoca= DB::table('change_location')->get();
        $countIn= $changeLoca->where('idFlow',1)->count();
        $countOut= $changeLoca->where('idFlow',2)->count();
        $stockData= Stock::all();
        $shelfData = Shelf::all();
        $levelData = Level::all();
        return view('admin/chartsAdmin');
    }

}
