<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KPICategories;
use Illuminate\Http\Request;

class KPICategoryController extends Controller
{

    private $_routeName = "kpi-categories";
    private $_primaryKey = "kpi_id";


    public function index()
    {
        $kpiCategories = KPICategories::all();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/KpiCategories/index', compact('kpiCategories', 'routeName', 'primaryKey'));
    }

    public function show(KPICategories $category)
    {
        $data = $category;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/KpiCategories/show', compact('category', 'data', 'routeName', 'primaryKey'));
    }

    public function create()
    {

        $data = $category = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/KpiCategories/create', compact('category', 'data', 'routeName', 'primaryKey'));
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

    public function edit(KPICategories $category)
    {
        $data = $category;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/KpiCategories/create', compact('category', 'data', 'routeName', 'primaryKey'));
    }


    public function update(KPICategories $category, Request $request)
    {
        $attributes = $request->validate([
            'kpi_id' => ['required', 'unique:kpi_categories,kpi_id,' . $category->id],
            'kpi_name' => 'required',
            'kpi_name_ar' => 'nullable',
            'conclusion' => 'nullable',
        ]);

        $category->update($attributes);

        return redirect(route('kpi-categories.index'))
            ->with('success', 'Category saved successfully.');
    }



    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        KPICategories::where('kpi_id', $attributes['record'])->delete();

        return redirect(route('kpi-categories.index'))
            ->with('success', 'Category deleted successfully.');
    }

    public function report()
    {
        $references = Category::select('category_id', 'category_name', 'category_name_ar')
            ->whereHas('standards')
            ->orderBy('category_name')
            ->get();

        return view('4-Process/KpiReferences/index', compact('references'));
    }
}
