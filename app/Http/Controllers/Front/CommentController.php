<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($id)
    {
        $post=Post::query()->find($id);
        return view('front.comments.create',compact('post'));
    }

    public function store(Request $request)
    {
       Comment::create([
           'user_id'=>auth()->user()->id,
           'post_id'=>$request->post_id,
           'content'=>$request->body,
       ]);
        $request->session()->flash('status','کامنت شما در صفحه انتشار هست');

        return redirect()->route('front.posts.show',$request->post_id);
    }
}
