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
        $In = DB::table('change_location')->where('idFlow',1)->get();
        $Out = DB::table('change_location')->where('idFlow',2)->get();
        $countIn= $In->count();
        $countOut= $Out->count();
        $elementData = DB::table('element')->get();
        $typeData = DB::table('category')->get();
        foreach($In as $i){
            foreach($elementData as $element){
                if($element->id == $i->idElement){
                    foreach($typeData as $cat){
                        if($cat->id == $element->idCategory){
                            $countTypeIn[] =$cat;
                        }
                    }
                }
            }
        }
        $stockData= Stock::all();
        $shelfData = Shelf::all();
        $levelData = Level::all();
        return view('admin/chartsAdmin',['countIn'=>$countIn,'countOut'=>$countOut,'countTypeIn'=>$countTypeIn]);
    }

}
