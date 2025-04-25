<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskCveController extends Controller
{
    // To add data into the table
    public function create(){
        $cve = null;
        return view('4-Process/6-Vulnerabilities/2-CveForm', compact('cve'));
    }

    // To edit the table
     public function edit($id)
     {
         $cve = DB::table('cve_table')->where('cve_id', $id)->first();
 
         return view('4-Process/6-Vulnerabilities/2-CveForm', compact('cve'));
     }

    
     // To store the edited data into the table
    public function storeOrUpdate(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'cve_id' => 'required',
            'cve_name' => 'nullable',
            'cve_number' => 'nullable',
            'cve_description' => 'nullable',
            'cve_ramarks' => 'nullable',
        ]);

        
        // Update
        if ($request->has('id')) {
        
            DB::table('cve_table')
            ->where('id', $request->input('id'))
            ->update($attributes);

        } else {
            // Insert
            DB::table('cve_table')->insert($attributes);
        }

        return redirect()->route('cve.index')->with('success', 'CVE Saved Successfully.');
    }

    //----------------------------------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('cve_table')->get();
        return view('4-Process/6-Vulnerabilities/2-CveList', compact('columns'));
    } 

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request) {
        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('cve_table')->whereIn('cve_id', $selecteddelete)->delete();
        } return redirect('/cve-list');
    }


    // 4.Controller - DETAILED TABLE
    public function show($cve_id) 
    {
        // Fetch data from the database based on department_id
        $cve_id = DB::table('cve_table')->where('cve_id', $cve_id)->first();

        if (!$cve_id) {
            abort(404);
        }

        return view('4-Process/6-Vulnerabilities/2-CveTable', compact('cve_id'));
    }


}