<?php

namespace App\Http\Controllers;

use App\Models\RiskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskTypeController extends Controller
{
    private $_routeName = "risktype";
    private $_primaryKey = "risk_type_id";

    // To add data into the table
    public function create()
    {
        $data = $risktype = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/9-RiskTypeForm', compact('risktype', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $risktype = DB::table('risk_type_table')->where('risk_type_id', $id)->first();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/9-RiskTypeForm', compact('risktype', 'routeName', 'data', 'primaryKey'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_type_id' => ['required', 'unique:risk_type_table'],
            'risk_type_name' => 'required',
            'risk_type_description' => 'nullable',
        ]);

        RiskType::create($attributes);

        return redirect()->route('risktype.index')->with('success', 'Risk Type saved successfully.');
    }

    public function update(RiskType $riskType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_type_id' => ['required', 'unique:risk_type_table,risk_type_id,' . $riskType->id],
            'risk_type_name' => 'required',
            'risk_type_description' => 'nullable',
        ]);

        $riskType->update($attributes);

        return redirect()->route('risktype.index')->with('success', 'Risk Type saved successfully.');
    }


    // To store the edited data into the table
    public function storeOrUpdate(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_type_id' => 'required',
            'risk_type_name' => 'nullable',
            'risk_type_description' => 'nullable',
        ]);


        // Update
        if ($request->has('id')) {

            DB::table('risk_type_table')
                ->where('id', $request->input('id'))
                ->update($attributes);
        } else {
            // Insert
            DB::table('risk_type_table')->insert($attributes);
        }

        return redirect()->route('risktype.index')->with('success', 'Risk Type saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $data = $columns = DB::table('risk_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/9-RiskTypeList', compact('columns', 'routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskType::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_type_table')->whereIn('risk_type_id', $selecteddelete)->delete();
        }
        return redirect('/risk-type-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($risk_type_id)
    {
        // Fetch data from the database based on department_id
        $data = $risk_type_id = DB::table('risk_type_table')->where('risk_type_id', $risk_type_id)->first();

        if (!$risk_type_id) {
            abort(404);
        }

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/9-RiskTypeTable', compact('risk_type_id', 'routeName', 'data', 'primaryKey'));
    }
}
