<?php

namespace App\Http\Controllers;

use App\Models\HRCertification;
use Illuminate\Http\Request;

class HRCertificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\View\View
    {
        $certifications = HRCertification::orderBy('certification_title', 'ASC')->paginate(100);

        return view('process.hr.certifications.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        $certification = null;

        return view('process.hr.certifications.create', compact('certification'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $attributes = $request->validate([
            'certification_id' => ['required', 'unique:hr_certification_table'],
            'certification_title' => 'required',
            'institute' => 'nullable',
        ]);

        HRCertification::create($attributes);

        return redirect()->route('certifications.index')
                         ->with('success', 'Certification created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HRCertification $certification): \Illuminate\View\View
    {
        return view('process.hr.certifications.show', compact('certification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HRCertification $certification): \Illuminate\View\View
    {
        return view('process.hr.certifications.create', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HRCertification $certification, Request $request): \Illuminate\Http\RedirectResponse
    {
        $attributes = $request->validate([
            'certification_id' => ['required', 'unique:hr_certification_table,certification_id,' . $certification->id],
            'certification_title' => 'required',
            'institute' => 'nullable',
        ]);

        $certification->update($attributes);

        return redirect()->route('certifications.index')
                         ->with('success', 'Certification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HRCertification $certification): \Illuminate\Http\RedirectResponse
    {
        try {
            $certification->delete();

            return redirect()->route('certifications.index')
                             ->with('success', 'Certification deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('certifications.index')
                             ->with('error', 'Could not delete certification. It may be associated with other records.');
        }
    }
}