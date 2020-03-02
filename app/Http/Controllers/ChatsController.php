<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use DB;
use Pusher\Pusher;

class ChatsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$users = User::where('id', '!=', Auth::id())->get();

        $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . " 
        group by users.id, users.name, users.avatar, users.email");

        return view('chat', ['users'=> $users]);
    }
    
    public function getMessage($user_id){
        $my_id = Auth::id();
        Message::where(['from'=>$user_id, 'to'=>$my_id])->update(['is_read'=>1]);

        $messages = Message::where(function ($query) use ($my_id, $user_id){
            $query->where('from',$my_id)->where('to',$user_id);
        })->orwhere(function ($query) use ($my_id, $user_id){
            $query->where('from',$user_id)->where('to',$my_id);
        })->get();

        return view('messages.index', ['messages'=> $messages]);
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; 
        $data->save();

        $options = array(
            'cluster' => 'ap1',
           
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; 
        $pusher->trigger('my-channel', 'my-event', $data);
    }

}
