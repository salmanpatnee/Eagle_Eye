<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndustryRequest;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\View\View
    {
        $industries = Industry::orderBy('industry_name', 'ASC')->paginate(20);

        return view('process.hr.industries.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        $industry = null;

        return view('process.hr.industries.create', compact('industry'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $attributes = $request->validate([
            'industry_id' => ['required', 'unique:hr_industry_table'],
            'industry_name' => 'required',
            'sector' => 'nullable',
        ]);

        Industry::create($attributes);

    
        return redirect()->route('industries.index')
                         ->with('success', 'Industry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Industry $industry): \Illuminate\View\View
    {
        return view('process.hr.industries.show', compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industry $industry): \Illuminate\View\View
    {
        return view('process.hr.industries.create', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Industry $industry, Request $request): \Illuminate\Http\RedirectResponse
    {
        $attributes = $request->validate([
            'industry_id' => ['required', 'unique:hr_industry_table,industry_id,' . $industry->id],
            'industry_name' => 'required',
            'sector' => 'nullable',
        ]);

        $industry->update($attributes);

        return redirect()->route('industries.index')
                         ->with('success', 'Industry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industry $industry): \Illuminate\Http\RedirectResponse
    {
        try {
            $industry->delete();

            return redirect()->route('industries.index')
                             ->with('success', 'Industry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('industries.index')
                             ->with('error', 'Could not delete industry. It may be associated with other records.');
        }
    }
}
