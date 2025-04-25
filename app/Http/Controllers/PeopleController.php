<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    
    public function create()
    {
        $certNames = DB::table('certificate_table')->get();
        $roleNames = DB::table('role_table')->get();
        $indusNames = DB::table('industry_table')->get();

        return view('3-People/2-PeopleInput', compact('certNames', 'roleNames', 'indusNames'));
    }

    public function store(Request $request)
{
    // Validation and store data in the people_table
    $data = $request->validate([
        'PerName' => 'required|string',
        'Nationality' => 'required|string',
        'SocialLink' => 'required|string',
        'OrgName' => 'required|string',
        'CurrDesig' => 'required|string',
        'Role' => 'required|array',
        'Industry' => 'required|array',
        'Experience' => 'required|string',
        'Edu' => 'required|string',
        'Certification' => 'required|array',
    ]);

    $personId = DB::table('people_table')->insertGetId([
        'person_name' => $data['PerName'],
        'nationality' => $data['Nationality'],
        'profile_link' => $data['SocialLink'],
        'organization_name' => $data['OrgName'],
        'designation' => $data['CurrDesig'],
        'experience' => $data['Experience'],
        'education' => $data['Edu'],
    ]);

    // Attach certificates to the person in a pivot table
    DB::table('person_certificate')->insert(
        collect($data['Certification'])->map(function ($certificate) use ($personId) {
            return ['person_id' => $personId, 'certificate_id' => $certificate];
        })->toArray()
    );

    // Attach industries to the person in a pivot table
    DB::table('people_industry')->insert(
        collect($data['Industry'])->map(function ($industry) use ($personId) {
            return ['people_id' => $personId, 'industry_id' => $industry];
        })->toArray()
    );

    // Attach roles to the person in a pivot table
    DB::table('people_role')->insert(
        collect($data['Role'])->map(function ($role) use ($personId) {
            return ['people_id' => $personId, 'role_id' => $role];
        })->toArray()
    );

    return redirect()->route('createPerson');
}

// 2.Controller - SHOW DATA INTO THE LIST
public function index()
{
    $columns = DB::table('people_table')->get();
    return view('3-People/1-PeopleList', compact('columns'));
} 



}