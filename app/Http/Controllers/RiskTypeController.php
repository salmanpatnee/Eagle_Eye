<?php

namespace App\Http\Controllers;

use App\Models\RiskType;
use Illuminate\Http\Request;

class RiskTypeController extends Controller
{
    public function index()
    {
        $riskTypes = RiskType::paginate(20);

        return view('4-Process\risk-identification\risk-types\index', compact('riskTypes'));
    }

    public function show(RiskType $riskType)
    {
        return view('4-Process\risk-identification\risk-types\show', compact('riskType'));
    }

    public function create()
    {
        $riskType = null;

        return view('4-Process\risk-identification\risk-types\create', compact('riskType'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_type_id' => ['required', 'unique:risk_type_table'],
            'risk_type_name' => 'required',
            'risk_type_description' => 'nullable',
        ]);

        RiskType::create($attributes);

        return redirect()->route('risk-types.index')->with('success', 'Risk Type saved successfully.');
    }

    public function edit(RiskType $riskType)
    {
        return view('4-Process\risk-identification\risk-types\create', compact('riskType'));
    }

    public function update(RiskType $riskType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_type_id' => ['required', 'unique:risk_type_table,risk_type_id,' . $riskType->id],
            'risk_type_name' => 'required',
            'risk_type_description' => 'nullable',
        ]);

        $riskType->update($attributes);

        return redirect()->route('risk-types.index')->with('success', 'Risk Type saved successfully.');
    }

    public function destroy(RiskType $riskType)
    {
        $riskType->delete();
        return redirect()->route('risk-types.index')->with('success', 'Risk Type deleted successfully.');
    }
}
