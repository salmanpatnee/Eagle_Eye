<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\RiskAssessment;
use App\Models\RiskAssessmentDetail;
use App\Models\RiskTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAssessmentFindingController extends Controller
{

    // public function index()
    // {
    //     $columns = DB::table('risk_assessment_details_table')->get();
    //     return view('4-Process/12-RiskAssessment/2-RiskAssessmentFindingList', compact('columns'));
    // }


    public function show(RiskAssessmentDetail $riskAssessmentFinding)
    {
        return view('4-Process\assessments\risk-assessment-findings\show', compact('riskAssessmentFinding'));
    }

    public function create(RiskAssessment $riskAssessment, Request $request)
    {
        $riskAssessment->load(['location', 'auditor', 'classification']);
        $riskAssessmentFinding = null;
        $risks = Risk::select('id', 'risk_id', 'risk_name')->get();
        $treatments = RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')->get();

        return view('4-Process/assessments/risk-assessment-findings/create', compact('risks', 'riskAssessment', 'treatments', 'riskAssessmentFinding'));
    }

    public function store(RiskAssessment $riskAssessment, Request $request)
    {
        $attributes = $request->validate([
            'risk_finding_id' => ['required', 'unique:risk_assessment_details_table'],
            'risk_treatment_id' => ['required'],
            'risk_finding_name' => 'required',
            'risk_finding_description' => 'nullable',
            'implementation_status' => 'required',
            'implementation_details' => 'nullable',
            'maturity_level' => 'nullable',
            'maturity_justification' => 'nullable',
            'Remarks' => 'nullable',
            'corrective_action' => 'nullable',
            'corrective_action_due_date' => 'nullable',
            'preventive_action' => 'nullable',
            'preventive_action_due_date' => 'nullable',
            'lesson_learned' => 'nullable',
            'risk_auditee_name' => 'nullable',
            'risk_auditee_department' => 'nullable',
            'risk_auditee_system' => 'nullable',
            'risk_id' => 'required',
            'risk_likelihood' => 'required',
            'risk_impact' => 'required',
            'risk_score' => 'required',
            'risk_appetite_color' => 'required',
            'risk_appetite' => 'required',
        ]);



        $riskAssessment->findings()->create($attributes);


        if ($request->input('submit') === 'exit') {
            return redirect(route('risk-assessments.index'))->with('success', 'Risk Assessment Finding has been created successfully.');
        }

        return redirect()->back();
    }


    public function edit(RiskAssessmentDetail $riskAssessmentFinding)
    {

        $riskAssessment = $riskAssessmentFinding->riskAssessment;
        $risks = DB::table('risk_master_table as r')
            ->leftJoin('risk_assessment_details_table as rad', function ($join) use ($riskAssessmentFinding) {
                $join->on('r.risk_id', '=', 'rad.risk_id')
                    ->where('rad.risk_finding_id', '=', $riskAssessmentFinding->risk_finding_id)
                    ->whereNot('risk_finding_id', $riskAssessmentFinding->risk_finding_id);
            })
            ->whereNull('rad.risk_finding_id')
            ->select('r.risk_id', 'r.risk_name')
            ->get();

        $treatments = RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')->get();

        return view('4-Process/assessments/risk-assessment-findings/create', compact('risks', 'riskAssessment', 'riskAssessmentFinding', 'treatments'));
    }

    public function update(RiskAssessmentDetail $riskAssessmentFinding, Request $request)
    {

        $attributes = $request->validate([
            'risk_finding_id' => ['required', 'unique:risk_assessment_details_table,risk_finding_id,' . $riskAssessmentFinding->id],
            'risk_treatment_id' => ['required'],
            'risk_finding_name' => 'required',
            'risk_finding_description' => 'nullable',
            'implementation_status' => 'required',
            'implementation_details' => 'nullable',
            'maturity_level' => 'nullable',
            'maturity_justification' => 'nullable',
            'Remarks' => 'nullable',
            'corrective_action' => 'nullable',
            'corrective_action_due_date' => 'nullable',
            'preventive_action' => 'nullable',
            'preventive_action_due_date' => 'nullable',
            'lesson_learned' => 'nullable',
            'risk_auditee_name' => 'nullable',
            'risk_auditee_department' => 'nullable',
            'risk_auditee_system' => 'nullable',
            'risk_id' => 'required',
            'risk_likelihood' => 'required',
            'risk_impact' => 'required',
            'risk_score' => 'required',
            'risk_appetite_color' => 'required',
            'risk_appetite' => 'required',
        ]);


        $riskAssessmentFinding->update($attributes);

        return redirect(route('risk-assessments.index'))->with('success', 'Risk Assessment Finding has been updated successfully.');
    }

    public function destroy(RiskAssessmentDetail $riskAssessmentFinding)
    {
        $riskAssessmentFinding->delete();

        return redirect()->route('risk-assessments.index')->with('success', 'Risk Assessment Finding has been deleted successfully.');
    }
}
