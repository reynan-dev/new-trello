<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trello Like</title>


    <script src="{{ asset('js/lists.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_root.css') }}">

    <script src="https://kit.fontawesome.com/be8a57ad27.js" crossorigin="anonymous"></script>

</head>
<body>
    @include('layouts.navbar')
    <section>

        @yield('lists')
        @yield('card')

    </section>

    @include('layouts.footer')
</body>
</html>