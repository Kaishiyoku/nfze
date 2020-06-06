@extends('layouts.app')

@section('content')
    <h1 class="mb-5">Server status</h1>

    @foreach ($servers as $name => $serverInfo)
        <h2 class="mt-5">{{ $name }}</h2>

        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <div>Check performed at</div>
                    <div>{{ $serverInfo->check_performed_at }}</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Database</div>
                    <div>@include('shared._status', ['status' => $serverInfo->database])</div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <div>Cache</div>
                    <div>@include('shared._status', ['status' => $serverInfo->redis])</div>
                </li>
            </ul>
        </div>

        <div class="card mt-4">
            <ul class="list-group list-group-flush">
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
