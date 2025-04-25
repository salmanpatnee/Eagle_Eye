<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\RiskTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskRegisterController extends Controller
{
    public function riskregister(Request $request)
    {



        $riskId = $request->input('risk') ?? null;
        $riskTreatment = $request->input('riskTreatment') ?? null;
        $evalutionDate = $request->input('evalutionDate') ?? null;

        // return $evalutionDate;

        $riskRegister =  DB::table('risk_master_table as r')
        ->join('risk_master_table_vs_category_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
        ->join('category_table as c', 'rvc.category_id', '=', 'c.category_id')
        ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
        ->join('risk_master_table_vs_threat_agent_table as rvt', 'r.risk_id', '=', 'rvt.risk_id')
        ->join('threat_agent_table as t', 'rvt.threat_agent_id', '=', 't.threat_agent_id')
        ->leftJoin('risk_assessment_details_table as rad', 'r.risk_id', '=', 'rad.risk_id')
        ->leftJoin('risk_assessment_master_table as ra', 'rad.risk_assessment_id', '=', 'ra.risk_assessment_id')
        ->join('risk_inherent_table as ri', 'r.risk_inherent_id', '=', 'ri.risk_inherent_id')
        ->leftJoin('risk_treatment_options_table as rt', 'rad.risk_treatment_id', '=', 'rt.risk_treatment_id')
        ->join('risk_vs_control_table as rvco', 'r.risk_id', '=', 'rvco.risk_id')
        ->join('control_master_table as co', 'rvco.control_id', '=', 'co.control_id')
        ->join('owner_table as ow', 'co.owner_id', '=', 'ow.owner_role_id')
        ->leftJoin(DB::raw('(
            SELECT 
                control_id, 
                control_implementation_status
            FROM 
                control_assessment_details_table as cad1
            WHERE 
                id IN (
                    SELECT MAX(id)
                    FROM control_assessment_details_table
                    GROUP BY control_id
                )
        ) as latest_status'), 'co.control_id', '=', 'latest_status.control_id')
        ->select(
            'r.risk_id',
            'r.risk_description',
            DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<span>", c.category_name, "</span><br>") SEPARATOR "") as categories'),  
            'o.owner_name',
            DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<span>", t.threat_agent_name, "</span><br>") SEPARATOR "") as agents'),
            'ra.risk_assessment_description',
            'ra.risk_assessment_start_date',
            'ri.risk_inherent_likelihood',
            'ri.risk_inherent_impact',
            'ri.risk_inherent_score',
            'rt.risk_treatment_name',
            'rt.risk_treatment_description', 
            DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/control-identification-table/', co.control_id, '\"><span>', co.control_id, ' - ', ow.owner_name, '</span></a><br>') SEPARATOR '') as control_owner"),
            // DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/control-identification-table/", co.control_id, "\'><span>", co.control_id, " - ", ow.owner_name, "</span></a><br>") SEPARATOR "") as control_owner'),  
            DB::raw('GROUP_CONCAT(
                DISTINCT CONCAT("<span>", 
                    IF(
                        latest_status.control_implementation_status IS NOT NULL, 
                        CONCAT(co.control_id, " - ", latest_status.control_implementation_status), 
                        CONCAT(co.control_id, " - ", "not implemented")
                    ), 
                    "</span><br>"
                ) SEPARATOR "") as status'), // Wrap status in <span> and separate by <br>
            'rad.corrective_action_due_date',
            'rad.risk_likelihood',
            'rad.risk_impact',
            'rad.risk_score',
            'rad.risk_appetite',
            'rad.risk_appetite_color',
            'rad.preventive_action',
            'rad.lesson_learned',
            DB::raw('(
                SELECT MIN(ra1.risk_assessment_start_date) 
                FROM risk_assessment_master_table as ra1
                LEFT JOIN risk_assessment_details_table as rad1 ON ra1.risk_assessment_id = rad1.risk_assessment_id
                WHERE rad1.risk_id = r.risk_id
            ) as date_of_risk_analysis'),
            DB::raw('(
                SELECT MAX(ra2.risk_assessment_start_date) 
                FROM risk_assessment_master_table as ra2
                LEFT JOIN risk_assessment_details_table as rad2 ON ra2.risk_assessment_id = rad2.risk_assessment_id
                WHERE rad2.risk_id = r.risk_id
            ) as last_evaluation_date')
        )
        ->where(function ($query) {
            $query->where('ra.risk_assessment_start_date', function ($query) {
                $query->select(DB::raw('MAX(ra3.risk_assessment_start_date)'))
                    ->from('risk_assessment_master_table as ra3')
                    ->leftJoin('risk_assessment_details_table as rad3', 'ra3.risk_assessment_id', '=', 'rad3.risk_assessment_id')
                    ->whereColumn('rad3.risk_id', 'r.risk_id');
            })
            ->orWhereNull('ra.risk_assessment_start_date');
        })->when($riskId, function ($query, $riskId) {
            $query->where('r.risk_id', $riskId);
        })->when($riskTreatment, function ($query, $riskTreatment) {
            $query->where('rt.risk_treatment_id', $riskTreatment);
        })->when($evalutionDate, function ($query) use ($evalutionDate) {
            return $query->WhereDate('risk_assessment_start_date', '<=', $evalutionDate);
        })
        ->groupBy(
            'r.risk_id',
            'o.owner_name',
            'r.risk_description',
            'ra.risk_assessment_description',
            'ra.risk_assessment_start_date',
            'ri.risk_inherent_likelihood',
            'ri.risk_inherent_impact',
            'ri.risk_inherent_score',
            'rt.risk_treatment_name',
            'rt.risk_treatment_description',
            'rad.corrective_action_due_date',
            'rad.risk_appetite',
            'rad.risk_appetite_color',
            'rad.risk_likelihood',
            'rad.risk_impact',
            'rad.risk_score',
            'rad.preventive_action',
            'rad.lesson_learned'
        )
        ->get();

        $risks = Risk::select('risk_id', 'risk_name')
        ->get();
        $riskTreatments = RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')->get();


// return $riskRegister;
        return view('4-Process/18-Reporting/2-MISReporting/11-RiskRegisterTwo', compact('riskRegister', 'risks', 'riskTreatments'));
    }
}
