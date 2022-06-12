<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;

class ProfileController extends Controller
{
    public function index(){
        $user_auth = Auth::user()->id;
        $user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user_auth)->get(['Role_Name']);
        $roleData = Role::all();
        return view('admin/profil', ['roleData'=>$roleData,'user_role'=>$user_role]);
    }

    public function update(Request $request, $my_id){
        $user = DB::table('users')->where('id',$my_id)->update([
            'Name' => $request['Name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'Badge' => $request['Badge']
        ]);
        return redirect("/admin/profil");
    }
}
