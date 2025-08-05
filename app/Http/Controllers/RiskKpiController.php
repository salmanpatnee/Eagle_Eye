<?php

namespace App\Http\Controllers;

use App\Models\KeyPerformanceIndicator;
use Illuminate\Http\Request;

class RiskKpiController extends Controller
{

    public function index()
    {
        $keyPerformanceIndicators = KeyPerformanceIndicator::paginate(20);

        return view('process\risk-identification\kpi\index', compact('keyPerformanceIndicators'));
    }

    public function show(KeyPerformanceIndicator $kpi)
    {

        return view('process\risk-identification\kpi\show', compact('kpi'));
    }

    public function create()
    {
        $kpi = null;
        return view('process\risk-identification\kpi\create', compact('kpi'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'key_performance_indicatory_id' => ['required', 'unique:risk_kpi_table'],
            'key_performance_indicatory_name' => 'required',
            'key_performance_indicatory_source' => 'required',
            'key_performance_indicatory_value' => 'required',
            'key_performance_indicatory_description' => 'nullable',
        ]);

        KeyPerformanceIndicator::create($attributes);


        return redirect()->route('kpis.index')->with('success', 'Risk KPI saved successfully.');
    }

    public function edit(KeyPerformanceIndicator $kpi)
    {
        return view('process\risk-identification\kpi\create', compact('kpi'));
    }


    public function update(KeyPerformanceIndicator $kpi, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'key_performance_indicatory_id' => ['required', 'unique:risk_kpi_table,key_performance_indicatory_id,' . $kpi->id],
            'key_performance_indicatory_source' => 'required',
            'key_performance_indicatory_name' => 'required',
            'key_performance_indicatory_value' => 'required',
            'key_performance_indicatory_description' => 'nullable',
        ]);

        $kpi->update($attributes);

        return redirect()->route('kpis.index')->with('success', 'Risk KPI saved successfully.');
    }


    public function destroy(KeyPerformanceIndicator $kpi)
    {
        $kpi->delete();
        return redirect()->route('kpis.index')->with('success', 'Risk KPI deleted successfully.');
    }
}
