<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $dataElement = array('Serial_Number'=>$Serial,'Product_Number'=>$Product,'Description'=>$Description, 'Color'=>$Couleur,'favori'=>$Favori,'perish_at'=>$Peremption,'Price exVAT'=>$Prix,'idBrand'=>$Marque,'idCategory'=>$Category);
        DB::table('element')->insert($dataElement);

        $idUser= DB::table('users')->where('Badge',$Badge)->first()->id;
        $UserName= DB::table('users')->where('Badge',$Badge)->first()->Name;
        $idElement= DB::table('element')->where('Serial_Number',$Serial)->first()->id;
        $dataLocation = array('idUser'=>$idUser,'idLevel'=>$Level,'idElement'=>$idElement,'idFlow'=>1,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table('change_location')->insert($dataLocation);

        /*Partie Notification */
        $notifDesc="L'utilisateur " . $UserName . " a ajouté l'objet avec le numéro de série " . $Serial . " a l'étage " . $Level ;
        $data3 = array("Description"=>$notifDesc,"idNotifType"=>7,"idUser"=>$idUser,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($data3);
        return redirect('/')->with('message', "L'objet est en stock");
    }

    public function stockOut(){
        return view('stockOut');
    }
    
    public function research(){
        $objets = DB::table("element")->get();
        return view('research');
    }
}
