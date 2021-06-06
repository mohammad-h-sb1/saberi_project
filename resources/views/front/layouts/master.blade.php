<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />

</head>
<body>
@include('front.layouts.header')
<main class="rtl mt-3">
    <div class="d-flex justify-content-center flex-wrap">
        @yield('content')
        @yield('button')
    </div>
</main>

@include('front.layouts.footer')


<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('status'))
    <script>
        Swal.fire({title:"{{session('status')}}",confirmButtonText:'تایید',icon:'success'})
    </script>
@endif
@yield('script')
</body>
</html>
