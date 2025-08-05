<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function index()
    {
        // $owners = Owner::with('department', 'role')->get();
        $owners = Owner::with('department', 'role')->paginate(20);

        return view('process/1-InitialSetup/owners/index', compact('owners'));
    }


    // 4.Controller - DETAILED TABLE
    public function show(Owner $owner)
    {
        $owner->load('department', 'role');
        return view('process/1-InitialSetup/owners/show', compact('owner'));
    }


    // To add data into the table
    public function create()
    {
        $owner = null;
        $ownerRoles = DB::table('owner_role_table')->get();
        $departments = DB::table('department_table')->get();
        return view('process/1-InitialSetup/owners/create', compact('owner', 'ownerRoles', 'departments'));
    }

    // To edit the table
    public function edit(Owner $owner)
    {
        $ownerRoles = DB::table('owner_role_table')->get();
        $departments = DB::table('department_table')->get();


        return view('process/1-InitialSetup/owners/create', compact('owner', 'ownerRoles', 'departments'));
    }


    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'owner_id' => ['required', 'unique:owner_table'],
            'owner_name' => 'required',
            'owner_role_id' => 'required',
            'specification' => 'nullable',
            'owner_contact_number' => 'nullable',
            'owner_email_address' => 'nullable',
            'department_id' => 'required',
        ]);

        Owner::create($attributes);


        return redirect()->route('owners.index')->with('success', 'Owner saved successfully.');
    }

    // To store the edited data into the table
    public function update(Owner $owner, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'owner_id' => ['required', 'unique:owner_table,owner_id,' . $owner->id],
            'owner_name' => 'required',
            'owner_role_id' => 'required',
            'specification' => 'nullable',
            'owner_contact_number' => 'nullable',
            'owner_email_address' => 'nullable',
            'department_id' => 'required',
        ]);

        $owner->update($attributes);


        return redirect()->route('owners.index')->with('success', 'Owner saved successfully.');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();

        return redirect(route('owners.index'))
            ->with('success', 'Owner deleted successfully.');
    }
}
