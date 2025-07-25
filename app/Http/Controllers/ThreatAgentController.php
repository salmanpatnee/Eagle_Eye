<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgent;
use App\Models\ThreatAgentRating;
use App\Models\ThreatAgentSubType;
use App\Models\ThreatAgentType;
use App\Models\ThreatAgentVector;
use Illuminate\Http\Request;

class ThreatAgentController extends Controller
{
    public function index()
    {
        $threatAgents = ThreatAgent::with('rating', 'vectors')->paginate(20);
        return view('4-Process/threat-management/threats/index', compact('threatAgents'));
    }

    public function show(ThreatAgent $threatAgent)
    {
        $threatAgent->load('type', 'subType', 'rating', 'vectors');
        return view('4-Process/threat-management/threats/show', compact('threatAgent'));
    }

    public function create()
    {
        $threatAgent = null;
        $threatAgentTypes = ThreatAgentType::all();
        $threatAgentSubTypes = ThreatAgentSubType::all();
        $threatAgentRatings = ThreatAgentRating::all();
        $threatAgentVectors = ThreatAgentVector::select('id', 'threat_agent_vector_id', 'threat_agent_vector_name')->distinct()->get();
        $threatAgentVectorIds = [];

        return view('4-Process/threat-management/threats/create', compact('threatAgent', 'threatAgentTypes', 'threatAgentSubTypes', 'threatAgentRatings', 'threatAgentVectors', 'threatAgentVectorIds'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_id' => ['required', 'unique:threat_agent_table'],
            'threat_agent_name' => 'required',
            'threat_agent_description' => 'nullable',
            'threat_agent_type_id' => 'required',
            'threat_agent_sub_type_id' => 'required',
            'threat_agent_rating_id' => 'required',
            'vectors' => 'required'
        ]);


        $vectors = $attributes['vectors'];
        unset($attributes['vectors']);

        $threatAgent = ThreatAgent::create($attributes);
        $threatAgent->vectors()->sync($vectors ?? []);

        return redirect()->route('threat-agents.index')->with('success', 'Threat Agent saved successfully.');
    }

    public function edit(ThreatAgent $threatAgent)
    {
        $threatAgentTypes = ThreatAgentType::all();
        $threatAgentSubTypes = ThreatAgentSubType::all();
        $threatAgentRatings = ThreatAgentRating::all();
        $threatAgentVectors = ThreatAgentVector::select('id', 'threat_agent_vector_id', 'threat_agent_vector_name')->distinct()->get();
        $threatAgentVectorIds =  $threatAgent->vectors->pluck('threat_agent_vector_id')->toArray();


        return view('4-Process/threat-management/threats/create', compact('threatAgent', 'threatAgentTypes', 'threatAgentSubTypes', 'threatAgentRatings', 'threatAgentVectors', 'threatAgentVectorIds'));
    }


    public function update(ThreatAgent $threatAgent, Request $request)
    {

        $attributes = $request->validate([
            'threat_agent_id' => ['required', 'unique:threat_agent_table,threat_agent_id,' . $threatAgent->id],
            'threat_agent_name' => 'required',
            'threat_agent_description' => 'nullable',
            'threat_agent_type_id' => 'required',
            'threat_agent_sub_type_id' => 'required',
            'threat_agent_rating_id' => 'required',
            'vectors' => 'required'
        ]);


        $vectors = $attributes['vectors'];
        unset($attributes['vectors']);

        $threatAgent->update($attributes);

        $threatAgent->vectors()->sync($vectors ?? []);

        return redirect()->route('threat-agents.index')->with('success', 'Threat Agent saved successfully.');
    }


    public function destroy(ThreatAgent $threatAgent)
    {
        $threatAgent->vectors()->detach();
        $threatAgent->delete();
        return redirect()->route('threat-agents.index')->with('success', 'Threat Agent deleted successfully.');
    }
}
