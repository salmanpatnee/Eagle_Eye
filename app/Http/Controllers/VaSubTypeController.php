<?php

namespace App\Http\Controllers;

use App\Models\VulnerabilitySubType;
use App\Models\VulnerabilityType;
use Illuminate\Http\Request;

class VaSubTypeController extends Controller
{

    public function index()
    {
        $vulnerabilitySubTypes = VulnerabilitySubType::with('type')->paginate(20);

        return view('4-Process\vulnerability-management\vulnerability-sub-types\index', compact('vulnerabilitySubTypes'));
    }

    public function show(VulnerabilitySubType $vulnerabilitySubType)
    {
        $vulnerabilitySubType->load('type');

        return view('4-Process\vulnerability-management\vulnerability-sub-types\show', compact('vulnerabilitySubType'));
    }

    public function create()
    {
        $vulnerabilitySubType = null;
        $vulnerabilityTypes = VulnerabilityType::all();
        return view('4-Process\vulnerability-management\vulnerability-sub-types\create', compact('vulnerabilitySubType', 'vulnerabilityTypes'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_sub_type_id' => ['required', 'unique:va_sub_type_table'],
            'va_sub_type_name' => 'required',
            'va_sub_type_description' => 'nullable',
            'va_sub_type_remarks' => 'nullable',
            'va_type_id' => 'required',
        ]);

        VulnerabilitySubType::create($attributes);



        return redirect()->route('vulnerability-sub-types.index')->with('success', 'VA Sub-type saved successfully.');
    }

    public function edit(VulnerabilitySubType $vulnerabilitySubType)
    {
        $vulnerabilityTypes = VulnerabilityType::all();

        return view('4-Process\vulnerability-management\vulnerability-sub-types\create', compact('vulnerabilitySubType', 'vulnerabilityTypes'));
    }

    public function update(VulnerabilitySubType $vulnerabilitySubType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_sub_type_id' => ['required', 'unique:va_sub_type_table,va_sub_type_id,' . $vulnerabilitySubType->id],
            'va_sub_type_name' => 'required',
            'va_sub_type_description' => 'nullable',
            'va_sub_type_remarks' => 'nullable',
            'va_type_id' => 'required',
        ]);

        $vulnerabilitySubType->update($attributes);


        return redirect()->route('vulnerability-sub-types.index')->with('success', 'VA Sub-type saved successfully.');
    }


    public function destroy(VulnerabilitySubType $vulnerabilitySubType)
    {
        $vulnerabilitySubType->delete();

        return redirect()->route('vulnerability-sub-types.index')->with('success', 'VA Sub-type deleted successfully.');
    }
}
