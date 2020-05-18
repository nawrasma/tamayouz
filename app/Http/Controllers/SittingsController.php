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

class SittingsController extends Controller
{
    public function showUsers()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $users = User::all();
        $usersData=null;
        foreach ($users as $key => $user) {
        	$usersData[$key][0]=$user;
        	$usersData[$key][1]=$user->details;
        }
        //dd($usersData[0][0]->name.' , '.$usersData[0][1]->type);
        return view('master.usersPage',['users'=>$usersData,'notifications'=>$notifications,'countUnShowNoty'=>count($countNotifications)]);
    }

    public function addUser()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        return view('master.addUser',['notifications'=>$notifications,'countUnShowNoty'=>count($countNotifications)]);
    }

    public function storeUser()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $attributes = request()->validate([
            'first_name'=>['required'] , 'last_name'=>['required'] , 'email'=>['required'],
            'password'=>['required'] , 'address'=>['required'] , 'photo'=>['required'],
            'phone'=>['required'] , 'linked'=>['required'] , 'desc'=>['required'],
            'role'=>['required']  
        ]);

        $img=request('photo');
        $img_name=time().$img->getClientOriginalName();
        $img->move('images',$img_name);
        User::create(['name'=>request('first_name').' '.request('last_name'),'email'=> request('email') ,'password'=>Hash::make(request('password') )] );
        $type='student';
        if(request('role') == 'Department official')
        	$type='manager';
        $last=User::latest()->first();
        UserDetails::create(['role'=>request('role'),'image'=>$img_name,'phone'=>request('phone'),'address'=>request('address'),'linked'=>request('linked'),'type'=>$type,'desc'=>request('desc'),'user_id'=>$last->id]);
        flash(" The User has Added ") ;
        return back();
    }

    public function updateUser()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        
        $user=User::find(request('user_id_update'));
        $user_details=$user->details;
        
        $user->name=request('first_name').' '.request('last_name');
        $user->email=request('email');
        if(request('password'))
            $user->password=Hash::make(request('password'));
        $user->save();

        $type='student';
        if(request('role') == 'Department official')
        	$type='manager';
        $user_details->address=request('address');
        $user_details->phone=request('phone');
        $user_details->linked=request('linked');
        $user_details->desc=request('desc');
        $user_details->role=request('role');
        $user_details->type=$type;
        if(request('image')){
            $user_img=request('image');
            $user_img_name=time().$user_img->getClientOriginalName();
            $user_img->move('images',$user_img_name);
            $user_details->image=$user_img_name;    
        }
        $user_details->save();
        flash(" The User has Updated ") ;
        return back();
    }


    public function deleteUser()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $id=Request('user_id');
        User::find($id)->delete();
        UserDetails::where('user_id', $id)->delete();
        flash(" The User has Deleted ") ;
        return back();
    }



    public function showSeasons()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $seasons = Season::all();
        $seasonsData=null;
        foreach ($seasons as $key => $season) {
        	$seasonsData[$key][0]=$season;
        	$seasonsData[$key][1]=$season->user;
        }
        return view('master.seasonsPage',['seasons'=>$seasonsData,'notifications'=>$notifications,'countUnShowNoty'=>count($countNotifications)]);
    }

    public function addSeason()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $users = UserDetails::where(['type'=>'manager'])->get();
        $usersData=null;
        foreach ($users as $key => $user) {
        	$usersData[$key][0]=$user;
        	$usersData[$key][1]=User::where('id',$user->user_id)->get();
        }
        //dd($usersData[0][1][0]);
        return view('master.addSeason',['users'=>$usersData,'notifications'=>$notifications,'countUnShowNoty'=>count($countNotifications)]);
    }

    public function storeSeason()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $attributes = request()->validate([
            'season_name'=>['required'] , 'manager'=>['required'] , 'season_desc'=>['required'] ]);
        Season::create(['name'=>request('season_name'),'desc'=> request('season_desc') ,'user_id'=>request('manager') ] );

        flash(" The Season has Added ") ;
        return back();
    }

    public function updateSeason()
    {
    	$season=Season::where('id',request('season_id_update'))->first();
    	$user=User::where('name',request('manager'))->first();
    	$season->name=request('season_name');
    	$season->desc=request('season_desc');
    	$season->user_id=$user->id;
    	$season->save();
    	flash(" The Season has Updated ") ;
    	return back();
    }

    public function deleteSeason()
    {
        $id=Request('season_id');
        Season::find($id)->delete();
        flash(" The Season has Deleted ") ;
        return back();
    }




    public function showCategories()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $categories = Category::all();
        return view('master.categoriesPage',['categories'=>$categories,'notifications'=>$notifications,'countUnShowNoty'=>count($countNotifications)]);
    }

    public function addCategory()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        return view('master.addCategory',['notifications'=>$notifications,'countUnShowNoty'=>count($countNotifications)]);
    }

    public function storeCategory()
    {
    	$notifications=Notification::where('user_id',Auth::user()->id)->get();
        $countNotifications=Notification::where(['user_id'=>Auth::user()->id,'noty_show'=>0])->get();
        $attributes = request()->validate([
            'en_category'=>['required'] , 'ar_category'=>['required'] , 'cat_desc'=>['required'] ]);
        Category::create(['cat_en'=>request('en_category'),'cat_desc'=> request('cat_desc') ,'cat_ar'=>request('ar_category') ] );

        flash(" The Category has Added ") ;
        return back();
    }

    public function updateCategory()
    {
    	$category=Category::where('id',request('category_id_update'))->first();
    	$category->cat_en=request('en_category');
    	$category->cat_ar=request('ar_category');
    	$category->cat_desc=request('cat_desc');
    	$category->save();
    	flash(" The Category has Updated ") ;
    	return back();
    }

    public function deleteCategory()
    {
    	$id=Request('category_id');
        Category::find($id)->delete();
        flash(" The Category has Deleted ") ;
        return back();	
    }
  

  	public function ajaxgetdataUPdate()
  	{
  		$id = Request('id');
  		$user=User::where('id', $id)->first();
  		$details=$user->details;
  		return response()->json(['user'=>$user,'details'=>$details]);   
  	}

  	public function ajaxSeasonDataUPdate()
  	{
  		$id = Request('id');
  		$season=Season::where('id',$id)->first();
  		$user=$season->user;
  		return response()->json(['user'=>$user,'season'=>$season]);   
  	}

  	public function ajaxCategoryDataUPdate()
  	{
  		$id = Request('id');
  		$category=Category::where('id',$id)->first();
  		return response()->json(['category'=>$category]);   
  	}
}
