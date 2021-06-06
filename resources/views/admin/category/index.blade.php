@extends('admin.layouts.dashboard')
@section('title')
    دسته بندی ها
@endsection
@section('content')
    <form action="{{route('admin.category.create')}}">
        <button type="submit" class="btn btn-block btn-primary">دسته بندی جدید</button>
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
                <th>عنوان</th>
                <th>slug</th>
                <th>تاریخ</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->getJalaly()}}</td>
                <td>
                    <a href="{{route('admin.category.edit',$category->id)}}" class="fa fa-edit"></a>
                    <a href="{{route('admin.category.delete',$category->id)}}" onclick="return confirm('Do you sure?');" class="fa fa-times" style="color: red;"></a>
                </td>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection()
