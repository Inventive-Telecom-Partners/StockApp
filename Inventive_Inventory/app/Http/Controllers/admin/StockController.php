<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Stock;
use App\Models\Shelf;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;

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

    public function insertStock(Request $request){
        $Stock_Name = $request->input('Stock_Name');
        $Description = $request->input('Description');
        $data = array('Stock_Name'=>$Stock_Name,'Description'=>$Description);
        Stock::insert($data);

        /*Notification*/
        $notifDesc="Le stock " . $Stock_Name . " a été créé par " . Auth::user()->Name;
        $dataNotif = array("Description"=>$notifDesc,"idNotifType"=>4,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($dataNotif);
        return redirect()->back();
    }
}
