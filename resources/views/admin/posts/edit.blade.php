@extends('admin.layouts.dashboard')
@section('title')
    ویرایش پست
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ویرایش پست</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.post.update',$post->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">عنوان پست</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$post->name}}" placeholder="عنوان پست را وارد کنید">
                    </div>
                    @error('name')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">slug</label>
                        <input type="text" name="slug" class="form-control" id="exampleInputPassword1" value="{{$post->slug}}" placeholder="توضیحات کوتاه را وارد کنید">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">توضیحات </label>
                        <textarea name="body" class="form-control" id="exampleInputPassword1"  placeholder="توضیحات را وارد کنید">{!!$post->content!!}</textarea>
                    </div>
                    @error('content')
                    {{$message}}
                    @enderror
                    <label>عنوان دسته بندی</label>
                    <select name="category_id" class="form-control" id="category">
                        <option>{{$post->category->name}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                @error('categories')
                {{$message}}
                @enderror
                <!-- /.card-body -->
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
        CKEDITOR.replace('body',)
    </script>
@endsection
