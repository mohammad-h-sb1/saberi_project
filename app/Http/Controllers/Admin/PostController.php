<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStore;
use App\Http\Requests\Admin\PostUpdate;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts=Post::all();
       return view('admin.posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
       return view('admin.posts.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStore $request)
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

       return redirect()->route('admin.post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $categories=Category::orderby('id')->get();
        $post=Post::query()->find($id);
        return view('admin.posts.edit',['post'=>$post],['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdate $request,$id)
    {


        Post::query()->where('id',$id)
            ->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'category_id'=>$request->input('category_id'),
            'user_id'=>auth()->user()->id,
            'content'=>$request->body,
        ]);

        return redirect()->route('admin.post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::query()->where('id',$id)->delete();
        return redirect()->route('admin.post');

    }

    public function status($id,Request $request)
    {
       $status=Post::query()->find($id);
       $status->update([
           'status'=> !$status->status ,
               ]
       );

        $request->session()->flash('status','بدرسی تغیر کرد');

        return redirect()->back();

    }


}
