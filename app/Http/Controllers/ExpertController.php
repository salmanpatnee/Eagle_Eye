<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Education;
use App\Models\Expert;
use App\Models\Experties;
use App\Models\Industry;
use App\Models\Organization;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertController extends Controller
{
    public function index()
    {
        $organizations  = Organization::all();
        $industries     = Industry::select('id', 'industry_id', 'industry_name', 'industry_description')->orderBy('industry_name')->get();
        $certifications = Certification::select('id', 'certification_id', 'certification_name')->orderBy('certification_name')->get();
        $educations     = Education::select('id', 'education_id', 'education_name')->orderBy('education_name')->get();
        $experties      = Experties::select('id', 'expert_experties_id', 'expert_experties_name')->orderBy('expert_experties_name')->get();
        $roles          = Role::select('id', 'expert_role_id', 'expert_role_name')->orderBy('expert_role_name')->get();

        return Expert::all();
        
        $experts = Expert::orderBy('expert_experties_id')
            ->with(
                ['educations', 'certifications', 'experties', 'roles']
            )->filter(request($this->getFilters()))
            ->paginate();

        return view('3-People.1-PeopleList', [
            'experts'        => $experts,
            'organizations'  => $organizations,
            'industries'     => $industries,
            'certifications' => $certifications,
            'educations'     => $educations,
            'experties'      => $experties,
            'roles'          => $roles,
        ]);
    }

    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'ExperID' => 'required',
            'ExpFirstName' => 'required',
            'ExpLastName' => 'required',
            'ExpSocialLink' => 'url', // Ensure it's a valid URL
            'OrgNames' => 'required',
            'IndsNames' => 'required',
            'ExpTitle' => 'required',
            'Experience' => 'required',
            'ExpEdu' => 'required',
        ]);

        // Insert expert data and get the expert ID
        $exp_master_id = DB::table('experts_table')->insertGetId($validatedData);

        // Insert expert roles
        foreach ($request->input('ExpRole') as $value) {
            DB::table('expert_master_vs_expert_role_table')->insert([
                'expert_id' => $exp_master_id,
                'expert_role_id' => $value
            ]);
        }

        // Insert expert expertise
        foreach ($request->input('ExpertiesNames') as $value) {
            DB::table('expert_master_vs_expert_experties_table')->insert([
                'expert_id' => $exp_master_id,
                'expert_experties_id' => $value
            ]);
        }

        // Insert expert certifications
        foreach ($request->input('CerNames') as $value) {
            DB::table('expert_master_vs_expert_certication_table')->insert([
                'expert_id' => $exp_master_id,
                'certification_id' => $value
            ]);
        }

        return redirect()->back()->with('success', 'Expert information has been saved.');
    }





    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $OrgNames = DB::table('expert_organization_table')
            ->select('*')
            ->distinct()
            ->get();
        $IndsNames = DB::table('expert_industry_table')
            ->select('*')
            ->distinct()
            ->get();
        $ExpRoles = DB::table('expert_role_table')
            ->select('*')
            ->distinct()
            ->get();
        $ExpertiesNames = DB::table('expert_experties_table')
            ->select('*')
            ->distinct()
            ->get();
        $ExpEduNames = DB::table('expert_education_table')
            ->select('*')
            ->distinct()
            ->get();
        $CerNames = DB::table('expert_certification_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('3-People/2-PeopleInput', compact('OrgNames', 'IndsNames', 'ExpRoles', 'ExpertiesNames', 'ExpEduNames', 'CerNames'));
    }

    private function getFilters()
    {
        return [
            'organization',
            'industry',
            'certification',
            'education',
            'experty',
            'role',
        ];
    }
}