<?php

namespace App\Http\Controllers;

use App\Models\CustodianName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustodianController extends Controller
{
    // To add data into the table
    public function create()
    {
        $custodian = null;
        $custodianrole = DB::table('custodian_table')->get();
        return view('4-Process/1-InitialSetup/11-CustodianForm', compact('custodian', 'custodianrole'));
    }

    // To edit the table
    public function edit($id)
    {
        $custodian = DB::table('custodian_name_table')->where('custodian_name_id', $id)->first();
        $custodianrole = DB::table('custodian_table')->get();
        return view('4-Process/1-InitialSetup/11-CustodianForm', compact('custodian', 'custodianrole'));
    }


    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'custodian_name_id' => ['required', 'unique:custodian_name_table'],
            'custodian_name_name' => 'required',
            'custodian_name_department' => 'nullable',
            'custodian_name_contact_number' => 'nullable',
            'custodian_name_email_address' => 'nullable',
            'custodian_role_id' => 'required',
        ]);

        CustodianName::create($attributes);

        return redirect()->route('custodian.index')->with('success', 'Custodian saved successfully.');
    }

    // To store the edited data into the table
    public function update(CustodianName $custodian, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'custodian_name_id' => ['required', 'unique:custodian_name_table,custodian_name_id,' . $custodian->id],
            'custodian_name_name' => 'required',
            'custodian_name_department' => 'nullable',
            'custodian_name_contact_number' => 'nullable',
            'custodian_name_email_address' => 'nullable',
            'custodian_role_id' => 'required',
        ]);


        $custodian->update($attributes);

        return redirect()->route('custodian.index')->with('success', 'Custodian saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        // $columns = DB::table('custodian_name_table')->get();
        $custodians = CustodianName::with('role')->get();
        return view('4-Process/1-InitialSetup/11-CustodianList', compact('custodians'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = CustodianName::where('id', $attributes['record'])->orWhere('custodian_name_id', $attributes['record'])->first();
        $data->delete();

        return redirect('/custodian-list');

        // $selecteddelete = $request->input('selecteddelete');

        // if (!empty($selecteddelete)) {
        //     DB::table('custodian_name_table')->whereIn('custodian_name_id', $selecteddelete)->delete();
        // }
    }



    // 4.Controller - DETAILED TABLE
    public function show(CustodianName $custodian)
    {
        $custodian->load('role');

        return view('4-Process/1-InitialSetup/11-CustodianTable', compact('custodian'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $CustoTitles = DB::table('custodian_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/1-InitialSetup/11-CustodianForm', compact('CustoTitles'));
    }
}
