<?php

namespace App\Http\Controllers;

use App\Models\KeyRiskIndicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskKriController extends Controller
{
    private $_routeName = "riskkri";
    private $_primaryKey = "key_risk_indicator_id";

    public function index()
    {
        $keyRiskIndicators = KeyRiskIndicator::paginate(20);

        return view('process\risk-identification\kri\index', compact('keyRiskIndicators'));
    }

    public function show(KeyRiskIndicator $kri)
    {
        return view('process\risk-identification\kri\show', compact('kri'));
    }

    public function create()
    {
        $kri = null;
        return view('process\risk-identification\kri\create', compact('kri'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'key_risk_indicator_id' => ['required', 'unique:risk_kri_table'],
            'key_risk_indicator_name' => 'required',
            'key_risk_indicator_source' => 'required',
            'key_risk_indicator_value' => 'required',
            'key_risk_indicator_description' => 'nullable',
        ]);

        KeyRiskIndicator::create($attributes);

        return redirect()->route('kris.index')->with('success', 'Risk KRI saved successfully.');
    }

    public function edit(KeyRiskIndicator $kri)
    {
        return view('process\risk-identification\kri\create', compact('kri'));
    }


    public function update(KeyRiskIndicator $kri, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'key_risk_indicator_id' => ['required', 'unique:risk_kri_table,key_risk_indicator_id,' . $kri->id],
            'key_risk_indicator_name' => 'required',
            'key_risk_indicator_source' => 'required',
            'key_risk_indicator_description' => 'nullable',
            'key_risk_indicator_value' => 'required',
        ]);

        $kri->update($attributes);

        return redirect()->route('kris.index')->with('success', 'Risk KRI saved successfully.');
    }


    public function destroy(KeyRiskIndicator $kri)
    {
        $kri->delete();
        return redirect()->route('kris.index')->with('success', 'Risk KRI deleted successfully.');
    }
}
