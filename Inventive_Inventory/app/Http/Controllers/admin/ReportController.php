<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(){
        $flowData= DB::table('flow')->get();
        $userData= DB::table('users')->get();
        return view('admin/report',['flowData'=>$flowData,'userData'=>$userData]);
    }
    public function displayTab(Request $request){

        $User = $request->input('User');
        $Flow = $request->input('Flow');

        $changeLoca= DB::table('change_location')->where("idUser", $User)->where("idFlow",$Flow)->get();
        $elementData= DB::table('element')->get();
        $UserName= DB::table('users')->where("id",$User)->first()->Name;
        $Flux=DB::table('flow')->where("id",$Flow)->first()->Flow_Name;
        return view('admin/reportTab',['changeLoca'=>$changeLoca,'UserName'=>$UserName,'Flux'=>$Flux,'elementData'=>$elementData]);
    }
}
