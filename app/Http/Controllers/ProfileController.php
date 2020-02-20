<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Friendship;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ProfileController extends Controller
{
    //
    public function index($slug)
    {

        $userData = DB::table('users')->leftJoin('profiles','profiles.user_id','users.id')->where('slug',$slug)->get();
    	return view('profile.index')->with('data', Auth::user()->profile)->with(compact('userData'));
    }

    public function uploadPhoto(Request $request)
    {

    	$file = $request->file('avatar');
    	$filename = $file->getClientOriginalName();

    	$path="public/image";

    	$file -> move($path, $filename);
    	$user_id = Auth::user()->id;

    	DB::table('users')->where('id',$user_id)->update(['avatar'=>$filename]);
    	return back();
    }

    public function updateProfile(Request $request)
    {   
        $user_id = Auth::user()->id;

        DB::table('profiles')->where('user_id', $user_id)->update($request->except('_token'));
        return back();
    }

    public function editProfile()
    {
         return view('profile.editProfile')->with('data', Auth::user()->profile);
    }

    public function findFriends()
    {
        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')->leftJoin('users','profiles.user_id','=','users.id')->where('users.id','!=',$uid)->get();

        return view('profile.findFriend')->with(compact('allUsers'));
    }

    public function sendRequest($id)
    {

        Auth::user()->addFriend($id);

        return back();
    }

    public function request()
    {
        $uid = Auth::user()->id;

        $FriendRequests = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.requester')
                        ->where('status', '=', Null)
                        ->where('friendships.user_requested', '=', $uid)->get();
        return view('profile.requests')->with(compact('FriendRequests'));
    }

    public function accept($id)
    {
        
        $uid = Auth::user()->id;
        $checkRequest = Friendship::where('requester', $id)->where('user_requested',$uid)->first();

        if($checkRequest)
        {
            $updateFriend = DB::table('friendships')->where('requester', $id)->where('user_requested',$uid)->update(['status'=> 1]);

            if($updateFriend){
                session()->put('msg', 'You are now friend');
                return redirect()->back()->withInput();
            }
        }
       
    }

    public function friends()
    {
        $uid = Auth::user()->id;

        $friends1 = DB::table('friendships')->leftJoin('users','users.id','friendships.user_requested')
        ->where('status',1)->where('requester',$uid)->get();

        $friends2 = DB::table('friendships')->leftJoin('users','users.id','friendships.requester')->where('status',1)->where('user_requested', $uid)->get();

        $friends = array_merge($friends1->toArray(), $friends2->toArray());

        return view('profile.friends')->with(compact('friends'));
    }
    
    public function notification()
    {

    }
}
