<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::select('id', 'category_id', 'category_name', 'category_name_ar', 'Category_source')
            ->orderByRaw('CAST(SUBSTRING_INDEX(category_id, "-", 1) AS UNSIGNED)')
            ->orderByRaw('CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(category_id, "-", -1), ".", 1) AS UNSIGNED)')
            ->orderByRaw('SUBSTRING_INDEX(category_id, ".", -1)')
            ->paginate(20);

        return view('4-Process.1-InitialSetup.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('4-Process.1-InitialSetup.categories.show', compact('category'));
    }

    public function create()
    {
        $category = null;
        return view('4-Process.1-InitialSetup.categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'category_id' => ['required', 'unique:category_table'],
            'category_name' => 'required',
            'category_name_ar' => 'nullable',
            'category_description' => 'nullable',
            'Category_source' => 'nullable',
        ]);

        Category::create($attributes);

        return redirect(route('categories.index'))
            ->with('success', 'Category saved successfully.');
    }

    public function edit(Category $category)
    {
        return view('4-Process.1-InitialSetup.categories.create', compact('category'));
    }


    public function update(Category $category, Request $request)
    {
        $attributes = $request->validate([
            'category_id' => ['required', 'unique:category_table,category_id,' . $category->id],
            'category_name' => 'required',
            'category_name_ar' => 'nullable',
            'category_description' => 'nullable',
            'Category_source' => 'nullable',
        ]);

        $category->update($attributes);

        return redirect(route('categories.index'))
            ->with('success', 'Category saved successfully.');
    }



    public function destroy(Category $category)
    {
        if ($category->subCategories()->exists()) {
            return redirect(route('categories.index'))
                ->with('error', "Category {$category->category_name} cannot be deleted due to existing dependencies.");
        }

        $category->delete();

        return redirect(route('categories.index'))
            ->with('success', 'Category deleted successfully.');
    }
}
