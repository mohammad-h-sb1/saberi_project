@extends('admin.layouts.dashboard')
@section('title')
    پروفایل
@endsection

@section('content')

        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="../../dist/img/user4-128x128.jpg"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}}</h3>

                                <p class="text-muted text-center">{{$user->email}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>phone</b> <a class="float-right">{{$user->mobile}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>نقش</b> <a class="float-right">{{$user->type}}:</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>تاریخ عضویت</b> <a class="float-right">{{$user->getJalaly()}}</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">درباره من</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fa fa-book mr-1"></i>تعداد پست ها</strong>

                                <p class="text-muted">
                                    {{count($user->posts)}}
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker mr-1"></i>تعداد کامنت ها </strong>

                                <p class="text-muted">{{count($user->posts)}}</p>

                                <hr>

                                <strong><i class="fa fa-pencil mr-1"></i>نام پست ها</strong>

                                <p class="text-muted">
                                    @foreach($user->posts as $post)
                                    <span class="badge badge-warning">{{$post->name}}</span>
                                    @endforeach
                                </p>

                                <hr>

{{--                                <strong><i class="fa fa-file-text-o mr-1"></i> یادداشت</strong>--}}

{{--                                <p class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <h3>ویرایش پروفایل</h3>
                        <form role="form" method="post" action="{{route('profile.update',$user->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$user->name}}" placeholder="عنوان پست را وارد کنید">
                                </div>
                                @error('name')
                                {{$message}}
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputPassword1">تفلن همراه</label>
                                    <input type="text" name="mobile" class="form-control" id="exampleInputPassword1" value="{{$user->mobile}}" placeholder="توضیحات کوتاه را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputPassword1" value="{{$user->email}}" placeholder="توضیحات کوتاه را وارد کنید">
                                    </textarea>
                                </div>
                                @error('content')
                                {{$message}}
                                @enderror
                            <!-- /.card-body -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script src="{{asset('/admin/plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/admin/dist/js/demo.js')}}"></script>
@endsection
