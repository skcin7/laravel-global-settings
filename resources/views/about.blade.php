@extends('global_settings::layout')

@section('pageContent')
    <h1>About Laravel Global Settings</h1>

    <p>Persistent Global Settings for use throughout a Laravel application.</p>

    <ul class="list-unstyled">
        @foreach(GlobalSettings::info() as $key => $global_setting_info)
            <li><strong>{{ $key }}:</strong> {{ $global_setting_info }}</li>
        @endforeach
    </ul>

    <p>For more information, go to <a class="hover_up" href="{{ route(Config::get('global_settings.routes.name_prefix', '') . "github") }}" target="_blank">GitHub</a>.</p>
@endsection
