<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Owner;
use App\Models\Risk;
use App\Models\RiskAcceptance;
use App\Models\RiskAppetite;
use App\Models\RiskMethodology;
use App\Models\ThreatAgent;
use App\Models\Vulnerability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskMethodologyController extends Controller
{
    private $_routeName = "riskmethod";
    private $_primaryKey = "risk_methodology_id";

    // To add data into the table
    public function create()
    {
        $data = $riskmethod = null;
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $appetites =  RiskAppetite::select('risk_appetite_id', 'risk_score')->get();
        $acceptances = RiskAcceptance::select('risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $assets = Asset::select('asset_id', 'asset_name')->get();
        $threats = ThreatAgent::select('threat_agent_id', 'threat_agent_name')->get();
        $vulnerabilities = Vulnerability::select('va_id', 'va_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/2-RiskMethodologyForm', compact('riskmethod', 'assets', 'threats', 'vulnerabilities', 'risks', 'routeName', 'data', 'primaryKey', 'owners', 'appetites', 'acceptances'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $riskmethod = DB::table('risk_methodology_table')->where('risk_methodology_id', $id)->first();
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $appetites =  RiskAppetite::select('risk_appetite_id', 'risk_score')->get();
        $acceptances = RiskAcceptance::select('risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $assets = Asset::select('asset_id', 'asset_name')->get();
        $threats = ThreatAgent::select('threat_agent_id', 'threat_agent_name')->get();
        $vulnerabilities = Vulnerability::select('va_id', 'va_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/2-RiskMethodologyForm', compact('riskmethod', 'assets', 'threats', 'vulnerabilities', 'risks', 'routeName', 'data', 'primaryKey', 'owners', 'appetites', 'acceptances'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_methodology_id' => ['required', 'unique:risk_methodology_table'],
            'background' => 'nullable',
            'owner_id' => 'nullable',
            'risk_methodology_source' => 'nullable',
            'asset_identification' => 'nullable',
            'threat_identification' => 'nullable',
            'vulnerability_identification' => 'nullable',
            'risk_appetite_determination' => 'nullable',
            'risk_assessment_approach' => 'nullable',
            'risk_name' => 'nullable',
            'risk_treatment' => 'nullable',
            'residual_risk' => 'nullable',
            'risk_acceptance' => 'nullable',
            'risk_audit' => 'nullable',
            'risk_change_management' => 'nullable',
        ]);

        RiskMethodology::create($attributes);

        return redirect()->route('riskmethod.index')->with('success', 'Risk Method saved successfully.');
    }

    public function update(RiskMethodology $riskMethodology, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_methodology_id' => ['required', 'unique:risk_methodology_table,risk_methodology_id,' . $riskMethodology->id],
            'background' => 'nullable',
            'owner_id' => 'nullable',
            'risk_methodology_source' => 'nullable',
            'asset_identification' => 'nullable',
            'threat_identification' => 'nullable',
            'vulnerability_identification' => 'nullable',
            'risk_appetite_determination' => 'nullable',
            'risk_assessment_approach' => 'nullable',
            'risk_name' => 'nullable',
            'risk_treatment' => 'nullable',
            'residual_risk' => 'nullable',
            'risk_acceptance' => 'nullable',
            'risk_audit' => 'nullable',
            'risk_change_management' => 'nullable',
        ]);

        $riskMethodology->update($attributes);

        return redirect()->route('riskmethod.index')->with('success', 'Risk Method saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = RiskMethodology::with('asset', 'risk', 'owner')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        

        return view('4-Process/7-Risk/2-RiskMethodologyList', compact('routeName', 'columns', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskMethodology::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_methodology_table')->whereIn('risk_methodology_id', $selecteddelete)->delete();
        }
        return redirect('/risk-methodology-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show(RiskMethodology $riskMethodology)
    {
        $data = $riskMethodology->load('owner', 'appetite', 'acceptance', 'asset', 'threat', 'vulnerability', 'risk');
     
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/2-RiskMethodologyTable', compact('riskMethodology', 'routeName', 'data', 'primaryKey'));
    }
}
