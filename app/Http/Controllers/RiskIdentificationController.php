<?php

namespace App\Http\Controllers;

use App\Models\Custodian;
use App\Models\Owner;
use App\Models\Risk;
use App\Models\RiskGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskIdentificationController extends Controller
{

    public function index(Request $request)
    {
        $risk = $request->input('risk') ?? [];
        $owner = $request->input('owner') ?? null;
        $group = $request->input('group') ?? null;

        $riskNames = Risk::select('risk_id', 'risk_name')->get();
        $riskGroups = RiskGroup::select('risk_group_id', 'risk_group_name')->get();
        $owners = Owner::select('owner_role_id', 'owner_name')->get();

        $risks = Risk::select('id', 'risk_id', 'risk_name', 'owner_id', 'risk_group_id')
            ->with('owner', 'group', 'kris', 'kpis')
            ->when($risk, function ($query, $risk) {
                $query->whereIn('risk_master_table.risk_id', $risk);
            })->when($group, function ($query, $group) {
                $query->where('risk_master_table.risk_group_id', $group);
            })->when($owner, function ($query, $owner) {
                $query->where('risk_master_table.owner_id', $owner);
            })
            ->paginate(20)->withQueryString();



        return view('process/risk-identification/risks/index', compact('risks', 'riskNames', 'riskGroups', 'owners', 'risk', 'group', 'owner'));
    }

    public function show(Risk $risk)
    {
        $risk->load('owner', 'group', 'type', 'subType', 'classification', 'inherent', 'agents', 'vulnerabilities', 'categories', 'assetGroups', 'kris', 'kpis', 'acceptances', 'departments', 'custodians', 'controls');

        return view('process/risk-identification/risks/show', compact('risk'));
    }

    public function create()
    {

        $risk = null;
        $riskGroupNames = DB::table('risk_group_table')->get();
        $riskOwnerNames = DB::table('owner_table')->select('owner_name', 'owner_role_id')->get();
        $riskTypeNames = DB::table('risk_type_table')->get();
        $riskSubTypeNames = DB::table('risk_sub_type_table')->get();
        $riskClassNames = DB::table('classification_table')->get();
        $riskInherent = DB::table('risk_inherent_table')->get();
        $controls = DB::table('control_master_table')->select('id', 'control_id', 'control_name')->distinct()->get();
        $threatAgents = DB::table('threat_agent_table')->select('id', 'threat_agent_id', 'threat_agent_name')->distinct()->get();
        $vulnerabilities = DB::table('va_table')->select('id', 'va_id', 'va_name')->distinct()->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $assetGroups = DB::table('asset_group_table')->select('id', 'asset_group_id', 'asset_group_name')->distinct()->get();
        $keyRiskIndicators = DB::table('risk_kri_table')->select('id', 'key_risk_indicator_id', 'key_risk_indicator_value')->distinct()->get();
        $keyPerformancekIndicators = DB::table('risk_kpi_table')->select('id', 'key_performance_indicatory_id', 'key_performance_indicatory_value')->distinct()->get();
        $riskAcceptances = DB::table('risk_acceptance_table')->select('id', 'risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $departments = DB::table('department_table')->select('id', 'department_id', 'department_name')->distinct()->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->distinct()->get();
        $controlIds = $threatAgentIds = $vulnerabilityIds = $categoryIds = $assetGroupIds = $kriIds = $kpiIds = $riskAcceptanceIds = $departmentIds = $custodianIds = [];

        return view('process/risk-identification/risks/create', compact('risk', 'threatAgents', 'controls', 'vulnerabilities', 'categories', 'assetGroups', 'keyRiskIndicators', 'keyPerformancekIndicators', 'riskAcceptances', 'departments', 'riskGroupNames', 'riskOwnerNames', 'riskTypeNames', 'riskSubTypeNames', 'riskClassNames', 'riskInherent', 'custodians', 'threatAgentIds', 'categoryIds', 'vulnerabilityIds',  'kriIds', 'kpiIds', 'riskAcceptanceIds', 'departmentIds', 'custodianIds', 'assetGroupIds', 'controlIds'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'risk_id' => ['required', 'unique:risk_master_table'],
            'risk_name' => 'required',
            'risk_description' => 'nullable',
            'risk_objectives' => 'nullable',
            'risk_profile' => 'nullable',
            'risk_group_id' => 'required',
            'risk_type_id' => 'required',
            'risk_sub_type_id' => 'required',
            'owner_id' => 'required',
            'risk_consequences' => 'nullable',
            'classification_id' => 'required',
            'risk_inherent_id' => 'required',
            'risk_critical_asset' => 'nullable',
            'risk_cloud' => 'nullable',
            'risk_telework' => 'nullable',
            'risk_social_media' => 'nullable',
            'risk_data_privicy' => 'nullable',
            'risk_pii' => 'nullable',
            'risk_pci_dss' => 'nullable',
            'risk_e_commerce' => 'nullable',
            'risk_infrastructure' => 'nullable',
            'risk_application' => 'nullable',
            'risk_hr' => 'nullable',
            'risk_physical_security' => 'nullable',
            'risk_third_party' => 'nullable',
            'risk_operational' => 'nullable',
            'risk_payment' => 'nullable',
            'risk_e_banking' => 'nullable',
            'controls' => 'required',
            'threatAgents' => 'required',
            'vulnerability' => 'required',
            'category' => 'required',
            'assetGroup' => 'required',
            'kri' => 'required',
            'kpi' => 'required',
            'riskAcceptance' => 'required',
            'department' => 'required',
            'custodians' => 'required',
        ]);

        $controls = $attributes['controls'];
        $threatAgents = $attributes['threatAgents'];
        $vulnerabilities = $attributes['vulnerability'];
        $categories = $attributes['category'];
        $assetGroups = $attributes['assetGroup'];
        $kris = $attributes['kri'];
        $kpis = $attributes['kpi'];
        $riskAcceptances = $attributes['riskAcceptance'];
        $departments = $attributes['department'];
        $custodians = $attributes['custodians'];

        unset($attributes['controls']);
        unset($attributes['threatAgents']);
        unset($attributes['vulnerability']);
        unset($attributes['category']);
        unset($attributes['assetGroup']);
        unset($attributes['kri']);
        unset($attributes['kpi']);
        unset($attributes['riskAcceptance']);
        unset($attributes['department']);
        unset($attributes['custodians']);

        $risk = Risk::create($attributes);

        $risk->controls()->attach($controls ?? []);
        $risk->agents()->attach($threatAgents ?? []);
        $risk->vulnerabilities()->attach($vulnerabilities ?? []);
        $risk->categories()->attach($categories ?? []);
        $risk->assetGroups()->attach($assetGroups ?? []);
        $risk->kris()->attach($kris ?? []);
        $risk->kpis()->attach($kpis ?? []);
        $risk->acceptances()->attach($riskAcceptances ?? []);
        $risk->departments()->attach($departments ?? []);
        $risk->custodians()->attach($custodians ?? []);

        return redirect()->route('risks.index')->with('success', 'Risk saved successfully.');
    }

    public function edit(Risk $risk)
    {
        $risk->load('owner', 'group', 'type', 'subType', 'classification', 'inherent', 'agents', 'vulnerabilities', 'categories', 'assetGroups', 'kris', 'kpis', 'acceptances', 'departments', 'custodians',);

        $controlIds = $risk->controls()->pluck('control_master_table.control_id')->toArray();
        $threatAgentIds = $risk->agents()->pluck('threat_agent_table.threat_agent_id')->toArray();
        $vulnerabilityIds = $risk->vulnerabilities()->pluck('va_table.va_id')->toArray();
        $categoryIds = $risk->categories()->pluck('category_table.category_id')->toArray();
        $assetGroupIds = $risk->assetGroups()->pluck('asset_group_table.asset_group_id')->toArray();
        $kriIds = $risk->kris()->pluck('risk_kri_table.key_risk_indicator_id')->toArray();
        $kpiIds = $risk->kpis()->pluck('risk_kpi_table.key_performance_indicatory_id')->toArray();
        $riskAcceptanceIds = $risk->acceptances()->pluck('risk_acceptance_table.risk_acceptance_id')->toArray();
        $departmentIds = $risk->departments()->pluck('department_table.department_id')->toArray();
        $custodianIds = $risk->custodians()->pluck('custodian_table.custodian_role_id')->toArray();

        $riskGroupNames = DB::table('risk_group_table')->get();
        $riskOwnerNames = DB::table('owner_table')->get();
        $riskTypeNames = DB::table('risk_type_table')->get();
        $riskSubTypeNames = DB::table('risk_sub_type_table')->get();
        $riskClassNames = DB::table('classification_table')->get();
        $riskInherent = DB::table('risk_inherent_table')->get();
        $controls = DB::table('control_master_table')->select('id', 'control_id', 'control_name')->distinct()->get();
        $threatAgents = DB::table('threat_agent_table')->select('id', 'threat_agent_id', 'threat_agent_name')->distinct()->get();
        $vulnerabilities = DB::table('va_table')->select('id', 'va_id', 'va_name')->distinct()->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $assetGroups = DB::table('asset_group_table')->select('id', 'asset_group_id', 'asset_group_name')->distinct()->get();
        $keyRiskIndicators = DB::table('risk_kri_table')->select('id', 'key_risk_indicator_id', 'key_risk_indicator_value')->distinct()->get();
        $keyPerformancekIndicators = DB::table('risk_kpi_table')->select('id', 'key_performance_indicatory_id', 'key_performance_indicatory_value')->distinct()->get();
        $riskAcceptances = DB::table('risk_acceptance_table')->select('id', 'risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $departments = DB::table('department_table')->select('id', 'department_id', 'department_name')->distinct()->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->distinct()->get();


        return view('process/risk-identification/risks/create', compact('risk', 'controls', 'controlIds', 'threatAgentIds', 'categoryIds', 'vulnerabilityIds', 'vulnerabilities', 'kriIds', 'kpiIds', 'riskAcceptanceIds', 'departmentIds', 'custodianIds', 'assetGroupIds', 'categories', 'assetGroups', 'keyRiskIndicators', 'keyPerformancekIndicators', 'riskAcceptances', 'departments', 'riskGroupNames', 'riskOwnerNames', 'riskTypeNames', 'riskSubTypeNames', 'riskClassNames', 'riskInherent', 'threatAgents', 'custodians'));
    }

    public function update(Risk $risk, Request $request)
    {

        $attributes = $request->validate([
            'risk_id' => ['required', 'unique:risk_master_table,risk_id,' . $risk->id],
            'risk_name' => 'required',
            'risk_description' => 'nullable',
            'risk_objectives' => 'nullable',
            'risk_profile' => 'nullable',
            'risk_group_id' => 'required',
            'risk_type_id' => 'required',
            'risk_sub_type_id' => 'required',
            'owner_id' => 'required',
            'risk_consequences' => 'nullable',
            'classification_id' => 'required',
            'risk_inherent_id' => 'required',
            'risk_critical_asset' => 'nullable',
            'risk_cloud' => 'nullable',
            'risk_telework' => 'nullable',
            'risk_social_media' => 'nullable',
            'risk_data_privicy' => 'nullable',
            'risk_pii' => 'nullable',
            'risk_pci_dss' => 'nullable',
            'risk_e_commerce' => 'nullable',
            'risk_infrastructure' => 'nullable',
            'risk_application' => 'nullable',
            'risk_hr' => 'nullable',
            'risk_physical_security' => 'nullable',
            'risk_third_party' => 'nullable',
            'risk_operational' => 'nullable',
            'risk_payment' => 'nullable',
            'risk_e_banking' => 'nullable',
            'threatAgents' => 'required',
            'controls' => 'required',
            'vulnerability' => 'required',
            'category' => 'required',
            'assetGroup' => 'required',
            'kri' => 'required',
            'kpi' => 'required',
            'riskAcceptance' => 'required',
            'department' => 'required',
            'custodians' => 'required',
        ]);

        $controls = $attributes['controls'];
        $threatAgents = $attributes['threatAgents'];
        $vulnerabilities = $attributes['vulnerability'];
        $categories = $attributes['category'];
        $assetGroups = $attributes['assetGroup'];
        $kris = $attributes['kri'];
        $kpis = $attributes['kpi'];
        $riskAcceptances = $attributes['riskAcceptance'];
        $departments = $attributes['department'];
        $custodians = $attributes['custodians'];

        unset($attributes['controls']);
        unset($attributes['threatAgents']);
        unset($attributes['vulnerability']);
        unset($attributes['category']);
        unset($attributes['assetGroup']);
        unset($attributes['kri']);
        unset($attributes['kpi']);
        unset($attributes['riskAcceptance']);
        unset($attributes['department']);
        unset($attributes['custodians']);

        $risk->update($attributes);

        $risk->agents()->sync($threatAgents ?? []);
        $risk->controls()->sync($controls ?? []);
        $risk->vulnerabilities()->sync($vulnerabilities ?? []);
        $risk->categories()->sync($categories ?? []);
        $risk->assetGroups()->sync($assetGroups ?? []);
        $risk->kris()->sync($kris ?? []);
        $risk->kpis()->sync($kpis ?? []);
        $risk->acceptances()->sync($riskAcceptances ?? []);
        $risk->departments()->sync($departments ?? []);
        $risk->custodians()->sync($custodians ?? []);


        return redirect()->route('risks.index')->with('success', 'Risk updated successfully.');
    }

    public function destroy(Risk $risk)
    {
        // Detach all related records if they exist, then delete the risk
        $risk->agents()->detach();
        $risk->vulnerabilities()->detach();
        $risk->categories()->detach();
        $risk->assetGroups()->detach();
        $risk->kris()->detach();
        $risk->kpis()->detach();
        $risk->acceptances()->detach();
        $risk->departments()->detach();
        $risk->custodians()->detach();

        $risk->delete();
        return redirect()->route('risks.index')->with('success', 'Risk deleted successfully.');
    }
}
