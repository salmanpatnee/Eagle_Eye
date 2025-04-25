<?php

namespace App\Http\Controllers;

use App\Models\ControlMaster;
use App\Models\Owner;
use App\Models\Risk;
use Illuminate\Support\Facades\DB;
use App\Models\RiskAssessmentDashboardModel;

class RCDBController extends Controller
{
    private function _getOwnerRisksCount(string $ownerId = null)
    {
        $recentRiskAssessment = DB::table('risk_assessment_details_table as rd')
            ->select('rd.risk_id', 'rd.implementation_status', 'rd.id')
            ->whereIn('rd.id', function ($query) {
                $query->select(DB::raw('MAX(rd2.id)'))
                    ->from('risk_assessment_details_table as rd2')
                    ->groupBy('rd2.risk_id');
            });

        $ownerRisksGraph = DB::table('owner_table as o')
            ->join('risk_master_table as r', 'r.owner_id', '=', 'o.owner_role_id')
            ->joinSub($recentRiskAssessment, 'recentRiskAssessment', function ($join) {
                $join->on('recentRiskAssessment.risk_id', '=', 'r.risk_id');
            })
            ->select(
                'o.owner_role_id as owner_id',
                'o.owner_name',
                DB::raw('COUNT(r.risk_id) as risk_count'),
                DB::raw('SUM(CASE WHEN recentRiskAssessment.implementation_status = "Open" THEN 1 ELSE 0 END) as open_count'),
                DB::raw('SUM(CASE WHEN recentRiskAssessment.implementation_status = "Close" THEN 1 ELSE 0 END) as close_count')
            )
            ->when($ownerId, function ($query, $owner_id) {
                return $query->where('o.owner_role_id', $owner_id);
            })
            ->groupBy('o.owner_role_id', 'o.owner_name')
            ->get();

        return $ownerRisksGraph;
    }

    public function index()
    {
        $ownerRisksGraph = $this->_getOwnerRisksCount();

        return view('4-Process/18-Reporting/3-Dashboard/5-RiskComplianceDashboard', compact('ownerRisksGraph'));
    }

    public function show(Owner $owner)
    {
        $statusCode = request('status');
        $status = null;
        $ownerId = $owner->owner_role_id;

        switch ($statusCode) {
            case '1':
                $status = 'Open';
                break;
            case '2':
                $status = 'Close';
                break;
        }

        $ownerRisksGraph = $this->_getOwnerRisksCount($ownerId);

        $riskDetails = DB::table('owner_table as o')
            ->join('risk_master_table as r', 'r.owner_id', '=', 'o.owner_role_id')
            ->join('risk_assessment_details_table as rd', 'rd.risk_id', '=', 'r.risk_id')
            ->join('risk_master_table_vs_custodian_role_table as rvc', 'rvc.risk_id', '=', 'r.risk_id')
            ->join('custodian_name_table as c', 'c.custodian_role_id', '=', 'rvc.custodian_id')
            ->select(
                'r.risk_id',
                'rd.risk_assessment_id',
                'rd.implementation_status as status',
                'o.owner_id',
                'o.owner_name',
                DB::raw('GROUP_CONCAT(CONCAT("<a href=\'/custodian-table/", c.custodian_name_id, "\' >",c.custodian_name_name, "</a>") SEPARATOR "<br>") as custodians')
            )
            ->whereIn('rd.id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('risk_assessment_details_table')
                    ->whereColumn('risk_id', 'r.risk_id');
            })
            ->where('o.owner_role_id', $ownerId)
            ->groupBy(
                'r.risk_id',
                'rd.risk_assessment_id',
                'rd.implementation_status',
                'o.owner_id',
                'o.owner_name'
            )
            ->get();


        if (request()->wantsJson()) {
            return response()->json($riskDetails);
        }

        return view('4-Process/18-Reporting/3-Dashboard/5-RiskOwnerDashboard', compact('ownerRisksGraph', 'riskDetails', 'ownerId'));
    }

    public function riskControls(Risk $risk)
    {
        $statusCode = request('status');
        $status = null;

        switch ($statusCode) {
            case '1':
                $status = 'Implemented';
                break;
            case '2':
                $status = 'Not Implemented';
                break;
            case '3':
                $status = 'Partially Implemented';
                break;
            case '4':
                $status = 'Not Applicable';
                break;
        }

        $riskId = $risk->risk_id;
        $riskName = "{$risk->risk_id} {$risk->risk_name}";

        $controlCounts = DB::table('control_master_table as c')
            ->join('risk_vs_control_table as rvc', 'rvc.control_id', '=', 'c.control_id')
            ->join('risk_master_table as r', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('control_assessment_details_table as cad', 'cad.control_id', '=', 'c.control_id')
            ->join('owner_table as o', 'o.owner_role_id', '=', 'c.owner_id')
            ->leftJoin('control_master_table_vs_custodian_role_table as cvc', 'cvc.control_id', '=', 'c.control_id')
            ->leftJoin('custodian_name_table as cn', 'cn.custodian_role_id', '=', 'cvc.custodian_id')
            ->where('r.risk_id', $risk->risk_id)
            ->whereIn('cad.id', function ($query) {
                $query->select(DB::raw('MAX(inner_cad.id)'))
                    ->from('control_assessment_details_table as inner_cad')
                    ->whereColumn('inner_cad.control_id', 'cad.control_id');
            })
            ->selectRaw('
                COUNT(c.control_id) AS total_controls,
                COUNT(CASE WHEN cad.control_implementation_status = "Implemented" THEN 1 END) AS implemented_count,
                COUNT(CASE WHEN cad.control_implementation_status = "Not Implemented" THEN 1 END) AS not_implemented_count,
                COUNT(CASE WHEN cad.control_implementation_status = "Partially Implemented" THEN 1 END) AS partially_implemented_count,
                COUNT(CASE WHEN cad.control_implementation_status = "Not Applicable" THEN 1 END) AS not_applicable_count
            ')
            ->first();

        
            $controlDetails = ControlMaster::select(
            'control_master_table.control_id',
            'cad.control_assessment_id',
            'cad.control_implementation_status',
            'o.owner_name',
            'o.owner_id',
            DB::raw('GROUP_CONCAT(CONCAT("<a href=\'/custodian-table/", cn.custodian_name_id, "\' >", cn.custodian_name_name, "</a>") SEPARATOR "<br>") as custodians'),
            DB::raw('(SELECT GROUP_CONCAT(CONCAT("<a href=\'/storage/files/", f.path, "\' >", "View Attachments", "</a>") SEPARATOR "<br>")
                          FROM evidence_vs_control_table AS evc
                          JOIN evidence_table AS e ON e.evidence_id = evc.evidence_id
                          JOIN evidence_vs_artifact_table AS eva ON eva.evidence_id = e.evidence_id
                          JOIN artifact_table AS a ON a.artifact_id = eva.artifact_id
                          JOIN artifact_attachments AS f ON a.id = f.artifact_id
                          WHERE evc.control_id = control_master_table.control_id) as evidence')
        )
            ->join('risk_vs_control_table as rvc', 'rvc.control_id', '=', 'control_master_table.control_id')
            ->join('risk_master_table as r', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('control_assessment_details_table as cad', function ($join) {
                $join->on('cad.control_id', '=', 'control_master_table.control_id')
                    ->whereIn('cad.id', function ($query) {
                        $query->select(DB::raw('MAX(id)'))
                            ->from('control_assessment_details_table as inner_cad')
                            ->whereColumn('inner_cad.control_id', 'cad.control_id');
                    });
            })
            ->join('owner_table as o', 'o.owner_role_id', '=', 'control_master_table.owner_id')
            ->leftJoin('control_master_table_vs_custodian_role_table as cvc', 'cvc.control_id', '=', 'control_master_table.control_id')
            ->leftJoin('custodian_name_table as cn', 'cn.custodian_role_id', '=', 'cvc.custodian_id')
            ->where('r.risk_id', 'RSK-001')
            ->when($status, function ($query, $status) {
                return $query->whereRaw('COALESCE(cad.control_implementation_status, "Not Implemented") = ?', [$status]);
            })
            ->groupBy(
                'control_master_table.control_id',
                'cad.control_implementation_status',
                'cad.control_assessment_id',
                'o.owner_id',
                'o.owner_name'
            )
            ->get();


        if (request()->wantsJson()) {
            return response()->json($controlDetails);
        }
        return view('4-Process/18-Reporting/3-Dashboard/5-RiskControlDashboard', compact('riskId', 'riskName', 'controlCounts', 'controlDetails'));
    }
}
