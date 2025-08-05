<?php

namespace App\Http\Controllers;

use App\Models\AssetSubType;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetSubTypeController extends Controller
{
    public function index()
    {
        $assetSubTypes = AssetSubType::with('type')->paginate(20);

        return view('process/assets/asset-sub-types/index', compact('assetSubTypes'));
    }

    public function show(AssetSubType $assetSubType)
    {
        $assetSubType->load('type');

        return view('process/assets/asset-sub-types/show', compact('assetSubType'));
    }

    public function create()
    {
        $assetSubType = null;
        $assetTypes = AssetType::all();
        return view('process/assets/asset-sub-types/create', compact('assetSubType', 'assetTypes'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'asset_sub_type_id' => ['required', 'unique:asset_sub_type_table'],
            'asset_sub_type_name' => 'required',
            'asset_sub_type_description' => 'nullable',
            'asset_type_id' => 'required',
        ]);

        DB::table('asset_sub_type_table')->insert($attributes);


        return redirect()->route('asset-sub-types.index')->with('success', 'Asset Sub Type Saved Successfully.');
    }

    public function edit(AssetSubType $assetSubType)
    {
        $assetTypes = AssetType::all();

        return view('process/assets/asset-sub-types/create', compact('assetSubType', 'assetTypes'));
    }

    public function update(AssetSubType $assetSubType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_sub_type_id' => ['required', 'unique:asset_sub_type_table,asset_sub_type_id,' . $assetSubType->id],
            'asset_sub_type_name' => 'required',
            'asset_sub_type_description' => 'nullable',
            'asset_type_id' => 'required',
        ]);

        $assetSubType->update($attributes);


        return redirect()->route('asset-sub-types.index')->with('success', 'Asset Sub Type Saved Successfully.');
    }

    public function destroy(AssetSubType $assetSubType)
    {
        $assetSubType->delete();
        return redirect()->route('asset-sub-types.index')->with('success', 'Asset Sub Type Deleted Successfully.');
    }
}
