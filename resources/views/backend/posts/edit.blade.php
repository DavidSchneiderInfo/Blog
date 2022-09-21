@extends('layouts.app')

@section('sidebar')
    @parent

    <x-widgets.text :title="__('Manage Post')">
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
    </x-widgets.text>


    <x-widgets.text>
    <ul class="post-meta">
        @if($post->created_at->ne($post->updated_at))
            <li class="bg-secondary">
                <i class="fa-solid fa-rotate"></i>
                {{ $post->updated_at->diffForHumans() }}
            </li>
        @endif

        @if($post->published_at)
            <li class="bg-success">
                <i class="fa-solid fa-hourglass-end"></i>
                {{ $post->published_at->diffForHumans() }}
            </li>
        @else
            <li class="bg-primary">
                <i class="fa-solid fa-calendar-plus"></i>
                {{ $post->created_at->diffForHumans() }}
            </li>
        @endif
    </ul>
    </x-widgets.text>
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
