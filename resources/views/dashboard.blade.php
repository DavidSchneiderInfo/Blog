@extends('layouts.default')

@section('content')
    <h1>{{ __('Dashboard') }}</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
@endsection
