<?php

namespace App\Http\Controllers;

use App\Models\AssetSubType;
use App\Models\AssetType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetSubTypeController extends Controller
{
    // To add data into the table
    public function create()
    {
        $assetsubtype = null;
        $assettypes = DB::table('asset_type_table')->get();
        return view('4-Process/3-Asset/5-AssetSubTypeForm', compact('assetsubtype', 'assettypes'));
    }

    // To edit the table
    public function edit($id)
    {
        $assetsubtype = DB::table('asset_sub_type_table')->where('asset_sub_type_id', $id)->first();
        $assettypes = DB::table('asset_type_table')->get();


        return view('4-Process/3-Asset/5-AssetSubTypeForm', compact('assetsubtype', 'assettypes'));
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


        return redirect()->route('assetsubtype.index')->with('success', 'Asset Sub Type Saved Successfully.');
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


        return redirect()->route('assetsubtype.index')->with('success', 'Asset Sub Type Saved Successfully.');
    }

    //--------------------------------------------------------------------//


    // 2.Controller - SHOW DATA INTO THE LIST

    public function index()
    {
        $assetSubTypes = AssetSubType::with('type')->get();

        return view('4-Process/3-Asset/5-AssetSubTypeList', compact('assetSubTypes'));
    }



    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = AssetSubType::where('id', $attributes['record'])
            ->orWhere('asset_sub_type_id', $attributes['record'])
            ->first();
            
        $data->delete();


        return redirect('/asset-sub-type-list');

        // $selectedassetsubtype = $request->input('selectedassetsubtype');

        // if (!empty($selectedassetsubtype)) {
        //     DB::table('asset_sub_type_table')->whereIn('asset_sub_type_id', $selectedassetsubtype)->delete();
        // }
    }




    // 4.Controller - DETAILED TABLE
    public function show($asset_sub_type_id)
    {

        $asset_sub_type_id = DB::table('asset_sub_type_table')
            ->join('asset_type_table', 'asset_sub_type_table.asset_type_id', '=', 'asset_type_table.asset_type_id')
            ->where('asset_sub_type_table.asset_sub_type_id', $asset_sub_type_id)
            ->first();

        if (!$asset_sub_type_id) {
            abort(404);
        }

        return view('4-Process/3-Asset/5-AssetSubTypeTable', compact('asset_sub_type_id'));
    }

    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $assetTypes = DB::table('asset_type_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process.3-Asset.5-AssetSubTypeForm', compact('assetTypes'));
    }
}
