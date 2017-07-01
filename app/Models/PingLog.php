<?php

namespace App\Models;

use App\Models\Enums\Application;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PingLog
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $application
 * @property int $is_running
 * @property \Carbon\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PingLog whereApplication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PingLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PingLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PingLog whereIsRunning($value)
 */
class PingLog extends Model
{
    /**
     * @param string $application
     * @param int $ping
     * @param bool $isRunning
     */
    public static function saveNew($application, $ping, $isRunning)
    {
        Application::assertExists($application);

        $pingLog = new PingLog();
        $pingLog->application = $application;
        $pingLog->ping = $ping;
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