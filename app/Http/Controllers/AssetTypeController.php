<?php

namespace App\Http\Controllers;

use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetTypeController extends Controller
{

    public function index()
    {
        $assetTypes = AssetType::paginate(20);
        return view('process/assets/asset-types/index', compact('assetTypes'));
    }

    public function show(AssetType $assetType)
    {
        return view('process/assets/asset-types/show', compact('assetType'));
    }

    // To add data into the table
    public function create()
    {
        $assetType = null;
        return view('process/assets/asset-types/create', compact('assetType'));
    }

    // To edit the table
    public function edit(AssetType $assetType)
    {
        return view('process/assets/asset-types/create', compact('assetType'));
    }


    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_type_id' => ['required', 'unique:asset_type_table'],
            'asset_type_name' => 'nullable',
            'asset_type_description' => 'nullable',
        ]);

        DB::table('asset_type_table')->insert($attributes);


        return redirect()->route('asset-types.index')->with('success', 'Asset Type saved successfully.');
    }


    public function update(AssetType $assetType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_type_id' => ['required', 'unique:asset_type_table,asset_type_id,' . $assetType->id],
            'asset_type_name' => 'nullable',
            'asset_type_description' => 'nullable',
        ]);

        $assetType->update($attributes);


        return redirect()->route('asset-types.index')->with('success', 'Asset Type saved successfully.');
    }


    public function destroy(AssetType $assetType)
    {
        $assetType->delete();
        return redirect(route('asset-types.index'))->with('success', 'Asset Type deleted successfully.');
    }
}
