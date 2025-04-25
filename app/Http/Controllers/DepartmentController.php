<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::select('d.id', 'd.department_id', 'd.department_name', 'l.location_name')
            ->from('department_table as d')
            ->leftJoin('location_table as l', 'd.location_id', '=', 'l.location_id')
            ->get();

        return view('4-Process.1-InitialSetup.departments.index', compact('departments'));
    }

    public function show(Department $department)
    {
        $department->load('location');

        return view('4-Process.1-InitialSetup.departments.show', compact('department'));
    }

    public function create()
    {
        $department = null;
        $locations = Location::select('id', 'location_id', 'location_name')->get();
        return view('4-Process.1-InitialSetup.departments.create', compact('department', 'locations'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'department_id' => ['required', 'unique:department_table'],
            'department_name' => 'required',
            'department_description' => 'nullable',
            'location_id' => 'nullable',
        ]);

        Department::create($attributes);

        return redirect(route('departments.index'))
            ->with('success', 'Department saved successfully.');
    }


    public function edit(Department $department, Request $request)
    {
        $department->load('location');
        $locations = Location::select('id', 'location_id', 'location_name')->get();


        return view('4-Process.1-InitialSetup.departments.create', compact('department', 'locations'));
    }

    public function update(Department $department, Request $request)
    {
        $attributes = $request->validate([
            'department_id' => ['required', 'unique:department_table,department_id,' . $department->id],
            'department_name' => 'required',
            'department_description' => 'nullable',
            'location_id' => 'nullable',
        ]);

        $department->update($attributes);

        return redirect(route('departments.index'))
            ->with('success', 'Department saved successfully.');
    }

    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        Department::where('id', $attributes['record'])->delete();

        return redirect(route('departments.index'))
        ->with('success', 'Department(s) deleted successfully.');

        // $departmentsIds =  $request->validate([
        //     'departments' => ['required', 'array'],
        // ]);

        // try {
        //     Department::whereIn('id', $departmentsIds['departments'])->each(function ($department) {
        //         if ($department->subDepartments()->exists()) {

        //             throw new \Exception("Department {$department->department_name} cannot be deleted due to existing dependencies.");
        //         }
        //         $department->delete();
        //     });

        //     return redirect(route('departments.index'))
        //         ->with('success', 'Department(s) deleted successfully.');
        // } catch (\Exception $e) {

        //     return redirect(route('departments.index'))
        //         ->with('error', $e->getMessage());
        // }
    }
}
