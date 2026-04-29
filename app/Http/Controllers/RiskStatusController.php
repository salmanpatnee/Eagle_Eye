<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\RiskTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;


class RiskStatusController extends Controller
{

    public function index()
    {
        // Subquery for the latest assessment of each risk
        $latestAssessments = DB::table('risk_assessment_details_table as rad1')
            ->select('rad1.*')
            ->whereRaw('rad1.id = (SELECT MAX(id) FROM risk_assessment_details_table WHERE risk_id = rad1.risk_id)');

        // Subquery for the latest control assessment details
        $latestControlAssessments = DB::table('control_assessment_details_table as cad1')
            ->select('cad1.control_id', 'cad1.control_implementation_status')
            ->whereRaw('cad1.id = (SELECT MAX(id) FROM control_assessment_details_table WHERE control_id = cad1.control_id)');

        // Main query
        $riskStatus = DB::table('risk_master_table as r')
            ->selectRaw("
                r.id as rid,
                r.risk_id,
                        CONCAT(r.risk_id, ' - ', r.risk_name) AS risk,
                o.owner_name AS risk_owner,
                COALESCE(CONCAT(ra.risk_assessment_id, ' - ', ra.risk_assessment_name), 'Not Assessed') AS risk_assessment,
                ra.risk_assessment_start_date,
                COALESCE(CONCAT(rad.risk_finding_id, ' - ', rad.risk_finding_name), 'Not Assessed') AS findings,
                rad.implementation_status,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', c.control_name) ORDER BY c.control_id SEPARATOR '<br>') AS controls,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', COALESCE(latest_cad.control_implementation_status, 'Not Implemented')) ORDER BY c.control_id SEPARATOR '<br>') AS control_status,
                GROUP_CONCAT(DISTINCT CONCAT(c.control_id, ' - ', ow.owner_name) ORDER BY c.control_id SEPARATOR '<br>') AS control_owner
            ")
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->leftJoinSub($latestAssessments, 'rad', function ($join) {
                $join->on('r.risk_id', '=', 'rad.risk_id');
            })
            ->leftJoin('risk_assessment_master_table as ra', 'rad.risk_assessment_id', '=', 'ra.risk_assessment_id')
            ->join('risk_vs_control_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('control_master_table as c', 'rvc.control_id', '=', 'c.control_id')
            ->leftJoinSub($latestControlAssessments, 'latest_cad', function ($join) {
                $join->on('c.control_id', '=', 'latest_cad.control_id');
            })
            ->join('owner_table as ow', 'c.owner_id', '=', 'ow.owner_role_id')
            ->groupBy([
                'r.id',
                'r.risk_id',
                'r.risk_name',
                'o.owner_name',
                'ra.risk_assessment_id',
                'ra.risk_assessment_name',
                'ra.risk_assessment_start_date',
                'rad.risk_finding_id',
                'rad.risk_finding_name',
                'rad.implementation_status'
            ])
            ->get();


        $risksCount = DB::table('risk_master_table as r')
            ->leftJoin(DB::raw('(
        SELECT 
            rad.risk_id,
            rad.implementation_status as latest_status
        FROM risk_assessment_details_table as rad
        INNER JOIN (
            SELECT risk_id, MAX(id) as latest_id
            FROM risk_assessment_details_table
            GROUP BY risk_id
        ) as latest
        ON rad.id = latest.latest_id
    ) as rad'), 'r.risk_id', '=', 'rad.risk_id')
            ->selectRaw('
        COUNT(DISTINCT r.risk_id) as total_risks,
        SUM(
            CASE 
                WHEN rad.latest_status = "Close" THEN 1
                WHEN rad.latest_status IS NULL THEN 0
                ELSE 0
            END
        ) as closed_risks,
        SUM(
            CASE
                WHEN rad.latest_status = "Open" OR rad.latest_status IS NULL THEN 1
                ELSE 0
            END
        ) as open_risks
    ')
            ->first();

        $controlsCount = DB::table('control_master_table as cm')
            ->leftJoin(DB::raw('(
        SELECT 
            control_id, 
            control_implementation_status
        FROM control_assessment_details_table
        WHERE id IN (
            SELECT MAX(id)
            FROM control_assessment_details_table
            GROUP BY control_id
        )
    ) as cad'), 'cm.control_id', '=', 'cad.control_id')
            ->selectRaw('
        COUNT(DISTINCT cm.control_id) as total_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status = "Implemented" THEN 1
                ELSE 0
            END
        ) as implemented_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status = "Partially Implemented" THEN 1
                ELSE 0
            END
        ) as partially_implemented_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status = "Not Applicable" THEN 1
                ELSE 0
            END
        ) as not_applicable_controls,
        SUM(
            CASE 
                WHEN cad.control_implementation_status IS NULL THEN 1  -- NULL means "Not Implemented"
                WHEN cad.control_implementation_status = "Not Implemented" THEN 1
                ELSE 0
            END
        ) as not_implemented_controls
    ')
            ->first();


        return view('process/risk-identification/risk-status/index', compact('riskStatus', 'controlsCount', 'risksCount'));
    }
}
