<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthStatusController extends Controller
{
    public function index()
    {
        return view('health_status.index');
    }
}
