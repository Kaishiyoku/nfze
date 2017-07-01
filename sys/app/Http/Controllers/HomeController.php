<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;
use App\Models\PingLog;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json(PingLog::groupBy('application')->get());

        return view('home.index', Helper::getInformationForApplications());
    }
}
