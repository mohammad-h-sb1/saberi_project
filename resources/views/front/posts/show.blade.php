@extends('front.layouts.master')
@section('title')
    پست: {{$post->name}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-5 d-flex d-md-block justify-content-center">
                <div class="d-flex justify-content-center single-img mb-4">
                    <img src="{{$post->getPhotoUrl()}}" alt="file">
                </div>
                <form action="{{route('front.comments.create',$post->id)}}">
                    <button type="submit" class="btn btn-block btn-primary">کامنت جدید </button>
                </form>
            </div>
            <div class="col-12 col-md-4 col-lg-7">
                <h1 class="o-font-md font-weight-bold">{{$post->name}}</h1>
                دسته بندی پست:<span class="text-muted d-block mb-2"> {{$post->category->name}}</span>
                <strong>قیمت محصول: </strong><span class="d-block text-success">25,000 تومان</span>
            </div>
        </div>
        <hr>
        <article class="o-font-sm text-dark text-justify">
            <p>{!!$post->content !!}</p>
            <hr>
            <h5 class="mb-3">کامنت ها</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        @foreach($post->comments as $comment)
                            @if($comment->status==1)
                            <table style="border: black solid medium">
                                <tbody>
                                <label for="inputName4">نام کاربری</label>
                                <p>{{$comment->user->name}}</p>
                                <label>متن کامنت</label>
                                <p>{!!$comment->content!!}</p>
                                </tbody>
                            </table>
                            @endif
                            <br><br>
                        @endforeach
                    </div>

{{--                </div>--}}
{{--                <div class="form-row">--}}
{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="inputPhone4">شماره همراه</label>--}}
{{--                        <input type="text" class="form-control" id="inputPhone4">--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-md-6">--}}
{{--                        <label for="inputEmail4">ایمیل</label>--}}
{{--                        <input type="email" class="form-control" id="inputEmail4">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-primary">ثبت سفارش</button>--}}
        </article>
    </div>
@endsection
