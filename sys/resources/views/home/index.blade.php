@extends('app')

@section('content')
    <h2>Projects</h2>

    <div class="card-deck p-t-25 p-b-30">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    Carbon Notes

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://carbon-notes.de'])
                    </div>
                </h4>
                <p>Simple note taking with many features.</p>
                <a href="https://www.carbon-notes.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    1. Sternenflotten Division

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://sternenflotten-division.net'])
                    </div>
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
                    Network Gaming Clan

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://network-gaming-clan.de'])
                    </div>
                </h4>
                <p>Clansite.</p>
                <a href="https://www.network-gaming-clan.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    Asphyxiated Dreams

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://asphyxiated-dreams.de'])
                    </div>
                </h4>
                <p>Page of my former band.</p>
                <a href="https://www.asphyxiated-dreams.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    Last Escape

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://last-escape.net'])
                    </div>
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
                    Wallabag

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://wallabag.andreas-wiedel.de'])
                    </div>
                </h4>
                <p>Read it later app.</p>
                <a href="https://wallabag.andreas-wiedel.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    Fresh RSS

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://rss.andreas-wiedel.de'])
                    </div>
                </h4>
                <p>RSS aggregator.</p>
                <a href="https://rss.andreas-wiedel.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">
                    Monica

                    <div class="pull-right">
                        @include('shared.pingtest', ['url' => 'https://monica.andreas-wiedel.de'])
                    </div>
                </h4>
                <p>Personal CRM app.</p>
                <a href="https://monica.andreas-wiedel.de" class="btn btn-primary">Visit site</a>
            </div>
        </div>
    </div>
@endsection