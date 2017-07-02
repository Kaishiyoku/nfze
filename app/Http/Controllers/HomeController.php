<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;
use App\Models\PingLog;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', Helper::getInformationForApplicationsWithCharts());
    }

    public function about()
    {
        return view('home.about');
    }
}