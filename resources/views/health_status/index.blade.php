@extends('layouts.app')

@section('content')
    <h1 class="text-4xl mb-8">{{ __('health_status.index.title') }}</h1>

    <div class="grid grid-cols-2 gap-4">
        <?php $i = 0; ?>
        @foreach ($servers as $name => $serverInfo)
            <div class="rounded overflow-hidden shadow-lg border border-gray-200 bg-white px-6 py-4 {{ ($i === 0 ? 'col-span-2' : '') }}">
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

                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <div>{{ __('health_status.index.database') }}</div>
                            <div>@include('shared._status', ['status' => $serverInfo->database])</div>
                        </div>

                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <div>{{ __('health_status.index.cache') }}</div>
                            <div>@include('shared._status', ['status' => $serverInfo->redis])</div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button
                            type="button"
                            class="flex justify-between items-center w-full mb-4 text-left hover:bg-blue-500 text-blue-700 hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded outline-none focus:shadow-outline transition-bg duration-200"
                            data-hc-control="{{ \Illuminate\Support\Str::slug($name) }}-websites"
                        >
                            <span>{{ __('health_status.index.websites') }}</span>
                            <i class="fas fa-arrow-circle-down"></i>
                        </button>

                        <div data-hc-content="{{ \Illuminate\Support\Str::slug($name) }}-websites">
                            @foreach ($serverInfo->websites as $url => $websiteStatus)
                                <div class="flex justify-between py-2 border-b border-gray-200">
                                    <div>{{ $url }}</div>
                                    <div>@include('shared._status', ['status' => $websiteStatus])</div>
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
