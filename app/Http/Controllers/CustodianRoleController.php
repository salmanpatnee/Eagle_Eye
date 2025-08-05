<?php

namespace App\Http\Controllers;

use App\Models\Custodian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustodianRoleController extends Controller
{
    public function index()
    {
        $custodianRoles = Custodian::paginate(20);
        return view('process/1-InitialSetup/custodian-roles/index', compact('custodianRoles'));
    }

    public function show(Custodian $custodianRole)
    {
        return view('process/1-InitialSetup/custodian-roles/show', compact('custodianRole'));
    }

    public function create()
    {
        $custodianRole = null;
        return view('process/1-InitialSetup/custodian-roles/create', compact('custodianRole'));
    }

    public function edit(Custodian $custodianRole)
    {
        return view('process/1-InitialSetup/custodian-roles/create', compact('custodianRole'));
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


        return redirect()->route('custodian-roles.index')->with('success', 'Custodian Role Saved Successfully.');
    }


    // To store the edited data into the table
    public function update(Custodian $custodianRole, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'custodian_role_id' => ['required', 'unique:custodian_table,custodian_role_id,' . $custodianRole->id],
            'custodian_role_title' => 'required',
            'custodian_role_description' => 'nullable',
            'system_application_other' => 'nullable',
            'other' => 'nullable',
        ]);

        $custodianRole->update($attributes);

        return redirect()->route('custodian-roles.index')->with('success', 'Custodian Role Saved Successfully.');
    }

    //----------------------------------------------------------------------------------------------//



    public function destroy(Custodian $custodianRole)
    {
        $custodianRole->delete();
        return redirect()->route('custodian-roles.index')->with('success', 'Custodian Role Deleted Successfully.');
    }
}
