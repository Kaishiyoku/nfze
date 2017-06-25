<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Libraries\Helper;

$app->get('/', function () use ($app) {
    $carbonNotesIsRunning = Helper::ping('https://carbon-notes.de');
    $sternenflottenDivisionIsRunning = Helper::ping('https://sternenflotten-division.net');
    $networkGamingClanIsRunning = Helper::ping('https://network-gaming-clan.de');
    $asphyxiatedDreamsIsRunning = Helper::ping('https://asphyxiated-dreams.de');
    $lastEscapeIsRunning = Helper::ping('https://last-escape.net');
    $wallabagIsRunning = Helper::ping('https://wallabag.andreas-wiedel.de');
    $rssIsRunning = Helper::ping('https://rss.andreas-wiedel.de');
    $monicaIsRunning = Helper::ping('https://monica.andreas-wiedel.de');
    $isSeafileRunning = Helper::ping('https://seafile.andreas-wiedel.de');
    $isTeamspeak3Running = Helper::teamspeakPing('network-gaming-clan.de');

    return view('home.index', [
        'carbonNotesIsRunning' => $carbonNotesIsRunning,
        'sternenflottenDivisionIsRunning' => $sternenflottenDivisionIsRunning,
        'networkGamingClanIsRunning' => $networkGamingClanIsRunning,
        'asphyxiatedDreamsIsRunning' => $asphyxiatedDreamsIsRunning,
        'lastEscapeIsRunning' => $lastEscapeIsRunning,
        'wallabagIsRunning' => $wallabagIsRunning,
        'rssIsRunning' => $rssIsRunning,
        'monicaIsRunning' => $monicaIsRunning,
        'isSeafileRunning' => $isSeafileRunning,
        'isTeamspeak3Running' => $isTeamspeak3Running
    ]);
});
