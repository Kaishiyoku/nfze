{{ $contents['isRunning'] }}

<a href="{{ $contents['serverInfo']['gq_joinlink'] }}">Teamspeak 3</a>

<p>{{ $contents['serverInfo']['gq_hostname'] }}</p>

@if ($contents['isRunning'])
    <br/>

    <ul class="teamspeak">
        @foreach ($contents['serverInfo']['teams'] as $team)
            <li>
                {{ $team['gq_name'] }}

                <ul class="players">
                    @foreach ($contents['serverInfo']['players'] as $player)
                        @if ($player['gq_team'] == $team['gq_id'] && strpos($player['gq_name'], 'Unknown from') !== 0)
                            <li>{{ $player['gq_name'] }}</li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endif
