<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    

class ExpertEducationController extends Controller
{
    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
{
    // Retrieve data from the form
    $EduId = $request->input('EduId');
    $EduName = $request->input('EduName');
    $UniName = $request->input('UniName');


    DB::table('expert_education_table')->insert([
        'education_id' => $EduId,
        'education_name' => $EduName,
        'education_university' => $UniName,

    ]);

    return redirect()->back()->with('success', 'Location information has been saved.');
}

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('expert_education_table')->get();
        return view('3-People/5-ExpertEducationList', compact('columns'));
    } 

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request) {
        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('expert_education_table')->whereIn('education_id', $selecteddelete)->delete();
        } return redirect('/expert-education-list');
    }
    


    // 4.Controller - DETAILED TABLE
    public function show($education_id) 
    {
        // Fetch data from the database based on department_id
        $education_id = DB::table('expert_education_table')->where('education_id', $education_id)->first();

        if (!$education_id) {
            abort(404);
        }

        return view('3-People/5-ExpertEducationTable', compact('education_id'));
    }
}