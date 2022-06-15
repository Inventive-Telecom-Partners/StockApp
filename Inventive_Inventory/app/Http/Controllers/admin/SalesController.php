<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\Shelf;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;

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

    public function editItem($element_id){
        $user = Auth::user()->Badge;
        $elementData=DB::table('element')->where('id',$element_id)->first();
        $Price = $elementData->{'Price exVAT'};
        $brandSelected = DB::table('brand')->where('id',$elementData->idBrand)->first();
        $categorySelected = DB::table('category')->where('id',$elementData->idCategory)->first();

        $changeState = DB::table("change_state")->where('idElement',$element_id)->first()->idState;
        $State2 = DB::table("state")->where('id',$changeState)->first();
        $changeLoca = DB::table("change_location")->where('idElement',$element_id)->first();
        $levelData2 = DB::table("level")->where('id',$changeLoca->idLevel)->first();
        $id_Shelf = DB::table("shelf")->where('id',$levelData2->idShelf)->first()->id;
        $shelfData2 = DB::table("shelf")->where('id',$id_Shelf)->first();
        $id_Stock = DB::table("stock")->where('id',$shelfData2->idStock)->first()->id;
        $stockData2 = DB::table("stock")->where('id',$id_Stock)->first();
       
        $state = DB::table('state')->get();
        $stockData = DB::table('stock')->get();
        $shelfData = DB::table('shelf')->get();
        $levelData = DB::table('level')->get();
        $brandData = DB::table('brand')->get();
        $categoryData = DB::table('category')->get();
        return view('admin/editItem', ['State2'=>$State2,'levelData2'=>$levelData2,'shelfData2'=>$shelfData2,'stockData2'=>$stockData2,'categorySelected'=>$categorySelected,'brandSelected'=>$brandSelected,'Price'=>$Price,'elementData'=>$elementData,'user'=>$user,'state'=>$state,'stockData'=>$stockData,'shelfData'=>$shelfData,'levelData'=>$levelData,'brandData'=>$brandData,'categoryData'=>$categoryData]);
    }

    public function updateItem(Request $request, $element_id){
        DB::table('element')->where('id',$element_id)->update([
            'Serial_Number' => $request['Serial'],
            'Product_Number' => $request['Product'],
            'Description' => $request['Description'],
            'color' => $request['Couleur'],
            'Price exVAT' => $request['Prix'],
            'idBrand' => $request['Marque'],
            'idCategory' => $request['Category']
        ]);
        
        DB::table("change_state")->where('idElement',$element_id)->update([
            'idState' => $request['Etat']
        ]);
        DB::table("change_location")->where('idElement',$element_id)->update([
            'idLevel' => $request['Level'],
            'idFlow' => 3,
            'idUser' => Auth::user()->id
        ]);

        $Name = Auth::user()->id;
        $notifDesc="L'utilisateur " . $Name . " a  modifié l'objet " . $request['Description'];
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>9,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        return redirect("/admin/item")->with('message', "L'objet a été modifié");
    }

}
