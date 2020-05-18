<?php

namespace App\Http\Controllers;

use App\Category;
use App\Season;
use App\Project;
use App\User;
use App\UserDetails;
use App\Msg_list;
use App\Notification;
use App\Message;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(Auth::user()->getRoleUser());
        $user_details=Auth::user()->details;
        $notificationsData=$this->getNotifications();
        return view('master.home',['details'=>$user_details,'notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'] ]);
    }

    private function getNotifications(){
        $notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        return ['notifications'=>$notifications,'countUnShowNoty'=>count($countNotifications)];
    }

    public function updateAccount()
    {
        $notificationsData=$this->getNotifications();
        
        $this->setUpdatedDataUserTable(request()->all());
        
        $this->setUpdatedDataUser_detailTable(request()->all());

        flash("Your profile has been updated!") ;
        return back();
    }


    private function setUpdatedDataUserTable($request){
        $user=User::find(Auth::user()->id);
        $user->name=request('firstName').' '.request('lastName');
        $user->email=request('email');
        if(request('password'))
            $user->password=Hash::make(request('password'));
        $user->save();
    }

    private function setUpdatedDataUser_detailTable($request){
        $user_details=Auth::user()->details;
        $user_details->address=request('address');
        $user_details->phone=request('phone');
        $user_details->linked=request('linked');
        $user_details->desc=request('desc');

        $user_img_name=saveLoadedFile('images',request('image'));
        if($user_img_name){
            unlink(public_path('images/'.$user_details->user_img) );
             $user_details->user_img=$user_img_name;    
        }
        $user_details->save();
    }


    public function single_project()
    {
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();
        $seasons= Season::all();
        $categories= Category::all();
        $project = Project::where('user_id', Auth::id())->first();
        return view('master.singleProject',['project'=>$project,'notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole,'seasons'=>$seasons,'categories'=>$categories]);
    }

    public function updateProject()
    {
        $project = Project::where('id', Request('pro_id') )->first();
        $this->dataForUpdate($project,Request()->all());
        flash(" The Project has Updated ") ;
        return back();
    }


    private function dataForUpdate($project,$arrData){

        $video_name=null;$is_video=0;
        $img_name=saveLoadedFile('images',request('pro_photo'));
        if($img_name){
            unlink(public_path('images/'.$project->pro_photo) );
            $project->pro_photo=$img_name;
        }

        $file_name=saveLoadedFile('files',request('pro_file'));
        if($file_name){
             unlink(public_path('files/'.$project->pro_file) );
            $project->pro_file=$file_name;
        }

        $ppt_name=saveLoadedFile('files',request('pro_ppt'));
        if($ppt_name){
            unlink(public_path('files/'.$project->pro_ppt) );
            $project->pro_ppt=$ppt_name;
        }

        if(request('video_type') == 'video'){
            $video_name=saveLoadedFile('videos',request('pro_video'));
            if($video_name){
                $is_video=1;
                unlink(public_path('videos/'.$project->pro_video) );
                $project->pro_video=$video_name;  }
        }else{
            $video_name=request('pro_video_link');
            $project->pro_video=$video_name;
        }

        $season= explode(',',request('pro_season'));     
        $this->lookupData($project,$arrData,$season,$is_video);
    }

    private function lookupData($project,$arrData,$season,$is_video){

        $project->pro_name=request('pro_name');$project->pro_email=request('pro_email');$project->stud_name=request('stud_name');
        $project->pro_domain=request('pro_domain');$project->pro_type=request('pro_type');$project->super_name=request('super_name');
        $project->pro_desc=request('pro_desc');
        $project->pro_uni=request('pro_uni');$project->pro_date=request('pro_date');
        $project->pro_season=(int)$season[1];$project->pro_responsers=request('pro_responsers');$project->user_id=Auth::user()->id;
        $project->season_id=$season[0];$project->is_video=$is_video;$project->pro_grade="null";
        $project->pro_recommend="null";
        $project->save();
    }


}
