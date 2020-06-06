@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('health_status.index.title') }}</h1>

    @foreach ($servers as $name => $serverInfo)
        <h2 class="mt-5">{{ $name }}</h2>

        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <div>{{ __('health_status.index.check_performed_at') }}</div>
                    <div>{{ $serverInfo->check_performed_at }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>{{ __('health_status.index.database') }}</div>
                    <div>@include('shared._status', ['status' => $serverInfo->database])</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>{{ __('health_status.index.cache') }}</div>
                    <div>@include('shared._status', ['status' => $serverInfo->redis])</div>
                </li>
            </ul>
        </div>

        <div class="card mt-4">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{ Str::slug($name) }}-websites" aria-expanded="true" aria-controls="{{ Str::slug($name) }}-websites">
                        {{ __('health_status.index.websites') }}
                    </button>
                </h2>
            </div>
            <ul class="list-group list-group-flush collapse" id="{{ Str::slug($name) }}-websites">
                @foreach ($serverInfo->websites as $url => $websiteStatus)
                    <li class="list-group-item d-flex justify-content-between">
                        <div>{{ $url }}</div>
                        <div>@include('shared._status', ['status' => $websiteStatus])</div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection
