<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\Category;
use Illuminate\Http\Request;

class BestPracticeController extends Controller
{

    public function index()
    {
        $bestPractices = BestPractice::select('id', 'best_practice_id', 'best_practice_name', 'best_practices_release_year', 'best_practices_version', 'best_practices_country')
            ->orderBy('sort_order', 'asc')
            ->paginate(20);

        return view('process.initial-setup.best-practices.index', compact('bestPractices'));
    }

    public function show(BestPractice $bestPractice)
    {
        return view('process.initial-setup.best-practices.show', compact('bestPractice'));
    }

    public function create()
    {
        $bestPractice = null;
        $categories = Category::select('id', 'category_id', 'category_name')->get();

        return view('process.initial-setup.best-practices.create', compact('bestPractice', 'categories'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'best_practice_id' => ['required', 'unique:best_practice_table'],
            'best_practice_name' => 'required',
            'best_practices_source' => 'required',
            'best_practices_version' => 'nullable',
            'best_practices_country' => 'nullable',
            'best_practices_regulation' => ['nullable', 'in:Yes,No'],
            'best_practice_iso' => 'nullable',
            'best_practices_release_year' => 'nullable',
            'remarks' => 'nullable',
            'regulatory' => ['nullable', 'in:Yes,No'],
        ]);

        BestPractice::create($attributes);

        return redirect(route('best-practices.index'))
            ->with('success', 'Best Practice saved successfully.');
    }

    public function edit(BestPractice $bestPractice)
    {
        return view('process.initial-setup.best-practices.create', compact('bestPractice'));
    }


    public function update(BestPractice $bestPractice, Request $request)
    {
        $attributes = $request->validate([
            'best_practice_id' => ['required', 'unique:best_practice_table,best_practice_id,' . $bestPractice->id],
            'best_practice_name' => 'required',
            'best_practices_source' => 'required',
            'best_practices_version' => 'nullable',
            'best_practices_country' => 'nullable',
            'best_practices_regulation' => 'nullable',
            'best_practice_iso' => ['nullable', 'in:Yes,No'],
            'best_practices_release_year' => 'nullable',
            'remarks' => 'nullable',
            'regulatory' => ['nullable', 'in:Yes,No'],
        ]);

        $bestPractice->update($attributes);

        return redirect(route('best-practices.index'))
            ->with('success', 'Best Practice saved successfully.');
    }

    public function destroy(BestPractice $bestPractice)
    {

        $bestPractice->controls()->detach();
        $bestPractice->domains()->detach();
        $bestPractice->subDomains()->detach();
        $bestPractice->delete();

        return redirect(route('best-practices.index'))
            ->with('success', 'Best Practice deleted successfully.');
    }
}
