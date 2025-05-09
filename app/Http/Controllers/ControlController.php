<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use App\Models\ControlMaster;
use App\Models\Custodian;
use App\Models\Domain;
use App\Models\Owner;
use App\Models\Risk;
use App\Models\SubDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    private $_routeName = "controlmaster";
    private $_primaryKey = "control_id";


    // To add data into the table
    public function create()
    {
        $data = $controlmaster = null;
        $classificationtable = DB::table('classification_table')->get();
        $ownername = DB::table('owner_table')->select('owner_name', 'owner_role_id')->get();
        $controltype = DB::table('control_type_table')->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $custodians = DB::table('custodian_table')->select('id', 'custodian_role_id', 'custodian_role_title')->distinct()->get();
        $bestPractices = DB::table('best_practice_table')->select('id', 'best_practices_id', 'best_practices_name')->distinct()->get();
        $domains = DB::table('domain_table')->select('id', 'main_domain_id', 'main_domain_name')->distinct()->get();
        $subDomains = DB::table('sub_domain_table')->select('id', 'sub_domain_id', 'sub_domain_name')->distinct()->get();
        $risks = DB::table('risk_master_table')->select('id', 'risk_id', 'risk_name')->distinct()->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/8-Control/1-ControlIdentificationForm', compact('controlmaster', 'classificationtable', 'ownername', 'controltype', 'categories', 'custodians', 'bestPractices', 'domains', 'subDomains', 'risks', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit(ControlMaster $control)
    {
        $data = $controlmaster = $control->load('classification', 'owner', 'type', 'categories', 'bestPractices', 'custodians', 'domains', 'subDomains', 'risks');
        $categoryIds = $controlmaster->categories()->pluck('category_table.category_id')->toArray();
        $bestPracticeIds = $controlmaster->bestPractices()->pluck('best_practice_table.best_practices_id')->toArray();
        $custodianRoleIds = $controlmaster->custodians()->pluck('custodian_table.custodian_role_id')->toArray();
        $mainDomainIds = $controlmaster->domains()->pluck('domain_table.main_domain_id')->toArray();
        $subDomainIds = $controlmaster->subDomains()->pluck('sub_domain_table.sub_domain_id')->toArray();
        $riskIds = $controlmaster->risks()->pluck('risk_master_table.risk_id')->toArray();


        // $controlmaster = DB::table('control_master_table')->where('control_id', $id)->first();
        $classificationtable = DB::table('classification_table')->get();
        $ownername = DB::table('owner_table')->select('owner_name', 'owner_role_id')->get();
        $controltype = DB::table('control_type_table')->get();
        $categories = DB::table('category_table')->select('id', 'category_id', 'category_name')->distinct()->get();
        $custodians = DB::table('custodian_table')->select('id', 'custodian_role_id', 'custodian_role_title')->distinct()->get();
        $bestPractices = DB::table('best_practice_table')->select('id', 'best_practices_id', 'best_practices_name')->distinct()->get();
        $domains = DB::table('domain_table')->select('id', 'main_domain_id', 'main_domain_name')->distinct()->get();
        $subDomains = DB::table('sub_domain_table')->select('id', 'sub_domain_id', 'sub_domain_name')->distinct()->get();
        $risks = DB::table('risk_master_table')->select('id', 'risk_id', 'risk_name')->distinct()->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/8-Control/1-ControlIdentificationForm', compact('controlmaster', 'riskIds', 'subDomainIds', 'mainDomainIds', 'custodianRoleIds', 'categoryIds', 'bestPracticeIds', 'classificationtable', 'ownername', 'controltype', 'categories', 'custodians', 'bestPractices', 'domains', 'subDomains', 'risks', 'routeName', 'data', 'primaryKey'));
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

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $control->categories()->attach($categoriesArray);
        }
        if ($bestPractices && $bestPracticesArray = json_decode($bestPractices, true)) {
            $control->bestPractices()->attach($bestPracticesArray);
        }
        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $control->custodians()->attach($custodiansArray);
        }
        if ($domains && $domainsArray = json_decode($domains, true)) {
            $control->domains()->attach($domainsArray);
        }
        if ($subDomains && $subDomainsArray = json_decode($subDomains, true)) {
            $control->subDomains()->attach($subDomainsArray);
        }
        if ($risks && $risksArray = json_decode($risks, true)) {
            $control->risks()->attach($risksArray);
        }


        return redirect()->route('controlmaster.index')->with('success', 'Control Saved Successfully.');
    }

    // To store the edited data into the table
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

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $control->categories()->sync($categoriesArray);
        }
        if ($bestPractices && $bestPracticesArray = json_decode($bestPractices, true)) {
            $control->bestPractices()->sync($bestPracticesArray);
        }
        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $control->custodians()->sync($custodiansArray);
        }
        if ($domains && $domainsArray = json_decode($domains, true)) {
            $control->domains()->sync($domainsArray);
        }
        if ($subDomains && $subDomainsArray = json_decode($subDomains, true)) {
            $control->subDomains()->sync($subDomainsArray);
        }
        if ($risks && $risksArray = json_decode($risks, true)) {
            $control->risks()->sync($risksArray);
        }


        return redirect()->route('controlmaster.index')->with('success', 'Control Saved Successfully.');
    }

    //--------------------------------------------------------------------//


    // 2.Controller - SHOW DATA INTO THE LIST

    public function index(Request $request)
    {
        $control = $request->input('control') ?? null;
        $owner = $request->input('owner') ?? null;
        $risk = $request->input('risk') ?? null;
        $bestPractice = $request->input('bestPractice') ?? null;

        $controlNames = ControlMaster::select('control_id', 'control_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $bestPractices = BestPractice::select('best_practices_id', 'best_practices_name', 'sort_order')->orderBy('sort_order')->get();



        $controls = ControlMaster::join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')
            ->with('risks')
            ->when($control, function ($query, $control) {
                $query->where('control_master_table.control_id', $control);
            })->when(
                $bestPractice,
                function ($query, $bestPractice) {
                    $query->whereHas('bestPractices', function ($query) use ($bestPractice) {
                        $query->where('best_practice_table.best_practices_id', $bestPractice);
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
            ->paginate(200);

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/8-Control/1-ControlIdentificationList', compact('controls', 'controlNames', 'risks', 'owners', 'bestPractices', 'routeName', 'primaryKey'));
    }


    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = ControlMaster::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();

        $data->categories()->detach();
        $data->bestPractices()->detach();
        $data->custodians()->detach();
        $data->domains()->detach();
        $data->subDomains()->detach();
        $data->risks()->detach();
        $data->delete();


        return redirect(route($this->_routeName . '.index'));


        $selectedcontrolidenti = $request->input('selectedcontrolidenti');


        if (count($selectedcontrolidenti)) {
            foreach ($selectedcontrolidenti as $id) {
                $control = ControlMaster::where('id', $id)->first();

                $control->categories()->detach();
                $control->bestPractices()->detach();
                $control->custodians()->detach();
                $control->domains()->detach();
                $control->subDomains()->detach();
                $control->risks()->detach();
                $control->delete();
            }
        }
        // if (!empty($selectedcontrolidenti)) {
        //     DB::table('control_master_table')->whereIn('id', $selectedcontrolidenti)->delete();
        // }
        return redirect('/control-identification-list');
    }


    // 4.Controller - DETAILED TABLE
    public function show(ControlMaster $control)
    {
        $data = $control->load('classification', 'owner', 'type', 'categories', 'bestPractices', 'custodians', 'domains', 'subDomains', 'risks');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/8-Control/1-ControlIdentificationTable', compact('control', 'routeName', 'data', 'primaryKey'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $controlClassNames = DB::table('classification_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlCatNames = DB::table('category_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlOwnerNames = DB::table('owner_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlCustoNames = DB::table('custodian_name_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlCustoRoles = DB::table('custodian_table')
            ->join('custodian_name_table', 'custodian_name_table.custodian_role_id', '=', 'custodian_table.custodian_role_id')
            ->select('*')
            ->distinct()
            ->get();
        $controlTypeNames = DB::table('control_type_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlDomainNames = DB::table('domain_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlSubDomainNames = DB::table('sub_domain_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlBestPracticeNames = DB::table('best_practice_table')
            ->select('*')
            ->distinct()
            ->get();
        $controlrisknames = DB::table('risk_master_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/8-Control/1-ControlIdentificationForm', compact('controlClassNames', 'controlCatNames', 'controlOwnerNames', 'controlCustoNames', 'controlCustoRoles', 'controlTypeNames', 'controlDomainNames', 'controlSubDomainNames', 'controlBestPracticeNames', 'controlrisknames'));
    }
}
