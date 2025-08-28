<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\RiskGroup;
use Illuminate\Http\Request;

class RiskGroupController extends Controller
{

    public function index()
    {
        $riskGroups = RiskGroup::paginate(20);

        return view('process/risk-identification/risk-groups/index', compact('riskGroups'));
    }

    public function show(RiskGroup $riskGroup)
    {
        return view('process/risk-identification/risk-groups/show', compact('riskGroup'));
    }

    public function create()
    {
        $riskGroup = null;
        $owners = Owner::select('owner_role_id', 'owner_name')->get();

        return view('process/risk-identification/risk-groups/create', compact('riskGroup', 'owners'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_group_id' => ['required', 'unique:risk_group_table'],
            'risk_group_name' => 'required',
            'risk_group_description' => 'nullable',
            'owner_id' => 'required',
        ]);

        RiskGroup::create($attributes);


        return redirect()->route('risk-groups.index')->with('success', 'Risk Group saved successfully.');
    }

    public function edit(RiskGroup $riskGroup)
    {
        $owners = Owner::select('owner_role_id', 'owner_name')->get();

        return view('process/risk-identification/risk-groups/create', compact('riskGroup', 'owners'));
    }


    public function update(RiskGroup $riskGroup, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_group_id' => ['required', 'unique:risk_group_table,risk_group_id,' . $riskGroup->id],
            'risk_group_name' => 'required',
            'risk_group_description' => 'nullable',
            'owner_id' => 'required',
        ]);

        $riskGroup->update($attributes);


        return redirect()->route('risk-groups.index')->with('success', 'Risk Group saved successfully.');
    }

    public function destroy(RiskGroup $riskGroup)

    {
        $riskGroup->delete();
        return redirect()->route('risk-groups.index')->with('success', 'Risk Group deleted successfully.');
    }
}
