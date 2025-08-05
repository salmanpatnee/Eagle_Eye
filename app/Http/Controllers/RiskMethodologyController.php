<?php

namespace App\Http\Controllers;

use App\Http\Requests\RiskMethodologyRequest;
use App\Models\Asset;
use App\Models\Objective;
use App\Models\Organization;
use App\Models\Owner;
use App\Models\Risk;
use App\Models\RiskAcceptance;
use App\Models\RiskAppetite;
use App\Models\RiskMethodology;
use App\Models\RiskTreatment;
use App\Models\ThreatAgent;
use App\Models\Vulnerability;
use Mpdf\Mpdf;

class RiskMethodologyController extends Controller
{

    public function index()
    {
        $riskMethodologies = RiskMethodology::all();

        return view('process\risk-identification\risk-methodology\index', compact('riskMethodologies'));
    }

    public function show(RiskMethodology $riskMethodology)
    {
        $riskMethodology->load('objectives');

        $organization = Organization::first();
        $riskAppetites =  RiskAppetite::select('risk_appetite_id', 'risk_score', 'risk_appetite_color', 'risk_appetite_name')->orderBy('risk_appetite_id')->get();
        $impacts = ['Insignificant', 'Minor', 'Moderate', 'Major', 'Catastrophic'];

        if (request()->has('pdf')) {
            // Increase PCRE backtrack limit
            // ini_set('pcre.backtrack_limit', '1000000');

            $mpdf = new Mpdf();
            $bootstrapCSS = file_get_contents('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
            $mpdf->WriteHTML($bootstrapCSS, \Mpdf\HTMLParserMode::HEADER_CSS);

            // Get the HTML content
            $html = view("process/risk/risk-methodology/pdf", compact('riskMethodology', 'organization', 'riskAppetites', 'impacts'))->render();

            // Split HTML into smaller chunks (e.g. 500KB each)
            $chunks = str_split($html, 500000);

            // Write HTML chunks separately
            foreach ($chunks as $chunk) {
                $mpdf->WriteHTML($chunk);
            }

            // Set the headers to prompt the file download
            return response($mpdf->Output("RiskMethodology.pdf", 'D'))
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="RiskMethodology.pdf"');
        } else {
            return view('process\risk-identification\risk-methodology\show', compact('riskMethodology', 'organization', 'riskAppetites', 'impacts'));
        }
    }

    public function create()
    {
        $riskMethodology = null;
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $appetites =  RiskAppetite::select('risk_appetite_id', 'risk_score')->get();
        $acceptances = RiskAcceptance::select('risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $assets = Asset::select('asset_id', 'asset_name')->get();
        $threats = ThreatAgent::select('threat_agent_id', 'threat_agent_name')->get();
        $vulnerabilities = Vulnerability::select('va_id', 'va_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $riskTreatments =  RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')->get();
        $objectives = Objective::select('id', 'objective_id', 'objective')->get();
        $objectiveIds = [];

        return view('process\risk-identification\risk-methodology\create', compact('riskMethodology', 'assets', 'threats', 'vulnerabilities', 'risks', 'owners', 'appetites', 'acceptances', 'objectives', 'objectiveIds', 'riskTreatments'));
    }

    public function store(RiskMethodologyRequest $request)
    {
        $attributes = $request->validated();

        $objectives = $attributes['objectives'];
        unset($attributes['objectives']);

        $methodology = RiskMethodology::create($attributes);

        $methodology->objectives()->attach($objectives ?? []);

        return redirect()->route('risk-methodology.index')->with('success', 'Risk Methodologyology Saved Successfully.');
    }

    public function edit(RiskMethodology $riskMethodology)
    {
        $riskMethodology;
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $appetites =  RiskAppetite::select('risk_appetite_id', 'risk_score')->get();
        $acceptances = RiskAcceptance::select('risk_acceptance_id', 'risk_acceptance_source')->distinct()->get();
        $assets = Asset::select('asset_id', 'asset_name')->get();
        $threats = ThreatAgent::select('threat_agent_id', 'threat_agent_name')->get();
        $vulnerabilities = Vulnerability::select('va_id', 'va_name')->get();
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $riskTreatments =  RiskTreatment::select('risk_treatment_id', 'risk_treatment_name')->get();

        $objectives = Objective::select('id', 'objective_id', 'objective')->get();
        $objectiveIds = $riskMethodology->objectives()->pluck('objectives.objective_id')->toArray();

        return view('process\risk-identification\risk-methodology\create', compact('riskMethodology', 'assets', 'threats', 'vulnerabilities', 'risks', 'riskTreatments', 'owners', 'appetites', 'acceptances', 'objectiveIds', 'objectives'));
    }

    public function update(RiskMethodology $riskMethodology, RiskMethodologyRequest $request)
    {
        $attributes = $request->validated();

        $objectives = $attributes['objectives'];
        unset($attributes['objectives']);

        $riskMethodology->update($attributes);

        $riskMethodology->objectives()->sync($objectives ?? []);

        return redirect()->route('risk-methodology.index')->with('success', 'Risk Methodology saved successfully.');
    }

    public function destroy(RiskMethodology $riskMethodology)
    {

        $riskMethodology->objectives()->detach(); // Detach the objectives relationship before deleting the record
        $riskMethodology->delete();

        return redirect()->route('risk-methodology.index')->with('success', 'Risk Methodology deleted successfully.');
    }
}
