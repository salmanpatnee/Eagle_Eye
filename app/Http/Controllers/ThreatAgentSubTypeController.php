<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentSubType;
use App\Models\ThreatAgentType;
use Illuminate\Http\Request;

class ThreatAgentSubTypeController extends Controller
{

    public function index()
    {
        $threatAgentSubTypes = ThreatAgentSubType::with('type')->get();

        return view('4-Process/threat-management/threat-agent-sub-types/index', compact('threatAgentSubTypes'));
    }

    public function show(ThreatAgentSubType $threatAgentSubType)
    {
        $threatAgentSubType->load('type');
        return view('4-Process/threat-management/threat-agent-sub-types/show', compact('threatAgentSubType'));
    }


    // To add data into the table
    public function create()
    {
        $threatAgentSubType = null;
        $threatAgentTypes = ThreatAgentType::all();

        return view('4-Process/threat-management/threat-agent-sub-types/create', compact('threatAgentSubType', 'threatAgentTypes'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_sub_type_id' => ['required', 'unique:threat_agent_sub_type_table'],
            'threat_agent_sub_type_name' => 'required',
            'threat_agent_type_description' => 'nullable',
            'threat_agent_type_id' => 'required',
        ]);

        ThreatAgentSubType::create($attributes);


        return redirect()->route('threat-agent-sub-types.index')
            ->with('success', 'Threat Agent Sub Type Saved Successfully.');
    }

    public function edit(ThreatAgentSubType $threatAgentSubType)
    {
        $threatAgentSubType->load('type');
        $threatAgentTypes = ThreatAgentType::all();

        return view('4-Process/threat-management/threat-agent-sub-types/create', compact('threatAgentSubType', 'threatAgentTypes'));
    }

    public function update(ThreatAgentSubType $threatAgentSubType,  Request $request)
    {

        // Validation
        $attributes = $request->validate([
            'threat_agent_sub_type_id' => ['required', 'unique:threat_agent_sub_type_table,threat_agent_sub_type_id,' . $threatAgentSubType->id],
            'threat_agent_sub_type_name' => 'required',
            'threat_agent_type_description' => 'nullable',
            'threat_agent_type_id' => 'required',
        ]);

        $threatAgentSubType->update($attributes);

        return redirect()->route('threat-agent-sub-types.index')->with('success', 'Threat Agent Sub Type Saved Successfully.');
    }


    public function destroy(ThreatAgentSubType $threatAgentSubType)
    {
        $threatAgentSubType->delete();
        return redirect()->route('threat-agent-sub-types.index')->with('success', 'Threat Agent Sub Type Deleted Successfully.');
    }
}
