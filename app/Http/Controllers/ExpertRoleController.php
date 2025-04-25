<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertRoleController extends Controller
{
    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
{
    // Retrieve data from the form
    $RoleId = $request->input('RoleId');
    $RoleName = $request->input('RoleName');
    $RoleDes = $request->input('RoleDes');


    DB::table('expert_role_table')->insert([
        'expert_role_id' => $RoleId,
        'expert_role_name' => $RoleName,
        'expert_role_description' => $RoleDes,

    ]);

    return redirect()->back()->with('success', 'Location information has been saved.');
}

// 2.Controller - SHOW DATA INTO THE LIST
public function index()
{
    $columns = DB::table('expert_role_table')->get();
    return view('3-People/3-ExpertRoleList', compact('columns'));
} 

// 3.Controller - DELETE RECORD FROM LIST
public function delete(Request $request) {
    $selecteddelete = $request->input('selecteddelete');

    if (!empty($selecteddelete)) {
        DB::table('expert_role_table')->whereIn('expert_role_id', $selecteddelete)->delete();
    } return redirect('/expert-role-list');
}

    


    // 4.Controller - DETAILED TABLE
    public function show($expert_role_id) 
    {
        // Fetch data from the database based on department_id
        $expert_role_id = DB::table('expert_role_table')->where('expert_role_id', $expert_role_id)->first();

        if (!$expert_role_id) {
            abort(404);
        }

        return view('3-People/3-ExpertRoleTable', compact('expert_role_id'));
    }
    
}