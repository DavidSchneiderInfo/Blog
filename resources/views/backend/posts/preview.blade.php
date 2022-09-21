@extends('layouts.blog')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Preview Post') }}</div>

                    <div class="card-body">

                        <x-post :post="$post" />

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
