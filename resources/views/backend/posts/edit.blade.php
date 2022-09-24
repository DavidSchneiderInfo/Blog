@extends('layouts.app')

@section('sidebar')
    @parent
    <ul>
        <li>
            <a href="{{ route('backend.posts.preview', $post) }}" target="_blank">{{ __('Preview Post') }}</a>
        </li>
        <li>
            <a href="{{ route('backend.posts.delete', $post) }}"
               onclick="event.preventDefault();
                                document.getElementById('delete-post-form').submit();">
                {{ __('Delete Post') }}
            </a>
            <form id="delete-post-form" action="{{ route('backend.posts.delete', $post) }}" method="POST" class="d-none">
                @method('DELETE')
                @csrf
            </form>
        </li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Edit Post') }}</div>

        <div class="card-body">

            <form action="{{ route('backend.posts.update', $post) }}" method="POST">
                @method('PUT')
                @csrf
                @include('backend.posts._form')
                <button class="btn btn-primary">{{ __('Save changes') }}</button>
            </form>

        </div>
    </div>
@endsection
