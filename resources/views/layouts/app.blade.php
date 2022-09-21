<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    @include('layouts._header')
</head>
<body class="d-flex flex-column h-100 text-bg-dark">
    @include('layouts._navbar')
    <div class="container-fluid flex-shrink-0" style="margin-top: 60px;">
        @isset($title)
            <div class="row">
                <h1>{{ $title }}</h1>
            </div>
        @endif
        <div class="row">
            <div class="col-9">
                <main>
                    @yield('content')
                </main>
            </div>
            <div class="col-3">
                @include('layouts._sidebar')
            </div>
        </div>
    </div>
    <div class="mt-auto">
        @include('layouts._footer')
    </div>
    @include('layouts._footer_script')
</body>
</html>
