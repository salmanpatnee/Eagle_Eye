<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndustryController extends Controller
{
    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
{
    // Retrieve data from the form
    $IndId = $request->input("IndId");
    $IndName = $request->input('IndName');
    $IndDes = $request->input('IndDes');


    DB::table('expert_industry_table')->insert([
        'industry_id'=> $IndId,
        'industry_name' => $IndName,
        'industry_description' => $IndDes,
    ]);

    return redirect()->back()->with('success', 'Certification information has been saved.');
}




// 2.Controller - SHOW DATA INTO THE LIST
public function index()
{
    $columns = DB::table('expert_industry_table')->get();
    return view('3-People/8-IndustryList', compact('columns'));
} 

// 3.Controller - DELETE RECORD FROM LIST
public function delete(Request $request) {
    $selecteddelete = $request->input('selecteddelete');

    if (!empty($selecteddelete)) {
        DB::table('industry_table')->whereIn('id', $selecteddelete)->delete();
    } return redirect('/expert-industry-list');
}



// 4.Controller - DETAILED TABLE
public function show($id) 
{
    // Fetch data from the database based on department_id
    $id = DB::table('expert_industry_table')->where('id', $id)->first();

    if (!$id) {
        abort(404);
    }

    return view('3-People/7-IndustryTable', compact('id'));
}
}