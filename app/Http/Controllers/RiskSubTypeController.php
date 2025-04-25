<?php

namespace App\Http\Controllers;

use App\Models\RiskSubType;
use App\Models\RiskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskSubTypeController extends Controller
{
    private $_routeName = "risksubtype";
    private $_primaryKey = "risk_sub_type_id";

    // To add data into the table
    public function create()
    {
        $data = $riskSubType = null;
        $types = RiskType::select('risk_type_id', 'risk_type_name')->distinct()->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/10-RiskSubTypeForm', compact('riskSubType', 'types', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit(RiskSubType $riskSubType)
    {
        $data = $riskSubType;
         $types = RiskType::select('id', 'risk_type_id', 'risk_type_name')->distinct()->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        // return $riskSubType;
        return view('4-Process/7-Risk/10-RiskSubTypeForm', compact('riskSubType', 'types', 'routeName', 'data', 'primaryKey'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_sub_type_id' => ['required', 'unique:risk_sub_type_table'],
            'risk_type_id' => ['required'],
            'risk_sub_type_name' => 'required',
            'risk_sub_type_description' => 'nullable',
        ]);

        RiskSubType::create($attributes);


        return redirect()->route('risksubtype.index')->with('success', 'Risk Sub-type saved successfully.');
    }
    public function update(RiskSubType $riskSubType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_sub_type_id' => ['required', 'unique:risk_sub_type_table,risk_sub_type_id,' . $riskSubType->id],
            'risk_sub_type_name' => 'required',
            'risk_type_id' => ['required'],
            'risk_sub_type_description' => 'nullable',
        ]);

        $riskSubType->update($attributes);

        return redirect()->route('risksubtype.index')->with('success', 'Risk Sub-type saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('risk_sub_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/10-RiskSubTypeList', compact('columns', 'routeName',  'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {

        $attributes = $request->validate([
            'record' => ['required'],
        ]);


        $data = RiskSubType::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_sub_type_table')->whereIn('risk_sub_type_id', $selecteddelete)->delete();
        }
        return redirect('/risk-sub-type-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show(RiskSubType $riskSubType)
    {
        $data = $riskSubType->load('type');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/10-RiskSubTypeTable', compact('riskSubType', 'routeName', 'data', 'primaryKey'));
    }



    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $risktype = DB::table('risk_type_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/7-Risk/10-RiskSubTypeForm', compact('risktype'));
    }
}
