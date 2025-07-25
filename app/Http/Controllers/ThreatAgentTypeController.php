<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentType;
use Illuminate\Http\Request;

class ThreatAgentTypeController extends Controller
{
    public function index()
    {
        $threatAgentTypes = ThreatAgentType::paginate(20);

        return view('4-Process/threat-management/threat-agent-types/index', compact('threatAgentTypes'));
    }

    public function show(ThreatAgentType $threatAgentType)
    {
        return view('4-Process/threat-management/threat-agent-types/show', compact('threatAgentType'));
    }


    public function create()
    {
        $threatAgentType = null;

        return view('4-Process/threat-management/threat-agent-types/create', compact('threatAgentType'));
    }

    public function store(Request $request)
    {

        // Validation
        $attributes = $request->validate([
            'threat_agent_type_id' => ['required', 'unique:threat_agent_type_table'],
            'threat_agent_type_name' => 'required',
            'threat_agent_type_description' => 'nullable',
        ]);


        ThreatAgentType::create($attributes);


        return redirect()->route('threat-agent-types.index')->with('success', 'Threat Agent Type saved successfully.');
    }

    public function edit(ThreatAgentType $threatAgentType)
    {
        return view('4-Process/threat-management/threat-agent-types/create', compact('threatAgentType'));
    }


    public function update(ThreatAgentType $threatAgentType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_type_id' => ['required', 'unique:threat_agent_type_table,threat_agent_type_id,' . $threatAgentType->id],
            'threat_agent_type_name' => 'required',
            'threat_agent_type_description' => 'nullable',
        ]);

        $threatAgentType->update($attributes);
        $routeName = 'threattype';
        $primaryKey = 'threat_agent_type_id';

        return redirect()->route('threat-agent-types.index')->with('success', 'Threat Agent Type saved successfully.');
    }

    public function destroy(ThreatAgentType $threatAgentType)
    {
        $threatAgentType->delete();
        return redirect()->route('threat-agent-types.index')->with('success', 'Threat Agent Type deleted successfully.');
    }
}
