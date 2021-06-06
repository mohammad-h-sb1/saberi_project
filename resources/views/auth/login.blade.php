@extends('layouts.guest')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>ورود به سایت</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">فرم زیر را تکمیل کنید و ورود بزنید</p>

            <form action="{{route('store.login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="ایمیل">
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
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> یاد آوری من
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mb-1">
                <a href="#">رمز عبورم را فراموش کرده ام.</a>
            </p>
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center">ثبت نام</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
