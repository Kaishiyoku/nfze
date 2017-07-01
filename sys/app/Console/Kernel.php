<?php

namespace App\Console;

use App\Libraries\Helper;
use App\Models\PingLog;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $applicationPings = Helper::getInformationForApplications();

            foreach ($applicationPings as $ping) {
                PingLog::saveNew($ping['application'], $ping['isRunning']);
            }
        })->everyMinute();
    }
}
