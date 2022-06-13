<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $usersData= User::all();
        $roleData = Role::all();
        $user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->get();
        return view('admin/addUser',['usersData'=>$usersData,'roleData'=>$roleData,'user_role'=>$user_role]);
    }

    public function insert(Request $request){
        $Name = $request->input('Name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $Badge = $request->input('Badge');
        $Role = $request->input('role');
        $data = array('Name'=>$Name,'email'=>$email,'password'=>$password,'Badge'=>$Badge);
        //$user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user_auth)->get(['Role_Name']);
        DB::table('users')->insert($data);
        $id = DB::table('users')->where('email',$email)->get('id')[0]->id;
        $data2 = array('idNotif'=>5,'idUser'=>$id,'idRole'=>$Role,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("change_role")->insert($data2);
        return redirect('/admin/adduser')->with('message', 'Form Data Has Been deleted');
    }

    public function delete($user_id){
        $id = DB::table('users')->where('id',$user_id)->delete();
        DB::table('change_role')->where('idUser',$user_id)->delete();
        return redirect('/admin/adduser')->with('message', 'Form Data Has Been deleted');
    }

    public function edit($user_id){
        $user = DB::table('users')->where('id',$user_id)->first();
        $roleData = Role::all();
        $user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user->id)->get(['Role_Name']);
        return view('admin/editUser',['user'=>$user,'roleData'=>$roleData,'user_role'=>$user_role]);
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
