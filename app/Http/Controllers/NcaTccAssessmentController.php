<?php

namespace App\Http\Controllers;

use App\Models\ControlMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NcaTccAssessmentController extends Controller
{
    // 2.Controller - SHOW DATA INTO THE LIST

    public function index()
    {

        $data = DB::table('control_master_table as master')
            ->leftJoin('control_assessment_details_table as details',  'master.control_id', '=', 'details.control_id')
            ->where('details.id', '!=', null)->where('master.best_practices_name', 'NCA-TCC')
            ->get();


        // return view('4-Process/18-Reporting/1-RegulatoryReporting/3-NcaCsccAssessmentReport', ['data' => $data]);

        // $data = DB::table('control_master_table')
        //     ->join('audit_findings_table', 'control_master_table.category_name', '=', 'audit_findings_table.control_name')
        //     ->where('best_practices_name', 'NCA-TCC')
        //     ->get();

        return view('4-Process/18-Reporting/1-RegulatoryReporting/6-NcaTccAssessmentReport', ['data' => $data]);
    }

    public function show(string $control_id)
    {
        $control = ControlMaster::where('control_id', $control_id)->first();

        $report = DB::table('control_master_table as master')
            ->leftJoin('control_assessment_details_table as details',  'master.control_id', '=', 'details.control_id')
            ->where('master.id', '=', $control->id)
            ->get();

        return view('4-Process/18-Reporting/1-RegulatoryReporting/1-NcaEccAssessmentReportShow', [
            'report' => $report[0]
        ]);
    }
}
