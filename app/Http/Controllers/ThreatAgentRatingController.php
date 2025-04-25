<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreatAgentRatingController extends Controller
{
    private $_routeName = "threatrating";
private $_primaryKey = "threat_agent_rating_id";

    // To add data into the table
    public function create(){
        $data=$threatrating = null;
        $routeName = $this->_routeName;
$primaryKey = $this->_primaryKey;



        return view('4-Process/5-Threat/4-ThreatAgentRatingForm', compact('threatrating', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
     public function edit($id)
     {
         $data= $threatrating = DB::table('threat_agent_rating_table')->where('threat_agent_rating_id', $id)->first();
         $routeName = $this->_routeName;
$primaryKey = $this->_primaryKey;

         return view('4-Process/5-Threat/4-ThreatAgentRatingForm', compact('threatrating', 'routeName', 'data', 'primaryKey'));
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
        
        return redirect()->route('threatrating.index')->with('success', 'Threat Rating Saved Successfully.');
    }


    public function update(ThreatAgentRating $threatAgentRating, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'threat_agent_rating_id' => ['required', 'unique:threat_agent_rating_table,threat_agent_rating_id,'.$threatAgentRating->id],
            'threat_agent_rating_title' => 'required',
            'threat_agent_rating_description' => 'nullable',
        ]);

        $threatAgentRating->update($attributes);
        
        return redirect()->route('threatrating.index')->with('success', 'Threat Rating Saved Successfully.');
    }

    //----------------------------------------------------------------------------------------------//

// 2.Controller - SHOW DATA INTO THE LIST
public function index()
{
    $ratings = DB::table('threat_agent_rating_table')->get();
    $routeName = $this->_routeName;
    $primaryKey = $this->_primaryKey;

    return view('4-Process/5-Threat/4-ThreatAgentRatingList', compact('routeName', 'primaryKey', 'ratings') );
} 

// 3.Controller - DELETE RECORD FROM LIST
public function delete(Request $request) {

    $attributes =  $request->validate([
        'record' => ['required'],
    ]);
    
    $data = ThreatAgentRating::where('id', $attributes['record'])->orWhere('threat_agent_rating_id', $attributes['record'])->first();
    $data->delete();
    return redirect('/threat-agent-rating-list');


    $selectedRatings = $request->input('selectedRatings');

    if (!empty($selectedRatings)) {
        DB::table('threat_agent_rating_table')->whereIn('threat_agent_rating_id', $selectedRatings)->delete();
    } return redirect('/threat-agent-rating-list');
}


// 4.Controller - DETAILED TABLE
public function show($threatrating) 
{
    // Fetch data from the database based on department_id
    $data = $threatrating = DB::table('threat_agent_rating_table')->where('threat_agent_rating_id', $threatrating)->first();

    if (!$threatrating) {
        abort(404);
    }

    $routeName = $this->_routeName;
    $primaryKey = $this->_primaryKey;

    return view('4-Process/5-Threat/4-ThreatAgentRatingTable', compact('threatrating','routeName', 'data', 'primaryKey'));
}





}