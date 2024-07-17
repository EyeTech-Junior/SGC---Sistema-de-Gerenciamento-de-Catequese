<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{URL::asset('/img/bx-church.svg')}}">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('admin.style')
</head>

<body>
@include('admin.sidebar')
        <div class="complete-main">
            @include('admin.nav')
            @yield('content')
            @include('admin.footer')
        </div>
</body>
</html>
