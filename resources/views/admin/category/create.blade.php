@extends('admin.layouts.dashboard')
@section('title')
    درست کردن دسته بندی
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">دسته بندی جدید</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="{{route('admin.category.store')}}">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">عنوان دسته بندی</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="عنوان پست را وارد کنید">
                    </div>
                    @error('name')
                    <p class="error-content">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">slug مورد نظر</label>
                        <input type="text" name="slug" class="form-control" id="exampleInputPassword1" placeholder="توضیحات کوتاه را وارد کنید">
                    </div>
                </div>
                @error('slug')
                <p class="error-content">{{$message}}</p>
                @enderror
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
