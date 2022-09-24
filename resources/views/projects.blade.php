@extends('layouts.default')

@section('content')
    <h2 class="mb-3">{{ __('Projects') }}</h2>
    <div class="project-list">
        <x-project-card :thumbnail="asset('img/projects/dsinfo.jpg')">
            @markdown(file_get_contents(lang_path(app()->getLocale().'/projects/davidschneiderInfo-blog.md')))
        </x-project-card>
        <x-project-card :thumbnail="asset('img/projects/dsinfo.jpg')">
            @markdown(file_get_contents(lang_path(app()->getLocale().'/projects/davidschneiderInfo-mse.md')))
        </x-project-card>
        <x-project-card :thumbnail="asset('img/projects/dsinfo.jpg')">
            @markdown(file_get_contents(lang_path(app()->getLocale().'/projects/davidschneiderInfo-devops-toolbox.md')))
        </x-project-card>
    </div>
@endsection
