<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::select('id', 'organization_id', 'organization_name_english', 'initiative_owner_contact_number', 'initiative_owner_email')
            ->get();

        return view('4-Process.1-InitialSetup.organizations.index', compact('organizations'));
    }

    public function show(Organization $organization)
    {
        return view('4-Process.1-InitialSetup.organizations.show', compact('organization'));
    }

    public function create()
    {
        $organization = null;

        return view('4-Process.1-InitialSetup.organizations.create', compact('organization'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'organization_id' => ['required', 'unique:organization_table'],
            'organization_name_english' => 'required',
            'organization_name_arabic' => 'nullable',
            'organization_address' => 'nullable',
            'initiative_owner_name' => 'nullable',
            'initiative_owner_title' => 'nullable',
            'initiative_owner_contact_number' => 'nullable',
            'initiative_owner_email' => 'nullable|email',
            'organization_logo' => 'nullable|file|image|max:2048',
        ]);

        if ($request->hasFile('organization_logo')) {
            $file = $request->file('organization_logo');
            $path = $file->store('organization_logos', 'public');
            $attributes['organization_logo'] = $path;
        }

        Organization::create($attributes);


        return redirect(route('organizations.index'))
            ->with('success', 'Organization saved successfully.');
    }

    public function edit(Organization $organization)
    {
        return view('4-Process.1-InitialSetup.organizations.create', compact('organization'));
    }

    public function update(Organization $organization,  Request $request)
    {

        $attributes = $request->validate([
            'organization_id' => ['required', 'unique:organization_table,organization_id,' . $organization->id],
            'organization_name_english' => 'required',
            'organization_name_arabic' => 'nullable',
            'organization_address' => 'nullable',
            'initiative_owner_name' => 'nullable',
            'initiative_owner_title' => 'nullable',
            'initiative_owner_contact_number' => 'nullable',
            'initiative_owner_email' => 'nullable|email',
            'organization_logo' => 'nullable|file|image|max:2048',
        ]);

        if ($request->hasFile('organization_logo')) {
            $file = $request->file('organization_logo');
            $path = $file->store('organization_logos', 'public');
            $attributes['organization_logo'] = $path;
        }

        $organization->update($attributes);

        return redirect(route('organizations.index'))
            ->with('success', 'Organization saved successfully.');
    }


    public function destroy(Request $request)
    {

        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $organization = Organization::findOrFail($attributes['record']);

        if ($organization->organization_logo) {
            Storage::disk('public')->delete($organization->organization_logo);
        }

        $organization->delete();

        return redirect(route('organizations.index'))
            ->with('success', 'Organization deleted successfully.');
    }
}
