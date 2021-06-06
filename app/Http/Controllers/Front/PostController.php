<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Http\Requests\Front\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('front.posts.index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::query()->find($id);
        if ($post->status == 1) {
            return view('front.posts.show', compact('post'));
        }
        else{
            return view('front.layouts.master');
        }
    }

    public function create()
    {
        $categories=Category::all();
        return view('front.posts.create',compact('categories'));
    }

    public function store(PostStoreRequest $request)
    {
        $file=$request->file('photo');
        $file_Name=$file->getClientOriginalName();
        $file->storeAs('images/photo',$file_Name,'public_photos');
        $data=$request->validated();
        $data['photo']=$file_Name;
        $data['user_id']=auth()->user()->id;
        $data['category_id']=$request->category_id;

        Post::create(
            $data
        );
        $request->session()->flash('status','پست شما در صفحه انتشار هست');

        return redirect()->route('front.posts.index');
    }



}
