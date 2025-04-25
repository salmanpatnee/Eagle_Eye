<?php

namespace App\Http\Controllers;

use App\Models\RiskAcceptance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAcceptanceController extends Controller
{
    private $_routeName = "risk-acceptance";
    private $_primaryKey = "risk_acceptance_id";

    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'risk_acceptance_id' => ['required', 'unique:risk_acceptance_table'],
            'risk_acceptance_description' => 'nullable',
            'risk_acceptance_source' => 'required',
            'risk_acceptance_details' => 'nullable',
            'risk_acceptance_start_date' => 'nullable',
            'risk_acceptance_end_date' => 'nullable',
            'control_id' => 'required',
        ]);

        RiskAcceptance::create($attributes);



        return redirect('/risk-acceptance-list')->with('success', 'Location information has been saved.');
    }

    public function update(RiskAcceptance $riskAcceptance, Request $request)
    {
        $attributes = $request->validate([
            'risk_acceptance_id' => ['required', 'unique:risk_acceptance_table,risk_acceptance_id,' . $riskAcceptance->id],
            'risk_acceptance_description' => 'nullable',
            'risk_acceptance_source' => 'required',
            'risk_acceptance_details' => 'nullable',
            'risk_acceptance_start_date' => 'nullable',
            'risk_acceptance_end_date' => 'nullable',
            'control_id' => 'required',
        ]);

        $riskAcceptance->update($attributes);

        return redirect('/risk-acceptance-list')->with('success', 'Location information has been saved.');
    }


    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $riskAcceptances = RiskAcceptance::with('control')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/11-RiskAcceptanceList', compact('riskAcceptances', 'routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskAcceptance::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_acceptance_table')->whereIn('id', $selecteddelete)->delete();
        }
        return redirect('/risk-acceptance-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show(RiskAcceptance $riskAcceptance)
    {
        $data = $riskAcceptance->load('control');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/11-RiskAcceptanceTable', compact('riskAcceptance', 'routeName', 'data', 'primaryKey'));
    }



    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $controlNames = DB::table('control_master_table')
            ->select('control_id', 'control_name')
            ->distinct()
            ->get();
        $data=$riskAcceptance = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/11-RiskAcceptanceForm', compact('controlNames', 'riskAcceptance','routeName', 'data', 'primaryKey'));
    }

    public function edit(RiskAcceptance $riskAcceptance)
    {
        $data = $controlNames = DB::table('control_master_table')
            ->select('control_id', 'control_name')
            ->distinct()
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/11-RiskAcceptanceForm', compact('controlNames', 'riskAcceptance', 'routeName', 'data', 'primaryKey'));
    }
}
