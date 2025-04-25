<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreatAgentTypeController extends Controller
{
    private $_routeName = "threattype";
    private $_primaryKey = "threat_agent_type_id";

    // To add data into the table
    public function create(){
        $data = $threattype = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;



        return view('4-Process/5-Threat/2-ThreatAgentTypeForm', compact('threattype','routeName', 'data', 'primaryKey'));
    }

    // To edit the table
     public function edit($id)
     {
         $data = $threattype = DB::table('threat_agent_type_table')->where('threat_agent_type_id', $id)->first();
         $routeName = $this->_routeName;
         $primaryKey = $this->_primaryKey;

         return view('4-Process/5-Threat/2-ThreatAgentTypeForm', compact('threattype','routeName', 'data', 'primaryKey'));
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
        

        return redirect()->route('threattype.index')->with('success', 'Threat Agent Type saved successfully.');
    }

     // To store the edited data into the table
    public function update(ThreatAgentType $threatAgentType, Request $request)
    {
         // Validation
         $attributes = $request->validate([
            'threat_agent_type_id' => ['required', 'unique:threat_agent_type_table,threat_agent_type_id,'.$threatAgentType->id],
            'threat_agent_type_name' => 'required',
            'threat_agent_type_description' => 'nullable',
        ]);

        $threatAgentType->update($attributes);
        $routeName = 'threattype';
        $primaryKey = 'threat_agent_type_id';

        return redirect()->route('threattype.index')->with('success', 'Threat Agent Type saved successfully.');
    }

    //----------------------------------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $threatAgentTypes = DB::table('threat_agent_type_table')->get();
       

        return view('4-Process/5-Threat/2-ThreatAgentTypeList', ['threatAgentTypes' => $threatAgentTypes,  'primaryKey' => 'threat_agent_type_id', 'routeName' => 'threattype']);
    } 

    //----------------------------------------------------------------------------------------------//

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request) {
        
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);
        
        $data = ThreatAgentType::where('id', $attributes['record'])->orWhere('threat_agent_type_id', $attributes['record'])->first();
        $data->delete();
        return redirect('/threat-agent-type-list');
        
        $selectedthreatAgentType = $request->input('selectedthreatAgentType');

        // if (!empty($selectedthreatAgentType)) {
        //     DB::table('threat_agent_type_table')->whereIn('threat_agent_type_id', $selectedthreatAgentType)->delete();
        // } return redirect('/threat-agent-type-list');
    }

    //----------------------------------------------------------------------------------------------//

    // 4.Controller - DETAILED TABLE

    public function show($threattype) 
    {
        // Fetch data from the database based on department_id
        $data = $threattype = DB::table('threat_agent_type_table')->where('threat_agent_type_id', $threattype)->first();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        


            return view('4-Process/5-Threat/2-ThreatAgentTypetable', compact( 'routeName', 'data', 'primaryKey', 'threattype') );

        }


}