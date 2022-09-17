@extends('layouts.app')

@section('sidebar')
    @parent
    <ul>
        <li>
            <a href="{{ route('backend.posts.create') }}">{{ __('Create Post') }}</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Post List') }}</div>

                    <div class="card-body">
                        @if($posts->count())
                            <ul>
                                @foreach($posts as $post)
                                <li>
                                    <a href="{{ route('backend.posts.edit', $post) }}">
                                        {{ $post->title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        @else
                            {{ __('No posts found.') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
