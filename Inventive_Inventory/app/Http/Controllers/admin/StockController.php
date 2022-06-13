<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Stock;
use App\Models\Shelf;
use App\Models\Level;

class StockController extends Controller
{
    public function index(){
        return view('admin/stock');
    }

    public function manage(){
        $stockData= Stock::all();
        $shelfData = Shelf::all();
        $levelData = Level::all();

        return view('admin/manage',['stockData'=>$stockData,'shelfData'=>$shelfData,'levelData'=>$levelData]);
    }

    public function insert(Request $request){
        $Stock_Name = $request->input('Stock_Name');
        $Description = $request->input('Description');
        $data = array('Stock_Name'=>$Stock_Name,'Description'=>$Description);
        Stock::insert($data);
        return redirect()->back();
    }
}
