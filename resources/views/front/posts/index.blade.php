@extends('front.layouts.master')
@section('title')
    پست ها
@endsection
@section('button')
    <form action="{{route('front.posts.create')}}">
        <button type="submit" class="btn btn-block btn-primary">پست جدید</button>
    </form>
@endsection

@section('content')
{{--    @dd($posts)--}}
    @foreach($posts as $post)
            <div class="card m-2" style="width: 18rem;">
                <img src="{{$post->getPhotoUrl()}}" class="card-img-top" alt="store">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="single.html" class="nav-link p-0 text-dark">{{$post->name}}</a>
                    </h5>
                    <p class="card-text text-muted o-font-sm">دسته بندی:{{$post->category->name}}</p>
                </div>
                <div class="card-footer">
                    <p class="text-success text-center">نویسنده:{{$post->user->name}}</p>
                    <a href="{{route('front.posts.show',$post->id)}}" class="btn btn-outline-secondary btn-block">ادامه مطلب</a>
                </div>
            </div>
    @endforeach
@endsection
