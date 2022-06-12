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

    public function delete($user_id){
        $id = DB::table('users')->where('id',$user_id)->delete();
        return redirect('/admin/adduser')->with('message', 'Form Data Has Been Inserted');
    }

    public function edit($user_id){
        $user = DB::table('users')->where('id',$user_id)->first();
        return view('admin/editUser',['user'=>$user]);
    }

    public function update(Request $request, $user_id){
        $user = DB::table('users')->where('id',$user_id)->update([
            'Name' => $request['Name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'Badge' => $request['Badge']
        ]);
        return redirect("/admin/adduser");
    }

}
