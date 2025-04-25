<?php

namespace App\Http\Controllers;

use App\Models\OwnerRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerRoleController extends Controller
{
    // To add data into the table
    public function create()
    {
        $ownerrole = null;
        return view('4-Process/1-InitialSetup/9-OwnerRoleForm', compact('ownerrole'));
    }

    // To edit the table
    public function edit($id)
    {
        $ownerrole = DB::table('owner_role_table')->where('owner_role_id', $id)->first();
        return view('4-Process/1-InitialSetup/9-OwnerRoleForm', compact('ownerrole'));
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

        return redirect()->route('ownerrole.index')->with('success', 'Owner Role saved successfully.');
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


        return redirect()->route('ownerrole.index')->with('success', 'Owner Role saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST

    public function index()
    {
        $OwnerRole = DB::table('owner_role_table')->get();
        return view('4-Process/1-InitialSetup/9-OwnerRoleList', ['OwnerRole' => $OwnerRole]);
    }


    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = OwnerRole::where('id', $attributes['record'])->orWhere('owner_role_id', $attributes['record'])->first();

        
        $data->delete();

        return redirect('/owner-role-list')
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

        //     return redirect('/owner-role-list')
        //         ->with('success', 'Record(s) deleted successfully.');
        // } catch (\Exception $e) {

        //     return redirect('/owner-role-list')
        //         ->with('error', $e->getMessage());
        // }
    }



    // Controller for Detailed Table
    public function show($owner_role_id)
    {
        // Fetch data from the database based on department_id
        $owner_role_id = DB::table('owner_role_table')->where('owner_role_id', $owner_role_id)->first();

        if (!$owner_role_id) {
            abort(404);
        }

        return view('4-Process/1-InitialSetup/9-OwnerRoleTable', compact('owner_role_id'));
    }
}
