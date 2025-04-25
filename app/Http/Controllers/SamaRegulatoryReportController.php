<?php

namespace App\Http\Controllers;

class SamaRegulatoryReportController extends Controller
{
    public function index()
    {
        $report = [];
        return view('4-Process/SAMAReporting/index', compact('report'));
    }

    
}
