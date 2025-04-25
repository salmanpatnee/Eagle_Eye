<?php

namespace App\Http\Controllers;

use App\Models\ThreatAgentSubType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThreatAgentSubTypeController extends Controller
{
    private $_routeName = "threatsubtype";
    private $_primaryKey = "threat_agent_sub_type_id";

    // To add data into the table
    public function create()
    {
        $data = $threatsubtype = null;
        $threatTypes = DB::table('threat_agent_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/5-Threat/3-ThreatAgentSubTypeForm', compact('threatsubtype', 'threatTypes', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $threatsubtype = DB::table('threat_agent_sub_type_table')->where('threat_agent_sub_type_id', $id)->first();
        $threatTypes = DB::table('threat_agent_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/5-Threat/3-ThreatAgentSubTypeForm', compact('threatsubtype', 'threatTypes', 'routeName', 'data', 'primaryKey'));
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


        return redirect()->route('threatsubtype.index')
            ->with('success', 'Threat Agent Sub Type Saved Successfully.');
    }


    // To store the edited data into the table
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

        return redirect()->route('threatsubtype.index')->with('success', 'Threat Agent Sub Type Saved Successfully.');
    }

    //--------------------------------------------------------------------//


    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        // $threatsubTypes = DB::table('threat_agent_sub_type_table')->get();
        $threatsubTypes = ThreatAgentSubType::with('type')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/5-Threat/3-ThreatAgentSubTypeList', compact('routeName', 'primaryKey', 'threatsubTypes'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {

        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = ThreatAgentSubType::where('id', $attributes['record'])->orWhere('threat_agent_sub_type_id', $attributes['record'])->first();
        $data->delete();
        return redirect('/threat-agent-sub-type-list');


        $selectedthreatsubTypess = $request->input('selectedthreatsubTypess');

        if (!empty($selectedthreatsubTypess)) {
            DB::table('threat_agent_sub_type_table')->whereIn('threat_agent_sub_type_id', $selectedthreatsubTypess)->delete();
        }
        return redirect('/threat-agent-sub-type-list');
    }


    // 4.Controller - DETAILED TABLE
    public function show(ThreatAgentSubType $threatAgentSubType)
    {

        $data = $threatAgentSubType->load('type');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;



        return view('4-Process/5-Threat/3-ThreatAgentSubTypeTable', compact('threatAgentSubType', 'routeName', 'data', 'primaryKey'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $threatTypes = DB::table('threat_agent_type_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/5-Threat/3-ThreatAgentSubTypeForm', compact('threatTypes'));
    }
}
