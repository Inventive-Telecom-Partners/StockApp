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

    /*Function for Stock */

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

    public function deleteStock($stock_id){
        $StockName = DB::table('stock')->where('id',$stock_id)->get('Stock_Name')[0]->Stock_Name;
        $notifDesc="Le stock " . $StockName . " a été supprimé par " . Auth::user()->Name;
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>6,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        DB::table('stock')->where('id',$stock_id)->delete();
        return redirect()->back()->with('message', "Le stock a été supprimé");
    }

    /*Function for Shelf */

    public function insertShelf(Request $request){
        $Stock = $request->input('Stock');
        $Shelf_Name = $request->input('Shelf_Name');
        $Description = $request->input('Description');
        $data = array('Shelf_Name'=>$Shelf_Name,'Description'=>$Description,'idStock'=>$Stock);
        Shelf::insert($data);

        /*Notification*/
        $StockName = DB::table('stock')->where('id',$Stock)->get('Stock_Name')[0]->Stock_Name;
        $notifDesc="L'étagère' " . $Shelf_Name . " pour le stock " . $StockName . " a été créé par " . Auth::user()->Name;
        $dataNotif = array("Description"=>$notifDesc,"idNotifType"=>5,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($dataNotif);
        return redirect()->back();
    }

    public function deleteShelf($shelf_id){
        $ShelfName = DB::table('shelf')->where('id',$shelf_id)->get('Shelf_Name')[0]->Shelf_Name;
        $notifDesc="L'étagère " . $ShelfName . " a été supprimée par " . Auth::user()->Name;
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>5,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        DB::table('shelf')->where('id',$shelf_id)->delete();
        return redirect()->back()->with('message', "L'étagère a été supprimée");
    }

    /*Function for Level */

    public function insertLevel(Request $request){
        $Shelf = $request->input('Shelf');
        $Level_Name = $request->input('Level_Name');
        $Description = $request->input('Description');
        $data = array('Level_Name'=>$Level_Name,'Description'=>$Description,'idShelf'=>$Shelf);
        Level::insert($data);

        /*Notification*/
        $ShelfName = DB::table('shelf')->where('id',$Shelf)->get('Shelf_Name')[0]->Shelf_Name;
        $notifDesc="L'étage " . $Level_Name . " pour l'étagère " . $ShelfName . " a été créé par " . Auth::user()->Name;
        $dataNotif = array("Description"=>$notifDesc,"idNotifType"=>5,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($dataNotif);
        return redirect()->back();
    }
}
