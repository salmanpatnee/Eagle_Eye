<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NcaCccProviderController extends Controller
{
    // 2.Controller - SHOW DATA INTO THE LIST

    public function index() {
        $data = DB::table('control_master_table')
        ->join('audit_findings_table', 'control_master_table.category_name', '=', 'audit_findings_table.control_name')
        ->where('best_practices_name', 'NCA-CCC')
        ->get();
    
        return view('resources/views/4-Process/18-Reporting/1-RegulatoryReporting/5-NcaCccProviders.blade.php', ['data' => $data]);
    }
}