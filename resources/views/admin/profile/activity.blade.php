@extends('admin.layouts.dashboard')
@section('title')
     فعالیت کاربرها
@endsection
@section('content')
    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">فعالیت های کابر {{$user->name}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="posts_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>تعداد پست ها</th>
                    <th>تعداد کامنت ها</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{count($user->posts)}}</td>
                        <td>{{count($user->comments)}}</td>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
