<?php

namespace App\Http\Controllers;

use App\Server;
use Carbon\Carbon;
use GameQ\GameQ;
use Illuminate\Support\Facades\Http;

class HealthStatusController extends Controller
{
    public function index()
    {
        $servers = Server::all();
        $servers = $servers->mapWithKeys(function (Server $server) {
            return $this->serverMapper($server);
        });

        return view('health_status.index', compact('servers'));
    }

    private function serverMapper(Server $server)
    {
        return $this->{'map'.\Illuminate\Support\Str::ucfirst($server->type)}($server);
    }

    private function mapWeb(Server $server)
    {
        $start = Carbon::now();
        $contents = Http::get($server->url)->object();
        $end = Carbon::now();

        $contents->ping = $end->diffInMilliseconds($start);

        return [$server->name => ['type' => $server->type, 'contents' => $contents]];
    }

    private function mapTeamspeak(Server $server)
    {
        $serverAddress = $server->ip . ':' . ($server->port ?? 9987);

        $gameQ = new GameQ();
        $gameQ->addServer([
            'type' => 'teamspeak3',
            'host' => $serverAddress,
            'options' => [
                'query_port' => 10011,
            ],
        ]);

        $results = $gameQ->process();

        $contents = [
            'isRunning' => $results[$serverAddress]['gq_online'],
            'serverInfo' => $results[$serverAddress],
        ];

        return [$server->name => ['type' => $server->type, 'contents' => $contents]];
    }
}
