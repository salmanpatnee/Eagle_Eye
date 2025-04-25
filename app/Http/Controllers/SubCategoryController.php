<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subCategories = SubCategory::select('id', 'sub_category_id', 'sub_category_name', 'category_id')->with('category')->get();

        return view('4-Process.1-InitialSetup.sub-categories.index', compact('subCategories'));
    }

    public function show(SubCategory $subCategory)
    {
        $subCategory->load('category');

        return view('4-Process.1-InitialSetup.sub-categories.show', compact('subCategory'));
    }

    public function create()
    {
        $subCategory = null;
        $categories = Category::select('category_id', 'category_name')->get();

        return view('4-Process.1-InitialSetup.sub-categories.create', compact('subCategory', 'categories'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'sub_category_id' => ['required', 'unique:sub_category_table'],
            'sub_category_name' => 'required',
            'sub_category_description' => 'nullable',
            'category_id' => 'required',
        ]);

        SubCategory::create($attributes);

        return redirect(route('sub-categories.index'))
            ->with('success', 'Sub-Category saved successfully.');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = DB::table('category_table')->get();

        return view('4-Process.1-InitialSetup.sub-categories.create', compact('subCategory', 'categories'));
    }


    public function update(SubCategory $subCategory, Request $request)
    {
        $attributes = $request->validate([
            'sub_category_id' => ['required', 'unique:sub_category_table,sub_category_id,' . $subCategory->id],
            'sub_category_name' => 'required',
            'sub_category_description' => 'nullable',
            'category_id' => 'required',
        ]);

        $subCategory->update($attributes);

        return redirect(route('sub-categories.index'))
            ->with('success', 'Sub-Category saved successfully.');
    }


    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        SubCategory::where('id', $attributes['record'])->delete();

        // $ids =  $request->validate([
        //     'records' => ['required', 'array'],
        // ]);

        // SubCategory::whereIn('id', $ids['records'])->delete();

        return redirect(route('sub-categories.index'))
            ->with('success', 'Sub-Category deleted successfully.');
    }
}
