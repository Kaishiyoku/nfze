<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', Helper::getInformationForApplications());
    }
}