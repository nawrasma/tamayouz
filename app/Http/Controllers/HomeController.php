<?php

namespace App\Http\Controllers;


use App\Project;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('master.home');
    }

    public function all_projects()
    {
        $projects = Project::all();
        return view('master.projects',['projects'=>$projects]);
    }

    public function single_project($proID)
    {
        $project = Project::where('id', $proID)->first();
        return view('master.singleProject',['project'=>$project]);
    }

    public function add_project()
    {
        # code...
    }

    public function store_project()
    {
        # code...
    }

    public function all_orders()
    {
        # code...
    }

}
