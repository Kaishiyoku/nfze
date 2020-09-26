@extends('layouts.app')

@section('content')
    <h1 class="text-4xl mb-8">{{ __('health_status.index.title') }}</h1>

    <div class="lg:grid lg:grid-cols-2 lg:gap-4">
        <?php $i = 0; ?>
        @foreach ($servers as $name => $server)
            <div class="rounded overflow-hidden shadow-lg border border-gray-200 bg-white px-6 py-4 mb-4 lg:mb-0 {{ ($i === 0 ? 'col-span-2' : '') }}">
                <h2 class="text-3xl mb-6">{{ $name }}</h2>

                @if ($server['type']->equals(\App\Enums\ServerType::web()))
                    @include('shared._web_status', ['serverInfo' => $server['contents']])
                @elseif ($server['type']->equals(\App\Enums\ServerType::teamspeak()))
                    @include('shared._teamspeak_status', ['contents' => $server['contents']])
                @endif
            </div>

            <?php $i++; ?>
        @endforeach
    </div>
@endsection
