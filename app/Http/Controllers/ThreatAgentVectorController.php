<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentVector;
use Illuminate\Http\Request;

class ThreatAgentVectorController extends Controller
{

    public function index()
    {
        $threatAgents = ThreatAgentVector::paginate(20);

        return view('4-Process.threat-management.threat-agent-vectors.index', compact('threatAgents'));
    }

    public function show(ThreatAgentVector $threatAgentVector)
    {
        return view('4-Process.threat-management.threat-agent-vectors.show', compact('threatAgentVector'));
    }

    public function create()
    {
        $threatAgentVector = null;
        return view('4-Process.threat-management.threat-agent-vectors.create', compact('threatAgentVector'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_vector_id' => ['required', 'unique:threat_agent_vector_table'],
            'threat_agent_vector_name' => 'required',
            'threat_agent_vector_description' => 'nullable',
        ]);

        ThreatAgentVector::create($attributes);

        return redirect()->route('threat-agent-vectors.index')->with('success', 'Threat Agent Vector Saved Successfully.');
    }

    public function edit(ThreatAgentVector $threatAgentVector)
    {
        return view('4-Process.threat-management.threat-agent-vectors.create', compact('threatAgentVector'));
    }


    // To store the edited data into the table
    public function update(ThreatAgentVector $threatAgentVector, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_vector_id' => ['required', 'unique:threat_agent_vector_table,threat_agent_vector_id,' . $threatAgentVector->id],
            'threat_agent_vector_name' => 'required',
            'threat_agent_vector_description' => 'nullable',
        ]);

        $threatAgentVector->update($attributes);

        return redirect()->route('threat-agent-vectors.index')->with('success', 'Threat Agent Vector Saved Successfully.');
    }

    public function destroy(ThreatAgentVector $threatAgentVector)
    {
        $threatAgentVector->delete();
        return redirect()->route('threat-agent-vectors.index')->with('success', 'Threat Agent Vector Deleted Successfully.');
    }
}
