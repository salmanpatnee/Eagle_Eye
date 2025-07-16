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
        return view('4-Process/1-InitialSetup/owner-roles/index', compact('ownerRoles'));
    }

    public function show(OwnerRole $ownerRole)
    {
        return view('4-Process/1-InitialSetup/owner-roles/show', compact('ownerRole'));
    }

    public function create()
    {
        $ownerRole = null;
        return view('4-Process/1-InitialSetup/owner-roles/create', compact('ownerRole'));
    }

    // To edit the table
    public function edit(OwnerRole $ownerRole)
    {
        return view('4-Process/1-InitialSetup/owner-roles/create', compact('ownerRole'));
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




    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = OwnerRole::where('id', $attributes['record'])->orWhere('owner_role_id', $attributes['record'])->first();


        $data->delete();

        return redirect('/owner-roles')
            ->with('success', 'Record(s) deleted successfully.');

        // $ids =  $request->validate([
        //     'selecteddelete' => ['required', 'array'],
        // ]);

        // try {
        //     OwnerRole::whereIn('id', $ids['selecteddelete'])->each(function ($role) {
        //         if ($role->owners()->exists() || $role->assetGroups()->exists()) {

        //             throw new \Exception("Record cannot be deleted due to existing dependencies.");
        //         }
        //         $role->delete();
        //     });

        //     return redirect('/owner-roles')
        //         ->with('success', 'Record(s) deleted successfully.');
        // } catch (\Exception $e) {

        //     return redirect('/owner-roles')
        //         ->with('error', $e->getMessage());
        // }
    }
}
