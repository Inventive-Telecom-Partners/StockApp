<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use App\Models\Shelf;
use App\Models\Level;

class AccueilController extends Controller
{
    public function index(){
        return view('accueil');
    }

    public function stockIn(){
        $state = DB::table('state')->get();
        $stockData = DB::table('stock')->get();
        $shelfData = DB::table('shelf')->get();
        $levelData = DB::table('level')->get();
        $brandData = DB::table('brand')->get();
        $categoryData = DB::table('category')->get();
        return view('stockIn', ['state'=>$state,'stockData'=>$stockData,'shelfData'=>$shelfData,'levelData'=>$levelData,'brandData'=>$brandData,'categoryData'=>$categoryData]);
    }

    public function insertStockIn(Request $request){
        $Badge = $request->input('Badge');
        $Serial = $request->input('Serial');
        $Product = $request->input('Product');
        $Description = $request->input('Description');
        $Couleur = $request->input('Couleur');
        $Picture = $request->input('Picture');
        $Favori = $request->input('Favori');
        $Etat = $request->input('Etat');
        $Peremption = $request->input('Peremption');
        $Prix = $request->input('Prix');
        $Marque = $request->input('Marque');
        $Category = $request->input('Category');
        $Level = $request ->input("Level");
        $LevelName = DB::table('level')->where('id',$Level)->first()->Level_Name;

        $dataElement = array('Serial_Number'=>$Serial,'Product_Number'=>$Product,'Description'=>$Description, 'Color'=>$Couleur,'favori'=>$Favori,'perish_at'=>$Peremption,'Price exVAT'=>$Prix,'idBrand'=>$Marque,'idCategory'=>$Category);
        DB::table('element')->insert($dataElement);

        $idUser= DB::table('users')->where('Badge',$Badge)->first()->id;
        $UserName= DB::table('users')->where('Badge',$Badge)->first()->Name;
        $idElement= DB::table('element')->where('Serial_Number',$Serial)->first()->id;
        $dataLocation = array('idUser'=>$idUser,'idLevel'=>$Level,'idElement'=>$idElement,'idFlow'=>1,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table('change_location')->insert($dataLocation);

        $dataState = array('idState'=>$Etat,'idElement'=>$idElement,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table('change_state')->insert($dataState);

        /*Partie Notification */
        $notifDesc="L'utilisateur " . $UserName . " a ajouté l'objet avec le numéro de série " . $Serial . " a l'étage " . $LevelName ;
        $data3 = array("Description"=>$notifDesc,"idNotifType"=>7,"idUser"=>$idUser,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($data3);
        return redirect('/')->with('message', "L'objet est en stock");
    }

    public function stockOut(){
        $Serial = "noserialnumber";
        return view('stockOut',['Serial'=>$Serial]);
    }

    public function stockOut2($Serial){
        return view('stockOut',['Serial'=>$Serial]);
    }

    public function stockOutDel(Request $request){
        $Badge = $request->input('Badge');
        $Serial = $request->input('Serial');
        $idUser= DB::table('users')->where('Badge',$Badge)->first()->id;
        $UserName= DB::table('users')->where('Badge',$Badge)->first()->Name;
        $idElement= DB::table('element')->where('Serial_Number',$Serial)->first()->id;
        $idLevel = DB::table('change_location')->where('idElement',$idElement)->first()->idLevel;
        $Level = DB::table('level')->where('id',$idLevel)->first()->Level_Name;
        $idShelf= DB::table('level')->where('id',$idLevel)->first()->idShelf;
        $Shelf= DB::table('shelf')->where('id',$idShelf)->first()->Shelf_Name;
        $idStock= DB::table('shelf')->where('id',$idShelf)->first()->idStock;
        $Stock= DB::table('stock')->where('id',$idStock)->first()->Stock_Name;

        DB::table('change_location')->where('idElement',$idElement)->delete();
        $dataLocation = array('idUser'=>$idUser,'idLevel'=>NULL,'idElement'=>$idElement,'idFlow'=>2,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table('change_location')->insert($dataLocation);

        /*Partie Notification */
        $notifDesc="L'utilisateur " . $UserName . " a enlevé l'objet avec le numéro de série " . $Serial . " a l'emplacement " . $Stock . " - ". $Shelf . " - " . $Level;
        $data3 = array("Description"=>$notifDesc,"idNotifType"=>8,"idUser"=>$idUser,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($data3);
        return redirect('/')->with('message', "L'objet est enlevé du stock");
    }
    
    public function research(){
        $changeLoca = DB::table("change_location")->get();
        $elementData = DB::table("element")->get();
        $categoryData = DB::table("category")->get();
        $brandData = DB::table("brand")->get();
        $stockData= Stock::all();
        $shelfData = Shelf::all();
        $levelData = Level::all();     
        return view('/research',['stockData'=>$stockData,'shelfData'=>$shelfData,'levelData'=>$levelData,'changeLoca'=>$changeLoca,'elementData'=>$elementData, 'categoryData'=>$categoryData,'brandData'=>$brandData]);
    }
}
