<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use App\Models\KPICategories;
use App\Models\KPIStandards;
use Illuminate\Http\Request;

class KPIStandardController extends Controller
{
    public function index()
    {
        $kpis = KPIStandards::with('category', 'bestPractice')->paginate(20);
        return view('process/control-identification/control-kpis/index', compact('kpis'));
    }

    public function show(KPIStandards $kpiStandard)
    {
        $kpiStandard->load('category', 'bestPractice');

        return view('process/control-identification/control-kpis/show', compact('kpiStandard'));
    }

    public function create()
    {
        $kpiStandard = null;
        $categories =  Category::select('category_id', 'category_name')->get();
        $bestPractices =  BestPractice::select('best_practices_id', 'best_practices_name')->get();
        $frequencyUnits = KPIStandards::FREQUENCY_UNITS;
        return view('process/control-identification/control-kpis/create', compact('kpiStandard', 'categories', 'bestPractices', 'frequencyUnits'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'kpi_id' => ['required', 'unique:kpi_standards'],
            'category_id' => 'required',
            'best_practice_id' => 'nullable',
            'kpi_name' => 'required',
            'kpi_value' => 'nullable',
            'reference' => 'required',
            'remarks' => 'nullable',
            'priority' => 'nullable|numeric',
            'kpi_frequency_value' => 'nullable|string',
            'kpi_frequency_unit' => 'nullable|string',
        ]);

        // return $attributes;

        KPIStandards::create($attributes);

        return redirect(route('kpi-standards.index'))
            ->with('success', 'Standard saved successfully.');
    }

    public function edit(KPIStandards $kpiStandard)
    {
        $categories =  Category::select('category_id', 'category_name')->get();
        $bestPractices =  BestPractice::select('best_practices_id', 'best_practices_name')->get();
        $frequencyUnits = KPIStandards::FREQUENCY_UNITS;

        return view('process/control-identification/control-kpis/create', compact('kpiStandard', 'categories', 'bestPractices', 'frequencyUnits'));
    }

    public function update(KPIStandards $kpiStandard, Request $request)
    {
        $attributes = $request->validate([
            'kpi_id' => ['required', 'unique:kpi_standards,kpi_id,' . $kpiStandard->id],
            'category_id' => 'required',
            'best_practice_id' => 'nullable',
            'kpi_name' => 'required',
            'kpi_value' => 'nullable',
            'reference' => 'required',
            'remarks' => 'nullable',
            'priority' => 'nullable|numeric',
            'kpi_frequency_value' => 'nullable|string',
            'kpi_frequency_unit' => 'nullable|string',
        ]);

        $kpiStandard->update($attributes);

        return redirect(route('kpi-standards.index'))
            ->with('success', 'Category saved successfully.');
    }

    public function destroy(KPIStandards $kpiStandard)
    {
        $kpiStandard->delete();

        return redirect(route('kpi-standards.index'))
            ->with('success', 'Standard deleted successfully.');
    }
}
