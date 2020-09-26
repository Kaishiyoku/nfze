<?php

namespace App;

use App\Enums\ServerType;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'type' => ServerType::class,
    ];
}
