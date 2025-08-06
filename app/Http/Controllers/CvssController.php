<?php

namespace App\Http\Controllers;

use App\Models\CVSS;
use Illuminate\Http\Request;

class CvssController extends Controller
{
    public function index()
    {
        $cvss = CVSS::paginate(20);

        return view('process/vulnerability-management/cvss/index', compact('cvss'));
    }

    public function show(CVSS $cvss)
    {
        return view('process/vulnerability-management/cvss/show', compact('cvss'));
    }

    public function create()
    {
        $cvss = null;
        return view('process/vulnerability-management/cvss/create', compact('cvss'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'cvss_id' => 'required',
            'cvss_name' => 'nullable',
            'cvss_number' => 'nullable',
            'cvss_description' => 'nullable',
            'cvss_remarks' => 'nullable',
        ]);

        CVSS::create($attributes);

        return redirect()->route('cvss.index')->with('success', 'CVSS saved successfully.');
    }

    public function edit(CVSS $cvss)
    {
        return view('process/vulnerability-management/cvss/create', compact('cvss'));
    }

    public function update(CVSS $cvss, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'cvss_id' => 'required|unique:cvss_table,cvss_id,' . $cvss->id,
            'cvss_name' => 'nullable',
            'cvss_number' => 'nullable',
            'cvss_description' => 'nullable',
            'cvss_remarks' => 'nullable',
        ]);

        $cvss->update($attributes);

        return redirect()->route('cvss.index')->with('success', 'CVSS saved successfully.');
    }

    public function destroy(CVSS $cvss)
    {
        $cvss->delete();
        return redirect()->route('cvss.index')->with('success', 'CVSS deleted successfully.');
    }
}
