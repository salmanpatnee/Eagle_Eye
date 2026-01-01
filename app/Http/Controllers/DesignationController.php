<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignationRequest;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $designations = Designation::when($search, function ($query, $search) {
            return $query->where('designation_name', 'like', '%' . $search . '%')
                         ->orWhere('designation_id', 'like', '%' . $search . '%');
        })
        ->paginate(20)
        ->appends(['search' => $search]);

        return view('process.hr.designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designation = null;
        return view('process.hr.designations.create', compact('designation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DesignationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $attributes = $request->validate([
            'designation_id' => ['required', 'unique:hr_designation_table'],
            'designation_name' => 'required',
        ]);

        Designation::create($attributes);

    
        return redirect()->route('designations.index')
                         ->with('success', 'Designation created successfully.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $designation = Designation::findOrFail($id);

        return view('process.hr.designations.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);

        return view('process.hr.designations.create', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DesignationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Designation $designation)
    {
        $attributes = $request->validate([
            'designation_id' => ['required', 'unique:hr_designation_table,designation_id,' . $designation->id],
            'designation_name' => 'required',
        ]);

        $designation->update($attributes);

        return redirect()->route('designations.index')
                         ->with('success', 'Designation updated successfully.');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $designation = Designation::findOrFail($id);

            // Check if designation is being used by any human resources before deletion
            // This would require checking the relationship with hr_expert_master_table

            $designation->delete();

            DB::commit();

            return redirect()->route('designations.index')
                ->with('success', 'Designation deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Failed to delete designation: ' . $e->getMessage());
        }
    }
}
