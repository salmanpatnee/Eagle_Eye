<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities = Nationality::orderBy('name', 'asc')->paginate(20);

        return view('process.hr.nationalities.index', compact('nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationality = null;

        return view('process.hr.nationalities.create', compact('nationality'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255|unique:nationalities,name',
        ]);

        Nationality::create($attributes);

        return redirect(route('nationalities.index'))->with('success', 'Nationality added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(Nationality $nationality)
    {
        return view('process.hr.nationalities.show', compact('nationality'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(Nationality $nationality)
    {
        return view('process.hr.nationalities.create', compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nationality $nationality)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255|unique:nationalities,name,'.$nationality->id,
        ]);

        $nationality->update($attributes);

        return redirect(route('nationalities.index'))->with('success', 'Nationality updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nationality $nationality)
    {
        // Check if the nationality is referenced by any HR expert
        if ($nationality->hrExperts()->count() > 0) {
            return redirect(route('nationalities.index'))->with('error', 'Cannot delete nationality as it is associated with one or more HR experts.');
        }

        $nationality->delete();
        
        return redirect(route('nationalities.index'))->with('success', 'Nationality deleted successfully.');
    }
}