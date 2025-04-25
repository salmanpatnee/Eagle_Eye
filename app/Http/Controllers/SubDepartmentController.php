<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDepartmentController extends Controller
{

    public function index()
    {
        $subDepartments = SubDepartment::select('id', 'sub_department_id', 'sub_department_name', 'department_id')->with('department')->get();


        return view('4-Process.1-InitialSetup.sub-departments.index', compact('subDepartments'));
    }

    public function show(SubDepartment $subDepartment)
    {
        $subDepartment->load('department');

        return view('4-Process.1-InitialSetup.sub-departments.show', compact('subDepartment'));
    }

    public function create()
    {
        $subDepartment = null;
        $departments = Department::select('id', 'department_id', 'department_name')->get();

        return view('4-Process.1-InitialSetup.sub-departments.create', compact('subDepartment', 'departments'));
    }

     public function store(Request $request)
     {
         $attributes = $request->validate([
             'sub_department_id' => 'required',
             'sub_department_name' => 'required',
             'sub_department_description' => 'nullable',
             'department_id' => 'required',
         ]);
 
         SubDepartment::create($attributes);
 
         return redirect(route('sub-departments.index'))
            ->with('success', 'Sub-Department saved successfully.');
     }

     
    public function edit(SubDepartment $subDepartment)
    {
        $departments = Department::select('id', 'department_id', 'department_name')->get();

        return view('4-Process.1-InitialSetup.sub-departments.create', compact('subDepartment', 'departments'));
    }


    public function update(SubDepartment $subDepartment, Request $request)
     {
         $attributes = $request->validate([
             'sub_department_id' => ['required', 'unique:sub_department_table,sub_department_id,'.$subDepartment->id],
             'sub_department_name' => 'required',
             'sub_department_description' => 'nullable',
             'department_id' => 'required',
         ]);
         
         $subDepartment->update($attributes);
 
         return redirect(route('sub-departments.index'))
            ->with('success', 'Sub-Department saved successfully.');
     }

     public function destroy(Request $request)
     {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        SubDepartment::where('id', $attributes['record'])->delete();

        return redirect(route('sub-departments.index'))
        ->with('success', 'Sub-Department deleted successfully.');

        //  $subDepartments =  $request->validate([
        //      'subDepartments' => ['required', 'array'],
        //  ]);
     
        //  SubDepartment::whereIn('id', $subDepartments['subDepartments'])->delete();
     
        //  return redirect(route('sub-departments.index'))
        //      ->with('success', 'Sub-Department deleted successfully.');
     }
   
}
