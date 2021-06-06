@extends('layouts.app')

@section('content')
    <h1 class="text-4xl mb-16">{{ __('health_status.index.title') }}</h1>

    <div class="lg:grid lg:grid-cols-2 lg:gap-4">
        @php $i = 0 @endphp

        @foreach ($servers as $name => $serverInfo)
            <div class="rounded-lg overflow-hidden shadow-lg border border-gray-200 bg-white px-6 py-4 mb-4 lg:mb-0 {{ ($i === 0 ? 'col-span-2' : '') }}">
                <h2 class="text-3xl mb-6">{{ $name }}</h2>

                @if ($serverInfo === null)
                    <div class="text-red-700">{{ __('health_status.index.server_not_reachable') }}</div>
                @else
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
                                class="group flex justify-between items-center mb-4 text-left text-blue-600 py-2 px-4 shadow-md border border-blue-300 rounded-full transition-all duration-200 focus:ring-4 focus:ring-offset-0 focus:ring-blue-200 hover:bg-blue-500 hover:text-white hover:border-transparent focus:outline-none"
                                data-hc-control="{{ \Illuminate\Support\Str::slug($name) }}-websites"
                            >
                                <span>{{ __('health_status.index.websites') }}</span>
                                <span class="ml-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
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
                @endif
            </div>

            @php $i++ @endphp
        @endforeach
    </div>
@endsection
