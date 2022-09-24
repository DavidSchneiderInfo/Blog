@extends('layouts.app', ['title' => __('Post List')])

@section('sidebar')
    @parent
    <x-widgets.text :title="__('Manage Post')">
        <ul>
            <li>
                <a href="{{ route('backend.posts.create') }}">{{ __('Create Post') }}</a>
            </li>
        </ul>
    </x-widgets.text>
@endsection

@section('content')
    @if($posts->count())
        <table class="table table-striped bg-white">
            <thead class="">
                <tr>
                    <th>{{ __('Post ID') }}</th>
                    <th>{{ __('Post Title') }}</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @foreach($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('backend.posts.edit', $post) }}">
                            {{ $post->id }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.posts.edit', $post) }}">
                            {{ $post->title }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        {{ __('No posts found.') }}
    @endif
@endsection
