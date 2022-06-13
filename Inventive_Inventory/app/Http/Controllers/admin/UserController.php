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
        $jobData =DB::table('job')->get();
        $user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->get();
        return view('admin/addUser',['usersData'=>$usersData,'roleData'=>$roleData,'user_role'=>$user_role,'jobData'=>$jobData]);
    }

    public function insert(Request $request){
        $Name = $request->input('Name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $Badge = $request->input('Badge');

        $data = array('Name'=>$Name,'email'=>$email,'password'=>$password,'Badge'=>$Badge);
        //$user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user_auth)->get(['Role_Name']);
        DB::table('users')->insert($data);

        //Partie Change_role
        $Role = $request->input('role');
        $id = DB::table('users')->where('email',$email)->get('id')[0]->id;
        $data2 = array('idUser'=>$id,'idRole'=>$Role,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("change_role")->insert($data2);

        //Partie Change_job
        $Job = $request->input('Job');
        $datajob = array('idUser'=>$id,'idJob'=>$Job,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("change_job")->insert($datajob);

        /*Partie Notification */
        $roleName=DB::table('role')->where('id',$Role)->get('Role_Name')[0]->Role_Name;
        $notifDesc="L'utilisateur " . $Name . " a été rajouté en tant que " . $roleName . " par " . Auth::user()->Name;
        $data3 = array("Description"=>$notifDesc,"idNotifType"=>1,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($data3);
        return redirect('/admin/adduser')->with('message', "L'utilisateur a été créé");
    }

    public function delete($user_id){
        $Name = DB::table('users')->where('id',$user_id)->get('Name')[0]->Name;
        $notifDesc="L'utilisateur " . $Name . " a été supprimé par " . Auth::user()->Name;
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>3,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        DB::table('users')->where('id',$user_id)->delete();
        DB::table('change_role')->where('idUser',$user_id)->delete();
        return redirect('/admin/adduser')->with('message', "L'utilisateur a été supprimé");
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
        $Name = DB::table('users')->where('id',$user_id)->get('Name')[0]->Name;
        $notifDesc="L'utilisateur " . $Name . " a été modifié par " . Auth::user()->Name;
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>2,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        return redirect("/admin/adduser")->with('message', "L'utilisateur a été modifié");
    }

}
