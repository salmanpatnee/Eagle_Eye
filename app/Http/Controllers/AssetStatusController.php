<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetStatusController extends Controller
{


    public function index()
    {
        $assetStatus = AssetStatus::all();
        return view('4-Process/assets/asset-status/index', compact('assetStatus'));
    }

    public function show(AssetStatus $assetStatus)
    {
        return view('4-Process/assets/asset-status/show', compact('assetStatus'));
    }

    // To add data into the table
    public function create()
    {
        $assetStatus = null;
        return view('4-Process/assets/asset-status/create', compact('assetStatus'));
    }

    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_status_id' => ['required', 'unique:asset_status_table'],
            'asset_current_status' => 'required',
            'asset_status_description' => 'nullable',
        ]);

        DB::table('asset_status_table')->insert($attributes);

        return redirect()->route('asset-status.index')->with('success', 'Asset Status saved successfully.');
    }

    // To edit the table
    public function edit(AssetStatus $assetStatus)
    {
        return view('4-Process/assets/asset-status/create', compact('assetStatus'));
    }

    public function update(AssetStatus $assetStatus, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_status_id' => ['required', 'unique:asset_status_table,asset_status_id,' . $assetStatus->id],
            'asset_current_status' => 'required',
            'asset_status_description' => 'nullable',
        ]);

        $assetStatus->update($attributes);

        return redirect()->route('asset-status.index')->with('success', 'Asset Status saved successfully.');
    }

    public function destroy(AssetStatus $assetStatus)
    {
        $assetStatus->delete();
        return redirect()->route('asset-status.index')->with('success', 'Asset Status deleted successfully.');
    }
}
