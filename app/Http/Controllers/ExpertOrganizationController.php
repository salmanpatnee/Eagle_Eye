<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertOrganizationController extends Controller
{
    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
{
    // Retrieve data from the form
    $OrgId = $request->input('OrgId');
    $OrgNames = $request->input('OrgNames');
    $OrgUrl = $request->input('OrgUrl');
    $OrgPhoneNum = $request->input('OrgPhoneNum');
    $OrgEmailAdd = $request->input('OrgEmailAdd');


    DB::table('expert_organization_table')->insert([
        'expert_organization_id' => $OrgId,
        'expert_organization_name' => $OrgNames,
        'expert_organization_website_url' => $OrgUrl,
        'expert_organization_phone_number' => $OrgPhoneNum,
        'expert_organization_email' => $OrgEmailAdd,

    ]);

    return redirect()->back()->with('success', 'Location information has been saved.');
}

// 2.Controller - SHOW DATA INTO THE LIST
public function index()
{
    $columns = DB::table('expert_organization_table')->get();
    return view('3-People/9-ExpertOrganizationList', compact('columns'));
} 

// 3.Controller - DELETE RECORD FROM LIST
public function delete(Request $request) {
    $selecteddelete = $request->input('selecteddelete');

    if (!empty($selecteddelete)) {
        DB::table('expert_organization_table')->whereIn('expert_organization_id', $selecteddelete)->delete();
    } return redirect('/expert-organization-list');
}



// 4.Controller - DETAILED TABLE
public function show($expert_organization_id) 
{
    // Fetch data from the database based on department_id
    $expert_organization_id = DB::table('expert_organization_table')->where('expert_organization_id', $expert_organization_id)->first();

    if (!$expert_organization_id) {
        abort(404);
    }

    return view('3-People/9-ExpertOrganizationTable', compact('expert_organization_id'));
}


}