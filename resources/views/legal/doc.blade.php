@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @markdown($doc)
            </div>
        </div>
    </div>
@endsection
