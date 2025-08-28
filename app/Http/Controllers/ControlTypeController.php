<?php

namespace App\Http\Controllers;

use App\Models\ControlType;
use Illuminate\Http\Request;

class ControlTypeController extends Controller
{

    public function index()
    {
        $controlTypes = ControlType::paginate(20);
        return view('process/control-identification/control-types/index', compact('controlTypes'));
    }

    public function show(ControlType $controlType)
    {
        return view('process/control-identification/control-types/show', compact('controlType'));
    }

    public function create()
    {
        $controlType = null;
        return view('process/control-identification/control-types/create', compact('controlType'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'control_type_id' => ['required', 'unique:control_type_table'],
            'control_type_name' => 'required',
            'control_type_description' => 'nullable',
        ]);

        ControlType::create($attributes);

        return redirect()->route('control-types.index')->with('success', 'Control Type Saved Successfully.');
    }

    public function edit(ControlType $controlType)
    {
        return view('process/control-identification/control-types/create', compact('controlType'));
    }

    public function update(ControlType $controlType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'control_type_id' => ['required', 'unique:control_type_table,control_type_id,' . $controlType->id],
            'control_type_name' => 'required',
            'control_type_description' => 'nullable',
        ]);

        $controlType->update($attributes);

        return redirect()->route('control-types.index')->with('success', 'Control Type Saved Successfully.');
    }

    public function destroy(ControlType $controlType)
    {
        $controlType->delete();
        return redirect()->route('control-types.index')->with('success', 'Control Type Deleted Successfully.');
    }
}
