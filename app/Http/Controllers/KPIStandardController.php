<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use App\Models\KPICategories;
use App\Models\KPIStandards;
use Illuminate\Http\Request;

class KPIStandardController extends Controller
{

    private $_routeName = "kpi-standards";
    private $_primaryKey = "kpi_id";


    public function index()
    {
        $kpis = KPIStandards::with('category', 'bestPractice')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/KpiStandards/index', compact('kpis', 'routeName', 'primaryKey'));
    }

    public function show(KPIStandards $kpi)
    {
        $data = $kpi->load('category', 'bestPractice');



        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/KpiStandards/show', compact('kpi', 'data', 'routeName', 'primaryKey'));
    }

    public function create()
    {

        $data = $kpi = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $categories =  Category::select('category_id', 'category_name')->get();
        $bestPractices =  BestPractice::select('best_practices_id', 'best_practices_name')->get();
        $frequencyUnits = KPIStandards::FREQUENCY_UNITS;
        return view('4-Process/KpiStandards/create', compact('kpi', 'data', 'routeName', 'primaryKey', 'categories', 'bestPractices', 'frequencyUnits'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'kpi_id' => ['required', 'unique:kpi_standards'],
            'category_id' => 'required',
            'best_practice_id' => 'nullable',
            'kpi_name' => 'required',
            'kpi_value' => 'nullable',
            'reference' => 'nullable',
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

    public function edit(KPIStandards $kpi)
    {
        $data = $kpi;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $categories =  Category::select('category_id', 'category_name')->get();
        $bestPractices =  BestPractice::select('best_practices_id', 'best_practices_name')->get();
        $frequencyUnits = KPIStandards::FREQUENCY_UNITS;

        return view('4-Process/KpiStandards/create', compact('kpi', 'data', 'routeName', 'primaryKey', 'categories', 'bestPractices', 'frequencyUnits'));
    }


    public function update(KPIStandards $kpi, Request $request)
    {
        $attributes = $request->validate([
            'kpi_id' => ['required', 'unique:kpi_standards,kpi_id,' . $kpi->id],
            'category_id' => 'required',
            'best_practice_id' => 'nullable',
            'kpi_name' => 'required',
            'kpi_value' => 'nullable',
            'reference' => 'nullable',
            'remarks' => 'nullable',
            'priority' => 'nullable|numeric',
            'kpi_frequency_value' => 'nullable|string',
            'kpi_frequency_unit' => 'nullable|string',
        ]);

        $kpi->update($attributes);

        return redirect(route('kpi-standards.index'))
            ->with('success', 'Category saved successfully.');
    }



    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        KPIStandards::where('kpi_id', $attributes['record'])->delete();

        return redirect(route('kpi-standards.index'))
            ->with('success', 'Standard deleted successfully.');
    }
}
