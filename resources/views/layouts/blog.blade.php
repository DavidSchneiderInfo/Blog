<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    @include('layouts._header')
</head>
<body class="d-flex flex-column h-100 text-bg-dark">
@include('layouts._navbar')
<div class="container flex-shrink-0" style="margin-top: 60px;">
    <div class="row">
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
<div class="mt-auto">
    @include('layouts._footer')
</div>
@include('layouts._footer_script')
</body>
</html>
