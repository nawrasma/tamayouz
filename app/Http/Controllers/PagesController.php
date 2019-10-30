<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PagesController extends Controller
{
    //

    public function home()
    {
    	$tasks = [
			"go to work",
			"go to market",
			"go to home"
		];
	    return view('welcome',[ 'tasks'=> $tasks , 'name'=> 'Nawras']);
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
