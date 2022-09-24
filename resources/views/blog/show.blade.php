@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <x-post :post="$post" />

            </div>
        </div>
    </div>
@endsection
