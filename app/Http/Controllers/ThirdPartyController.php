<?php

namespace App\Http\Controllers;

use App\Models\ThirdParty;
use App\Models\TPTExpert;
use Illuminate\Http\Request;

class ThirdPartyController extends Controller
{
    private $_routeName = "third-party";
    private $_primaryKey = "tpt_id";


    public function index(Request $request)
    {
        $thirdParties = ThirdParty::all();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/ThirdParty/index', compact('thirdParties', 'routeName',  'primaryKey'));
    }

    public function show(ThirdParty $thirdParty)
    {
        $thirdParty->load('experties');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $data = $thirdParty;

        return view('4-Process/ThirdParty/show', compact('thirdParty', 'routeName', 'data', 'primaryKey'));
    }

    public function create()
    {
        $experties = TPTExpert::select('tpt_experties_id', 'tpt_experties_name')->get();

 

        $data = $thirdParty = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/ThirdParty/create', compact('thirdParty', 'data', 'routeName', 'primaryKey', 'experties'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'tpt_id' => ['required', 'unique:third_party_table'],
            'tpt_name' => 'required',
            'tpt_contact_person_name' => 'nullable',
            'tpt_address' => 'nullable',
            'tpt_country_origin' => 'nullable',
            'tpt_established_date' => 'date|nullable',
            'experties' => 'nullable',
        ]);

        $experties = $attributes['experties'];
        unset($attributes['experties']);

   

        $thirdParty = ThirdParty::create($attributes);

        if ($experties && $expertiesArray = json_decode($experties, true)) {
            $thirdParty->experties()
                ->attach($expertiesArray);
        }


        return redirect(route('third-party.index'))
            ->with('success', 'Third Party saved successfully.');
    }

    public function edit(ThirdParty $thirdParty)
    {
        $experties = TPTExpert::select('tpt_experties_id', 'tpt_experties_name')->get();
        $expertyIds = $thirdParty->experties->pluck('tpt_experties_id')->toArray();

        $data = $thirdParty;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/ThirdParty/create', compact('thirdParty', 'data', 'routeName', 'primaryKey', 'experties', 'expertyIds'));
    }

    public function update(ThirdParty $thirdParty, Request $request)
    {
        $attributes = $request->validate([
            'tpt_id' => ['required', 'unique:third_party_table,tpt_id,' . $thirdParty->id],
            'tpt_name' => 'required',
            'tpt_contact_person_name' => 'nullable',
            'tpt_address' => 'nullable',
            'tpt_country_origin' => 'nullable',
            'tpt_established_date' => 'date|nullable', 
            'experties' => 'nullable',
        ]);

        $experties = $attributes['experties'];
        unset($attributes['experties']);
        
        $thirdParty->update($attributes);


        if ($experties && $expertiesArray = json_decode($experties, true)) {
            $thirdParty->experties()
                ->sync($expertiesArray);
        }



        return redirect(route('third-party.index'))
            ->with('success', 'Third Party saved successfully.');
    }

    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);


        ThirdParty::where('tpt_id', $attributes['record'])->delete();

        return redirect(route('third-party.index'))
            ->with('success', 'Expert deleted successfully.');
    }
}
