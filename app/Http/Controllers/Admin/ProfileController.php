<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Userstore;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user=User::query()->find($id);
        return view('admin.profile.show',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user=User::query()->where('id',$id);
        $user->update(
            [
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email
            ]
        );
        return redirect()->back();
    }

    public function index()
    {
        $users=User::all();
        return view('admin.profile.index',compact('users'));

    }

    public function activity($id)
    {
        $user=User::query()->find($id);
        return view('admin.profile.activity',compact('user'));
    }

    public function create()
    {
       return view('admin.profile.create');
    }

    public function store(UserStore $request)
    {


        $file = $request->file('profile');
        $ext = $file->getClientOriginalExtension(); // png
        $file_name = auth()->user()->name . '_' . time() . '.' . $ext;
        $file->storeAs('images/users', $file_name, 'public_photos');
        $data=$request->validated();
        $data['profile']=$file_name;
        $data['name']=$request->name;
        $data['password']=bcrypt('12345678');
       User::query()->create(
         $data
       );
        $request->session()->flash('status','کاربر بدرستی اضافه شد');
        return redirect()->route('profile.index');
    }
}
