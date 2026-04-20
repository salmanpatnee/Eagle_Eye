<?php

namespace App\Http\Controllers;

use App\Models\RiskAppetite;
use Illuminate\Http\Request;

class RiskAppetiteController extends Controller
{
    public function index()
    {
        $result = RiskAppetite::select('id', 'risk_appetite_id', 'risk_score', 'risk_appetite_color', 'risk_appetite_name')->orderBy('risk_appetite_id')->get();
        $impacts = ['Insignificant', 'Minor', 'Moderate', 'Major', 'Catastrophic'];
        $riskAppetites = RiskAppetite::all();

        return view('process.risk-identification.risk-appetites.index', compact('riskAppetites', 'result', 'impacts'));
    }

    public function list()
    {
        $riskAppetites = RiskAppetite::orderBy('risk_appetite_id')->paginate(20);
        return view('process.risk-identification.risk-appetites.list', compact('riskAppetites'));
    }

    public function create()
    {
        return view('process.risk-identification.risk-appetites.create');
    }

    public function store(Request $request)
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

        RiskAppetite::create($attributes);

        return redirect()->route('risk-appetites.index')->with('success', 'Risk Appetite created successfully.');
    }

    public function show(RiskAppetite $risk_appetite)
    {
        if (request()->wantsJson()) {
            return response()->json($risk_appetite);
        }

        return redirect()->route('risk-appetites.edit', $risk_appetite->id);
    }

    public function edit(RiskAppetite $risk_appetite)
    {
        return view('process.risk-identification.risk-appetites.edit', compact('risk_appetite'));
    }

    public function update(Request $request, RiskAppetite $risk_appetite)
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

        $risk_appetite->update($attributes);

        return redirect()->route('risk-appetites.index')->with('success', 'Risk Appetite updated successfully.');
    }

    public function destroy(RiskAppetite $risk_appetite)
    {
        $risk_appetite->delete();

        return redirect()->route('risk-appetites.index');
    }
}
