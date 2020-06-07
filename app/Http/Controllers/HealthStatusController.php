<?php

namespace App\Http\Controllers;

use App\Server;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class HealthStatusController extends Controller
{
    public function index()
    {
        $servers = Server::all();
        $servers = $servers->mapWithKeys(function (Server $server) {
            $start = Carbon::now();
            $serverInfo = Http::get($server->url)->object();
            $end = Carbon::now();

            $serverInfo->ping = $end->diffInMilliseconds($start);

            return [$server->name => $serverInfo];
        });

        return view('health_status.index', compact('servers'));
    }
}
