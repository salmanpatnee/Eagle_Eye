<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use App\Models\TPTExpert;
use Illuminate\Http\Request;

class ThirdPartyController extends Controller
{



    public function index(Request $request)
    {
        $thirdParties = ThirdParty::paginate(20);

        return view('4-Process\vulnerability-management\third-party\index', compact('thirdParties'));
    }

    public function show(ThirdParty $thirdParty)
    {
        $thirdParty->load('experties');

        return view('4-Process\vulnerability-management\third-party\show', compact('thirdParty'));
    }

    public function create()
    {
        $thirdParty = null;
        $experties = TPTExpert::select('tpt_experties_id', 'tpt_experties_name')->get();
        $selectedExpertIds = [];

        return view('4-Process\vulnerability-management\third-party\create', compact('thirdParty', 'experties', 'selectedExpertIds'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'tpt_id' => ['required', 'unique:third_party_table'],
            'tpt_name' => 'required',
            'tpt_contact_person_name' => 'nullable',
            'tpt_address' => 'nullable',
            'tpt_country_origin' => 'nullable',
            'tpt_established_date' => 'date|nullable',
            'experties' => 'nullable',
        ]);

        $experties = $attributes['experties'] ?? [];
        unset($attributes['experties']);

        $thirdParty = ThirdParty::create($attributes);
        $thirdParty->experties()->attach($experties ?? []);


        return redirect(route('third-party.index'))
            ->with('success', 'Third Party saved successfully.');
    }

    public function edit(ThirdParty $thirdParty)
    {
        $experties = TPTExpert::select('tpt_experties_id', 'tpt_experties_name')->get();
        $selectedExpertIds = $thirdParty->experties->pluck('tpt_experties_id')->toArray();

        return view('4-Process\vulnerability-management\third-party\create', compact('thirdParty', 'experties', 'selectedExpertIds'));
    }

    public function update(ThirdParty $thirdParty, Request $request)
    {
        $attributes = $request->validate([
            'tpt_id' => ['required', 'unique:third_party_table,tpt_id,' . $thirdParty->id],
            'tpt_name' => 'required',
            'tpt_contact_person_name' => 'nullable',
            'tpt_address' => 'nullable',
            'tpt_country_origin' => 'nullable',
            'tpt_established_date' => 'date|nullable',
            'experties' => 'nullable',
        ]);

        $experties = $attributes['experties'];
        unset($attributes['experties']);

        $thirdParty->update($attributes);

        $thirdParty->experties()->attach($experties ?? []);

        return redirect(route('third-party.index'))
            ->with('success', 'Third Party saved successfully.');
    }

    public function destroy(ThirdParty $thirdParty)
    {
        $thirdParty->experties()->detach();
        $thirdParty->delete();
        return redirect(route('third-party.index'))
            ->with('success', 'Third Party deleted successfully.');
    }
}
