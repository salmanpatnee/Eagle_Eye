<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertCertificationController extends Controller
{
    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
{
    // Retrieve data from the form
    $CertId = $request->input('CertId');
    $CertName = $request->input('CertName');
    $CertInst = $request->input('CertInst');


    DB::table('expert_certification_table')->insert([
        'certification_id' => $CertId,
        'certification_name' => $CertName,
        'certification_institute' => $CertInst,

    ]);

    return redirect()->back()->with('success', 'Location information has been saved.');
}

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('expert_certification_table')->get();
        return view('3-People/6-ExpertCertificationList', compact('columns'));
    } 

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request) {
        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('expert_certification_table')->whereIn('certification_id', $selecteddelete)->delete();
        } return redirect('/expert-certification-list');
    }
    


    // 4.Controller - DETAILED TABLE
    public function show($certification_id) 
    {
        // Fetch data from the database based on department_id
        $certification_id = DB::table('expert_certification_table')->where('certification_id', $certification_id)->first();

        if (!$certification_id) {
            abort(404);
        }

        return view('3-People/6-ExpertCertificationTable', compact('certification_id'));
    }
}