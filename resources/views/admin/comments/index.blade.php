@extends('admin.layouts.dashboard')
@section('title')
    کامنت ها
@endsection
@section('content')
    <form action="{{route('admin.category.create')}}">
        <button type="submit" class="btn btn-block btn-primary">دسته بندی جدید</button>
    </form>
    <br><br>
    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">کامنت ها</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="posts_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>کاربر</th>
                    <th>id پست</th>
                    <th>متن</th>
                    <th>تاریخ</th>
                    <th>عملیات</th>
                    <th>وضعیت</th>
                </tr>
                </thead>
                <tbody>

                @foreach($comments as $comment)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->post->id}}</td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->getJalaly()}}</td>
                        <td>
{{--                            <a href="{{route('admin.category.edit',$category->id)}}" class="fa fa-edit"></a>--}}
                            <a href="{{route('admin.comment.delete',$comment->id)}}" onclick="return confirm('Do you sure?');" class="fa fa-times" style="color: red;"></a>
                            @if($comment->status)
                                <a href="{{route('admin.comment.status',$comment->id)}}" class="btn btn-block btn-danger">غیر فعال</a>
                            @else
                                <a href="{{route('admin.comment.status',$comment->id)}}" class="btn btn-block btn-primary">فعال</a>
                            @endif
                        </td>
                        <td>
                            {{$comment->status ? 'فعال' : 'غیر فعال'}}
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection()
