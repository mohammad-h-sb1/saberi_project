@extends('admin.layouts.dashboard')
@section('title')
    پست ها
@endsection

@section('content')
    <form action="{{route('admin.post.create')}}">
        <button type="submit" class="btn btn-block btn-primary">پست جدید</button>
    </form>
    <br><br>
    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">دسته بندی ها</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="posts_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ردیف</th>
                    @if(auth()->user()->type === 'admin')
                    <th>نامه کاربر</th>
                    @endif
                    <th> دسته بندی ها</th>
                    <th>نام پست</th>
                    <th>slug</th>
{{--                    <th>متن</th>--}}
                    <th>تاریخ</th>
                    <th>عملیات</th>

                    <th>وضعیت</th>

                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>

                        @if(auth()->user()->type==='admin')
                        <td>{{ $post->user->name }}</td>
                        @endif
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->slug}}</td>
{{--                        <td>{{$post->content}}</td>--}}
                        <td>{{$post->getJalaly()}}</td>
                        <td>
                            <a href="{{route('admin.post.edit',$post->id)}}" class="fa fa-edit"></a>
                            <a href="{{route('admin.post.delete',$post->id)}}" onclick="return confirm('Do you sure?');" class="fa fa-times" style="color: red;"></a>
                            @if($post->status)

                                <a href="{{route('admin.post.status',$post->id)}}" class="btn btn-block btn-danger">غیر فعال</a>
                            @else
                                <a href="{{route('admin.post.status',$post->id)}}" class="btn btn-block btn-primary">فعال</a>
                            @endif

                        </td>
                        <td>
                            {{$post->status()}}
                        </td>

                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection()
