<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    @include('layouts._header')
</head>
<body class="d-flex h-100 text-center text-bg-dark">

    <div id="app" class="cover-container d-flex w-100 h-100 mx-auto flex-column">
        <header class="mb-auto">
            @include('layouts._navbar')
        </header>

        <main class="px-3">
            @yield('content')
        </main>

        @include('layouts._footer')
    </div>
    @include('layouts._footer_script')
</body>
</html>
