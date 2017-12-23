@extends('app')

@section('content')
    <h2>Projects</h2>

    <div class="card-deck p-t-25 p-b-30">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $carbonNotes['isRunning']])

                    <a href="https://www.carbon-notes.de">Carbon Notes</a>
                </h4>
                <p>Simple note taking with many features for free.</p>

                <div id="carbon-notes-chart">
                    @include('shared._sparkline_chart', ['selector' => '#carbon-notes-chart', 'data' => $carbonNotes['chart_data']])
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $rss['isRunning']])

                    <a href="https://crystal-rss.rocks">Crystal RSS</a>
                </h4>
                <p>RSS aggregator.</p>

                <div id="rss-chart">
                    @include('shared._sparkline_chart', ['selector' => '#rss-chart', 'data' => $rss['chart_data']])
                </div>
            </div>
        </div>
    </div>

    <div class="card-deck p-b-50">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $sternenflottenDivision['isRunning']])

                    <a href="https://www.sternenflotten-division.net">1. Sternenflotten Division</a>
                </h4>
                <p>German online Star Trek roleplay community.</p>

                <div id="sfd-chart">
                    @include('shared._sparkline_chart', ['selector' => '#sfd-chart', 'data' => $sternenflottenDivision['chart_data']])
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $strahlungswerte['isRunning']])

                    <a href="https://www.strahlungswerte.de">Strahlungswerte.de</a>
                </h4>
                <p>Local radiation dosage rate visualizer for Germany.</p>

                <div id="strahlungswerte-chart">
                    @include('shared._sparkline_chart', ['selector' => '#strahlungswerte-chart', 'data' => $strahlungswerte['chart_data']])
                </div>
            </div>
        </div>
    </div>

    <div class="card-deck p-b-50">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $networkGamingClan['isRunning']])

                    <a href="https://www.network-gaming-clan.de">Network Gaming Clan</a>
                </h4>
                <p>Clansite.</p>

                <div id="network-gaming-clan-chart">
                    @include('shared._sparkline_chart', ['selector' => '#network-gaming-clan-chart', 'data' => $networkGamingClan['chart_data']])
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $asphyxiatedDreams['isRunning']])

                    <a href="https://www.asphyxiated-dreams.de">Asphyxiated Dreams</a>
                </h4>
                <p>Page of my former band.</p>

                <div id="asphyxiated-dreams-chart">
                    @include('shared._sparkline_chart', ['selector' => '#asphyxiated-dreams-chart', 'data' => $asphyxiatedDreams['chart_data']])
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $lastEscape['isRunning']])

                    <a href="https://www.last-escape.net">Last Escape</a>
                </h4>
                <p>Former browsergame project.</p>

                <div id="last-escape-chart">
                    @include('shared._sparkline_chart', ['selector' => '#last-escape-chart', 'data' => $lastEscape['chart_data']])
                </div>
            </div>
        </div>
    </div>


    <h2>Hosted</h2>

    <div class="card-deck p-t-25">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $wallabag['isRunning']])

                    <a href="https://wallabag.andreas-wiedel.de">Wallabag</a>
                </h4>
                <p>Read it later app.</p>

                <div id="wallabag-chart">
                    @include('shared._sparkline_chart', ['selector' => '#wallabag-chart', 'data' => $wallabag['chart_data']])
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $seafile['isRunning']])

                    <a href="https://seafile.andreas-wiedel.de">Seafile</a>
                </h4>
                <p>Private cloud.</p>

                <div id="seafile-chart">
                    @include('shared._sparkline_chart', ['selector' => '#seafile-chart', 'data' => $seafile['chart_data']])
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $teamspeak3['isRunning']])

                    <a href="{{ $teamspeak3['serverInfo']['gq_joinlink'] }}">Teamspeak 3</a>
                </h4>

                <p>{{ $teamspeak3['serverInfo']['gq_hostname'] }}</p>

                <div id="teamspeak-3-chart">
                    @include('shared._sparkline_chart', ['selector' => '#teamspeak-3-chart', 'data' => $teamspeak3['chart_data']])
                </div>

                @if ($teamspeak3['isRunning'])
                    <br/>

                    <ul class="teamspeak">
                        @foreach ($teamspeak3['serverInfo']['teams'] as $team)
                            <li>
                                {{ $team['gq_name'] }}

                                <ul class="players">
                                    @foreach ($teamspeak3['serverInfo']['players'] as $player)
                                        @if ($player['gq_team'] == $team['gq_id'] && strpos($player['gq_name'], 'Unknown from') !== 0)
                                            <li>{{ $player['gq_name'] }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $minecraft['isRunning']])

                    <a href="{{ $minecraft['serverInfo']['gq_joinlink'] }}">Minecraft</a>
                </h4>

                <div id="minecraft-chart">
                    @include('shared._sparkline_chart', ['selector' => '#minecraft-chart', 'data' => $minecraft['chart_data']])
                </div>

                @if ($minecraft['isRunning'])
                    <br/>

                    <ul class="players">
                        @foreach ($minecraft['serverInfo']['players'] as $player)
                            <li>
                                {{ $player['gq_name'] }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection