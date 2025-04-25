<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\TPTExpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TPTExpertsControl extends Controller
{
    private $_routeName = "tpt-experts";
    private $_primaryKey = "tpt_experties_id";


    public function index(Request $request)
    {
        $tptExperties = TPTExpert::all();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/TptExperts/index', compact('tptExperties', 'routeName',  'primaryKey'));
    }

    public function show(TPTExpert $expert)
    {
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $data = $expert;

        return view('4-Process/TptExperts/show', compact('expert', 'routeName', 'data', 'primaryKey'));
    }

    public function create()
    {
        $data = $expert = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/TptExperts/create', compact('expert', 'data', 'routeName', 'primaryKey'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'tpt_experties_id' => ['required', 'unique:tpt_experties_table'],
            'tpt_experties_name' => 'required',
        ]);

        TPTExpert::create($attributes);

        return redirect(route('tpt-experts.index'))
            ->with('success', 'Expert saved successfully.');
    }


    public function edit(TPTExpert $expert)
    {
        $data = $expert;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/TptExperts/create', compact('expert', 'data', 'routeName', 'primaryKey'));
    }



    public function update(TPTExpert $expert, Request $request)
    {
        $attributes = $request->validate([
            'tpt_experties_id' => ['required', 'unique:tpt_experties_table,tpt_experties_id,' . $expert->id],
            'tpt_experties_name' => 'required',
        ]);

        $expert->update($attributes);

        return redirect(route('tpt-experts.index'))
            ->with('success', 'Category saved successfully.');
    }

    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        
        TPTExpert::where('tpt_experties_id', $attributes['record'])->delete();

        return redirect(route('tpt-experts.index'))
            ->with('success', 'Expert deleted successfully.');
    }
}
