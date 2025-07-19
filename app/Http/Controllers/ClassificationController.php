<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassificationController extends Controller
{

    public function index()
    {
        $classifications = Classification::select('id', 'classification_id', 'classification_name', 'classification_source')->get();

        return view('4-Process.1-InitialSetup.classifications.index', compact('classifications'));
    }

    public function show(Classification $classification)
    {

        return view('4-Process.1-InitialSetup.classifications.show', compact('classification'));
    }

    public function create()
    {
        $classification = null;
        return view('4-Process.1-InitialSetup.classifications.create', compact('classification'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'classification_id' => ['required', 'unique:classification_table'],
            'classification_name' => 'required',
            'classification_description' => 'nullable',
            'classification_source' => 'nullable',
        ]);

        Classification::create($attributes);

        return redirect()->route('classifications.index')
            ->with('success', 'Classification saved successfully.');
    }


    public function edit(Classification $classification)
    {
        return view('4-Process.1-InitialSetup.classifications.create', compact('classification'));
    }


    public function update(Classification $classification, Request $request)
    {
        $attributes = $request->validate([
            'classification_id' => ['required', 'unique:classification_table,classification_id,' . $classification->id],
            'classification_name' => 'required',
            'classification_description' => 'nullable',
            'classification_source' => 'nullable',
        ]);

        $classification->update($attributes);

        return redirect()->route('classifications.index')
            ->with('success', 'Classification saved successfully.');
    }

    public function destroy(Classification $classification)
    {
        if ($classification->domains()->exists() || $classification->subDomains()->exists()) {
            return redirect(route('classifications.index'))
                ->with('error', "Classification '{$classification->classification_name}' cannot be deleted due to existing dependencies.");
        }

        $classification->delete();

        return redirect(route('classifications.index'))
            ->with('success', 'Classification deleted successfully.');
    }
}
