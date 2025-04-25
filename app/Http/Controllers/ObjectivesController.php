<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectivesController extends Controller
{
    private $_routeName = "objectives";
    private $_primaryKey = "objective_id";


    public function index()
    {
        $objectives = Objective::all();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/objectives/index', compact('objectives', 'routeName',  'primaryKey'));
    }

    public function show(Objective $objective)
    {
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $data = $objective;

        return view('4-Process/objectives/show', compact('objective', 'routeName', 'data', 'primaryKey'));
    }

    public function create()
    {
        $data = $objective = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/objectives/create', compact('objective', 'data', 'routeName', 'primaryKey'));
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
        $data = $objective;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/objectives/create', compact('objective', 'data', 'routeName', 'primaryKey'));
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

    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);
        
        Objective::where('id', $attributes['record'])->delete();

        return redirect(route('objectives.index'))
            ->with('success', 'Objective deleted successfully.');
    }
}
