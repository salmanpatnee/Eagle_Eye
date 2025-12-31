<?php

namespace App\Http\Controllers;

use App\Models\HROrganization;
use Illuminate\Http\Request;

class HROrganizationController extends Controller
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
        $organizations = HROrganization::orderBy('organization_name', 'ASC')->paginate(100);

        return view('process.hr.organizations.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        $organization = null;

        return view('process.hr.organizations.create', compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $attributes = $request->validate([
            'organization_id' => ['required', 'unique:hr_organization_table'],
            'organization_name' => 'required',
            'organization_address' => 'nullable',
            'contact_number' => 'nullable',
            'website_link' => 'nullable|url',
        ]);

        HROrganization::create($attributes);

        return redirect()->route('organizations.index')
                         ->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HROrganization $organization): \Illuminate\View\View
    {
        return view('process.hr.organizations.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HROrganization $organization): \Illuminate\View\View
    {
        return view('process.hr.organizations.create', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HROrganization $organization, Request $request): \Illuminate\Http\RedirectResponse
    {
        $attributes = $request->validate([
            'organization_id' => ['required', 'unique:hr_organization_table,organization_id,' . $organization->id],
            'organization_name' => 'required',
            'organization_address' => 'nullable',
            'contact_number' => 'nullable',
            'website_link' => 'nullable|url',
        ]);

        $organization->update($attributes);

        return redirect()->route('organizations.index')
                         ->with('success', 'Organization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HROrganization $organization): \Illuminate\Http\RedirectResponse
    {
        try {
            $organization->delete();

            return redirect()->route('organizations.index')
                             ->with('success', 'Organization deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('organizations.index')
                             ->with('error', 'Could not delete organization. It may be associated with other records.');
        }
    }
}