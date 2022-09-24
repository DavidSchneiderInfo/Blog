@extends('layouts.blog')

@section('content')
    <x-post :post="$post">
        {{ $post->content }}
    </x-post>
@endsection
