<?php

namespace App\Http\Controllers;

use App\Models\Patch;
use App\Models\ThirdParty;
use Illuminate\Http\Request;

class PatchController extends Controller
{

    public function index(Request $request)
    {
        $patches = Patch::with('thirdParty')->paginate(20);

        return view('4-Process\vulnerability-management\patches\index', compact('patches'));
    }

    public function show(Patch $patch)
    {
        $patch->load('thirdParty');

        return view('4-Process\vulnerability-management\patches\show', compact('patch'));
    }

    public function create()
    {
        $thirdParties = ThirdParty::select('tpt_id', 'tpt_name')->get();
        $patch = null;

        return view('4-Process\vulnerability-management\patches\create', compact('patch', 'thirdParties'));
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

        return redirect(route('patches.index'))
            ->with('success', 'Patch saved successfully.');
    }

    public function edit(Patch $patch)
    {
        $thirdParties = ThirdParty::select('tpt_id', 'tpt_name')->get();

        return view('4-Process\vulnerability-management\patches\create', compact('patch', 'thirdParties'));
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

        return redirect(route('patches.index'))
            ->with('success', 'Patch saved successfully.');
    }

    public function destroy(Patch $patch)
    {
        $patch->delete();
        return redirect(route('patches.index'))
            ->with('success', 'Patch deleted successfully.');
    }
}
