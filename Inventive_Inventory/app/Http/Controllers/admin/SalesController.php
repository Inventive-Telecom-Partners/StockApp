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
        $countData = $changeLoca->whereNotNull('idLevel')->count();
        return view('admin/item',['countData'=>$countData,'stockData'=>$stockData,'shelfData'=>$shelfData,'levelData'=>$levelData,'changeLoca'=>$changeLoca,'elementData'=>$elementData, 'categoryData'=>$categoryData,'brandData'=>$brandData]);
    }

    public function display($element_id,$level_id){
        $elementData = DB::table("element")->where('id',$element_id)->first();
        $Price = $elementData->{'Price exVAT'};
        $categoryData = DB::table("category")->where('id',$elementData->idCategory)->first();
        $brandData = DB::table("brand")->where('id',$elementData->idBrand)->first();
        $changeState = DB::table("change_state")->where('idElement',$element_id)->first()->idState;
        $State = DB::table("state")->where('id',$changeState)->first();
        $levelData = DB::table("level")->where('id',$level_id)->first();
        $id_Shelf = DB::table("shelf")->where('id',$levelData->idShelf)->first()->id;
        $shelfData = DB::table("shelf")->where('id',$id_Shelf)->first();
        $id_Stock = DB::table("stock")->where('id',$shelfData->idStock)->first()->id;
        $stockData = DB::table("stock")->where('id',$id_Stock)->first();
        $changeLoca = DB::table("change_location")->where('idElement',$element_id)->first();

        return view('admin/ebay',['Price'=>$Price,'changeLoca'=>$changeLoca,'levelData'=>$levelData,'shelfData'=>$shelfData,'stockData'=>$stockData,'elementData'=>$elementData,'brandData'=>$brandData,'categoryData'=>$categoryData,'State'=>$State, 'Shelf'=>$State, 'State'=>$State]);
    }
}
