<?php

namespace App\Http\Controllers;

use App\Models\RiskAppetite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAppetiteController extends Controller
{

    private $_routeName = "risk-appetites";
    private $_primaryKey = "risk_appetite_id";

    public function index()
    {
        $data = $result =  RiskAppetite::select('risk_appetite_id', 'risk_score', 'risk_appetite_color', 'risk_appetite_name')->orderBy('risk_appetite_id')->get();
        $impacts = ['Insignificant', 'Minor', 'Moderate', 'Major', 'Catastrophic'];
        $riskAppetite = null;

        $riskAppetites = RiskAppetite::all();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        
        return view('4-Process/7-Risk/5-RiskAppetiteList', compact('riskAppetites', 'routeName',  'primaryKey', 'data', 'result', 'impacts', 'riskAppetite'));
    }

    public function create()
    {
        $data = $result =  RiskAppetite::select('risk_appetite_id', 'risk_score', 'risk_appetite_color', 'risk_appetite_name')->orderBy('risk_appetite_id')->get();
        $impacts = ['Insignificant', 'Minor', 'Moderate', 'Major', 'Catastrophic'];
        $riskAppetite = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/5-RiskAppetiteForm', compact('riskAppetite', 'impacts',  'result', 'routeName', 'data', 'primaryKey'));
    }

    public function show(RiskAppetite $risk_appetite)
    {
        if (request()->wantsJson()) {
            return response()->json($risk_appetite);
        }
        $data = $risk_appetite;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/7-Risk/5-RiskAppetiteTable', compact('risk_appetite', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit(RiskAppetite $risk_appetite)
    {   
        $data = $result =  RiskAppetite::select('risk_appetite_id', 'risk_score', 'risk_appetite_color', 'risk_appetite_name')->orderBy('risk_appetite_id')->get();
        $impacts = ['Insignificant', 'Minor', 'Moderate', 'Major', 'Catastrophic', ];
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;



        return view('4-Process/7-Risk/5-RiskAppetiteForm', compact('impacts', 'result', 'routeName', 'data', 'primaryKey'));
    }

    // To store the edited data into the table
    public function storeOrUpdate(Request $request, RiskAppetite $risk_appetite)
    {

        $attributes = $request->validate([
            'risk_appetite_id' => 'required',
            'risk_appetite_name' => 'nullable',
            'risk_appetite_description' => 'nullable',
            'risk_likelihood' => 'nullable',
            'risk_impact' => 'nullable',
            'risk_score' => 'nullable',
            'risk_appetite_color' => 'nullable',
            'risk_appetite_upper_limit' => 'nullable',
            'risk_appetite_lower_limit' => 'nullable',
            'risk_sensitivity' => 'nullable',
            'risk_implication' => 'nullable',
        ]);

        // return $attributes;

        if ($request->isMethod('post')) {
            return 'Yes';
        } else {
            $risk_appetite->update($attributes);
        }

        // Update
        // if ($request->has('id')) {

        //     DB::table('risk_appetite_table')
        //         ->where('id', $request->input('id'))
        //         ->update($attributes);
        // } else {
        //     // Insert
        //     DB::table('risk_appetite_table')->insert($attributes);
        // }

        return redirect()->route('risk-appetites.create')->with('success', 'Risk Appetite saved successfully.');
    }


    public function destroy(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = RiskAppetite::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_appetite_table')->whereIn('risk_appetite_id', $selecteddelete)->delete();
        }
        return redirect('/risk-appetites');
    }
}
