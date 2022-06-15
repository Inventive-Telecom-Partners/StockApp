<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\Shelf;
use App\Models\Level;

class SalesController extends Controller
{
    public function index(){
        $changeLoca = DB::table("change_location")->get();
        $elementData = DB::table("element")->get();
        $categoryData = DB::table("category")->get();
        $brandData = DB::table("brand")->get();
        $stockData= Stock::all();
        $shelfData = Shelf::all();
        $levelData = Level::all();
        return view('admin/item',['stockData'=>$stockData,'shelfData'=>$shelfData,'levelData'=>$levelData,'changeLoca'=>$changeLoca,'elementData'=>$elementData, 'categoryData'=>$categoryData,'brandData'=>$brandData]);
    }

    public function display(){
        return view('admin/ebay');
    }
}
