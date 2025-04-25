<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentVector;
use App\Models\VectorAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreatAgentVectorController extends Controller
{
    private $_routeName = "threatvector";
    private $_primaryKey = "threat_agent_vector_id";

    // To add data into the table
    public function create(){
        $data=$threatvector = null;
        $routeName = $this->_routeName;
$primaryKey = $this->_primaryKey;



        return view('4-Process/5-Threat/5-ThreatAgentVectorForm', compact('threatvector', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
     public function edit($id)
     {
         $data = $threatvector = DB::table('threat_agent_vector_table')->where('threat_agent_vector_id', $id)->first();
         $routeName = $this->_routeName;
$primaryKey = $this->_primaryKey;

         return view('4-Process/5-Threat/5-ThreatAgentVectorForm', compact('threatvector','routeName', 'data', 'primaryKey'));
     }

     
     public function store(Request $request)
     {
         // Validation
         $attributes = $request->validate([
             'threat_agent_vector_id' => ['required', 'unique:threat_agent_vector_table'],
             'threat_agent_vector_name' => 'required',
             'threat_agent_vector_description' => 'nullable',
         ]);
 
        VectorAgent::create($attributes);

         return redirect()->route('threatvector.index')->with('success', 'Threat Agent Vector Saved Successfully.');
     }

     // To store the edited data into the table
     public function update(VectorAgent $agentVector, Request $request)
     {
         // Validation
         $attributes = $request->validate([
             'threat_agent_vector_id' => ['required', 'unique:threat_agent_vector_table,threat_agent_vector_id,'.$agentVector->id],
             'threat_agent_vector_name' => 'required',
             'threat_agent_vector_description' => 'nullable',
         ]);

         $agentVector->update($attributes);
 
         return redirect()->route('threatvector.index')->with('success', 'Threat Agent Vector Saved Successfully.');
     }

    //----------------------------------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('threat_agent_vector_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/5-Threat/5-ThreatAgentVectorList', compact('routeName', 'columns', 'primaryKey'));
    } 

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request) {

        $attributes =  $request->validate([
            'record' => ['required'],
        ]);
        
        $data = ThreatAgentVector::where('id', $attributes['record'])->orWhere('threat_agent_vector_id', $attributes['record'])->first();
        $data->delete();

        
        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('threat_agent_vector_table')->whereIn('threat_agent_vector_id', $selecteddelete)->delete();
        } return redirect('/threat-agent-vector-list');
    }


    // 4.Controller - DETAILED TABLE
        public function show($vector_id) 
        {
            // Fetch data from the database based on department_id
            $data=$vector_id = DB::table('threat_agent_vector_table')->where('threat_agent_vector_id', $vector_id)->first();

            if (!$vector_id) {
                abort(404);
            }

            $routeName = $this->_routeName;
            $primaryKey = $this->_primaryKey;


            return view('4-Process/5-Threat/5-ThreatAgentVectorTable', compact('vector_id', 'routeName', 'data', 'primaryKey'));
        }

}