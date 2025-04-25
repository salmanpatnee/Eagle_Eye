<?php

namespace App\Http\Controllers;

use App\Models\ControlMaster;
use App\Models\Risk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskTreatmentTableController extends Controller
{


    public function index(Request $request)
    {
        $riskId = $request->input('risk') ?? null;
        $controlId = $request->input('control') ?? null;

       $controls = ControlMaster::join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')
            ->orderControls()
            ->pluck('control_master_table.control_id');

        $risks = Risk::select('risk_id', 'risk_name')
            ->get();

            $riskTreatments = Risk::whereHas('controls', function ($query) use ($controlId) {
                if ($controlId) {
                    $query->where('risk_vs_control_table.control_id', $controlId);
                }
            })
            ->with(['controls' => function ($query) use ($controlId) {
                if ($controlId) {
                    $query->where('risk_vs_control_table.control_id', $controlId);
                }
            }])
            ->when($riskId, function ($query, $riskId) {
                $query->where('risk_master_table.risk_id', $riskId);
            })
            ->get();
        

        return view('4-Process/7-Risk/7-RiskTreatmentTable', compact('riskTreatments', 'controls', 'risks'));
    }

    public function controlVsRisk(Request $request)
    {
        $riskId = $request->input('risk') ?? null;
        $controlId = $request->input('control') ?? null;

        $controls = ControlMaster::join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')
            ->orderControls()
            ->pluck('control_master_table.control_id');

        $risks = Risk::select('risk_id', 'risk_name')
            ->get();

            $riskTreatments = ControlMaster::whereHas('risks', function ($query) use ($riskId) {
                if ($riskId) {
                    $query->where('risk_master_table.risk_id', $riskId);
                }
            })
            ->with(['risks' => function ($query) use ($riskId) {
                if ($riskId) {
                    $query->where('risk_master_table.risk_id', $riskId);
                }
            }])
            ->when($controlId, function ($query, $controlId) {
                $query->where('control_master_table.control_id', $controlId);
            })
            ->get();

        

        return view('4-Process/7-Risk/control-risk', compact('riskTreatments', 'controls', 'risks'));
    }
}
