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



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
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

    public function dashboradPage()
    {
        $projectsBySeason[][]=null;  $projectsNumberByseasonsCat[]=null;
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();

        $list=Msg_list::where('user_id',Auth::user()->id)->get();
        $Categories= Category::all();
        $projects= Project::all()->sortByDesc('created_at');
        $seasons= Season::all();

        foreach ($seasons as $key => $value) {
            $projectsBySeason[$key][0]=$value->name;
            $projectsBySeason[$key][1]=count($value->projects);
            $projectsNumberByseasonsCat[$key]=getNumItemsByAllAttributeArray( $value->projects ,'pro_domain',$Categories,'cat_en');
        }

        $ResArray=[ 'seasonsNum'=>count($seasons),'categoiesNum'=>count($Categories),'projectsNum'=>count($projects), 
                    'projectsBySeasons'=>$projectsBySeason,'projectsNumberByseasonsCat'=>$projectsNumberByseasonsCat,
                    'projects'=>$projects,'seasons'=>$seasons,'list'=>$list,'notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole ];
        return view('master.dashboard',$ResArray);
    }

    


    public function all_projects()
    {
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();

        $projects = Project::all();
        return view('master.projects',['projects'=>$projects,'notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole ]);
    }

    public function single_project($proID)
    {
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();
        $seasons= Season::all();
        $categories= Category::all();
        $project = Project::where('id', $proID)->first();
        return view('master.singleProject',['project'=>$project,'notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole,'seasons'=>$seasons,'categories'=>$categories]);
    }

    public function updateGradeRecommend()
    {
        $project = Project::where('id', Request('pro_id') )->first();
        $project->pro_grade=Request('pro_grade');
        $project->pro_recommend=Request('pro_recommend');
        $project->save();
        flash("grade & Recommend Information has been Added!") ;
        return back();
    }

    public function destroyProject()
    {
        $project = Project::where('id', Request('pro_id') )->first();
        unlink(public_path('images/'.$project->pro_photo) );
        unlink(public_path('files/'.$project->pro_file) );
        unlink(public_path('files/'.$project->pro_ppt) );
        if($project->is_video)
            unlink(public_path('videos/'.$project->pro_video) );
        Project::find(Request('pro_id') )->delete();
        return redirect()->action('HomeController@all_projects');
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
        $project->season_id=$season[0];$project->is_video=$is_video;$project->pro_grade=request('pro_grade');
        $project->pro_recommend=request('pro_recommend');
        $project->save();
    }



    public function add_project()
    {
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();
        $seasons= Season::all();
        $categories= Category::all();
        return view('master.addProject',['notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole,'seasons'=>$seasons,'categories'=>$categories]);
    }

    public function store_project()
    {
        $attributes = request()->validate([
            'pro_name'=>['required'] , 'pro_email'=>['required'] , 'stud_name'=>['required'],
            'pro_domain'=>['required'] , 'pro_type'=>['required'] , 'pro_photo'=>['required'],
            'pro_file'=>['required'] , 'super_name'=>['required'] , 'pro_desc'=>['required'],
            'pro_uni'=>['required'] , 'pro_date'=>['required'] , 'pro_season'=>['required'],
            'pro_responsers'=>['required'] , 'pro_ppt'=>['required'] ,'pro_grade'=>['required'],
            'pro_recommend'=>['required']
        ]);

        $this->setNewDateProjectTable(request()->all());
        
        flash(" The Project has Added ") ;
        return back();
    }

    private function setNewDateProjectTable($request){
        $video_name=null;$is_video=0;

        $img_name=saveLoadedFile('images',request('pro_photo'));
        

        if(request('video_type') == 'video'){
            $video_name=saveLoadedFile('videos',request('pro_video'));
            $is_video=1;
        }else{
            $video_name=request('pro_video_link');
        }
        
        $file_name=saveLoadedFile('files',request('pro_file'));

        $ppt_name=saveLoadedFile('files',request('pro_ppt'));  

        $season= explode(',',request('pro_season'));     

        
        Project::create([
            'pro_name'=>request('pro_name'),'pro_email'=>request('pro_email'),'stud_name'=>request('stud_name'),
            'pro_domain'=>request('pro_domain'),'pro_type'=>request('pro_type'),'super_name'=>request('super_name'),
            'pro_photo'=>$img_name,'pro_video'=>$video_name,'pro_file'=>$file_name,'pro_desc'=>request('pro_desc'),
            'pro_uni'=>request('pro_uni'),'pro_date'=>request('pro_date'),'pro_ppt'=>$ppt_name,'pro_season'=>(int)$season[1],
            'pro_responsers'=>request('pro_responsers'),'user_id'=>Auth::user()->id,'season_id'=>$season[0],'is_video'=>$is_video,
            'pro_grade'=>request('pro_grade'),'pro_recommend'=>request('pro_recommend')  ]);
    }

    public function all_notification()
    {
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();
        return view('master.notification',['notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole ]);
    }

    public function all_message($messageID)
    {
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();
        $message=Message::where('id',$messageID)->first();

        if($message->name_to == Auth::user()->name){
            $query = Message::select('*');
            $query->orWhere([ ['msg_name','like',$message->name_to] , ['type','like',$message->type] ]);
            $query->orWhere([ ['name_to','like',$message->name_to],['type','like',$message->type] ]);
            $result = $query->get()->sortBy('created_at');
        }
        return view('master.message',['notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole,'messages'=>$result ]);
    }


    public function search_project()
    {
        $columns = ['id','pro_name','stud_name','pro_domain','pro_type','super_name'];
        $notificationsData=$this->getNotifications();
        $userImage=Auth::user()->getImageUser();
        $userRole=Auth::user()->getRoleUser();
        $query = Project::select('*');
        foreach($columns as $column)
        {
          $query->orWhere($column, 'LIKE', '%' . request('inp_search') . '%');
        }
        $result = $query->get();
       // dd($result);
        $seasons= Season::all();
        return view('master.projects',['notifications'=>$notificationsData['notifications'],'countUnShowNoty'=>$notificationsData['countUnShowNoty'],'userImage'=>$userImage,'role'=>$userRole,'projects'=>$result,'seasons'=>$seasons]);
    }


    


    //ajax function
    public function ajaxPrpjectsCat(Request $request)
    {
        $key = Request('key');
        $projectsNumberByseasonsCat[]=null;
        $Categories= Category::all();
        $season=Season::find($key);
        $projectsNumberByseasonsCat=getNumItemsByAllAttributeArray( $season->projects ,'pro_domain',$Categories,'cat_en');
    
        return response()->json(['projectsNumberByseasonsCat'=>$projectsNumberByseasonsCat]);

    }

    //ajax function
    public function ajaxAddTask()
    {
        $msg = Request('inp');
        Msg_list::create(['list_msg'=>$msg,'list_checked'=>0,'list_archeived'=>0,'user_id'=>Auth::user()->id]);
        $last_msg=Msg_list::latest()->first();
        return response()->json(['last'=>$last_msg]);
    }
    

    //ajax function
    public function ajaxDeleteTask()
    {
        $id = Request('id');
        Msg_list::where('id',$id)->delete();
        return response()->json(['last'=>$id]);
    }

    //ajax function
    public function ajaxDoneTask()
    {
        $id = Request('id');
        $Msg_list=Msg_list::where('id',$id)->first();
        if ($Msg_list->list_checked){
            $Msg_list->list_checked=0;
        }
        else{
            $Msg_list->list_checked=1;
        }
        $Msg_list->save();
        return response()->json(['last'=>$id,'check'=>$Msg_list->list_checked]);
    }


    //ajax function
    public function ajaxShowNoty()
    {
        $id = Request('id');
        $currentNotification=Notification::where('id',$id)->first();
        if($currentNotification->noty_show){
            $currentNotification->noty_show=0;
        }
        else{
            $currentNotification->noty_show=1;
        }
        $currentNotification->save();
        return response()->json(['last'=>$currentNotification]);   
    }


    //ajax function
    public function ajaxAddMsg()
    {
        $name_to=Request('name_to');
        $msg=Request('msg');
        $arrVal=['msg_name'=>Auth::user()->name,'msg_email'=>Auth::user()->email,'msg_subject'=>'chat','msg'=>$msg,'name_to'=>$name_to,'type'=>'project'];
        Message::create($arrVal);
        return response()->json($arrVal);   
    }

}
