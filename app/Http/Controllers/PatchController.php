<?php

namespace App\Http\Controllers;

use App\Models\Patch;
use App\Models\ThirdParty;
use Illuminate\Http\Request;

class PatchController extends Controller
{
    private $_routeName = "patch";
    private $_primaryKey = "patch_id";

    public function index(Request $request)
    {
        $patches = Patch::with('thirdParty')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/patch/index', compact('patches', 'routeName',  'primaryKey'));
    }

    public function show(Patch $patch)
    {
        $patch->load('thirdParty');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $data = $patch;

        return view('4-Process/patch/show', compact('patch', 'routeName', 'data', 'primaryKey'));
    }

    public function create()
    {
        $thirdParties = ThirdParty::select('tpt_id', 'tpt_name')->get();


        $data = $patch = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/patch/create', compact('patch', 'data', 'routeName', 'primaryKey', 'thirdParties'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'patch_id' => ['required', 'unique:patch_table'],
            'patch_name' => 'required',
            'technical_reference' => 'nullable',
            'tpt_id' => 'required',
        ]);

        Patch::create($attributes);

        return redirect(route('patch.index'))
            ->with('success', 'Patch saved successfully.');
    }

    public function edit(Patch $patch)
    {
        $thirdParties = ThirdParty::select('tpt_id', 'tpt_name')->get();

        $data = $patch;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/patch/create', compact('patch', 'data', 'routeName', 'primaryKey', 'thirdParties'));
    }

    public function update(Patch $patch, Request $request)
    {
        $attributes = $request->validate([
            'patch_id' => ['required', 'unique:patch_table,patch_id,' . $patch->id],
            'patch_name' => 'required',
            'technical_reference' => 'nullable',
            'tpt_id' => 'required',
        ]);

        $patch->update($attributes);

        return redirect(route('patch.index'))
            ->with('success', 'Patch saved successfully.');
    }

    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);


        Patch::where('patch_id', $attributes['record'])->delete();

        return redirect(route('patch.index'))
            ->with('success', 'Patch deleted successfully.');
    }
}
