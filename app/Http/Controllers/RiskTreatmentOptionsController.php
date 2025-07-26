<?php

namespace App\Http\Controllers;

use App\Models\RiskTreatment;
use Illuminate\Http\Request;

class RiskTreatmentOptionsController extends Controller
{

    public function index()
    {
        $riskTreatments = RiskTreatment::get();

        return view('4-Process\risk-identification\risk-treatments\index', compact('riskTreatments'));
    }

    public function show(RiskTreatment $riskTreatmentOption)
    {
        return view('4-Process\risk-identification\risk-treatments\show', compact('riskTreatmentOption'));
    }


    public function create()
    {
        $riskTreatmentOption = null;

        return view('4-Process\risk-identification\risk-treatments\create', compact('riskTreatmentOption'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'risk_treatment_id' => ['required', 'unique:risk_treatment_options_table'],
            'risk_treatment_name' => 'required',
            'risk_treatment_description' => 'nullable',
        ]);

        RiskTreatment::create($attributes);

        return redirect()->route('risk-treatment-options.index')->with('success', 'Risk Treatment saved successfully.');
    }

    public function edit(RiskTreatment $riskTreatmentOption)
    {
        return view('4-Process\risk-identification\risk-treatments\create', compact('riskTreatmentOption'));
    }

    public function update(RiskTreatment $riskTreatmentOption, Request $request)
    {
        $attributes = $request->validate([
            'risk_treatment_id' => ['required', 'unique:risk_treatment_options_table,risk_treatment_id,' . $riskTreatmentOption->id],
            'risk_treatment_name' => 'required',
            'risk_treatment_description' => 'nullable',
        ]);

        $riskTreatmentOption->update($attributes);
        return redirect()->route('risk-treatment-options.index')->with('success', 'Risk Treatment saved successfully.');
    }

    public function destroy(RiskTreatment $riskTreatmentOption)
    {
        $riskTreatmentOption->delete();
        return redirect()->route('risk-treatment-options.index')->with('success', 'Risk Treatment deleted successfully.');
    }
}
