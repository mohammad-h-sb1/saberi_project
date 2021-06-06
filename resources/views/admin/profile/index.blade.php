@extends('admin.layouts.dashboard')
@section('title')
    کاربرها
@endsection
@section('content')
    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">اکانت ها </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="posts_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>نقش</th>
                    <th>موبایل</th>
{{--                    <th>ایمیل</th>--}}
                    <th>تاریخ</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$user->mobile}}</td>
{{--                        <td>{{$user->email}}</td>--}}
                        <td>{{$user->getJalaly()}}</td>
                        <td>
{{--                            <a href="{{route('admin.category.delete',$category->id)}}" onclick="return confirm('Do you sure?');" class="fa fa-times" style="color: red;"></a>--}}
                            <a href="{{route('profile.activity',$user->id)}}" class="fa fa-edit"></a>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection()
