<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HealthStatusController extends Controller
{
    public function index()
    {
        $servers = Server::all();
        $servers = $servers->mapWithKeys(function (Server $server) {
            $serverInfo = json_decode(Http::get($server->url)->body());

            return [$server->name => $serverInfo];
        });

        return view('health_status.index', compact('servers'));
    }
}
