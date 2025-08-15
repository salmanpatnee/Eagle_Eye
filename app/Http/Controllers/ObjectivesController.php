<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectivesController extends Controller
{
    public function index()
    {
        $objectives = Objective::paginate(20);

        return view('process/risk-identification/objectives/index', compact('objectives'));
    }

    public function show(Objective $objective)
    {
        return view('process/risk-identification/objectives/show', compact('objective'));
    }

    public function create()
    {
        $objective = null;

        return view('process/risk-identification/objectives/create', compact('objective'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'objective_id' => ['required', 'unique:objectives'],
            'objective' => 'required',
        ]);

        Objective::create($attributes);

        return redirect(route('objectives.index'))
            ->with('success', 'Objective saved successfully.');
    }

    public function edit(Objective $objective)
    {

        return view('process/risk-identification/objectives/create', compact('objective'));
    }

    public function update(Objective $objective, Request $request)
    {
        $attributes = $request->validate([
            'objective_id' => ['required', 'unique:objectives,objective_id,' . $objective->id],
            'objective' => 'required',
        ]);

        $objective->update($attributes);

        return redirect(route('objectives.index'))
            ->with('success', 'Objective saved successfully.');
    }

    public function destroy(Objective $objective)
    {
        $objective->delete();

        return redirect(route('objectives.index'))
            ->with('success', 'Objective deleted successfully.');
    }
}
