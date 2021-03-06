<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Job;
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
        $jobData =DB::table('job')->get();
        $user_job = DB::table("users")->join('change_job', 'users.id', '=', 'change_job.idUser')->join('job','change_job.idJob', '=','job.id')->get();
        return view('admin/addUser',['usersData'=>$usersData,'roleData'=>$roleData,'user_role'=>$user_role,'jobData'=>$jobData,'user_job'=>$user_job]);
    }

    public function insert(Request $request){
        $Name = $request->input('Name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $Badge = $request->input('Badge');

        $data = array('Name'=>$Name,'email'=>$email,'password'=>$password,'Badge'=>$Badge,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
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
        $notifDesc="L'utilisateur " . $Name . " a ??t?? rajout?? en tant que " . $roleName . " par " . Auth::user()->Name;
        $data3 = array("Description"=>$notifDesc,"idNotifType"=>1,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($data3);
        return redirect('/admin/adduser')->with('message', "L'utilisateur a ??t?? cr????");
    }

    public function delete($user_id){
        $Name = DB::table('users')->where('id',$user_id)->get('Name')[0]->Name;
        $notifDesc="L'utilisateur " . $Name . " a ??t?? supprim?? par " . Auth::user()->Name;
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>3,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        DB::table('users')->where('id',$user_id)->delete();
        DB::table('change_role')->where('idUser',$user_id)->delete();
        DB::table('change_job')->where('idUser',$user_id)->delete();
        return redirect('/admin/adduser')->with('message', "L'utilisateur a ??t?? supprim??");
    }

    public function edit($user_id){
        $user = DB::table('users')->where('id',$user_id)->first();
        $roleData = Role::all();
        $jobData = Job::all();
        $user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user->id)->get(['Role_Name']);
        $user_job = DB::table("users")->join('change_job', 'users.id', '=', 'change_job.idUser')->join('job','change_job.idJob', '=','job.id')->where('users.id',$user->id)->get(['Job_Name']);
        return view('admin/editUser',['user'=>$user,'roleData'=>$roleData,'jobData'=>$jobData,'user_role'=>$user_role,'user_job'=>$user_job]);
    }

    public function update(Request $request, $user_id){
        $user = DB::table('users')->where('id',$user_id)->update([
            'Name' => $request['Name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'Badge' => $request['Badge'],
            'updated_at'=>date("Y-m-d H:i:s", strtotime('+2 hours'))
        ]);
        DB::table("users")->join('change_job', 'users.id', '=', 'change_job.idUser')->join('job','change_job.idJob', '=','job.id')->where('users.id',$user_id)->update([
            'change_job.idJob' => $request['JobId']
        ]);
        DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user_id)->update([
            'change_role.idRole' => $request['RoleId']
        ]);
        $Name = DB::table('users')->where('id',$user_id)->get('Name')[0]->Name;
        $notifDesc="L'utilisateur " . $Name . " a ??t?? modifi?? par " . Auth::user()->Name;
        $notifi = array("Description"=>$notifDesc,"idNotifType"=>2,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifi);
        return redirect("/admin/adduser")->with('message', "L'utilisateur a ??t?? modifi??");
    }

    /*Partie Job */

    public function insertJob(Request $request){
        $JobName = $request->input('JobName');
        $JobDescription = $request->input('JobDescription');

        $data = array('Job_Name'=>$JobName,'Description'=>$JobDescription);
        //$user_role = DB::table("users")->join('change_role', 'users.id', '=', 'change_role.idUser')->join('role','change_role.idRole', '=','role.id')->where('users.id',$user_auth)->get(['Role_Name']);
        DB::table('job')->insert($data);

        /*Partie Notification */
        $notifDesc="Le job " . $JobName . " a ??t?? rajout?? par " . Auth::user()->Name;
        $dataNotifJob = array("Description"=>$notifDesc,"idNotifType"=>10,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($dataNotifJob);
        return redirect('/admin/adduser')->with('message', "Le job a ??t?? cr????");
    }

    public function deleteJob($job_id){
        $JobName = DB::table('job')->where('id',$job_id)->get('Job_Name')[0]->Job_Name;
        $notifDesc="Le job " . $JobName . " a ??t?? supprim?? par " . Auth::user()->Name;
        $notific = array("Description"=>$notifDesc,"idNotifType"=>12,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notific);
        DB::table("users")->join('change_job', 'users.id', '=', 'change_job.idUser')->join('job','change_job.idJob', '=','job.id')->where('change_job.idJob',$job_id)->update([
            'change_job.idJob' => 5
        ]);
        DB::table('job')->where('id',$job_id)->delete();
        return redirect('/admin/adduser')->with('message', "Le job a ??t?? supprim??");
    }

    public function editJob($job_id){
        $job = DB::table('job')->where('id',$job_id)->first();
        return view('admin/editJob',['job'=>$job]);
    }

    public function updateJob(Request $request, $job_id){
        DB::table('job')->where('id',$job_id)->update([
            'Job_Name' => $request['JobName'],
            'Description' => $request['JobDesc']
        ]);
        $JobName = DB::table('job')->where('id',$job_id)->get('Job_Name')[0]->Job_Name;
        $notifDesc="Le job " . $JobName . " a ??t?? modifi?? par " . Auth::user()->Name;
        $notifiJobUpdate = array("Description"=>$notifDesc,"idNotifType"=>11,"idUser"=>Auth::user()->id,"Read"=>0,'created_at'=>date("Y-m-d H:i:s", strtotime('+2 hours')));
        DB::table("notification")->insert($notifiJobUpdate);
        return redirect("/admin/adduser")->with('message', "Le job a ??t?? modifi??");
    }

}
