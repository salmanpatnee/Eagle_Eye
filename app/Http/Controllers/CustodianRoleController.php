<?php

namespace App\Http\Controllers;

use App\Models\Custodian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustodianRoleController extends Controller
{
    // To add data into the table
    public function create()
    {
        $custodianrole = null;
        return view('4-Process/1-InitialSetup/10-CustodianRoleForm', compact('custodianrole'));
    }

    // To edit the table
    public function edit($id)
    {
        $custodianrole = DB::table('custodian_table')->where('custodian_role_id', $id)->first();

        return view('4-Process/1-InitialSetup/10-CustodianRoleForm', compact('custodianrole'));
    }


    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'custodian_role_id' => ['required', 'unique:custodian_table'],
            'custodian_role_title' => 'required',
            'custodian_role_description' => 'nullable',
            'system_application_other' => 'nullable',
            'other' => 'nullable',
        ]);

        Custodian::create($attributes);


        return redirect()->route('custodianrole.index')->with('success', 'Custodian Role Saved Successfully.');
    }


    // To store the edited data into the table
    public function update(Custodian $custodian, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'custodian_role_id' => ['required', 'unique:custodian_table,custodian_role_id,' . $custodian->id],
            'custodian_role_title' => 'required',
            'custodian_role_description' => 'nullable',
            'system_application_other' => 'nullable',
            'other' => 'nullable',
        ]);

        $custodian->update($attributes);

        return redirect()->route('custodianrole.index')->with('success', 'Custodian Role Saved Successfully.');
    }

    //----------------------------------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('custodian_table')->get();
        return view('4-Process/1-InitialSetup/10-CustodianRoleList', compact('columns'));
    }

    public function delete(Request $request)
    {

        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = Custodian::where('id', $attributes['record'])->orWhere('custodian_role_id', $attributes['record'])->first();
        $data->delete();

        return redirect('/custodian-role-list');

        // $ids =  $request->validate([
        //     'selecteddelete' => ['required', 'array'],
        // ]);

        // try {
        //     Custodian::whereIn('id', $ids['selecteddelete'])->each(function ($role) {
        //         if ($role->custodians()->exists()) {

        //             throw new \Exception("Record cannot be deleted due to existing dependencies.");
        //         }
        //         $role->delete();
        //     });

        //         ->with('success', 'Record(s) deleted successfully.');
        // } catch (\Exception $e) {

        //     return redirect('/custodian-role-list')
        //         ->with('error', $e->getMessage());
        // }

    }



    // 4.Controller - DETAILED TABLE
    public function show($custodian_role_id)
    {
        // Fetch data from the database based on department_id
        $custodian_role_id = DB::table('custodian_table')->where('custodian_role_id', $custodian_role_id)->first();

        // return $custodian_role_id;

        if (!$custodian_role_id) {
            abort(404);
        }

        return view('4-Process/1-InitialSetup/10-CustodianRoleTable', compact('custodian_role_id'));
    }
}
