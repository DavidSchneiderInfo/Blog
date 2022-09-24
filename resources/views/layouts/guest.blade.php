<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
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
<body class="d-flex h-100 text-center text-bg-dark">

    <div id="app" class="cover-container d-flex w-100 h-100 mx-auto flex-column">
        <header class="mb-auto">
            @include('layouts._navbar')
        </header>

        <main class="px-3 text-white">
            @yield('content')
        </main>

        <footer class="mt-auto text-white-50">
            <p>&copy; David Schneider {{ date('Y') }}.</p>
        </footer>
    </div>

</body>
</html>
