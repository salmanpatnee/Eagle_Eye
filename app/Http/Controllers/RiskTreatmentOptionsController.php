<?php

namespace App\Http\Controllers;

use App\Models\RiskTreatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskTreatmentOptionsController extends Controller
{
    private $_routeName = "risktreatment";
    private $_primaryKey = "risk_treatment_id";

    // To add data into the table
    public function create()
    {
        $data = $risktreatment = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/8-RiskTreatmentOptionsForm', compact(
            'risktreatment',
            'routeName',
            'data',
            'primaryKey'
        ));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $risktreatment = DB::table('risk_treatment_options_table')->where('risk_treatment_id', $id)->first();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/8-RiskTreatmentOptionsForm', compact(
            'risktreatment',
            'routeName',
            'data',
            'primaryKey'
        ));
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'risk_treatment_id' => ['required', 'unique:risk_treatment_options_table'],
            'risk_treatment_name' => 'required',
            'risk_treatment_description' => 'nullable',
        ]);

        RiskTreatment::create($attributes);

        return redirect()->route('risktreatment.index')->with('success', 'Risk Treatment saved successfully.');
    }

    public function update(RiskTreatment $riskTreatment, Request $request)
    {
        $attributes = $request->validate([
            'risk_treatment_id' => ['required', 'unique:risk_treatment_options_table,risk_treatment_id,' . $riskTreatment->id],
            'risk_treatment_name' => 'required',
            'risk_treatment_description' => 'nullable',
        ]);

        $riskTreatment->update($attributes);
        return redirect()->route('risktreatment.index')->with('success', 'Risk Treatment saved successfully.');
    }


    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('risk_treatment_options_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/8-RiskTreatmentOptionsList', compact(
            'columns',
            'routeName',
            'primaryKey'
        ));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskTreatment::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_treatment_options_table')->whereIn('risk_treatment_id', $selecteddelete)->delete();
        }
        return redirect('/risk-treatment-option-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($risk_treatment_id)
    {
        // Fetch data from the database based on department_id
        $data = $risk_treatment_id = DB::table('risk_treatment_options_table')->where('risk_treatment_id', $risk_treatment_id)->first();

        if (!$risk_treatment_id) {
            abort(404);
        }
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/8-RiskTreatmentOptionsTable', compact(
            'risk_treatment_id',
            'routeName',
            'data',
            'primaryKey'
        ));
    }
}
