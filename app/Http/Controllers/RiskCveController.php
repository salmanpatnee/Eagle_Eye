<?php

namespace App\Http\Controllers;

use App\Models\CVE;
use Illuminate\Http\Request;

class RiskCveController extends Controller
{
    public function index()
    {
        $cves = CVE::paginate(20);

        return view('process/vulnerability-management/cves/index', compact('cves'));
    }

    public function show(CVE $cfe)
    {
        return view('process/vulnerability-management/cves/show', compact('cfe'));
    }

    public function create()
    {
        $cfe = null;
        return view('process/vulnerability-management/cves/create', compact('cfe'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'cve_id' => 'required',
            'cve_name' => 'nullable',
            'cve_number' => 'nullable',
            'cve_description' => 'nullable',
            'cve_ramarks' => 'nullable',
        ]);

        CVE::create($attributes);

        return redirect()->route('cves.index')->with('success', 'CVE Saved Successfully.');
    }

    public function edit(CVE $cfe)
    {
        return view('process/vulnerability-management/cves/create', compact('cfe'));
    }

    public function update(Request $request, CVE $cfe)
    {
        // Validation
        $attributes = $request->validate([
            'cve_id' => 'required|unique:cve_table,cve_id,' . $cfe->id . ',id',
            'cve_name' => 'nullable',
            'cve_number' => 'nullable',
            'cve_description' => 'nullable',
            'cve_ramarks' => 'nullable',
        ]);

        $cfe->update($attributes);

        return redirect()->route('cves.index')->with('success', 'CVE Saved Successfully.');
    }

    public function destroy(CVE $cfe)
    {
        $cfe->delete();
        return redirect()->route('cves.index')->with('success', 'CVE Deleted Successfully.');
    }
}
