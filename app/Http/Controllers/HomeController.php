<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', Helper::getInformationForApplicationsWithCharts());
    }

    public function about_me()
    {
        $ns2PlayerData = json_decode(Helper::getContentFromUrl('http://hive2.ns2cdt.com/api/get/playerData/12888271'), true);

        return view('home.about_me', compact('ns2PlayerData'));
    }
}