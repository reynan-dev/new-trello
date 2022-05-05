<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/be8a57ad27.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    @include('layouts.navbar')

    <div id="app" class="bg-image" style="background-image: url('https://www.codeur.com/tuto/wp-content/uploads/2022/01/pexels-roberto-nickson-2559941-1.jpg'); height: 87vh; width:100%; display: flex; align-items: center; justify-content: center;">


        <main class="py-4" style="width:60%;">
            @yield('content')
        </main>
    </div>
    
    @include('layouts.footer')
    
</body>
</html>
