<?php

namespace App\Http\Controllers;

use App\Models\KeyRiskIndicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskKriController extends Controller
{
    private $_routeName = "riskkri";
    private $_primaryKey = "key_risk_indicator_id";


    // To add data into the table
    public function create()
    {
        $data = $riskkri = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/12-RiskKriForm', compact('riskkri', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $riskkri = DB::table('risk_kri_table')->where('key_risk_indicator_id', $id)->first();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/12-RiskKriForm', compact('riskkri', 'routeName', 'data', 'primaryKey'));
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'key_risk_indicator_id' => ['required', 'unique:risk_kri_table'],
            'key_risk_indicator_name' => 'required',
            'key_risk_indicator_source' => 'required',
            'key_risk_indicator_value' => 'required',
            'key_risk_indicator_description' => 'nullable',
        ]);

        KeyRiskIndicator::create($attributes);

        return redirect()->route('riskkri.index')->with('success', 'Risk KRI saved successfully.');
    }

    // To store the edited data into the table
    public function update(KeyRiskIndicator $keyRiskIndicator, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'key_risk_indicator_id' => ['required', 'unique:risk_kri_table,key_risk_indicator_id,' . $keyRiskIndicator->id],
            'key_risk_indicator_name' => 'required',
            'key_risk_indicator_source' => 'required',
            'key_risk_indicator_description' => 'nullable',
            'key_risk_indicator_value' => 'required',
        ]);

        $keyRiskIndicator->update($attributes);

        return redirect()->route('riskkri.index')->with('success', 'Risk KRI saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('risk_kri_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/12-RiskKriList', compact('columns', 'routeName', 'columns', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = KeyRiskIndicator::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_kri_table')->whereIn('key_risk_indicator_id', $selecteddelete)->delete();
        }
        return redirect('/kri-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($key_risk_indicator_id)
    {
        // Fetch data from the database based on department_id
        $data = $key_risk_indicator_id = DB::table('risk_kri_table')->where('key_risk_indicator_id', $key_risk_indicator_id)->first();

        if (!$key_risk_indicator_id) {
            abort(404);
        }

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/12-RiskKriTable', compact('key_risk_indicator_id', 'routeName', 'data', 'primaryKey'));
    }
}
