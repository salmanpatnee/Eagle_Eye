<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetTypeController extends Controller
{
    // To add data into the table
    public function create(){
        $assettype = null;
        return view('4-Process/3-Asset/4-AssetTypeForm', compact('assettype'));
    }

    // To edit the table
     public function edit($id)
     {
         $assettype = DB::table('asset_type_table')->where('asset_type_id', $id)->first();
 
         return view('4-Process/3-Asset/4-AssetTypeForm', compact('assettype'));
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
       
 
         return redirect()->route('assettype.index')->with('success', 'Asset Type saved successfully.');
     }


     public function update(AssetType $asset_type_id, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_type_id' => ['required', 'unique:asset_type_table,asset_type_id,'.$asset_type_id->id],
            'asset_type_name' => 'nullable',
            'asset_type_description' => 'nullable',
        ]);

        $asset_type_id->update($attributes);


        return redirect()->route('assettype.index')->with('success', 'Asset Type saved successfully.');
    }

    //----------------------------------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST

    public function index() 
    {
        $AssetType = DB::table('asset_type_table')->get();
        return view('4-Process/3-Asset/4-AssetTypeList', ['AssetType' => $AssetType]);
    }

    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
            ]);
            
            $data = AssetType::where('id', $attributes['record'])->orWhere('asset_type_id', $attributes['record'])->first();
            $data->delete();

            return redirect('/asset-type-list');

        // $ids =  $request->validate([
        //     'selectedAssetType' => ['required', 'array'],
        // ]);

    
        // try {
        //     AssetType::whereIn('id', $ids['selectedAssetType'])->each(function ($assetType) {
        //         if ($assetType->subTypes()->exists()) {

        //             throw new \Exception("Asset: '{$assetType->asset_type_name}' cannot be deleted due to existing dependencies.");
        //         }
        //         $assetType->delete();
        //     });

        //     return redirect('/asset-type-list')
        //         ->with('success', 'Asset(s) deleted successfully.');
        // } catch (\Exception $e) {

        //     return redirect('/asset-type-list')
        //         ->with('error', $e->getMessage());
        // }
    }
    
    // 3.Controller - DELETE RECORD FROM LIST
    // public function delete(Request $request) {
    //     $selectedAssetType = $request->input('selectedAssetType');

    //     if (!empty($selectedAssetType)) {
    //         DB::table('asset_type_table')->whereIn('asset_type_id', $selectedAssetType)->delete();
    //     } return redirect('/asset-type-list');
    // }

    // 4.Controller - DETAILED TABLE
    public function show($asset_type_id)
    {
        // Fetch data from the database based on department_id
        $asset_type_id = DB::table('asset_type_table')->where('asset_type_id', $asset_type_id)->first();

        if (!$asset_type_id) {
            abort(404);
        }

        return view('4-Process/3-Asset/4-AssetTypeTable', compact('asset_type_id'));
    } 


}