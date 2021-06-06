<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStore;
use App\Http\Requests\Admin\CategoryUpdate;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        Category::create([
           'name'=>$request->name,
           'slug'=>$request->slug,
        ]);
        $request->session()->flash('status','بدرسی انجام شد');
        return redirect()->route('admin.category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

       $categories=Category::all();
       return view('front.categories.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::query()->find($id);
        return view('admin.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, $id)
    {
        $categories=Category::query()->find($id);
        $categories->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
        ]);
        $request->session()->flash('status','بدرسی اپدیت شد');
        return redirect()->route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
       $category=Category::query()->where('id',$id)->delete();
        $request->session()->flash('status','بدرسی پاک شد');
       return redirect()->back();
    }

}
