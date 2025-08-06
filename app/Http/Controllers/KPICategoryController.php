<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KPICategories;
use Illuminate\Http\Request;

class KPICategoryController extends Controller
{
    public function index()
    {
        $kpiCategories = KPICategories::paginate(20);

        return view('process/kpi-categories/index', compact('kpiCategories'));
    }

    public function show(KPICategories $kpiCategory)
    {
        return view('process/kpi-categories/show', compact('kpiCategory'));
    }

    public function create()
    {
        $kpiCategory = null;

        return view('process/kpi-categories/create', compact('kpiCategory'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'kpi_id' => ['required', 'unique:kpi_categories'],
            'kpi_name' => 'required',
            'kpi_name_ar' => 'nullable',
            'conclusion' => 'nullable',
        ]);

        KPICategories::create($attributes);

        return redirect(route('kpi-categories.index'))
            ->with('success', 'Category saved successfully.');
    }

    public function edit(KPICategories $kpiCategory)
    {
        return view('process/kpi-categories/create', compact('kpiCategory'));
    }


    public function update(KPICategories $kpiCategory, Request $request)
    {
        $attributes = $request->validate([
            'kpi_id' => ['required', 'unique:kpi_categories,kpi_id,' . $kpiCategory->id],
            'kpi_name' => 'required',
            'kpi_name_ar' => 'nullable',
            'conclusion' => 'nullable',
        ]);

        $kpiCategory->update($attributes);

        return redirect(route('kpi-categories.index'))
            ->with('success', 'Category saved successfully.');
    }



    public function destroy(KPICategories $kpiCategory)
    {
        $kpiCategory->delete();
        return redirect(route('kpi-categories.index'))
            ->with('success', 'Category deleted successfully.');
    }

    public function report()
    {
        $references = Category::select('id', 'category_id', 'category_name', 'category_name_ar')
            ->whereHas('standards')
            ->orderBy('category_name')
            ->get();

        return view('process/kpi-references/index', compact('references'));
    }
}
