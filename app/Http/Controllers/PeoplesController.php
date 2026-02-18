<?php

namespace App\Http\Controllers;

use App\Models\Experties;
use App\Models\HRCertification;
use App\Models\HROrganization;
use App\Models\HumanResource;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeoplesController extends Controller
{
    public function __invoke(Request $request)
    {
        $nationality = $request->input('nationality') ?? [];
        $industry = $request->input('industry_name') ?? [];
        $organization = $request->input('organization_name') ?? [];
        $certification = $request->input('certification_title') ?? [];
        $expertise = $request->input('expertise_title') ?? [];
        $designation = $request->input('designation') ?? [];
        $experience = $request->input('experience') ?? [];

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

        $experienceRanges = collect([
            '0-5 years',
            '6-10 years',
            '11-15 years',
            '16-20 years',
            '20+ years',
        ]);

        $humanResource = HumanResource::select('expert_id', 'organization_id', 'industry_id', 'name', 'nationality_id', 'linkedin_profile', 'designation', 'experience')
            ->with('certifications', 'organization', 'industry', 'experties', 'nationality')
            ->when($nationality, function ($query, $nationality) {
                $query->where(function ($q) use ($nationality) {
                    $q->where(function ($subquery) use ($nationality) {
                        if (is_array($nationality)) {
                            $subquery->whereIn('hr_expert_master_table.nationality_id', $nationality);
                        } else {
                            $subquery->where('hr_expert_master_table.nationality_id', $nationality);
                        }
                    })
                        ->orWhere(function ($subquery) use ($nationality) {
                            $subquery->whereHas('nationality', function ($nationalityQuery) use ($nationality) {
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
            ->when($experience, function ($query, $experience) {
                $query->where(function ($q) use ($experience) {
                    foreach ((array) $experience as $range) {
                        switch ($range) {
                            case '0-5 years':
                                $q->orWhereBetween(DB::raw('CAST(experience AS UNSIGNED)'), [0, 5]);
                                break;
                            case '6-10 years':
                                $q->orWhereBetween(DB::raw('CAST(experience AS UNSIGNED)'), [6, 10]);
                                break;
                            case '11-15 years':
                                $q->orWhereBetween(DB::raw('CAST(experience AS UNSIGNED)'), [11, 15]);
                                break;
                            case '16-20 years':
                                $q->orWhereBetween(DB::raw('CAST(experience AS UNSIGNED)'), [16, 20]);
                                break;
                            case '20+ years':
                                $q->orWhere(DB::raw('CAST(experience AS UNSIGNED)'), '>=', 21);
                                break;
                        }
                    }
                });
            })
            ->paginate(200);

        $humanResource->appends([
            'nationality' => $nationality,
            'industry_name' => $industry,
            'organization_name' => $organization,
            'certification_title' => $certification,
            'expertise_title' => $expertise,
            'designation' => $designation,
            'experience' => $experience,
        ]);

        $id = null;

        return view('ciso.people.index', compact('id', 'humanResource', 'nationalities', 'industries', 'organizations', 'certifications', 'experties', 'designations', 'nationality', 'industry', 'organization', 'certification', 'expertise', 'designation', 'experienceRanges', 'experience'));
    }
}
