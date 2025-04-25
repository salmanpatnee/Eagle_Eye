<?php

namespace App\Http\Controllers;

use App\Models\RiskGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskGroupController extends Controller
{
    private $_routeName = "riskgroup";
    private $_primaryKey = "risk_group_id";

    // To add data into the table
    public function create()
    {
        $data = $riskgroup = null;
        $ownername = DB::table('owner_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/4-RiskGroupForm', compact('riskgroup', 'ownername', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $riskgroup = DB::table('risk_group_table')->where('risk_group_id', $id)->first();
        $ownername = DB::table('owner_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/4-RiskGroupForm', compact('riskgroup', 'ownername', 'routeName', 'data', 'primaryKey'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_group_id' => ['required', 'unique:risk_group_table'],
            'risk_group_name' => 'required',
            'risk_group_description' => 'nullable',
            'owner_id' => 'required',
        ]);

        RiskGroup::create($attributes);


        return redirect()->route('riskgroup.index')->with('success', 'Risk Group saved successfully.');
    }

    public function update(RiskGroup $riskGroup, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_group_id' => ['required', 'unique:risk_group_table,risk_group_id,' . $riskGroup->id],
            'risk_group_name' => 'required',
            'risk_group_description' => 'nullable',
            'owner_id' => 'required',
        ]);

        $riskGroup->update($attributes);


        return redirect()->route('riskgroup.index')->with('success', 'Risk Group saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('risk_group_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/4-RiskGroupList', compact('columns', 'routeName',  'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)

    {

        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskGroup::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();
        return redirect(route($this->_routeName.'.index'));
        
        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_group_table')->whereIn('id', $selecteddelete)->delete();
        }
        return redirect('/risk-group-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show(RiskGroup $riskGroup)
    {
        $data=$riskGroup->load('owner');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/4-RiskGroupTable', compact('riskGroup', 'routeName', 'data', 'primaryKey'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $riskgroups = DB::table('owner_table')
            ->select('owner_name')
            ->distinct()
            ->get();
        return view('4-Process/7-Risk/4-RiskGroupForm', compact('riskgroups'));
    }
}
