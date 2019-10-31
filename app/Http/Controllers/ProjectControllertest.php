<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
    	dd('index');
    	$projects = Project::all();
    	return view('project.projects',['projects'=>$projects]);
    }

    public function show_project($domain)
    {
		$projects = Project::where('pro_domain',$domain)->get();
    	return view('project.projects',['projects'=>$projects,'domain'=>$domain]);
    }

    public function single_project($id)
    {
    	$project = Project::where('id', $id)->first();
    	return view('project.singleProject',['project'=>$project]);
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
    	//dd( $result);
    	return view('project.searchProject',['resVals'=>$result]);
    }

    public function projectForm()
    {
    	return view('project.addProject');
    }

    public function add_project()
    {
    	//$sub_data=request()->all();
    	session([
    		'pro_name'=>request('pro_name'),
    		'pro_email'=>request('pro_email'),
    		'stud_name'=>request('stud_name')
    	]);
    	return view('project.addProject');
    }

    public function store_project()
    {
    	$attributes = request()->validate([
            'pro_name'=>['required'],
            'pro_email'=>['required'],
            'stud_name'=>['required'],
            'pro_domain'=>['required'],
            'pro_type'=>['required'],
            'pro_photo'=>['required'],
            'pro_video'=>['required'],
            'pro_file'=>['required'],
            'super_name'=>['required'],
            'pro_desc'=>['required']
        ]);
		$img=request('pro_photo');
		$img_name=time().$img->getClientOriginalName();
		$img->move('images',$img_name);

		$video=request('pro_video');
		$video_name=time().$video->getClientOriginalName();
		$video->move('videos',$video_name);

		$file=request('pro_file');
		$file_name=time().$file->getClientOriginalName();
		$file->move('files',$file_name);

		
		flash(" The Project has Added , We will send you Email if confirm it") ;
    	Project::create([
    		'pro_name'=>request('pro_name'),
            'pro_email'=>request('pro_email'),
            'stud_name'=>request('stud_name'),
            'pro_domain'=>request('pro_domain'),
            'pro_type'=>request('pro_type'),
            'pro_photo'=>$img_name,
            'pro_video'=>$video_name,
            'pro_file'=>$file_name,
            'super_name'=>request('super_name'),
            'pro_desc'=>request('pro_desc')
    	]);
    	return redirect('/');
    }
}
