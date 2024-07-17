<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('admin.style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{URL::asset('/img/bx-church.svg')}}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @viteReactRefresh
</head>

<body>
    <div class="wrapper">
        @include('admin.sidebar')
        <div class="complete-main">
            <div class="main active-turmas">
                @include('admin.nav')
                <main>
                    {{ $slot }}
                </main>
            </div>
            @include('admin.footer')
        </div>
    </div>

</body>

</html>
