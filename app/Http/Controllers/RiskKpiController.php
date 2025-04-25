<?php

namespace App\Http\Controllers;

use App\Models\KeyPerformanceIndicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskKpiController extends Controller
{
    private $_routeName = "riskkpi";
    private $_primaryKey = "key_performance_indicatory_id";

    // To add data into the table
    public function create()
    {
        $data = $riskkpi = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/13-RiskKpiForm', compact('riskkpi', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $riskkpi = DB::table('risk_kpi_table')->where('key_performance_indicatory_id', $id)->first();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/13-RiskKpiForm', compact('riskkpi', 'routeName', 'data', 'primaryKey'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'key_performance_indicatory_id' => ['required', 'unique:risk_kpi_table'],
            'key_performance_indicatory_name' => 'required',
            'key_performance_indicatory_source' => 'required',
            'key_performance_indicatory_value' => 'required',
            'key_performance_indicatory_description' => 'nullable',
        ]);

        KeyPerformanceIndicator::create($attributes);


        return redirect()->route('riskkpi.index')->with('success', 'Risk KPI saved successfully.');
    }

    // To store the edited data into the table
    public function update(KeyPerformanceIndicator $keyPerformanceIndicator, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'key_performance_indicatory_id' => ['required', 'unique:risk_kpi_table,key_performance_indicatory_id,' . $keyPerformanceIndicator->id],
            'key_performance_indicatory_source' => 'required',
            'key_performance_indicatory_name' => 'required',
            'key_performance_indicatory_value' => 'required',
            'key_performance_indicatory_description' => 'nullable',
        ]);

        $keyPerformanceIndicator->update($attributes);


        return redirect()->route('riskkpi.index')->with('success', 'Risk KPI saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('risk_kpi_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/13-RiskKpiList', compact('columns', 'routeName',  'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = KeyPerformanceIndicator::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_kpi_table')->whereIn('key_performance_indicatory_id', $selecteddelete)->delete();
        }
        return redirect('/kpi-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($key_performance_indicatory_id)
    {
        // Fetch data from the database based on department_id
        $data = $key_performance_indicatory_id = DB::table('risk_kpi_table')->where('key_performance_indicatory_id', $key_performance_indicatory_id)->first();

        if (!$key_performance_indicatory_id) {
            abort(404);
        }
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/13-RiskKpiTable', compact('key_performance_indicatory_id', 'routeName', 'data', 'primaryKey'));
    }
}
