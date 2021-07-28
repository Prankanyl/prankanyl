<?php

namespace App\Http\Controllers;

use App\Models\SiteInformation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $site_information = SiteInformation::get();
        return view('frontend.home', compact('site_information'));
    }
}
