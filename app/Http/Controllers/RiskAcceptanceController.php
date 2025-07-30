<?php

namespace App\Http\Controllers;

use App\Models\RiskAcceptance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAcceptanceController extends Controller
{
    private $_routeName = "risk-acceptance";
    private $_primaryKey = "risk_acceptance_id";

    public function index()
    {
        $riskAcceptances = RiskAcceptance::with('control')->paginate(20);

        return view('4-Process\risk-identification\risk-acceptances\index', compact('riskAcceptances'));
    }

    public function show(RiskAcceptance $riskAcceptance)
    {
        $riskAcceptance->load('control');

        return view('4-Process\risk-identification\risk-acceptances\show', compact('riskAcceptance'));
    }

    public function create()
    {
        $riskAcceptance = null;
        $controls = DB::table('control_master_table')
            ->select('control_id', 'control_name')
            ->distinct()
            ->get();

        return view('4-Process\risk-identification\risk-acceptances\create', compact('riskAcceptance', 'controls'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'risk_acceptance_id' => ['required', 'unique:risk_acceptance_table'],
            'risk_acceptance_description' => 'nullable',
            'risk_acceptance_source' => 'required',
            'risk_acceptance_details' => 'nullable',
            'risk_acceptance_start_date' => 'nullable',
            'risk_acceptance_end_date' => 'nullable',
            'control_id' => 'required',
        ]);

        RiskAcceptance::create($attributes);

        return redirect(route('risk-acceptances.index'))->with('success', 'Risk Acceptance has been saved.');
    }

    public function edit(RiskAcceptance $riskAcceptance)
    {
        $controls = DB::table('control_master_table')
            ->select('control_id', 'control_name')
            ->distinct()
            ->get();

        return view('4-Process\risk-identification\risk-acceptances\create', compact('riskAcceptance', 'controls'));
    }

    public function update(RiskAcceptance $riskAcceptance, Request $request)
    {
        $attributes = $request->validate([
            'risk_acceptance_id' => ['required', 'unique:risk_acceptance_table,risk_acceptance_id,' . $riskAcceptance->id],
            'risk_acceptance_description' => 'nullable',
            'risk_acceptance_source' => 'required',
            'risk_acceptance_details' => 'nullable',
            'risk_acceptance_start_date' => 'nullable',
            'risk_acceptance_end_date' => 'nullable',
            'control_id' => 'required',
        ]);

        $riskAcceptance->update($attributes);

        return redirect(route('risk-acceptances.index'))->with('success', 'Risk Acceptance has been saved.');
    }

    public function destroy(RiskAcceptance $riskAcceptance)
    {
        $riskAcceptance->delete();

        return redirect(route('risk-acceptances.index'))->with('success', 'Risk Acceptance has been deleted.');
    }
}
