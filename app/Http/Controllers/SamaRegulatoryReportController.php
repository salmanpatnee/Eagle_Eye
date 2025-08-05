<?php

namespace App\Http\Controllers;

class SamaRegulatoryReportController extends Controller
{
    public function index()
    {
        $report = [];
        return view('process/SAMAReporting/index', compact('report'));
    }
}
