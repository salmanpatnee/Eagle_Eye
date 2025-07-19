<?php

namespace App\Http\Controllers;

use App\Models\RiskInherent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskInherentController extends Controller
{
    private $_routeName = "RiskInherent";
    private $_primaryKey = "risk_inherent_id";

    // To add data into the table
    public function create()
    {
        $data = $RiskInherent = null;
        $RiskAppetite = DB::table('risk_appetite_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/6-RiskInherentForm', compact('RiskInherent', 'RiskAppetite', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $RiskInherent = DB::table('risk_inherent_table')->where('risk_inherent_id', $id)->first();
        $RiskAppetite = DB::table('risk_appetite_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/6-RiskInherentForm', compact('RiskInherent', 'RiskAppetite', 'routeName', 'data', 'primaryKey'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_inherent_id' => ['required', 'unique:risk_inherent_table'],
            'risk_inherent_description' => 'nullable',
            'risk_appetite_id' => 'required',
            'risk_inherent_impact' => 'required',
            'risk_inherent_likelihood' => 'required',
            'risk_inherent_score' => 'required',
        ]);

        RiskInherent::create($attributes);


        return redirect()->route('risk-inherent.index')->with('success', 'Risk Inherent Saved Successfully.');
    }

    // To store the edited data into the table
    public function update(RiskInherent $riskInherent, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'risk_inherent_id' => ['required', 'unique:risk_inherent_table,risk_inherent_id,' . $riskInherent->id],
            'risk_inherent_description' => 'nullable',
            'risk_appetite_id' => 'required',
            'risk_inherent_impact' => 'required',
            'risk_inherent_likelihood' => 'required',
            'risk_inherent_score' => 'required',
        ]);

        $riskInherent->update($attributes);

        return redirect()->route('risk-inherent.index')->with('success', 'Risk Inherent Saved Successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('risk_inherent_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/7-Risk/6-RiskInherentList', compact('columns', 'routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);


        $data = RiskInherent::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();

        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_inherent_table')->whereIn('risk_inherent_id', $selecteddelete)->delete();
        }
        return redirect('/risk-inherent-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($risk_inherent_id)
    {
        // Fetch data from the database based on department_id
        $data = $risk_inherent_id = DB::table('risk_inherent_table')
            ->join('risk_appetite_table', 'risk_inherent_table.risk_appetite_id', '=', 'risk_appetite_table.risk_appetite_id')
            ->where('risk_inherent_table.risk_inherent_id', $risk_inherent_id)
            ->first();

        if (!$risk_inherent_id) {
            abort(404);
        }

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/7-Risk/6-RiskInherentTable', compact('risk_inherent_id', 'routeName', 'data', 'primaryKey'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $data = DB::table('risk_appetite_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/7-Risk/6-RiskInherentForm', compact('data'));
    }
}
