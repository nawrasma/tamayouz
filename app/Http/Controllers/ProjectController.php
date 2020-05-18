<?php

namespace App\Http\Controllers;

use App\Project;
use App\Season;
use App\UserDetails;

use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
    	//dd('index');
    	$projects = Project::all();
    	return view('project.projects',['projects'=>$projects]);
    }

    public function show_project($id)
    {
        $season= Season::find($id);
		$projects = Season::find($id)->projects;
        $seasons= Season::all();
    	return view('project.projects',['seasons'=>$seasons,'projects'=>$projects,'baseSeason'=>$season]);
    }

    public function single_project($id)
    {
        $seasons= Season::all();
    	$project = Project::where('id', $id)->first();
        dd($project->id);
    	//return view('project.singleProject',['project'=>$project,'seasons'=>$seasons]);
    }

    public function search_project()
    {
    	$columns = ['id','pro_name','stud_name','pro_domain','pro_type','super_name'];
		$query = Project::select('*');
		foreach($columns as $column)
		{
		  $query->orWhere($column, 'LIKE', '%' . request('s') . '%');
		}
		$result = $query->get();
        $seasons= Season::all();
    	return view('project.searchProject',['resVals'=>$result,'seasons'=>$seasons]);
    }

    public function projectForm()
    {
        $seasons= Season::all();
    	return view('project.addProject',['seasons'=>$seasons]);
    }

    public function add_project()
    {
    	//$sub_data=request()->all();
    	// session([
    	// 	'pro_name'=>request('pro_name'),
    	// 	'pro_email'=>request('pro_email'),
    	// 	'stud_name'=>request('stud_name')
    	// ]);
        $seasons= Season::all();
    	return view('project.addProject',['seasons'=>$seasons]);
    }

    public function store_project()
    {
        $video_name=null;$is_video=0;
    	$attributes = request()->validate([
            'role'=>['required'] , 'user_photo'=>['required'] , 'user_phone'=>['required'],
            'user_address'=>['required'] , 'user_linkedin'=>['required'] , 'user_desc'=>['required'],
            'pro_name'=>['required'] , 'pro_email'=>['required'] , 'stud_name'=>['required'],
            'pro_domain'=>['required'] , 'pro_type'=>['required'] , 'pro_photo'=>['required'],
            'pro_file'=>['required'] , 'super_name'=>['required'] , 'pro_desc'=>['required'],
            'pro_uni'=>['required'] , 'pro_date'=>['required'] , 'pro_season'=>['required'],
            'pro_responsers'=>['required'] , 'pro_ppt'=>['required'] 
        ]);

        $user_img=request('user_photo');
        $user_img_name=time().$user_img->getClientOriginalName();
        $user_img->move('images',$user_img_name);
		
        UserDetails::create([
            'user_id'=>Auth::user()->id,'role'=>request('role'),'user_img'=>$user_img_name,'phone'=>request('user_phone'),
            'address'=>request('user_address'),'linked'=>request('user_linkedin'),'desc'=>request('user_desc'),'type'=>'student']);

    	$this->setNewDateProjectTable(request()->all());

        flash(" The Project has Added , We will send you Email if confirm it") ;
     	return redirect('/homeStudent');
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
            'pro_grade'=>'null','pro_recommend'=>'null'  ]);
    }


    // public function ajaxRequestVideoType(Request $request)
    // {
    //     $input = $request->all();
   
    //     return response()->json(['video_type'=>$input]);
    // }

}
