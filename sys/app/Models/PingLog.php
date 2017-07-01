<?php

namespace App\Models;

use App\Models\Enums\Application;
use Illuminate\Database\Eloquent\Model;

class PingLog extends Model
{
    /**
     * @param string $application
     * @param bool $isRunning
     */
    public static function saveNew($application, $isRunning)
    {
        Application::assertExists($application);

        $pingLog = new PingLog();
        $pingLog->application = $application;
        $pingLog->is_running = $isRunning;

        $pingLog->save();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function setUpdatedAt($value)
    {
        //
    }
}
