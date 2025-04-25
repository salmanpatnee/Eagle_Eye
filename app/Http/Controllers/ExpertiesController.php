<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExpertiesController extends Controller
{
    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
{
    // Retrieve data from the form
    $ExptiesId = $request->input('ExptiesId');
    $ExptiesName = $request->input('ExptiesName');
    $ExptiesDes = $request->input('ExptiesDes');


    DB::table('expert_experties_table')->insert([
        'expert_experties_id' => $ExptiesId,
        'expert_experties_name' => $ExptiesName,
        'expert_experties_description' => $ExptiesDes,

    ]);

    return redirect()->back()->with('success', 'Location information has been saved.');
}

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('expert_experties_table')->get();
        return view('3-People/4-ExpertExpertiesList', compact('columns'));
    } 

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request) {
        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('expert_experties_table')->whereIn('expert_experties_id', $selecteddelete)->delete();
        } return redirect('/expert-expertise-list');
    }
    


    // 4.Controller - DETAILED TABLE
    public function show($expert_experties_id) 
    {
        // Fetch data from the database based on department_id
        $expert_experties_id = DB::table('expert_experties_table')->where('expert_experties_id', $expert_experties_id)->first();

        if (!$expert_experties_id) {
            abort(404);
        }

        return view('3-People/4-ExpertExpertiesTable', compact('expert_experties_id'));
    }
}