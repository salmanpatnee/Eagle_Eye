<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpertiseRequest;
use App\Models\Experties; // Using the existing expertise model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $expertises = Experties::when($search, function ($query, $search) {
            return $query->where('expertise_title', 'like', '%'.$search.'%');
        })
        ->paginate(100)
        ->appends(['search' => $search]);

        return view('process.hr.experties.index', compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expertise = null;

        return view('process.hr.experties.create', compact('expertise'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $attributes = $request->validate([
            'expertise_id' => ['required', 'unique:hr_expertise_table'],
            'expertise_title' => 'required',
        ]);

        Experties::create($attributes);

    
        return redirect()->route('expertises.index')
                         ->with('success', 'Expertise created successfully.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expertise = Experties::findOrFail($id);

        return view('process.hr.experties.show', compact('expertise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expertise = Experties::findOrFail($id);

        return view('process.hr.experties.create', compact('expertise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ExpertiseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experties $expertise)
    {
        $attributes = $request->validate([
            'expertise_id' => ['required', 'unique:hr_expertise_table,expertise_id,'.$expertise->id],
            'expertise_title' => 'required',
        ]);

        $expertise->update($attributes);

        return redirect()->route('expertises.index')
                        ->with('success', 'Expertise updated successfully.');
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

            $expertise = Experties::findOrFail($id);

            // Check if expertise is being used by any human resources before deletion
            // This would require checking the pivot table relationship

            $expertise->delete();

            DB::commit();

            return redirect()->route('expertises.index')
                ->with('success', 'Expertise deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Failed to delete expertise: '.$e->getMessage());
        }
    }
}
