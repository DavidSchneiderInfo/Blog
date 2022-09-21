@extends('layouts.default')

@section('content')
    <h2>{{ __('Dashboard') }}</h2>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
@endsection
