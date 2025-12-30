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
    public function __invoke(Request $request)
    {
        $nationality = $request->input('nationality') ?? [];
        $industry = $request->input('industry_name') ?? [];
        $organization = $request->input('organization_name') ?? [];
        $certification = $request->input('certification_title') ?? [];
        $expertise = $request->input('expertise_title') ?? [];
        $designation = $request->input('designation') ?? [];


        $nationalities = HumanResource::select('nationality')
            ->distinct()
            ->orderBy('nationality', 'ASC')
            ->pluck('nationality');

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


        $humanResource = HumanResource::select('expert_id', 'organization_id', 'industry_id', 'name', 'nationality', 'linkedin_profile', 'designation', 'experience')
            ->with('certifications', 'organization', 'roles', 'industry', 'experties')
            ->when($nationality, function ($query, $nationality) {
                if (is_array($nationality)) {
                    $query->whereIn('nationality', $nationality);
                } else {
                    $query->where('nationality', $nationality);
                }
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

        return view('ciso/people/index', compact('id', 'humanResource', 'nationalities', 'industries', 'organizations', 'certifications', 'experties', 'designations', 'nationality', 'industry', 'organization', 'certification', 'expertise', 'designation'));
    }
}
