@extends('front.layouts.master')
@section('title')
    ایجاد پست
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">کامنت جدید</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('front.comments.store')}}" enctype="multipart/form-data">
                @csrf
                   <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control" id="exampleInputPassword1" placeholder="توضیحات کوتاه را وارد کنید">
                    <div class="form-group">
                        <label for="exampleInputPassword1">توضیحات </label>
                        <textarea name="body" class="form-control" id="exampleInputPassword1" placeholder="توضیحات را وارد کنید"></textarea>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
        <!-- /.card -->

    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content',)
    </script>
@endsection
