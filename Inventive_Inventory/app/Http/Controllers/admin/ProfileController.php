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
use App\Models\Job;

class ProfileController extends Controller
{
    public function index(){
        $user_auth = Auth::user()->id;
        $user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user_auth)->get(['Role_Name']);
        $roleData = Role::all();
        $jobData = Job::all();
        $notifData = DB::table("notification")->where('idNotifType',7)->orWhere('idNotifType',8)->orWhere('idNotifType',9)->orderBy('created_at','DESC')->get();
        $user_job = DB::table("users")->join('change_job', 'users.id', '=', 'change_job.idUser')->join('job','change_job.idJob', '=','job.id')->where('users.id',$user_auth)->get(['Job_Name']);
        $countIn = DB::table("change_location")->where("idUser",$user_auth)->where("idFlow", 1)->count();
        $countOut = DB::table("change_location")->where("idUser",$user_auth)->where("idFlow", 2)->count();
        return view('admin/profil', ['notifData'=>$notifData,'roleData'=>$roleData,'user_role'=>$user_role,'jobData'=>$jobData,'user_job'=>$user_job,'countIn'=>$countIn,'countOut'=>$countOut]);
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
