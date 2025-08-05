<?php

namespace App\Http\Controllers;

use App\Models\AssetGroup;
use App\Models\Custodian;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetGroupController extends Controller
{

    public function index()
    {
        $assetGroups = AssetGroup::with('owner', 'classification')->paginate(20);
        return view('process/assets/asset-groups/index', compact('assetGroups'));
    }


    public function show(AssetGroup $assetGroup)
    {
        $assetGroup->load('owner', 'classification', 'custodians');
        return view('process/assets/asset-groups/show', compact('assetGroup'));
    }

    public function create()
    {
        $assetGroup = null;
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $classifications = DB::table('classification_table')->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->get();
        $custodianIds = [];
        return view('process/assets/asset-groups/create', compact('assetGroup', 'owners', 'classifications', 'custodians', 'custodianIds'));
    }

    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_group_id' => ['required', 'unique:asset_group_table'],
            'asset_group_name' => 'required',
            'asset_group_description' => 'nullable',
            'owner_id' => 'required',
            'classification_id' => 'required',
            'custodians' => 'required',
        ]);


        $custodians = $attributes['custodians'];
        unset($attributes['custodians']);

        $assetGroup = AssetGroup::create($attributes);

        $assetGroup->custodians()->attach($custodians ?? []);


        return redirect()->route('asset-groups.index')->with('success', 'Asset Group saved successfully.');
    }


    public function edit(AssetGroup $assetGroup)
    {
        $assetGroup->load('owner', 'classification', 'custodians');

        $classifications = DB::table('classification_table')->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->get();
        $owners = Owner::select('owner_role_id', 'owner_name')->get();
        $custodianIds = $assetGroup->custodians()->pluck('custodian_role_id')->toArray();


        return view('process/assets/asset-groups/create', compact('assetGroup', 'owners', 'classifications', 'custodians', 'custodianIds'));
    }



    public function update(AssetGroup $assetGroup, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_group_id' => ['required', 'unique:asset_group_table,asset_group_id,' . $assetGroup->id],
            'asset_group_name' => 'required',
            'asset_group_description' => 'nullable',
            'owner_id' => 'required',
            'classification_id' => 'required',
            'custodians' => 'required',
        ]);

        $custodians = $attributes['custodians'];
        unset($attributes['custodians']);

        $assetGroup->update($attributes);

        $assetGroup->custodians()->sync($custodians ?? []);

        return redirect()->route('asset-groups.index')->with('success', 'Asset Group saved successfully.');
    }

    //--------------------------------------------------------------------//



    // 3.Controller - DELETE RECORD FROM LIST
    public function destroy(AssetGroup $assetGroup)
    {
        $assetGroup->delete();
        return redirect(route('asset-groups.index'))->with('success', 'Asset Group deleted successfully.');
    }
}
