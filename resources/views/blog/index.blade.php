@extends('layouts.blog')

@section('content')
    <div>
        @foreach($posts as $post)
            <x-post :post="$post">
                <p>
                    {!! $post->summary !!}
                    ...
                    <a href="{{ route('blog.show', $post) }}">{{ __('Show') }}</a>
                </p>
            </x-post>

        @endforeach
    </div>
@endsection
