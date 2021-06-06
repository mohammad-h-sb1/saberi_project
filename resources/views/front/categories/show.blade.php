@extends('front.layouts.master')
@section('title')
    دسته بندی ها
@endsection
@section('content')
    @foreach($categories as $category)
        <div class="card m-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <p class="nav-link p-0 text-dark">{{$category->name}}</p>
                </h5>
            </div>
        </div>
    @endforeach
@endsection
