<?php

namespace App\Http\Controllers;

use App\Models\OwnerRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerRoleController extends Controller
{

    public function index()
    {
        $ownerRoles = OwnerRole::paginate(20);
        return view('process/initial-setup/owner-roles/index', compact('ownerRoles'));
    }

    public function show(OwnerRole $ownerRole)
    {
        return view('process/initial-setup/owner-roles/show', compact('ownerRole'));
    }

    public function create()
    {
        $ownerRole = null;
        return view('process/initial-setup/owner-roles/create', compact('ownerRole'));
    }

    // To edit the table
    public function edit(OwnerRole $ownerRole)
    {
        return view('process/initial-setup/owner-roles/create', compact('ownerRole'));
    }



    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'owner_role_id' => ['required', 'unique:owner_role_table'],
            'owner_role_name' => 'required',
            'owner_role_description' => 'nullable',
        ]);

        OwnerRole::create($attributes);

        return redirect()->route('owner-roles.index')->with('success', 'Owner Role saved successfully.');
    }

    // To store the edited data into the table
    public function update(OwnerRole $ownerRole, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'owner_role_id' => ['required', 'unique:owner_role_table,owner_role_id,' . $ownerRole->id],
            'owner_role_name' => 'required',
            'owner_role_description' => 'nullable',
        ]);

        $ownerRole->update($attributes);


        return redirect()->route('owner-roles.index')->with('success', 'Owner Role saved successfully.');
    }

    //--------------------------------------------------------------------//




    public function destroy(OwnerRole $ownerRole)
    {

        $ownerRole->delete();
        return redirect(route('owner-roles.index'))
            ->with('success', 'Owner Role deleted successfully.');
    }
}
