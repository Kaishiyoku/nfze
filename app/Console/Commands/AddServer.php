<?php

namespace App\Console\Commands;

use App\Enums\ServerType;
use App\Server;
use Illuminate\Console\Command;

class AddServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server-status:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a server for health status checks';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $type = $this->anticipate('Type (' . implode(', ', ServerType::toArray()) . ')', ServerType::toArray());
        $name = $this->ask('Name');
        $ip = $this->ask('Ip');
        $port = $this->ask('Port');
        $url = $this->ask('Url');

        $server = new Server();
        $server->type = $type;
        $server->name = $name;
        $server->ip = $ip;
        $server->port = $port;
        $server->url = $url;

        $server->save();

        $this->line('Server added.');
    }
}
