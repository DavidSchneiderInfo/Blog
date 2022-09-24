<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts._header')
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
    @include('layouts._footer')
</body>
</html>
