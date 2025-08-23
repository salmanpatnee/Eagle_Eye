<?php

namespace App\Http\Controllers;

use App\Models\Vulnerability;
use App\Models\VulnerabilitySubType;
use App\Models\VulnerabilityType;
use Illuminate\Http\Request;

class VaMasterController extends Controller
{
    public function index()
    {
        $vulnerabilities = Vulnerability::with('type', 'subType')->paginate(20);
        return view('process\vulnerability-management\vulnerabilities/index', compact('vulnerabilities'));
    }

    public function show(Vulnerability $vulnerability)
    {
        $vulnerability->load('type', 'subType');
        return view('process\vulnerability-management\vulnerabilities/show', compact('vulnerability'));
    }

    public function create()
    {
        $vulnerability = null;
        $vulnerabilityTypes =  VulnerabilityType::all();
        $vulnerabilitySubTypes =  VulnerabilitySubType::all();

        return view('process\vulnerability-management\vulnerabilities/create', compact('vulnerability', 'vulnerabilityTypes', 'vulnerabilitySubTypes'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'va_id' => ['required', 'unique:va_table'],
            'va_name' => 'required',
            'va_master_description' => 'nullable',
            'va_type_id' => 'required',
            'va_sub_type_id' => 'required',
        ]);

        Vulnerability::create($attributes);

        return redirect()->route('vulnerabilities.index')->with('success', 'Vulnerability Saved Successfully.');
    }

    public function edit(Vulnerability $vulnerability)
    {
        $vulnerabilityTypes =  VulnerabilityType::all();
        $vulnerabilitySubTypes =  VulnerabilitySubType::all();

        return view('process\vulnerability-management\vulnerabilities/create', compact('vulnerability', 'vulnerabilityTypes', 'vulnerabilitySubTypes'));
    }

    public function update(Vulnerability $vulnerability, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_id' => ['required', 'unique:va_table,va_id,' . $vulnerability->id],
            'va_name' => 'required',
            'va_master_description' => 'nullable',
            'va_type_id' => 'required',
            'va_sub_type_id' => 'required',
        ]);

        $vulnerability->update($attributes);


        return redirect()->route('vulnerabilities.index')->with('success', 'Vulnerability Saved Successfully.');
    }

    public function destroy(Vulnerability $vulnerability)
    {
        $vulnerability->delete();
        return redirect()->route('vulnerabilities.index')->with('success', 'Vulnerability Deleted Successfully.');
    }
}
