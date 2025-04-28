<?php

namespace App\Http\Controllers;

use App\Http\Requests\RiskMethodologyRequest;
use App\Models\Asset;
use App\Models\Objective;
use App\Models\Owner;
use App\Models\Risk;
use App\Models\RiskAcceptance;
use App\Models\RiskAppetite;
use App\Models\RiskMethodology;
use App\Models\ThreatAgent;
use App\Models\Vulnerability;
use Illuminate\Http\Request;

class RiskMethodologyController extends Controller
{
    private $_routeName = "risk-methodology";
    private $_primaryKey = "risk_methodology_id";

    public function index()
    {
        $riskMethodologies = RiskMethodology::with('asset', 'risk', 'owner')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/risk/risk-methodology/index', compact('routeName', 'riskMethodologies', 'primaryKey'));
    }

    public function show(RiskMethodology $riskMethodology)
    {
        $data = $riskMethodology->load('owner', 'appetite', 'acceptance', 'asset', 'threat', 'vulnerability', 'risk');

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/risk/risk-methodology/show', compact('riskMethodology', 'routeName', 'data', 'primaryKey'));
    }

    public function create()
    {
        $data = $riskMethodology = null;
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $appetites =  RiskAppetite::select('risk_appetite_id', 'risk_score')->get();
        $acceptances = RiskAcceptance::select('risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $assets = Asset::select('asset_id', 'asset_name')->get();
        $threats = ThreatAgent::select('threat_agent_id', 'threat_agent_name')->get();
        $vulnerabilities = Vulnerability::select('va_id', 'va_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $objectives = Objective::select('id', 'objective_id', 'objective')->get();


        return view('4-Process/risk/risk-methodology/create', compact('riskMethodology', 'assets', 'threats', 'vulnerabilities', 'risks', 'routeName', 'data', 'primaryKey', 'owners', 'appetites', 'acceptances', 'objectives'));
    }

    public function store(RiskMethodologyRequest $request)
    {
        $attributes = $request->validated();
        
        $objectives = $attributes['objectives'];
        unset($attributes['objectives']);

        $methodology = RiskMethodology::create($attributes);

        if ($objectives && $objectivesArray = json_decode($objectives, true)) {

            $methodology->objectives()
                ->attach($objectivesArray);
        }

        return redirect()->route($this->_routeName . '.index')->with('success', 'Risk Methodology Saved Successfully.');
    }

    public function edit(RiskMethodology $riskMethodology)
    {
        $data = $riskMethodology;
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $appetites =  RiskAppetite::select('risk_appetite_id', 'risk_score')->get();
        $acceptances = RiskAcceptance::select('risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $assets = Asset::select('asset_id', 'asset_name')->get();
        $threats = ThreatAgent::select('threat_agent_id', 'threat_agent_name')->get();
        $vulnerabilities = Vulnerability::select('va_id', 'va_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $objectives = Objective::select('id', 'objective_id', 'objective')->get();
        $objectiveIds = $riskMethodology->objectives()->pluck('objectives.objective_id')->toArray();

        return view('4-Process/risk/risk-methodology/create', compact('riskMethodology', 'assets', 'threats', 'vulnerabilities', 'risks', 'routeName', 'data', 'primaryKey', 'owners', 'appetites', 'acceptances', 'objectiveIds', 'objectives'));
    }

    public function update(RiskMethodology $riskMethodology, RiskMethodologyRequest $request)
    {
        $attributes = $request->validated();

        $objectives = $attributes['objectives'];
        unset($attributes['objectives']);

        $riskMethodology->update($attributes);

        if ($objectives && $objectivesArray = json_decode($objectives, true)) {

            $riskMethodology->objectives()
                ->sync($objectivesArray);
        }

        return redirect()->route($this->_routeName . '.index')->with('success', 'Risk Method saved successfully.');
    }

    public function destroy(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskMethodology::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->objectives()->detach(); // Detach the objectives relationship before deleting the record
        $data->delete();

        return redirect(route($this->_routeName . '.index'));
    }
}
