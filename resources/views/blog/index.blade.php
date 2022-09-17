@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ __('Blog') }}</h1>

                @foreach($posts as $post)
                <h2>{{ $post->title }}</h2>
                @endforeach

            </div>
        </div>
    </div>
@endsection
