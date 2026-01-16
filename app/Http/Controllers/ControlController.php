<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\ControlMaster;
use App\Models\Owner;
use App\Models\Risk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    public function index(Request $request)
    {
        $control = $request->input('control') ?? null;
        $owner = $request->input('owner') ?? null;
        $risk = $request->input('risk') ?? null;
        $bestPractice = $request->input('bestPractice') ?? null;

        $controlNames = ControlMaster::select('control_id', 'control_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $bestPractices = BestPractice::select('best_practice_id', 'best_practice_name', 'sort_order')->orderBy('sort_order')->get();



        $controls = ControlMaster::select('control_master_table.id', 'control_master_table.control_id', 'control_master_table.control_name', 'control_master_table.owner_id')
            ->join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practice_id')
            ->with('risks')
            ->when($control, function ($query, $control) {
                $query->where('control_master_table.control_id', $control);
            })->when(
                $bestPractice,
                function ($query, $bestPractice) {
                    $query->whereHas('bestPractices', function ($query) use ($bestPractice) {
                        $query->where('best_practice_table.best_practice_id', $bestPractice);
                    });
                    // $query->where('control_master_table.owner_id', $owner);
                }
            )->when($risk, function ($query, $risk) {
                $query->whereHas('risks', function ($query) use ($risk) {
                    $query->where('risk_master_table.risk_id', $risk);
                });
            })
            ->orderControls()
            // ->get();
            ->paginate(100);

        // return $controls;
        return view('process/control-identification/controls/index', compact('controls', 'controlNames', 'risks', 'owners', 'bestPractices', 'control', 'owner', 'risk', 'bestPractice'));
    }

    public function show(ControlMaster $control)
    {
        $control->load('classification', 'owner', 'type', 'categories', 'bestPractices', 'custodians', 'domains', 'subDomains', 'risks');

        return view('process/control-identification/controls/show', compact('control'));
    }

    public function create()
    {
        $control = null;
        $classifications = DB::table('classification_table')->select('classification_id', 'classification_name')->get();
        $owners = DB::table('owner_table')->select('owner_name', 'owner_role_id')->get();
        $controlTypes = DB::table('control_type_table')->select('control_type_id', 'control_type_name')->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $custodians = DB::table('custodian_table')->select('id', 'custodian_role_id', 'custodian_role_title')->distinct()->get();
        $bestPractices = DB::table('best_practice_table')->select('id', 'best_practice_id', 'best_practice_name')->distinct()->get();
        $domains = DB::table('domain_table')->select('id', 'main_domain_id', 'main_domain_name')->distinct()->get();
        $subDomains = DB::table('sub_domain_table')->select('id', 'sub_domain_id', 'sub_domain_name')->distinct()->get();
        $risks = DB::table('risk_master_table')->select('id', 'risk_id', 'risk_name')->distinct()->get();
        $controls = ControlMaster::select('control_id', 'control_name')->get();
        $categoryIds =  $bestPracticeIds =  $custodianRoleIds =  $mainDomainIds = $subDomainIds = $riskIds = [];

        return view('process/control-identification/controls/create', compact('control', 'classifications', 'owners', 'controlTypes', 'categories', 'custodians', 'bestPractices', 'domains', 'subDomains', 'risks', 'controls', 'categoryIds', 'bestPracticeIds', 'custodianRoleIds', 'mainDomainIds', 'subDomainIds', 'riskIds'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'control_id' => ['required', 'unique:control_master_table'],
            'control_name' => 'required',
            'control_name_ar' => 'nullable',
            'control_description' => 'nullable',
            'control_description_ar' => 'nullable',
            'classification_id' => 'required',
            'owner_id' => 'required',
            'control_level_title' => 'nullable',
            'control_parent' => 'nullable',
            'control_type_id' => 'required',
            'control_nature' => 'nullable',
            'control_criticality' => 'nullable',
            'control_iso_name' => 'nullable',
            'control_reference' => 'nullable',
            'implementation_mandatories' => 'nullable',
            'maturity_level' => 'nullable',
            'implementation_guidelines' => 'nullable',
            'control_dependency' => 'nullable',
            'categories' => 'required',
            'bestPractices' => 'required',
            'custodians' => 'required',
            'domains' => 'required',
            'subDomains' => 'required',
            'risks' => 'required',
            'control_critical_asset' => 'nullable',
            'control_cloud' => 'nullable',
            'control_telework' => 'nullable',
            'control_social_media' => 'nullable',
            'control_data_privicy' => 'nullable',
            'control_pii' => 'nullable',
            'control_pci_dss' => 'nullable',
            'control_e_commerce' => 'nullable',
            'control_infrastructure' => 'nullable',
            'control_application' => 'nullable',
            'control_hr' => 'nullable',
            'control_physical_security' => 'nullable',
            'control_third_party' => 'nullable',
            'control_operational' => 'nullable',
            'control_payment' => 'nullable',
            'control_e_banking' => 'nullable',
            'is_parent_control' => 'nullable',
        ]);

        $categories = $attributes['categories'];
        unset($attributes['categories']);

        $bestPractices = $attributes['bestPractices'];
        unset($attributes['bestPractices']);

        $custodians = $attributes['custodians'];
        unset($attributes['custodians']);

        $domains = $attributes['domains'];
        unset($attributes['domains']);

        $subDomains = $attributes['subDomains'];
        unset($attributes['subDomains']);

        $risks = $attributes['risks'];
        unset($attributes['risks']);

        $control = ControlMaster::create($attributes);

        $control->categories()->attach($categories ?? []);
        $control->bestPractices()->attach($bestPractices ?? []);
        $control->custodians()->attach($custodians ?? []);
        $control->domains()->attach($domains ?? []);
        $control->subDomains()->attach($subDomains ?? []);
        $control->risks()->attach($risks ?? []);

        return redirect()->route('controls.index')->with('success', 'Control Saved Successfully.');
    }

    public function edit(ControlMaster $control)
    {
        $control = $control->load('classification', 'owner', 'type', 'categories', 'bestPractices', 'custodians', 'domains', 'subDomains', 'risks');
        $categoryIds = $control->categories()->pluck('category_table.category_id')->toArray();
        $bestPracticeIds = $control->bestPractices()->pluck('best_practice_table.best_practice_id')->toArray();
        $custodianRoleIds = $control->custodians()->pluck('custodian_table.custodian_role_id')->toArray();
        $mainDomainIds = $control->domains()->pluck('domain_table.main_domain_id')->toArray();
        $subDomainIds = $control->subDomains()->pluck('sub_domain_table.sub_domain_id')->toArray();
        $riskIds = $control->risks()->pluck('risk_master_table.risk_id')->toArray();
        $controls = ControlMaster::select('control_id', 'control_name')->where('control_id', "!=", $control->control_id)->get();

        $classifications = DB::table('classification_table')->select('classification_id', 'classification_name')->get();
        $owners = DB::table('owner_table')->select('owner_name', 'owner_role_id')->get();
        $controlTypes = DB::table('control_type_table')->select('control_type_id', 'control_type_name')->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $custodians = DB::table('custodian_table')->select('id', 'custodian_role_id', 'custodian_role_title')->distinct()->get();
        $bestPractices = DB::table('best_practice_table')->select('id', 'best_practice_id', 'best_practice_name')->distinct()->get();
        $domains = DB::table('domain_table')->select('id', 'main_domain_id', 'main_domain_name')->distinct()->get();
        $subDomains = DB::table('sub_domain_table')->select('id', 'sub_domain_id', 'sub_domain_name')->distinct()->get();
        $risks = DB::table('risk_master_table')->select('id', 'risk_id', 'risk_name')->distinct()->get();
        $controls = ControlMaster::select('control_id', 'control_name')->get();



        return view('process/control-identification/controls/create', compact('control', 'classifications', 'owners', 'controlTypes', 'categories', 'custodians', 'bestPractices', 'domains', 'subDomains', 'risks', 'controls', 'categoryIds', 'bestPracticeIds', 'custodianRoleIds', 'mainDomainIds', 'subDomainIds', 'riskIds'));
    }

    public function update(ControlMaster $control, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'control_id' => ['required', 'unique:control_master_table,control_id,' . $control->id],
            'control_name' => 'required',
            'control_name_ar' => 'nullable',
            'control_description' => 'nullable',
            'control_description_ar' => 'nullable',
            'classification_id' => 'required',
            'owner_id' => 'required',
            'control_level_title' => 'nullable',
            'control_parent' => 'nullable',
            'control_type_id' => 'required',
            'control_nature' => 'nullable',
            'control_criticality' => 'nullable',
            'control_iso_name' => 'nullable',
            'control_reference' => 'nullable',
            'implementation_mandatories' => 'nullable',
            'maturity_level' => 'nullable',
            'implementation_guidelines' => 'nullable',
            'control_dependency' => 'nullable',
            'categories' => 'required',
            'bestPractices' => 'required',
            'custodians' => 'required',
            'domains' => 'required',
            'subDomains' => 'required',
            'risks' => 'required',
            'control_critical_asset' => 'nullable',
            'control_cloud' => 'nullable',
            'control_telework' => 'nullable',
            'control_social_media' => 'nullable',
            'control_data_privicy' => 'nullable',
            'control_pii' => 'nullable',
            'control_pci_dss' => 'nullable',
            'control_e_commerce' => 'nullable',
            'control_infrastructure' => 'nullable',
            'control_application' => 'nullable',
            'control_hr' => 'nullable',
            'control_physical_security' => 'nullable',
            'control_third_party' => 'nullable',
            'control_operational' => 'nullable',
            'control_payment' => 'nullable',
            'control_e_banking' => 'nullable',
            'is_parent_control' => 'nullable',
        ]);

        $categories = $attributes['categories'];
        unset($attributes['categories']);

        $bestPractices = $attributes['bestPractices'];
        unset($attributes['bestPractices']);

        $custodians = $attributes['custodians'];
        unset($attributes['custodians']);

        $domains = $attributes['domains'];
        unset($attributes['domains']);

        $subDomains = $attributes['subDomains'];
        unset($attributes['subDomains']);

        $risks = $attributes['risks'];
        unset($attributes['risks']);

        $control->update($attributes);

        $control->categories()->sync($categories ?? []);
        $control->bestPractices()->sync($bestPractices ?? []);
        $control->custodians()->sync($custodians ?? []);
        $control->domains()->sync($domains ?? []);
        $control->subDomains()->sync($subDomains ?? []);
        $control->risks()->sync($risks ?? []);

        return redirect()->route('controls.index')->with('success', 'Control Saved Successfully.');
    }

    public function destroy(ControlMaster $control)
    {
        $control->categories()->detach();
        $control->bestPractices()->detach();
        $control->custodians()->detach();
        $control->domains()->detach();
        $control->subDomains()->detach();
        $control->risks()->detach();

        $control->delete();

        return redirect()->route('controls.index')->with('success', 'Control Deleted Successfully.');
    }
}
