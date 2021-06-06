@extends('admin.layouts.dashboard')
@section('title')
    اضافه کردن کاربر
@endsection

@section('content')
    <div class="col-md-9">
        <h3>اضافه کردن کاربر</h3>
        <form role="form" method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="avatar__img"><img src="" class="profile-user-img img-fluid img-circle">
                <input type="file" name="profile" accept="image/*" class="profile-user-img img-fluid img-circle">
                <div class="v-dialog__container" style="display: block;"></div>
                <div class="box__camera default__avatar"></div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">نام</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="عنوان پست را وارد کنید">
                </div>
                @error('name')
                <p style="color: darkred;
                               background-color: #FEEFB3;">{{$message}}</p>
                @enderror
                <select class="select" name="type">
                    <option value="user" selected>کاربر عادی</option>
                    <option value="author">نویسنده</option>
                    <option value="admin">مدیر</option>
                </select>
                @error('type')
                <p style="color: darkred;
                               background-color: #FEEFB3;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">تفلن همراه</label>
                    <input type="text" name="mobile" class="form-control" id="exampleInputPassword1"  placeholder="توضیحات کوتاه را وارد کنید">
                </div>
                @error('mobile')
                <p style="color: darkred;
                               background-color: #FEEFB3;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="exampleInputPassword1">email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputPassword1"  placeholder="توضیحات کوتاه را وارد کنید">
                    </textarea>
                </div>
                @error('email')
                <p style="color: darkred;
                               background-color: #FEEFB3;">{{$message}}</p>
                 @enderror
            <!-- /.card-body -->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
        </form>
        <!-- /.nav-tabs-custom -->
    </div>

@endsection
