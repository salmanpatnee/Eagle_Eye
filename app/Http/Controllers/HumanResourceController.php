<?php

namespace App\Http\Controllers;

use App\Models\HRCertification;
use App\Models\Experties;
use App\Models\HROrganization;
use App\Models\HumanResource;
use App\Models\Industry;
use Illuminate\Http\Request;

class HumanResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nationality = $request->input('nationality') ?? [];
        $industry = $request->input('industry_name') ?? [];
        $organization = $request->input('organization_name') ?? [];
        $certification = $request->input('certification_title') ?? [];
        $expertise = $request->input('expertise_title') ?? [];
        $designation = $request->input('designation') ?? [];


        $nationalities = \App\Models\Nationality::orderBy('name', 'ASC')
            ->pluck('name');

        $designations = HumanResource::select('designation')
            ->distinct()
            ->orderBy('designation', 'ASC')
            ->pluck('designation');

        $industries = Industry::select('industry_name', 'industry_id')
            ->distinct()
            ->orderBy('industry_name', 'ASC')
            ->get();

        $organizations = HROrganization::select('organization_id', 'organization_name')
            ->distinct()
            ->orderBy('organization_name', 'ASC')
            ->get();

        $certifications = HRCertification::select('certification_id', 'certification_title')
            ->distinct()
            ->orderBy('certification_id', 'ASC')
            ->get();

        $experties = Experties::select('expertise_id', 'expertise_title')
            ->distinct()
            ->orderBy('expertise_title', 'ASC')
            ->get();


        $humanResource = HumanResource::select('id', 'expert_id', 'organization_id', 'industry_id', 'name', 'nationality', 'nationality_id', 'linkedin_profile', 'designation', 'experience')
            ->with('certifications', 'organization', 'roles', 'industry', 'experties', 'nationality')
            ->when($nationality, function ($query, $nationality) {
                $query->where(function($q) use ($nationality) {
                    $q->where(function($subquery) use ($nationality) {
                        if (is_array($nationality)) {
                            $subquery->whereIn('hr_expert_master_table.nationality', $nationality);
                        } else {
                            $subquery->where('hr_expert_master_table.nationality', $nationality);
                        }
                    })
                    ->orWhere(function($subquery) use ($nationality) {
                        $subquery->whereHas('nationality', function($nationalityQuery) use ($nationality) {
                            if (is_array($nationality)) {
                                $nationalityQuery->whereIn('name', $nationality);
                            } else {
                                $nationalityQuery->where('name', $nationality);
                            }
                        });
                    });
                });
            })

            ->when($designation, function ($query, $designation) {
                if (is_array($designation)) {
                    $query->whereIn('designation', $designation);
                } else {
                    $query->where('designation', $designation);
                }
            })
            ->when($industry, function ($query, $industry) {
                if (is_array($industry)) {
                    $query->whereIn('industry_id', $industry);
                } else {
                    $query->where('industry_id', $industry);
                }
            })
            ->when($organization, function ($query, $organization) {
                if (is_array($organization)) {
                    $query->whereIn('organization_id', $organization);
                } else {
                    $query->where('organization_id', $organization);
                }
            })
            ->when($certification, function ($query, $certification) {
                $query->whereHas('certifications', function ($query) use ($certification) {
                    if (is_array($certification)) {
                        $query->whereIn('hr_certification_table.certification_id', $certification);
                    } else {
                        $query->where('hr_certification_table.certification_id', $certification);
                    }
                });
            })
            ->when($expertise, function ($query, $expertise) {
                $query->whereHas('experties', function ($query) use ($expertise) {
                    if (is_array($expertise)) {
                        $query->whereIn('hr_expertise_table.expertise_id', $expertise);
                    } else {
                        $query->where('hr_expertise_table.expertise_id', $expertise);
                    }
                });
            })
            ->paginate(100);

        $humanResource->appends([
            'nationality'    => $nationality,
            'industry_name' => $industry,
            'organization_name' => $organization,
            'certification_title' => $certification,
            'expertise_title' => $expertise,
            'designation' => $designation,
        ]);

        $id = null;

        return view('process.hr.experts.index', compact('id', 'humanResource', 'nationalities', 'industries', 'organizations', 'certifications', 'experties', 'designations', 'nationality', 'industry', 'organization', 'certification', 'expertise', 'designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities = \App\Models\Nationality::orderBy('name', 'ASC')->get();
        $industries = \App\Models\Industry::orderBy('industry_name', 'ASC')->get();
        $organizations = \App\Models\HROrganization::orderBy('organization_name', 'ASC')->get();
        $designations = \App\Models\Designation::orderBy('designation_name', 'ASC')->get();
        $certifications = \App\Models\HRCertification::orderBy('certification_title', 'ASC')->get();
        $experties = \App\Models\Experties::orderBy('expertise_title', 'ASC')->get();
        $humanResource = null;

        return view('process.hr.experts.create', compact('nationalities', 'industries', 'organizations', 'designations', 'certifications', 'experties', 'humanResource'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'expert_id' => 'required|string|max:255|unique:hr_expert_master_table,expert_id',
            'name' => 'required|string|max:255',
            // 'email' => 'nullable|email|max:255',
            // 'phone' => 'nullable|string|max:255',
            'linkedin_profile' => 'nullable|url|max:255',
            'experience' => 'nullable|string|max:255',
            'organization_id' => 'required|exists:hr_organization_table,organization_id',
            'industry_id' => 'required|exists:hr_industry_table,industry_id',
            'nationality_id' => 'required|exists:nationalities,id',
            'designation_id' => 'required|exists:hr_designation_table,id',
            'certifications' => 'nullable|array',
            'certifications.*' => 'exists:hr_certification_table,certification_id',
            'experties' => 'nullable|array',
            'experties.*' => 'exists:hr_expertise_table,expertise_id',
        ]);

        $humanResource = HumanResource::create([
            'expert_id' => $validated['expert_id'],
            'name' => $validated['name'],
            // 'email' => $validated['email'] ?? null,
            // 'phone' => $validated['phone'] ?? null,
            'linkedin_profile' => $validated['linkedin_profile'] ?? null,
            'experience' => $validated['experience'] ?? null,
            'organization_id' => $validated['organization_id'],
            'industry_id' => $validated['industry_id'],
            'nationality_id' => $validated['nationality_id'],
            'designation_id' => $validated['designation_id'],
            // Backward compatibility
            'nationality' => \App\Models\Nationality::find($validated['nationality_id'])->name,
            'designation' => \App\Models\Designation::find($validated['designation_id'])->designation_name,
        ]);

        if (isset($validated['certifications'])) {
            $humanResource->certifications()->sync($validated['certifications']);
        }

        if (isset($validated['experties'])) {
            $humanResource->experties()->sync($validated['experties']);
        }

        return redirect()->route('hr-experts.index')->with('success', 'HR Expert created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $humanResource = HumanResource::with('certifications', 'experties', 'organization', 'industry', 'nationality', 'designation')->findOrFail($id);
      
        return view('process.hr.experts.show', compact('humanResource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $humanResource = HumanResource::with('certifications', 'experties')->findOrFail($id);
        $nationalities = \App\Models\Nationality::orderBy('name', 'ASC')->get();
        $industries = \App\Models\Industry::orderBy('industry_name', 'ASC')->get();
        $organizations = \App\Models\HROrganization::orderBy('organization_name', 'ASC')->get();
        $designations = \App\Models\Designation::orderBy('designation_name', 'ASC')->get();
        $certifications = \App\Models\HRCertification::orderBy('certification_title', 'ASC')->get();
        $experties = \App\Models\Experties::orderBy('expertise_title', 'ASC')->get();

        return view('process.hr.experts.create', compact('humanResource', 'nationalities', 'industries', 'organizations', 'designations', 'certifications', 'experties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $humanResource = HumanResource::findOrFail($id);

        $validated = $request->validate([
            'expert_id' => 'required|string|max:255|unique:hr_expert_master_table,expert_id,' . $humanResource->id,
            'name' => 'required|string|max:255',
            // 'email' => 'nullable|email|max:255',
            // 'phone' => 'nullable|string|max:255',
            'linkedin_profile' => 'nullable|url|max:255',
            'experience' => 'nullable|string|max:255',
            'organization_id' => 'required|exists:hr_organization_table,organization_id',
            'industry_id' => 'required|exists:hr_industry_table,industry_id',
            'nationality_id' => 'required|exists:nationalities,id',
            'designation_id' => 'required|exists:hr_designation_table,id',
            'certifications' => 'nullable|array',
            'certifications.*' => 'exists:hr_certification_table,certification_id',
            'experties' => 'nullable|array',
            'experties.*' => 'exists:hr_expertise_table,expertise_id',
        ]);

        $humanResource->update([
            'expert_id' => $validated['expert_id'],
            'name' => $validated['name'],
            // 'email' => $validated['email'] ?? null,
            // 'phone' => $validated['phone'] ?? null,
            'linkedin_profile' => $validated['linkedin_profile'] ?? null,
            'experience' => $validated['experience'] ?? null,
            'organization_id' => $validated['organization_id'],
            'industry_id' => $validated['industry_id'],
            'nationality_id' => $validated['nationality_id'],
            'designation_id' => $validated['designation_id'],
            // Backward compatibility
            'nationality' => \App\Models\Nationality::find($validated['nationality_id'])->name,
            'designation' => \App\Models\Designation::find($validated['designation_id'])->designation_name,
        ]);

        if (isset($validated['certifications'])) {
            $humanResource->certifications()->sync($validated['certifications']);
        } else {
            $humanResource->certifications()->detach();
        }

        if (isset($validated['experties'])) {
            $humanResource->experties()->sync($validated['experties']);
        } else {
            $humanResource->experties()->detach();
        }

        return redirect()->route('hr-experts.index')->with('success', 'HR Expert updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $humanResource = HumanResource::findOrFail($id);
        $humanResource->delete();

        return redirect()->route('hr-experts.index')->with('success', 'HR Expert deleted successfully.');
    }
}