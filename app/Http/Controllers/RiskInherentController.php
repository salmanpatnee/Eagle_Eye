<?php

namespace App\Http\Controllers;

use App\Models\RiskAppetite;
use App\Models\RiskInherent;
use Illuminate\Http\Request;

class RiskInherentController extends Controller
{

    public function index()
    {
        $riskInherents = RiskInherent::paginate(20);

        return view('4-Process\risk-identification\risk-inherents\index', compact('riskInherents'));
    }

    public function show(RiskInherent $riskInherent)
    {
        return view('4-Process\risk-identification\risk-inherents\show', compact('riskInherent'));
    }

    public function create()
    {
        $riskInherent = null;
        $riskAppetites = RiskAppetite::select('id', 'risk_appetite_id', 'risk_appetite_name')->get();

        return view('4-Process\risk-identification\risk-inherents\create', compact('riskInherent', 'riskAppetites'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_inherent_id' => ['required', 'unique:risk_inherent_table'],
            'risk_inherent_description' => 'nullable',
            'risk_appetite_id' => 'required',
            'risk_inherent_impact' => 'required',
            'risk_inherent_likelihood' => 'required',
            'risk_inherent_score' => 'required',
        ]);

        RiskInherent::create($attributes);


        return redirect()->route('risk-inherents.index')->with('success', 'Risk Inherent Saved Successfully.');
    }

    public function edit(RiskInherent $riskInherent)
    {
        $riskAppetites = RiskAppetite::select('id', 'risk_appetite_id', 'risk_appetite_name')->get();

        return view('4-Process\risk-identification\risk-inherents\create', compact('riskInherent', 'riskAppetites'));
    }

    public function update(RiskInherent $riskInherent, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_inherent_id' => ['required', 'unique:risk_inherent_table,risk_inherent_id,' . $riskInherent->id],
            'risk_inherent_description' => 'nullable',
            'risk_appetite_id' => 'required',
            'risk_inherent_impact' => 'required',
            'risk_inherent_likelihood' => 'required',
            'risk_inherent_score' => 'required',
        ]);

        $riskInherent->update($attributes);

        return redirect()->route('risk-inherents.index')->with('success', 'Risk Inherent Saved Successfully.');
    }

    public function destroy(RiskInherent $riskInherent)
    {
        $riskInherent->delete();
        return redirect()->route('risk-inherents.index')->with('success', 'Risk Inherent Deleted Successfully.');
    }
}
