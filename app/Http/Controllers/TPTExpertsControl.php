<?php

namespace App\Http\Controllers;

use App\Models\TPTExpert;
use Illuminate\Http\Request;

class TPTExpertsControl extends Controller
{
    public function index(Request $request)
    {
        $tptExperties = TPTExpert::paginate(20);

        return view('process/vulnerability-management/third-party-experties/index', compact('tptExperties'));
    }

    public function show(TPTExpert $tptExpert)
    {
        return view('process/vulnerability-management/third-party-experties/show', compact('tptExpert'));
    }

    public function create()
    {
        $tptExpert = null;

        return view('process/vulnerability-management/third-party-experties/create', compact('tptExpert'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'tpt_experties_id' => ['required', 'unique:tpt_experties_table'],
            'tpt_experties_name' => 'required',
        ]);

        TPTExpert::create($attributes);

        return redirect(route('tpt-experts.index'))
            ->with('success', 'Expert saved successfully.');
    }


    public function edit(TPTExpert $tptExpert)
    {
        return view('process/vulnerability-management/third-party-experties/create', compact('tptExpert'));
    }

    public function update(TPTExpert $tptExpert, Request $request)
    {
        $attributes = $request->validate([
            'tpt_experties_id' => ['required', 'unique:tpt_experties_table,tpt_experties_id,' . $tptExpert->id],
            'tpt_experties_name' => 'required',
        ]);

        $tptExpert->update($attributes);

        return redirect(route('tpt-experts.index'))
            ->with('success', 'Expert saved successfully.');
    }

    public function destroy(TPTExpert $tptExpert)
    {
        $tptExpert->delete();
        return redirect(route('tpt-experts.index'))
            ->with('success', 'Expert deleted successfully.');
    }
}
