<?php

namespace App\Http\Controllers;

use App\Models\RiskSubType;
use App\Models\RiskType;
use Illuminate\Http\Request;

class RiskSubTypeController extends Controller
{

    public function index()
    {
        $riskSubTypes = RiskSubType::paginate(20);
        return view('process\risk-identification\risk-sub-types\index', compact('riskSubTypes'));
    }

    public function show(RiskSubType $riskSubType)
    {
        $riskSubType->load('type');

        return view('process\risk-identification\risk-sub-types\show', compact('riskSubType'));
    }

    public function create()
    {
        $riskSubType = null;
        $riskTypes = RiskType::select('risk_type_id', 'risk_type_name')->distinct()->get();

        return view('process\risk-identification\risk-sub-types\create', compact('riskSubType', 'riskTypes'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_sub_type_id' => ['required', 'unique:risk_sub_type_table'],
            'risk_type_id' => ['required'],
            'risk_sub_type_name' => 'required',
            'risk_sub_type_description' => 'nullable',
        ]);

        RiskSubType::create($attributes);

        return redirect()->route('risk-sub-types.index')->with('success', 'Risk Sub-type saved successfully.');
    }

    public function edit(RiskSubType $riskSubType)
    {
        $riskTypes = RiskType::select('risk_type_id', 'risk_type_name')->distinct()->get();

        return view('process\risk-identification\risk-sub-types\create', compact('riskSubType', 'riskTypes'));
    }

    public function update(RiskSubType $riskSubType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_sub_type_id' => ['required', 'unique:risk_sub_type_table,risk_sub_type_id,' . $riskSubType->id],
            'risk_sub_type_name' => 'required',
            'risk_type_id' => ['required'],
            'risk_sub_type_description' => 'nullable',
        ]);

        $riskSubType->update($attributes);

        return redirect()->route('risk-sub-types.index')->with('success', 'Risk Sub-type saved successfully.');
    }

    public function destroy(RiskSubType $riskSubType)
    {
        $riskSubType->delete();
        return redirect()->route('risk-sub-types.index')->with('success', 'Risk Sub-type deleted successfully.');
    }
}
