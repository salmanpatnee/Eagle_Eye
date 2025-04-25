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
    private $_routeName = "riskmaster";
    private $_primaryKey = "risk_id";

    // To add data into the table
    public function create()
    {

        $data = $riskmaster = null;
        $riskGroupNames = DB::table('risk_group_table')->get();
        $riskOwnerNames = DB::table('owner_table')->select('owner_name', 'owner_role_id')->get();
        $riskTypeNames = DB::table('risk_type_table')->get();
        $riskSubTypeNames = DB::table('risk_sub_type_table')->get();
        $riskClassNames = DB::table('classification_table')->get();
        $riskInherent = DB::table('risk_inherent_table')->get();
        $threatAgents = DB::table('threat_agent_table')->select('id', 'threat_agent_id', 'threat_agent_name')->distinct()->get();
        $vulnerabilities = DB::table('va_table')->select('id', 'va_id', 'va_name')->distinct()->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $assetGroups = DB::table('asset_group_table')->select('id', 'asset_group_id', 'asset_group_name')->distinct()->get();
        $keyRiskIndicators = DB::table('risk_kri_table')->select('id', 'key_risk_indicator_id', 'key_risk_indicator_value')->distinct()->get();
        $keyPerformancekIndicators = DB::table('risk_kpi_table')->select('id', 'key_performance_indicatory_id', 'key_performance_indicatory_value')->distinct()->get();
        $riskAcceptances = DB::table('risk_acceptance_table')->select('id', 'risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $departments = DB::table('department_table')->select('id', 'department_id', 'department_name')->distinct()->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->distinct()->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/1-RiskIdentificationForm', compact('riskmaster', 'threatAgents', 'vulnerabilities', 'categories', 'assetGroups', 'keyRiskIndicators', 'keyPerformancekIndicators', 'riskAcceptances', 'departments', 'riskGroupNames', 'riskOwnerNames', 'riskTypeNames', 'riskSubTypeNames', 'riskClassNames', 'riskInherent', 'custodians', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit(Risk $risk)
    {
        $data = $riskmaster = $risk->load('owner', 'group', 'type', 'subType', 'classification', 'inherent', 'agents', 'vulnerabilities', 'categories', 'assetGroups', 'kris', 'kpis', 'acceptances', 'departments', 'custodians');

        $threatAgentIds = $riskmaster->agents()->pluck('threat_agent_table.threat_agent_id')->toArray();
        $vulnerabilityIds = $riskmaster->vulnerabilities()->pluck('va_table.va_id')->toArray();
        $categoryIds = $riskmaster->categories()->pluck('category_table.category_id')->toArray();
        $assetGroupIds = $riskmaster->assetGroups()->pluck('asset_group_table.asset_group_id')->toArray();
        $kriIds = $riskmaster->kris()->pluck('risk_kri_table.key_risk_indicator_id')->toArray();
        $kpiIds = $riskmaster->kpis()->pluck('risk_kpi_table.key_performance_indicatory_id')->toArray();
        $riskAcceptanceIds = $riskmaster->acceptances()->pluck('risk_acceptance_table.risk_acceptance_id')->toArray();
        $departmentIds = $riskmaster->departments()->pluck('department_table.department_id')->toArray();
        $custodianids = $riskmaster->custodians()->pluck('custodian_table.custodian_role_id')->toArray();

        // return $threatAgentIds;

        // $riskmaster = DB::table('risk_master_table')->where('risk_id', $id)->first();

        $riskGroupNames = DB::table('risk_group_table')->get();
        $riskOwnerNames = DB::table('owner_table')->get();
        $riskTypeNames = DB::table('risk_type_table')->get();
        $riskSubTypeNames = DB::table('risk_sub_type_table')->get();
        $riskClassNames = DB::table('classification_table')->get();
        $riskInherent = DB::table('risk_inherent_table')->get();
        $threatAgents = DB::table('threat_agent_table')->select('id', 'threat_agent_id', 'threat_agent_name')->distinct()->get();
        $vulnerabilities = DB::table('va_table')->select('id', 'va_id', 'va_name')->distinct()->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $assetGroups = DB::table('asset_group_table')->select('id', 'asset_group_id', 'asset_group_name')->distinct()->get();
        // $keyRiskIndicators = DB::table('risk_kri_table')->select('id', 'key_risk_indicator_id', 'key_risk_indicator_source')->distinct()->get();
        $keyRiskIndicators = DB::table('risk_kri_table')->select('id', 'key_risk_indicator_id', 'key_risk_indicator_value')->distinct()->get();
        // $keyPerformancekIndicators = DB::table('risk_kpi_table')->select('id', 'key_performance_indicatory_id', 'key_performance_indicatory_source')->distinct()->get();
        // $keyPerformancekIndicators = DB::table('risk_kpi_table')->select('id', 'key_performance_indicatory_id', 'key_performance_indicatory_source')->distinct()->get();
        $keyPerformancekIndicators = DB::table('risk_kpi_table')->select('id', 'key_performance_indicatory_id', 'key_performance_indicatory_value')->distinct()->get();
        $riskAcceptances = DB::table('risk_acceptance_table')->select('id', 'risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $departments = DB::table('department_table')->select('id', 'department_id', 'department_name')->distinct()->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->distinct()->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/1-RiskIdentificationForm', compact('riskmaster', 'threatAgentIds', 'categoryIds', 'vulnerabilityIds', 'vulnerabilities', 'kriIds', 'kpiIds', 'riskAcceptanceIds', 'departmentIds', 'custodianids', 'assetGroupIds', 'categories', 'assetGroups', 'keyRiskIndicators', 'keyPerformancekIndicators', 'riskAcceptances', 'departments', 'riskGroupNames', 'riskOwnerNames', 'riskTypeNames', 'riskSubTypeNames', 'riskClassNames', 'riskInherent', 'threatAgents', 'custodians', 'routeName', 'data', 'primaryKey'));
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

        $threatAgents = $attributes['threatAgents'];
        $vulnerabilities = $attributes['vulnerability'];
        $categories = $attributes['category'];
        $assetGroups = $attributes['assetGroup'];
        $kris = $attributes['kri'];
        $kpis = $attributes['kpi'];
        $riskAcceptances = $attributes['riskAcceptance'];
        $departments = $attributes['department'];
        $custodians = $attributes['custodians'];

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

        if ($threatAgents && $threatAgentsArray = json_decode($threatAgents, true)) {
            $risk->agents()
                ->attach($threatAgentsArray);
        }
        if ($vulnerabilities && $vulnerabilitiesArray = json_decode($vulnerabilities, true)) {
            $risk->vulnerabilities()
                ->attach($vulnerabilitiesArray);
        }
        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $risk->categories()
                ->attach($categoriesArray);
        }
        if ($assetGroups && $assetGroupsArray = json_decode($assetGroups, true)) {
            $risk->assetGroups()
                ->attach($assetGroupsArray);
        }
        if ($kris && $krisArray = json_decode($kris, true)) {
            $risk->kris()
                ->attach($krisArray);
        }
        if ($kpis && $kpisArray = json_decode($kpis, true)) {
            $risk->kpis()
                ->attach($kpisArray);
        }
        if ($riskAcceptances && $riskAcceptancesArray = json_decode($riskAcceptances, true)) {
            $risk->acceptances()
                ->attach($riskAcceptancesArray);
        }
        if ($departments && $departmentsArray = json_decode($departments, true)) {
            $risk->departments()
                ->attach($departmentsArray);
        }
        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $risk->custodians()
                ->attach($custodiansArray);
        }


        return redirect()->route('riskmaster.index')->with('success', 'Department saved successfully.');
    }

    public function update(Risk $risk, Request $request)
    {
        // return $request->all();

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
            'vulnerability' => 'required',
            'category' => 'required',
            'assetGroup' => 'required',
            'kri' => 'required',
            'kpi' => 'required',
            'riskAcceptance' => 'required',
            'department' => 'required',
            'custodians' => 'required',
        ]);

        $threatAgents = $attributes['threatAgents'];
        $vulnerabilities = $attributes['vulnerability'];
        $categories = $attributes['category'];
        $assetGroups = $attributes['assetGroup'];
        $kris = $attributes['kri'];
        $kpis = $attributes['kpi'];
        $riskAcceptances = $attributes['riskAcceptance'];
        $departments = $attributes['department'];
        $custodians = $attributes['custodians'];

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

        if ($threatAgents && $threatAgentsArray = json_decode($threatAgents, true)) {
            $risk->agents()
                ->sync($threatAgentsArray);
        }
        if ($vulnerabilities && $vulnerabilitiesArray = json_decode($vulnerabilities, true)) {
            $risk->vulnerabilities()
                ->sync($vulnerabilitiesArray);
        }
        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $risk->categories()
                ->sync($categoriesArray);
        }
        if ($assetGroups && $assetGroupsArray = json_decode($assetGroups, true)) {
            $risk->assetGroups()
                ->sync($assetGroupsArray);
        }
        if ($kris && $krisArray = json_decode($kris, true)) {
            $risk->kris()
                ->sync($krisArray);
        }
        if ($kpis && $kpisArray = json_decode($kpis, true)) {
            $risk->kpis()
                ->sync($kpisArray);
        }
        if ($riskAcceptances && $riskAcceptancesArray = json_decode($riskAcceptances, true)) {
            $risk->acceptances()
                ->sync($riskAcceptancesArray);
        }
        if ($departments && $departmentsArray = json_decode($departments, true)) {
            $risk->departments()
                ->sync($departmentsArray);
        }
        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $risk->custodians()
                ->sync($custodiansArray);
        }


        return redirect()->route('riskmaster.index')->with('success', 'Department saved successfully.');
    }


    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index(Request $request)
    {
        $risk = $request->input('risk') ?? null;
        $owner = $request->input('owner') ?? null;
        $group = $request->input('group') ?? null;

        $riskNames = Risk::select('risk_id', 'risk_name')->get();
        $riskGroups = RiskGroup::select('risk_group_id', 'risk_group_name')->get();
        $owners = Owner::select('owner_role_id', 'owner_name')->get();

        $risks = Risk::select('id', 'risk_id', 'risk_name', 'owner_id', 'risk_group_id')
            ->with('owner', 'group', 'kris', 'kpis')
            ->when($risk, function ($query, $risk) {
                $query->where('risk_master_table.risk_id', $risk);
            })->when($group, function ($query, $group) {
                $query->where('risk_master_table.risk_group_id', $group);
            })->when($owner, function ($query, $owner) {
                $query->where('risk_master_table.owner_id', $owner);
            })
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        // return $risks;

        return view('4-Process/7-Risk/1-RiskIdentificationList', compact('risks', 'riskNames', 'riskGroups', 'owners', 'routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {

        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = Risk::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selectedriskidenti = $request->input('selectedriskidenti');

        if (!empty($selectedriskidenti)) {
            DB::table('risk_master_table')->whereIn('risk_id', $selectedriskidenti)->delete();
        }
        return redirect('/risk-identification-list');
    }


    public function show(Risk $risk)
    {
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        $data = $risk->load('owner', 'group', 'type', 'subType', 'classification', 'inherent', 'agents', 'vulnerabilities', 'categories', 'assetGroups', 'kris', 'kpis', 'acceptances', 'departments', 'custodians');



        return view('4-Process/7-Risk/1-RiskIdentificationTable', compact('risk', 'routeName', 'data', 'primaryKey'));
    }






    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $threatNames = DB::table('threat_agent_table')
            ->select('*')
            ->distinct()
            ->get();
        $vaNames = DB::table('va_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskGroupNames = DB::table('risk_group_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskOwnerNames = DB::table('owner_table')
            ->select('*')
            ->distinct()

            ->get();
        $riskTypeNames = DB::table('risk_type_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskSubTypeNames = DB::table('risk_sub_type_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskClassNames = DB::table('classification_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskCatNames = DB::table('category_table')
            ->select('*')
            ->distinct()
            ->get();
        $contNames = DB::table('control_master_table')
            ->select('*')
            ->distinct()
            ->get();
        $assetGroupNames = DB::table('asset_group_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskInherent = DB::table('risk_inherent_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskKriNames = DB::table('risk_kri_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskKpiNames = DB::table('risk_kpi_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskAccpetanceNames = DB::table('risk_acceptance_table')
            ->select('*')
            ->distinct()
            ->get();
        $riskdepartmentnames = DB::table('department_table')
            ->select('*')
            ->distinct()
            ->get();

        $lastRisk = DB::table('risk_master_table')
            ->select(
                'risk_id',
                DB::raw("SUBSTRING(risk_id, 1, CHAR_LENGTH('RK-')) as prefix"),
                DB::raw("CAST(SUBSTRING(risk_id, CHAR_LENGTH('RK-') + 1) AS UNSIGNED) as num")
            )
            ->orderBy('prefix', 'desc')
            ->orderBy('num', 'desc')
            ->first();

        $maxNumericLength = 6;

        if ($lastRisk) {
            $numericPart = $lastRisk->num + 1;
            $newRiskId = $lastRisk->prefix . str_pad($numericPart, $maxNumericLength, '0', STR_PAD_LEFT);
        } else {
            // Handle the case where there are no rows in the table
            $newRiskId = 'RK-' . str_repeat('0', $maxNumericLength - 1) . '1'; // RK-000001
        }


        return view('4-Process/7-Risk/1-RiskIdentificationForm', compact('newRiskId', 'riskGroupNames', 'riskOwnerNames', 'riskTypeNames', 'riskSubTypeNames', 'riskClassNames', 'threatNames', 'vaNames', 'contNames', 'assetGroupNames', 'riskInherent', 'riskCatNames', 'riskKriNames', 'riskKpiNames', 'riskAccpetanceNames', 'riskdepartmentnames'));
    }
}
