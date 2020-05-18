<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Category;
use App\Season;
use App\Project;

class PagesController extends Controller
{
    //
    public function index()
    {
        $this->home();
    }
    public function home()
    {
        $Categories= Category::all();
        $seasons= Season::all();
        $projects= Project::all();
        $best=Project::whereBetween('Pro_grade', [90, 100])
                     ->orderBy('Pro_grade','desc')->take(3)
                     ->get();
        $last=Project::latest()->first();
	    return view('welcome',['categories'=>$Categories,'seasons'=>$seasons,'projects'=>$projects,'best'=>$best,'last'=>$last]);
    }

    public function about()
    {
        $seasons= Season::all();
    	return view('about',['seasons'=>$seasons]);
    }

    public function contact()
    {
        $seasons= Season::all();
    	return view('contact',['seasons'=>$seasons]);
    }

    public function contactMsg()
    {
        $attributes = request()->validate([
            'msg_name'=>['required','min:3'],
            'msg_email'=>['required','email'],
            'msg_subject'=>['required','min:3'],
            'msg'=>['required']
        ]);
        flash('The message has created');
        Message::create($attributes);
        return back();
    }

   
}
