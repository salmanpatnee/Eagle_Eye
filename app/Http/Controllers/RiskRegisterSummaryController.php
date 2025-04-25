<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskRegisterSummaryController extends Controller
{
    public function riskregsumry ()
    {
        
    $riskregsumry = DB::table('risk_master_table as rm')
    // ->join('risk_inherent_table as rit', 'risk_inherent_id.rm', '=', 'risk_inherent_id.rit')
    ->join('risk_vs_control_table as rvc', 'risk_id.rm', '=', 'risk_id.rvc')
    ->join('control_master_table as cmt', 'control_id.rvc', '=', 'control_id.cmt')
    ->join('control_assessment_detail_vs_control_master_table as avcm', 'control_id.cmt', '=', 'control_id.avcm')
    ->join('control_assessment_details_table as cat', 'control_finding_id.cat', '=', 'control_assessment_finding_id.avcm')
    ->join('risk_assessment_details_table as rat', 'risk_id.rat', '=', 'risk_id.rm')

    ->get();
        
        return view('4-Process/18-Reporting/2-MISReporting/16-RiskRegisterSummaryReport', ['riskregsumry' => $riskregsumry]);
    }
}