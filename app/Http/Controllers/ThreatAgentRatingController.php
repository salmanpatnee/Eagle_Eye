<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentRating;
use Illuminate\Http\Request;

class ThreatAgentRatingController extends Controller
{

    public function index()
    {
        $threatAgentRatings = ThreatAgentRating::all();

        return view('4-Process/threat-management/threat-agent-ratings/index', compact('threatAgentRatings'));
    }

    public function show(ThreatAgentRating $threatAgentRating)
    {
        return view('4-Process/threat-management/threat-agent-ratings/show', compact('threatAgentRating'));
    }

    public function create()
    {
        $threatAgentRating = null;
        return view('4-Process/threat-management/threat-agent-ratings/create', compact('threatAgentRating'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_rating_id' => ['required', 'unique:threat_agent_rating_table'],
            'threat_agent_rating_title' => 'required',
            'threat_agent_rating_description' => 'nullable',
        ]);

        ThreatAgentRating::create($attributes);

        return redirect()->route('threat-agent-ratings.index')->with('success', 'Threat Rating Saved Successfully.');
    }

    public function edit(ThreatAgentRating $threatAgentRating)
    {
        return view('4-Process/threat-management/threat-agent-ratings/create', compact('threatAgentRating'));
    }


    public function update(ThreatAgentRating $threatAgentRating, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_rating_id' => ['required', 'unique:threat_agent_rating_table,threat_agent_rating_id,' . $threatAgentRating->id],
            'threat_agent_rating_title' => 'required',
            'threat_agent_rating_description' => 'nullable',
        ]);

        $threatAgentRating->update($attributes);

        return redirect()->route('threat-agent-ratings.index')->with('success', 'Threat Rating Saved Successfully.');
    }


    public function destroy(ThreatAgentRating $threatAgentRating)
    {
        $threatAgentRating->delete();
        return redirect()->route('threat-agent-ratings.index')->with('success', 'Threat Rating Deleted Successfully.');
    }
}
