@extends('app')

@section('content')
    <h2>Projects</h2>

    <div class="card-deck p-t-25 p-b-30">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $carbonNotesIsRunning])

                    Carbon Notes
                </h4>
                <p>Simple note taking with many features.</p>
                <a href="https://www.carbon-notes.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $sternenflottenDivisionIsRunning])

                    1. Sternenflotten Division
                </h4>
                <p>Online Star Trek roleplay community.</p>
                <a href="https://www.sternenflotten-division.net" class="btn btn-primary">Visit site</a>
            </div>
        </div>
    </div>

    <div class="card-deck p-b-50">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $networkGamingClanIsRunning])

                    Network Gaming Clan
                </h4>
                <p>Clansite.</p>
                <a href="https://www.network-gaming-clan.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $asphyxiatedDreamsIsRunning])

                    Asphyxiated Dreams
                </h4>
                <p>Page of my former band.</p>
                <a href="https://www.asphyxiated-dreams.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $lastEscapeIsRunning])

                    Last Escape
                </h4>
                <p>Former browsergame project.</p>
                <a href="https://www.last-escape.net" class="btn btn-primary">Visit site</a>
            </div>
        </div>
    </div>


    <h2>Hosted</h2>

    <div class="card-deck p-t-25">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $wallabagIsRunning])

                    Wallabag
                </h4>
                <p>Read it later app.</p>
                <a href="https://wallabag.andreas-wiedel.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $rssIsRunning])

                    Fresh RSS
                </h4>
                <p>RSS aggregator.</p>
                <a href="https://rss.andreas-wiedel.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $monicaIsRunning])

                    Monica
                </h4>
                <p>Personal CRM app.</p>
                <a href="https://monica.andreas-wiedel.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>
    </div>

    <div class="card-deck p-t-25">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $isSeafileRunning])

                    Seafile
                </h4>
                <p>Private cloud.</p>
                <a href="https://seafile.andreas-wiedel.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    @include('shared.server_status', ['isRunning' => $isTeamspeak3Running])

                    Teamspeak 3
                </h4>
                <a href="ts3server://network-gaming-clan.de:9987" class="btn btn-primary">Connect</a>
            </div>
        </div>
    </div>
@endsection