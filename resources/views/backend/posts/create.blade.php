@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}</div>

                    <div class="card-body">

                        <form action="{{ route('backend.posts.store') }}" method="POST">
                            @csrf
                            @include('backend.posts._form')
                            <button class="btn btn-primary">{{ __('Create Post') }}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
