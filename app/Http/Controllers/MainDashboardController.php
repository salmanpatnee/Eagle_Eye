<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainDashboardController extends Controller
{
    //
    public function getRecordCount()
    {
        $assetCount = DB::table('asset_register_table')->count();
        $riskCount = DB::table('risk_assessment_details_table')->where('implementation_status', 'Open')->count();
        $closeRiskCount = DB::table('control_assessment_details_table')->where('control_implementation_status', 'Not Implemented')->count();
        $pendingRiskCount = DB::table('control_assessment_details_table')->where('control_implementation_status', 'Pending')->count();
        $averageScore = DB::table('risk_master_table')->avg('risk_inherent_score');
        $averageScore = round($averageScore); // Round the average score
        $data = DB::table('asset_register_table')
            ->select('asset_group_name', DB::raw('COUNT(*) as asset_count'))
            ->groupBy('asset_group_name')
            ->get();

        // dd($data);


        $finalData = [
            'assetCount' => $assetCount,
            'riskCount' => $riskCount,
            'closeRiskCount' => $closeRiskCount,
            'pendingRiskCount' => $pendingRiskCount,
            'averageScore' => $averageScore,
            'asset_group_name' => $data->pluck('asset_group_name')->all(),
            'asset_count' => $data->pluck('asset_count')->all()
        ];


        if(request()->ajax()){

                return response()->json($finalData);
        }
        
        return view('4-Process/18-Reporting/3-Dashboard/0-Dashboard', $finalData);


        
        
    }


    
}