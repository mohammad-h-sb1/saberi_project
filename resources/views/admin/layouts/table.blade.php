@extends('admin.layouts.dashboard')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعداد اعضا(users)</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام</th>
                            <th>نقش کاربری</th>
                            <th>شماره تماس</th>
                            <th>ایمیل</th>
                            <th>تاریخ عضویت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->type}}</td>
                            <td>{{$user->mobile}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->getJalaly()}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
