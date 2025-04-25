<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;



class LocationController extends Controller
{

    public function index()
    {
        $locations = Location::all();

        return view('4-Process.1-InitialSetup.locations.index', compact('locations'));
    }

    public function show(Location $location)
    {
        return view('4-Process/1-InitialSetup/locations.show', compact('location'));
    }


    public function create()
    {
        $location = null;
        return view('4-Process.1-InitialSetup.locations.create', compact('location'));
    }

    public function edit(Location $location)
    {

        return view('4-Process.1-InitialSetup.locations.create', compact('location'));
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'location_id' => ['required', 'unique:location_table'],
            'location_name' => 'required',
            'location_description' => 'nullable',
            'location_address' => 'nullable',
            'location_area' => 'nullable',
            'location_city' => 'nullable',
            'location_country' => 'nullable',
            'location_contact_name' => 'nullable',
            'location_contact_number' => 'nullable',
            'location_contact_email' => 'nullable|email',
        ]);


        Location::create($attributes);

        return redirect(route('locations.index'))
            ->with('success', 'Location saved successfully.');
    }

    public function update(Location $location, Request $request)
    {
        $attributes = $request->validate([
            'location_id' => ['required', 'unique:location_table,location_id,' . $location->id],
            'location_name' => 'required',
            'location_description' => 'nullable',
            'location_address' => 'nullable',
            'location_area' => 'nullable',
            'location_city' => 'nullable',
            'location_country' => 'nullable',
            'location_contact_name' => 'nullable',
            'location_contact_number' => 'nullable',
            'location_contact_email' => 'nullable|email',
        ]);


        $location->update($attributes);

        return redirect(route('locations.index'))
            ->with('success', 'Location saved successfully.');
    }


    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        Location::where('id', $attributes['record'])->delete();

        
        return redirect(route('locations.index'))
        ->with('success', 'Location(s) deleted successfully.');


        // $locationIds = $request->validate([
        //     'locations' => ['required', 'array'],
        // ]);

        // try {
        //     Location::whereIn('id', $locationIds['locations'])->each(function ($location) {
        //         if ($location->departments()->exists()) {
        //             throw new \Exception("Location {$location->location_name} cannot be deleted due to existing dependencies.");
        //         }
        //         $location->delete();
        //     });

        //     return redirect(route('locations.index'))
        //         ->with('success', 'Location(s) deleted successfully.');

        // } catch (\Exception $e) {
            
        //     return redirect(route('locations.index'))
        //         ->with('error', $e->getMessage());
        // }
    }
}
