<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PagesController extends Controller
{
    //
    public function index()
    {
        $this->home();
    }
    public function home()
    {
	    return view('welcome');
    }

    public function about()
    {
    	return view('about');
    }

    public function contact()
    {
    	return view('contact');
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
