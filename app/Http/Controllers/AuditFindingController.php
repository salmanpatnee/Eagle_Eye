<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetGroup;
use App\Models\Audit;
use App\Models\Auditee;
use App\Models\AuditFinding;
use App\Models\Category;
use App\Models\ControlMaster;
use App\Models\Custodian;
use App\Models\Department;
use App\Models\Domain;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditFindingController extends Controller
{
    public function show(AuditFinding $auditFinding)
    {
        $auditFinding->load('categories', 'controls', 'audit', 'domain', 'auditee', 'department', 'owner', 'custodians', 'assets', 'assetsGroups');

        return view('process/assessments/audit-assessment-findings/show', compact('auditFinding'));
    }

    public function create(Audit $auditAssessment)
    {
        $auditAssessment->load(['bestPractice.controls', 'location', 'auditor', 'classification']);
        $controls = $auditAssessment->bestPractice->controls;
        $auditFinding = null;
        $assetIds = $assetGroupIds = $custodianRoleIds = $controlIds = $categoryIds = [];

        $assessedControlIds = DB::table('audit_finding_vs_control_table')
            ->join('audit_findings_table', 'audit_finding_vs_control_table.audit_finding_id', '=', 'audit_findings_table.audit_finding_id')
            ->where('audit_findings_table.audit_id', $auditAssessment->audit_id) // Filter by current audit
            ->pluck('audit_finding_vs_control_table.control_id');

        $statues = AuditFinding::STATUSES;
        $owners = Owner::select('owner_name', 'owner_role_id')->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->distinct()->get();

        $controls  = $controls->filter(function ($control) use ($assessedControlIds) {
            return !$assessedControlIds->contains($control->control_id);
        });

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();
        $departments = Department::select('id', 'department_id', 'department_name')->get();
        $domains = Domain::select('id', 'main_domain_id', 'main_domain_name')->get();
        $auditees = Auditee::select('id', 'auditee_id', 'auditee_first_name', 'auditee_last_name')->get();
        $assets = Asset::select('id', 'asset_id', 'asset_name')->get();
        $assetGroups = AssetGroup::select('id', 'asset_group_id', 'asset_group_name')->get();

        return view('process/assessments/audit-assessment-findings/create', compact('controls', 'categories', 'auditAssessment', 'departments', 'domains', 'auditees', 'statues', 'owners', 'custodians', 'assets', 'assetGroups', 'auditFinding', 'assetIds', 'assetGroupIds', 'custodianRoleIds', 'controlIds', 'categoryIds'));
    }

    public function store(Audit $auditAssessment, Request $request)
    {
        $attributes = $request->validate([
            'audit_finding_id' => ['required', 'unique:audit_findings_table'],
            'audit_finding_name' => ['required'],
            'audit_finding_description' => ['nullable'],
            'categories' => ['required'],
            'controls' => ['required'],
            'audit_nature' => ['nullable'],
            'auditee_id' => ['nullable'],
            'department_id' => ['required'],
            'domain_id' => ['required'],
            'compliance_level' => ['nullable'],
            'nca_remarks' => ['nullable'],
            'root_cause_analysis' => ['nullable'],
            'corrective_action' => ['nullable'],
            'correction_action_due_date' => ['nullable'],
            'preventive_action' => ['nullable'],
            'preventive_action_due_date' => ['nullable'],
            'lesson_learned' => ['nullable'],
            'audit_finding_status' => ['nullable'],
            'closure_expected_date' => ['nullable'],
            'owner_id' => ['nullable'],
            'custodians' => ['nullable'],
            'assets' => ['nullable'],
            'assetsGroups' => ['nullable'],
        ]);

        $custodians = $attributes['custodians'] ?? [];
        unset($attributes['custodians']);

        $assets = $attributes['assets'] ?? [];
        unset($attributes['assets']);

        $assetsGroups = $attributes['assetsGroups'] ?? [];
        unset($attributes['assetsGroups']);

        $categories = $attributes['categories'];
        unset($attributes['categories']);

        $controls = $attributes['controls'];
        unset($attributes['controls']);

        $auditFinding = $auditAssessment->findings()->create($attributes);

        $auditFinding->categories()->attach($categories ?? []);
        $auditFinding->controls()->attach($controls ?? []);
        $auditFinding->custodians()->attach($custodians ?? []);
        $auditFinding->assets()->attach($assets ?? []);
        $auditFinding->assetsGroups()->attach($assetsGroups ?? []);


        if ($request->input('submit') === 'exit') {
            return redirect(route('audit-assessments.index'))->with('success', 'Audit Finding created successfully.');
        }

        return redirect()->back();
    }


    public function edit(AuditFinding $auditFinding, Request $request)
    {
        $auditFinding->load('categories', 'controls', 'audit', 'domain', 'auditee', 'department');
        $auditAssessment = $auditFinding->audit;
        $auditAssessment->load(['bestPractice.controls', 'location', 'auditor', 'classification']);
        $controls = ControlMaster::all();
        $statues = AuditFinding::STATUSES;
        $owners = Owner::select('owner_name', 'owner_role_id')->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->distinct()->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();
        $departments = Department::select('id', 'department_id', 'department_name')->get();
        $domains = Domain::select('id', 'main_domain_id', 'main_domain_name')->get();
        $auditees = Auditee::select('id', 'auditee_id', 'auditee_first_name', 'auditee_last_name')->get();
        $controlIds = $auditFinding->controls()->pluck('control_master_table.control_id')->toArray();
        $categoryIds = $auditFinding->categories()->pluck('category_table.category_id')->toArray();
        $custodianRoleIds = $auditFinding->custodians()->pluck('custodian_table.custodian_role_id')->toArray();
        $assets = Asset::select('id', 'asset_id', 'asset_name')->get();
        $assetGroups = AssetGroup::select('id', 'asset_group_id', 'asset_group_name')->get();
        $assetIds = $auditFinding->assets()->pluck('asset_register_table.asset_id')->toArray();
        $assetGroupIds = $auditFinding->assetsGroups()->pluck('asset_group_table.asset_group_id')->toArray();

        return view('process/assessments/audit-assessment-findings/create', compact('controls', 'categories', 'departments', 'domains', 'auditees', 'auditFinding', 'controlIds', 'categoryIds', 'statues', 'owners', 'custodians', 'custodianRoleIds', 'assets', 'assetGroups', 'assetIds', 'assetGroupIds', 'auditAssessment'));
    }

    public function update(AuditFinding $auditFinding, Request $request)
    {
        $attributes = $request->validate([
            'audit_finding_id' => ['required', 'unique:audit_findings_table,audit_finding_id,' . $auditFinding->id],
            'audit_finding_name' => ['required'],
            'audit_finding_description' => ['nullable'],
            'categories' => ['required'],
            'controls' => ['required'],
            'audit_nature' => ['nullable'],
            'auditee_id' => ['required'],
            'department_id' => ['required'],
            'domain_id' => ['required'],
            'compliance_level' => ['nullable'],
            'nca_remarks' => ['nullable'],
            'root_cause_analysis' => ['nullable'],
            'corrective_action' => ['nullable'],
            'correction_action_due_date' => ['nullable'],
            'preventive_action' => ['nullable'],
            'preventive_action_due_date' => ['nullable'],
            'lesson_learned' => ['nullable'],
            'audit_finding_status' => ['nullable'],
            'closure_expected_date' => ['nullable'],
            'owner_id' => ['nullable'],
            'custodians' => ['nullable'],
            'assets' => ['nullable'],
            'assetsGroups' => ['nullable'],
        ]);

        $assets = $attributes['assets'] ?? [];
        unset($attributes['assets']);

        $assetsGroups = $attributes['assetsGroups'] ?? [];
        unset($attributes['assetsGroups']);

        $custodians = $attributes['custodians'] ?? [];
        unset($attributes['custodians']);

        $categories = $attributes['categories'] ?? [];
        unset($attributes['categories']);

        $controls = $attributes['controls'] ?? [];
        unset($attributes['controls']);

        $auditFinding->update($attributes);

        $auditFinding->categories()->sync($categories ?? []);
        $auditFinding->controls()->sync($controls ?? []);
        $auditFinding->custodians()->sync($custodians ?? []);
        $auditFinding->assets()->sync($assets ?? []);
        $auditFinding->assetsGroups()->sync($assetsGroups ?? []);

        return redirect(route('audit-assessments.index'))->with('success', 'Audit Finding updated successfully.');
    }

    public function destroy(AuditFinding $auditFinding)
    {

        $auditFinding->categories()->detach();
        $auditFinding->controls()->detach();
        $auditFinding->custodians()->detach();
        $auditFinding->assets()->detach();
        $auditFinding->assetsGroups()->detach();

        $auditFinding->delete();

        return redirect()->route('audit-assessments.index')->with('success', 'Audit Finding deleted successfully.');
    }
}
