<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\RiskAssessment;
use App\Models\RiskAssessmentDetail;
use App\Models\RiskAssessmentFinding;
use App\Models\RiskTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAssessmentFindingController extends Controller
{

    public function create(RiskAssessment $riskAssessment, Request $request)
    {
        $riskAssessment->load(['location', 'auditor', 'classification']);
        $risks = Risk::select('id', 'risk_id', 'risk_name')->get();
        $treatments = RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')->get();

        return view('4-Process/12-RiskAssessment/1-RiskAssessmentFormv2', compact('risks', 'riskAssessment', 'treatments'));
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

        // return $attributes;

        $riskAssessment->findings()->create($attributes);


        if ($request->input('submit') === 'exit') {
            return redirect(route('risk-assessments.index'));
        }

        return redirect()->back();
    }


    public function edit(RiskAssessmentDetail $riskAssessmentDetail)
    {
        $riskAssessment = RiskAssessment::where('risk_assessment_id', $riskAssessmentDetail->risk_assessment_id)
            ->first();

        $risks = DB::table('risk_master_table as r')
            ->leftJoin('risk_assessment_details_table as rad', function ($join) use ($riskAssessmentDetail) {
                $join->on('r.risk_id', '=', 'rad.risk_id')
                    ->where('rad.risk_finding_id', '=', $riskAssessmentDetail->risk_finding_id)
                    ->whereNot('risk_finding_id', $riskAssessmentDetail->risk_finding_id);
            })
            ->whereNull('rad.risk_finding_id')
            ->select('r.risk_id', 'r.risk_name')
            ->get();

        $treatments = RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')->get();

        return view('4-Process/12-RiskAssessment/1-RiskAssessmentEditForm', compact('risks', 'riskAssessment', 'riskAssessmentDetail', 'treatments'));
    }

    public function update(RiskAssessmentDetail $riskAssessmentDetail, Request $request)
    {

        $attributes = $request->validate([
            'risk_finding_id' => ['required', 'unique:risk_assessment_details_table,risk_finding_id,' . $riskAssessmentDetail->id],
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


        $riskAssessmentDetail->update($attributes);

        return redirect(route('risk-assessments.index'));
    }

    public function destroy(RiskAssessmentDetail $riskAssessmentDetail)
    {
        $riskAssessmentDetail->delete();

        return redirect()->route('risk-assessments.index');
    }


    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function stores(Request $request)
    {
        // Retrieve data from the form
        $ContAsstFindId = $request->input('ContAsstFindId');
        $ContAsstFindName = $request->input('ContAsstFindName');
        $RiskAssetName = $request->input('RiskAssetName');
        $ContAsstFindDes = $request->input('ContAsstFindDes');
        $status = $request->input('status');
        $ControlImpleDetail = $request->input('ControlImpleDetail');
        $ContMaturityLevel = $request->input('ContMaturityLevel');
        $ContMaturityJustification = $request->input('ContMaturityJustification');
        $ContAsstRemarks = $request->input('ContAsstRemarks');
        $CorrectAction = $request->input('CorrectAction');
        $CorrectActionDueDate = $request->input('CorrectActionDueDate');
        $PreventiveAction = $request->input('PreventiveAction');
        $PreventiveActionDueDate = $request->input('PreventiveActionDueDate');
        $LessonLearned = $request->input('LessonLearned');
        $AuditeeName = $request->input('AuditeeName');
        $AuditeeDepart = $request->input('AuditeeDepart');
        $AuditeeSys = $request->input('AuditeeSys');
        $RiskName = $request->input('RiskName');
        $riskLikelihood = $request->input('riskLikelihood');
        $riskImpact = $request->input('riskImpact');
        $riskScore = $request->input('riskScore');
        $appetiteColor = $request->input('appetiteColor');
        // $CatName = json_decode($request->categories);
        // $controlnames = json_decode($request->controlnames);
        // $evidencenames = json_decode($request->evidencenames);
        // $artifactnames = json_decode($request->artifactnames); 


        $data = DB::table('risk_assessment_details_table')->insert([
            'risk_finding_id' => $ContAsstFindId,
            'risk_finding_name' => $ContAsstFindName,
            'risk_assessment_id' => $RiskAssetName,
            'risk_finding_description' => $ContAsstFindDes,
            'implementation_status' => $status,
            'implementation_details' => $ControlImpleDetail,
            'maturity_level' => $ContMaturityLevel,
            'maturity_justification' => $ContMaturityJustification,
            'Remarks' => $ContAsstRemarks,
            'corrective_action' => $CorrectAction,
            'corrective_action_due_date' => $CorrectActionDueDate,
            'preventive_action' => $PreventiveAction,
            'preventive_action_due_date' => $PreventiveActionDueDate,
            'lesson_learned' => $LessonLearned,
            'risk_auditee_name' => $AuditeeName,
            'risk_auditee_department' => $AuditeeDepart,
            'risk_auditee_system' => $AuditeeSys,
            'risk_id' => $RiskName,
            'risk_likelihood' => $riskLikelihood,
            'risk_impact' => $riskImpact,
            'risk_score' => $riskScore,
            'risk_appetite_color' => $appetiteColor,

        ]);


        // foreach ($CatName as $category) {
        //     DB::table('risk_assessment_detail_vs_category_table')->insert([
        //         'risk_assessment_id' => $ContAsstFindId,
        //         'category_id' => $category,
        //     ]);
        // }
        // foreach ($controlnames as $controlname) {
        //     DB::table('risk_assessment_detail_vs_control_master_table')->insert([
        //         'risk_assessment_id' => $ContAsstFindId,
        //         'control_id' => $controlname,
        //     ]);
        // }
        // foreach ($evidencenames as $evidencename) {
        //     DB::table('risk_assessment_detail_vs_evidence_table')->insert([
        //         'risk_assessment_id' => $ContAsstFindId,
        //         'evidence_id' => $evidencename,
        //     ]);
        // }
        // foreach ($artifactnames as $artifactname) {
        //     DB::table('risk_assessment_detail_vs_artifact_table')->insert([
        //         'risk_assessment_id' => $ContAsstFindId,
        //         'artifact_id' => $artifactname,
        //     ]);
        // }

        return redirect()->back()->with('success', 'Location information has been saved.');
    }

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('risk_assessment_details_table')->get();
        return view('4-Process/12-RiskAssessment/2-RiskAssessmentFindingList', compact('columns'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {

        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskAssessmentFinding::where('id', $attributes['record'])->orWhere('risk_finding_id', $attributes['record'])->first();
        $data->delete();
        return redirect(route('risk-assessments.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_assessment_details_table')->whereIn('risk_finding_id', $selecteddelete)->delete();
        }
        return redirect('/risk-assessment-finding-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show(RiskAssessmentDetail $riskAssessmentDetail)
    {
        return view('4-Process/12-RiskAssessment/show', compact('riskAssessmentDetail'));
    }



    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {

        $contAsstName = DB::table('risk_assessment_master_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskName = DB::table('risk_master_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/12-RiskAssessment/1-RiskAssessmentForm', compact('contAsstName', 'riskName'));
    }
}
