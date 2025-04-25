<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CvssController extends Controller
{
    // To add data into the table
    public function create(){
        $cvss = null;
        return view('4-Process/6-Vulnerabilities/3-CvssForm', compact('cvss'));
    }

    // To edit the table
     public function edit($id)
     {
        $cvss = DB::table('cvss_table')->where('cvss_id', $id)->first();
        return view('4-Process/6-Vulnerabilities/3-CvssForm', compact('cvss'));
     }

    
     // To store the edited data into the table
    public function storeOrUpdate(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'cvss_id' => 'required',
            'cvss_name' => 'nullable',
            'cvss_number' => 'nullable',
            'cvss_description' => 'nullable',
            'cvss_remarks' => 'nullable',
        ]);

        
        // Update
        if ($request->has('id')) {
        
            DB::table('cvss_table')
            ->where('id', $request->input('id'))
            ->update($attributes);

        } else {
            // Insert
            DB::table('cvss_table')->insert($attributes);
        }

        return redirect()->route('cvss.index')->with('success', 'CVSS saved successfully.');
    }

    //--------------------------------------------------------------------//

// 2.Controller - SHOW DATA INTO THE LIST
public function index()
{
    $columns = DB::table('cvss_table')->get();
    return view('4-Process/6-Vulnerabilities/3-CvssList', compact('columns'));
} 

// 3.Controller - DELETE RECORD FROM LIST
public function delete(Request $request) {
    $selecteddelete = $request->input('selecteddelete');

    if (!empty($selecteddelete)) {
        DB::table('cvss_table')->whereIn('cvss_id', $selecteddelete)->delete();
    } return redirect('/cvss-list');
}



// 4.Controller - DETAILED TABLE
public function show($cvss_id) 
{
    // Fetch data from the database based on department_id
    $cvss_id = DB::table('cvss_table')->where('cvss_id', $cvss_id)->first();

    if (!$cvss_id) {
        abort(404);
    }

    return view('4-Process/6-Vulnerabilities/3-CvssTable', compact('cvss_id'));
}

}