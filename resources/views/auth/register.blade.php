@extends('layouts.guest')
@section('content')
<div class="register-box">
    <div class="register-logo">
        <b>ثبت نام در سایت</b>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">ثبت نام کاربر جدید</p>

            <form action="{{route('store.register')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="نام و نام خانوادگی">
                    <div class="input-group-append">
                        <span class="fa fa-user input-group-text"></span>
                    </div>
                </div>
                @error('name')
               <p> {{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="mobile" placeholder="تلفن همراه">
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                @error('mobile')
                <p> {{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="ایمیل">
                    <div class="input-group-append">
                        <span class="fa fa-envelope input-group-text"></span>
                    </div>
                </div>
                @error('email')
                <p> {{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="رمز عبور">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>
                @error('password')
                <p> {{$message}}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="تکرار رمز عبور">
                    <div class="input-group-append">
                        <span class="fa fa-lock input-group-text"></span>
                    </div>
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
                </div>
                    <!-- /.col -->
            </form>

            <a href="login.html" class="text-center">من قبلا ثبت نام کرده ام</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
@endsection
