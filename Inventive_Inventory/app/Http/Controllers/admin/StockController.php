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
        $changeLoca = DB::table("change_location")->get();
        $elementData = DB::table("element")->get();
        $categoryData = DB::table("category")->get();
        $brandData = DB::table("brand")->get();
        $stockData= Stock::all();
        $shelfData = Shelf::all();
        $levelData = Level::all();
        return view('admin/stock',['stockData'=>$stockData,'shelfData'=>$shelfData,'levelData'=>$levelData,'changeLoca'=>$changeLoca,'elementData'=>$elementData, 'categoryData'=>$categoryData,'brandData'=>$brandData]);
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

    public function editStock($stock_id){
        $stock = DB::table('stock')->where('id',$stock_id)->first();
        return view('admin/editStock',['stock'=>$stock]);
    }

    public function updateStock(Request $request, $stock_id){
        DB::table('stock')->where('id',$stock_id)->update([
            'Stock_Name' => $request['StockName'],
            'Description' => $request['StockDesc']
        ]);
        $StockName = DB::table('stock')->where('id',$stock_id)->get('Stock_Name')[0]->Stock_Name;
        $notifDesc="Le stock " . $StockName . " a été modifié par " . Auth::user()->Name;
        $notifiStockUpdate = array("Description"=>$notifDesc,"idNotifType"=>5,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifiStockUpdate);
        return redirect("/admin/manage")->with('message', "Le stock a été modifié");
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

    public function editShelf($shelf_id){
        $shelf = DB::table('shelf')->where('id',$shelf_id)->first();
        $stock = DB::table('stock')->where('id',$shelf->idStock)->first();
        return view('admin/editShelf',['shelf'=>$shelf,'stock'=>$stock]);
    }

    public function updateShelf(Request $request, $shelf_id){
        DB::table('shelf')->where('id',$shelf_id)->update([
            'Shelf_Name' => $request['ShelfName'],
            'Description' => $request['ShelfDesc']
        ]);
        $ShelfName = DB::table('shelf')->where('id',$shelf_id)->get('Shelf_Name')[0]->Shelf_Name;
        $notifDesc="L'étagère " . $ShelfName . " a été modifié par " . Auth::user()->Name;
        $notifiStockUpdate = array("Description"=>$notifDesc,"idNotifType"=>5,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifiStockUpdate);
        return redirect("/admin/manage")->with('message', "L'étagère a été modifiée");
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

    public function deleteLevel($level_id){
        $LevelName = DB::table('level')->where('id',$level_id)->get('Level_Name')[0]->Level_Name;
        $notifDesc="L'étage " . $LevelName . " a été supprimée par " . Auth::user()->Name;
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>5,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        DB::table('level')->where('id',$level_id)->delete();
        return redirect()->back()->with('message', "L'étage a été supprimé");
    }

    public function editLevel($level_id){
        $level = DB::table('level')->where('id',$level_id)->first();
        $shelf = DB::table('shelf')->where('id',$level->idShelf)->first();
        return view('admin/editLevel',['level'=>$level,'shelf'=>$shelf]);
    }

    public function updateLevel(Request $request, $level_id){
        DB::table('level')->where('id',$level_id)->update([
            'Level_Name' => $request['LevelName'],
            'Description' => $request['LevelDesc']
        ]);
        $LevelName = DB::table('level')->where('id',$level_id)->get('Level_Name')[0]->Level_Name;
        $notifDesc="L'étage " . $LevelName . " a été modifié par " . Auth::user()->Name;
        $notifiStockUpdate = array("Description"=>$notifDesc,"idNotifType"=>5,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifiStockUpdate);
        return redirect("/admin/manage")->with('message', "L'étage a été modifié");
    }
}
