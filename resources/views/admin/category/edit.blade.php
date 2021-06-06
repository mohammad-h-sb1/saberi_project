@extends('admin.layouts.dashboard')
@section('title')
    ویرایش دسته بندی
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ویرایش دسته بندی</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.category.update',$category->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام دسته بندی</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="عنوان دسته بندی را وارد کنید" value="{{$category->name}}">
                    </div>
                    @error('name')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">slug</label>
                        <input type="text" name="slug" class="form-control" id="exampleInputPassword1" placeholder="توضیحات کوتاه را وارد کنید" value="{{$category->slug}}">
                    </div>
                    @error('slug')
                    {{$message}}
                    @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
        <!-- /.card -->

    </div>
@endsection
