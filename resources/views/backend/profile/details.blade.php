@extends('layouts.app')

@section('sidebar')
    @parent
    <x-widgets.text :title="__('Manage Profile')">
        <p>{{ __('This is where you manage your profile.') }}</p>
    </x-widgets.text>

    <div class="d-grid gap-2">
        <button type="button"
                class="btn btn-primary"
                onclick="event.preventDefault();document.getElementById('profile-export-form').submit();"
            >
            {{ __('Export profile') }}
        </button>
        <button type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#importDataModal"
            >
            {{ __('Import profile') }}
        </button>
    </div>

    <form id="profile-export-form" action="{{ route('backend.profile.export') }}" method="POST" class="d-none">
        @csrf
    </form>

    <div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="importDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importDataModalLabel">{{ __('Import profile') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>
                <form action="{{ route('backend.profile.import') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Start import') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul>
                            <li>
                                {{ __('Name') }}: {{ $user->name }}
                            </li>
                            <li>
                                {{ __('Email') }}: {{ $user->email }}
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
