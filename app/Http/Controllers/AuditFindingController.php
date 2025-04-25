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
    private $_routeName = "audit-findings";
    private $_primaryKey = "audit_finding_id";

    public function create(Audit $audit, Request $request)
    {
        $audit->load(['bestPractice.controls', 'location', 'auditor', 'classification']);
        $controls = $audit->bestPractice->controls;


        $assessedControlIds = DB::table('audit_finding_vs_control_table')
            ->join('audit_findings_table', 'audit_finding_vs_control_table.audit_finding_id', '=', 'audit_findings_table.audit_finding_id')
            ->where('audit_findings_table.audit_id', $audit->audit_id) // Filter by current audit
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

        return view('4-Process/9-Audit/3-AuditFindingForm', compact('controls', 'categories', 'audit', 'departments', 'domains', 'auditees', 'statues', 'owners', 'custodians', 'assets', 'assetGroups'));
    }

    public function edit(AuditFinding $auditFinding, Request $request)
    {
        $auditFinding->load('categories', 'controls', 'audit', 'domain', 'auditee', 'department');

        // TODO
        // Many to Many controls

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

        return view('4-Process/9-Audit/3-AuditFindingEditForm', compact('controls', 'categories', 'departments', 'domains', 'auditees', 'auditFinding', 'controlIds', 'categoryIds', 'statues', 'owners', 'custodians', 'custodianRoleIds', 'assets', 'assetGroups', 'assetIds', 'assetGroupIds'));
    }

    public function store(Audit $audit, Request $request)
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

        $custodians = $attributes['custodians'];    
        unset($attributes['custodians']);

        $assets = $attributes['assets'];
        unset($attributes['assets']);

        $assetsGroups = $attributes['assetsGroups'];
        unset($attributes['assetsGroups']);

        $categories = $attributes['categories'];
        unset($attributes['categories']);

        $controls = $attributes['controls'];
        unset($attributes['controls']);

        $auditFinding = $audit->findings()->create($attributes);

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $auditFinding->categories()->attach($categoriesArray);
        }

        if ($controls && $controlsArray = json_decode($controls, true)) {
            $auditFinding->controls()->attach($controlsArray);
        }

        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $auditFinding->custodians()->attach($custodiansArray);
        }

        if ($assets && $assetsArray = json_decode($assets, true)) {
            $auditFinding->assets()->attach($assetsArray);
        }

        if ($assetsGroups && $assetsGroupsArray = json_decode($assetsGroups, true)) {
            $auditFinding->assetsGroups()->attach($assetsGroupsArray);
        }   

        if ($request->input('submit') === 'exit') {
            return redirect(route('audit-registrations.index'));
        }

        return redirect()->back();
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

        $assets = $attributes['assets'];
        unset($attributes['assets']);

        $assetsGroups = $attributes['assetsGroups'];
        unset($attributes['assetsGroups']);

        $custodians = $attributes['custodians'];
        unset($attributes['custodians']);

        $categories = $attributes['categories'];
        unset($attributes['categories']);

        $controls = $attributes['controls'];
        unset($attributes['controls']);

        $auditFinding->update($attributes);

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $auditFinding->categories()->sync($categoriesArray);
        }

        if ($controls && $controlsArray = json_decode($controls, true)) {
            $auditFinding->controls()->sync($controlsArray);
        }

        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $auditFinding->custodians()->sync($custodiansArray);
        }

        if ($assets && $assetsArray = json_decode($assets, true)) {
            $auditFinding->assets()->sync($assetsArray);
        }

        if ($assetsGroups && $assetsGroupsArray = json_decode($assetsGroups, true)) {
            $auditFinding->assetsGroups()->sync($assetsGroupsArray);
        }


        

        return redirect(route('audit-registrations.index'));
    }

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('audit_findings_table')->get();
        return view('4-Process/9-Audit/3-AuditFindingList', compact('columns'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function destroy(AuditFinding $auditFinding)
    {

        $auditFinding->categories()->detach();
        $auditFinding->controls()->detach();
        $auditFinding->delete();

        return redirect()->route('audit-registrations.index');
    }



    // 4.Controller - DETAILED TABLE
    public function show(AuditFinding $auditFinding)
    {
        $auditFinding->load('categories', 'controls', 'audit', 'domain', 'auditee', 'department', 'owner', 'custodians', 'assets', 'assetsGroups');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/9-Audit/3-AuditFindingTable', compact('auditFinding', 'routeName', 'primaryKey'));
    }





    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $AuditNames = DB::table('audit_master_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditCatNames = DB::table('category_table')
            ->select('*')
            ->distinct()
            ->get();
        $ControlNames = DB::table('control_master_table')
            ->select('*')
            ->distinct()
            ->get();
        $DomainNames = DB::table('domain_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditeeNames = DB::table('auditee_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditeeDepartNames = DB::table('department_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/9-Audit/3-AuditFindingForm', compact('AuditNames', 'AuditCatNames', 'ControlNames', 'DomainNames', 'AuditeeNames', 'AuditeeDepartNames'));
    }
}
