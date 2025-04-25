<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::with('department', 'role')->get();
        
        return view('4-Process/1-InitialSetup/8-OwnerList', compact('owners'));
    } 


     // 4.Controller - DETAILED TABLE
     public function show(Owner $owner) 
     {
        $owner->load('department', 'role');

 
         return view('4-Process/1-InitialSetup/8-OwnerTable', compact('owner'));
     }


     // To add data into the table
     public function create(){
        $ownerreg = null;
        $ownerroles = DB::table('owner_role_table')->get();
        $department = DB::table('department_table')->get();
        return view('4-Process/1-InitialSetup/8-OwnerForm', compact('ownerreg', 'ownerroles', 'department'));
    }

    // To edit the table
     public function edit($id)
     {
        $ownerreg = DB::table('owner_table')->where('owner_id', $id)->first();
        $ownerroles = DB::table('owner_role_table')->get();
        $department = DB::table('department_table')->get();
        
        
        return view('4-Process/1-InitialSetup/8-OwnerForm', compact('ownerreg', 'ownerroles', 'department'));
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
            'owner_contact_numbner' => 'nullable',
            'owner_email_address' => 'nullable',
            'department_id' => 'required',
        ]);

        Owner::create($attributes);
    

        return redirect()->route('ownerreg.index')->with('success', 'Department saved successfully.');
    }

     // To store the edited data into the table
     public function update(Owner $owner, Request $request)
     {
         // Validation
         $attributes = $request->validate([
            'owner_id' => ['required', 'unique:owner_table,owner_id,'.$owner->id],
            'owner_name' => 'required',
            'owner_role_id' => 'required',
            'specification' => 'nullable',
            'owner_contact_numbner' => 'nullable',
            'owner_email_address' => 'nullable',
            'department_id' => 'required',
        ]);
 
         $owner->update($attributes);

 
         return redirect()->route('ownerreg.index')->with('success', 'Department saved successfully.');
     }
    //--------------------------------------------------------------------//


    // 2.Controller - SHOW DATA INTO THE LIST


    



    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request) {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = Owner::where('id', $attributes['record'])->orWhere('owner_id', $attributes['record'])->first();

        
        $data->delete();
        return redirect('/owner-list');


        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('owner_table')->whereIn('owner_id', $selecteddelete)->delete();
        } return redirect('/owner-list');
    }


    

    
    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
  {
      $OwnerRoles = DB::table('owner_role_table')
          ->select('*')
          ->distinct()
          ->get();
      $OwnerDptNames = DB::table('department_table')
          ->select('*')
          ->distinct()
          ->get();
      return view('4-Process/1-InitialSetup/8-OwnerForm', compact('OwnerRoles', 'OwnerDptNames'));
  }


}