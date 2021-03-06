<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Post;

class PostsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$posts = DB::table('posts')->join('users','users.id','=','posts.user_id')->get();

    	return view('home')->with(compact('posts'));
    }

    public function addPost(Request $request)
    {
    	/*$content = $request->content;
    	$createPost = DB::table('posts')
       		->insert(['content' =>$content, 'user_id' => Auth::user()->id,
        	'status' =>0, 'created_at' =>\Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString() ]);
        return back();*/
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();

        $path = "public/image/post_img";

        $file -> move($path, $filename);
     


        $post = new Post();
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->status = 0;
        $post->image = $filename;
        $post->created_at = \Carbon\Carbon::now()->toDateTimeString();
        $post->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        $post->save();
        return back();

    }

    public function postImg(Request $request,$id)
    {
    	$file = $request->file('image');
    	$filename = $file->getClientOriginalName();

    	$path = "public/image/post_img";

    	$file -> move($path, $filename);
    	$post_id = post::find($id);

    	DB::table('post_img')->where('post_id',$post_id)->update(['image'=>$filename]);
    }
}
