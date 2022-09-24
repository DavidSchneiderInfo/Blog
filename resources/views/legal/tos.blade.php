@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @markdown($doc)
                <form action="{{ route('legal.tos.agree') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        {{ __('I accept these terms of service')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
