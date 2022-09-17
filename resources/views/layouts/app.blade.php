<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('layouts._navbar')
        <div class="container" style="margin-top: 60px;">
            <div class="row py-4">
                <div class="col-8">
                    <main>
                        @yield('content')
                    </main>
                </div>
                <div class="col-4">
                    @include('layouts._sidebar')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
