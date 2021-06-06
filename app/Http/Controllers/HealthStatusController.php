<?php

namespace App\Http\Controllers;

use App\Server;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class HealthStatusController extends Controller
{
    public function index()
    {
        $servers = Server::all();
        $servers = $servers->mapWithKeys(function (Server $server) {
            $start = Carbon::now();

            try {
                $serverInfo = Http::get($server->url)->object();

                $end = Carbon::now();

                $serverInfo->ping = $end->diffInMilliseconds($start);
            } catch (Exception $e) {
                $serverInfo = null;
            }

            return [$server->name => $serverInfo];
        });

        return view('health_status.index', compact('servers'));
    }
}
