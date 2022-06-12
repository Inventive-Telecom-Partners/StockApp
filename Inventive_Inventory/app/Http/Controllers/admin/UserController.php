<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $usersData= User::all();
        return view('admin/addUser',['usersData'=>$usersData]);
    }

    public function insert(Request $request){
        $Name = $request->input('Name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $Badge = $request->input('Badge');
        $data = array('Name'=>$Name,'email'=>$email,'password'=>$password,'Badge'=>$Badge);
        DB::table('users')->insert($data);
        return redirect()->back();
    }

    public function delete(Request $request){
        $id = $request->input('id');
        DB::table('users')->insert($id);
        return redirect('/admin/adduser')->with('alert', 'Form Data Has Been Inserted');

    }

}
