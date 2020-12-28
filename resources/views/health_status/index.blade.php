@extends('layouts.app')

@section('content')
    <h1 class="text-4xl mb-8">{{ __('health_status.index.title') }}</h1>

    <div class="lg:grid lg:grid-cols-2 lg:gap-4">
        <?php $i = 0; ?>
        @foreach ($servers as $name => $serverInfo)
            <div class="rounded overflow-hidden shadow-lg border border-gray-200 bg-white px-6 py-4 mb-4 lg:mb-0 {{ ($i === 0 ? 'col-span-2' : '') }}">
                <h2 class="text-3xl mb-6">{{ $name }}</h2>

                <div>
                    <div>
                        <div class="mb-2 text-gray-700">
                            {{ __('health_status.index.check_performed_at') }}
                            {{ $serverInfo->check_performed_at }}
                        </div>

                        <div class="mb-2 text-gray-700">
                            {{ __('health_status.index.ping') }}: {{ $serverInfo->ping }}ms
                        </div>

                        <div class="divide-y divide-gray-100 divide-solid">
                            <div class="flex justify-between py-2">
                                <div>{{ __('health_status.index.database') }}</div>
                                <div class="h-4 w-4">@include('shared._status', ['status' => $serverInfo->database])</div>
                            </div>

                            <div class="flex justify-between border-b border-gray-100 items-center">
                                <div class="py-2">{{ __('health_status.index.cache') }}</div>
                                <div class="h-4 w-4">@include('shared._status', ['status' => $serverInfo->redis])</div>
                            </div>

                            @if ($serverInfo->teamspeak_server)
                                @foreach ($serverInfo->teamspeak_server as $name => $teamspeakServerStatus)
                                    <div class="flex justify-between border-b border-gray-100 items-center">
                                        <div class="py-2">{{ __('health_status.index.teamspeak_server', ['name' => $name]) }}</div>
                                        <div class="h-4 w-4">@include('shared._status', ['status' => $teamspeakServerStatus])</div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="mt-8">
                        <button
                            type="button"
                            class="flex justify-between items-center w-full mb-4 text-left hover:bg-blue-500 text-blue-700 hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded outline-none focus:shadow-outline transition-bg duration-200"
                            data-hc-control="{{ \Illuminate\Support\Str::slug($name) }}-websites"
                        >
                            <span>{{ __('health_status.index.websites') }}</span>
                            <span class="h-4 w-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-143.6-28.9L288 302.6V120c0-13.3-10.7-24-24-24h-16c-13.3 0-24 10.7-24 24v182.6l-72.4-75.5c-9.3-9.7-24.8-9.9-34.3-.4l-10.9 11c-9.4 9.4-9.4 24.6 0 33.9L239 404.3c9.4 9.4 24.6 9.4 33.9 0l132.7-132.7c9.4-9.4 9.4-24.6 0-33.9l-10.9-11c-9.5-9.5-25-9.3-34.3.4z"></path>
                                </svg>
                            </span>
                        </button>

                        <div data-hc-content="{{ \Illuminate\Support\Str::slug($name) }}-websites" class="divide-y divide-gray-100 divide-solid">
                            @foreach ($serverInfo->websites as $url => $websiteStatus)
                                <div class="flex justify-between py-2">
                                    <div>{{ $url }}</div>
                                    <div class="pt-1 h-4 w-4">@include('shared._status', ['status' => $websiteStatus])</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <?php $i++; ?>
        @endforeach
    </div>
@endsection
