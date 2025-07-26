<?php

namespace App\Http\Controllers;

use App\Models\VulnerabilityType;
use Illuminate\Http\Request;

class VaTypeController extends Controller
{

    public function index()
    {
        $vulnerabilityTypes = VulnerabilityType::paginate(20);
        return view('4-Process\vulnerability-management\vulnerability-types\index', compact('vulnerabilityTypes'));
    }

    public function show(VulnerabilityType $vulnerabilityType)
    {
        return view('4-Process\vulnerability-management\vulnerability-types\show', compact('vulnerabilityType'));
    }

    public function create()
    {
        $vulnerabilityType = null;
        return view('4-Process\vulnerability-management\vulnerability-types\create', compact('vulnerabilityType'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_type_id' => ['required', 'unique:va_type_table'],
            'va_type_name' => 'required',
            'va_description' => 'nullable',
            'va_remarks' => 'nullable',
        ]);

        VulnerabilityType::create($attributes);


        return redirect()->route('vulnerability-types.index')->with('success', 'VA Type saved successfully.');
    }

    public function edit(VulnerabilityType $vulnerabilityType)
    {
        return view('4-Process\vulnerability-management\vulnerability-types\create', compact('vulnerabilityType'));
    }

    public function update(VulnerabilityType $vulnerabilityType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_type_id' => ['required', 'unique:va_type_table,va_type_id,' . $vulnerabilityType->id],
            'va_type_name' => 'required',
            'va_description' => 'nullable',
            'va_remarks' => 'nullable',
        ]);

        $vulnerabilityType->update($attributes);


        return redirect()->route('vulnerability-types.index')->with('success', 'VA Type saved successfully.');
    }

    public function destroy(VulnerabilityType $vulnerabilityType)
    {
        $vulnerabilityType->delete();
        return redirect()->route('vulnerability-types.index')->with('success', 'VA Type deleted successfully.');
    }
}
