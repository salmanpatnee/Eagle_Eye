<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgent;
use App\Models\ThreatAgentVector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreatAgentController extends Controller
{
    // To add data into the table
    public function create()
    {
        $data = $threatagent = null;
        $threatTypeNames = DB::table('threat_agent_type_table')->get();
        $threatSubTypeNames = DB::table('threat_agent_sub_type_table')->get();
        $threatRatings = DB::table('threat_agent_rating_table')->get();
        $vectors = DB::table('threat_agent_vector_table')->select('id', 'threat_agent_vector_id', 'threat_agent_vector_name')->distinct()->get();

        $routeName = 'threatagent';
        $primaryKey = 'threat_agent_id';

        return view('4-Process/5-Threat/1-ThreatAgentForm', compact('threatagent', 'threatTypeNames', 'threatSubTypeNames', 'threatRatings', 'vectors', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $threatagent = DB::table('threat_agent_table')->where('threat_agent_id', $id)->first();
        $threatTypeNames = DB::table('threat_agent_type_table')->get();
        $threatSubTypeNames = DB::table('threat_agent_sub_type_table')->get();
        $threatRatings = DB::table('threat_agent_rating_table')->get();
        $vectors = DB::table('threat_agent_vector_table')->select('id', 'threat_agent_vector_id', 'threat_agent_vector_name')->distinct()->get();

        $threatAgentVectorIds = ThreatAgentVector::select('t.threat_agent_vector_id')
            ->from('threat_agent_vector_table as t')
            ->join('threat_agent_vector_table_vs_threat_agent_table as tvt', 't.threat_agent_vector_id', '=', 'tvt.threat_vector_id')
            ->join('threat_agent_table as a', 'tvt.threat_id', '=', 'a.threat_agent_id')
            ->where('a.threat_agent_id', $id)
            ->pluck('t.threat_agent_vector_id')
            ->toArray();

            $routeName = 'threatagent';
            $primaryKey = 'threat_agent_id';

        // return $threatAgentVectorIds;

        return view('4-Process/5-Threat/1-ThreatAgentForm', compact('threatagent', 'threatTypeNames', 'threatSubTypeNames', 'threatRatings', 'vectors', 'threatAgentVectorIds', 'routeName', 'data', 'primaryKey'));
    }


    // To store the edited data into the table
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

        if ($vectors && $vectorsArray = json_decode($vectors, true)) {
            $threatAgent->vectors()
                ->attach($vectorsArray);
        }

        return redirect()->route('threatagent.index')->with('success', 'Threat Agent saved successfully.');
    }


    // To store the edited data into the table
    public function update(ThreatAgent $threatAgent, Request $request)
    {
        // return $threatAgent;

        // Validation
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

        if ($vectors && $vectorsArray = json_decode($vectors, true)) {
            $threatAgent->vectors()
                ->sync($vectorsArray);
        }

        return redirect()->route('threatagent.index')->with('success', 'Threat Agent saved successfully.');
    }

    // ---------------------------------------------------------------------------------------------------------

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        // $threatAGent = DB::table('threat_agent_table')->get();
        $threatAgents = ThreatAgent::with('rating', 'vectors')->get();
        return view('4-Process/5-Threat/1-ThreatAgentList', compact('threatAgents'));
    }

    // ---------------------------------------------------------------------------------------------------------

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = ThreatAgent::where('id', $attributes['record'])->orWhere('threat_agent_id', $attributes['record'])->first();
        $data->vectors()->detach();
        $data->delete();
        return redirect('/threat-agent-list');

        // $selectedthreatAGent = $request->input('selectedthreatAGent');

        // if(count($selectedthreatAGent)){
        //     foreach($selectedthreatAGent as $agentId){

        //         $agent = ThreatAgent::find($agentId);
        //         $agent->vectors()->detach();
        //         $agent->delete();
        //     }

        // }

    }

    // ---------------------------------------------------------------------------------------------------------

    // 4.Controller - DETAILED TABLE

    // 4.Controller - DETAILED TABLE
    public function show(ThreatAgent $threatAgent)
    {
        $data = $threatAgent->load('type', 'subType', 'rating', 'vectors');
        $routeName = 'threatagent';
        $primaryKey = 'threat_agent_id';

        return view('4-Process/5-Threat/1-ThreatAgentTable', compact('threatAgent', 'routeName', 'data', 'primaryKey'));
    }

    // ---------------------------------------------------------------------------------------------------------


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $threatTypeNames = DB::table('threat_agent_type_table')
            ->select('*')
            ->distinct()
            ->get();
        $threatSubTypeNames = DB::table('threat_agent_sub_type_table')
            ->select('*')
            ->distinct()
            ->get();
        $threatRatings = DB::table('threat_agent_rating_table')
            ->select('*')
            ->distinct()
            ->get();
        $threatVectors = DB::table('threat_agent_vector_table')
            ->select('*')
            ->distinct()
            ->get();

            $routeName = 'threatagent';
            $primaryKey = 'threat_agent_id';
            $data = null;
        return view('4-Process/5-Threat/1-ThreatAgentForm', compact('threatTypeNames', 'threatSubTypeNames', 'threatRatings', 'threatVectors','routeName', 'data', 'primaryKey'));
    }
}
