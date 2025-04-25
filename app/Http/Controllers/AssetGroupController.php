<?php

namespace App\Http\Controllers;

use App\Models\AssetGroup;
use App\Models\Custodian;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetGroupController extends Controller
{
    // To add data into the table
    public function create()
    {
        $assetGroup = null;
        $grpowner = Owner::select('owner_role_id', 'owner_name')->get();
        $classname = DB::table('classification_table')->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->get();
        return view('4-Process/4-AssetGroup/1-AssetGroupForm', compact('assetGroup', 'grpowner', 'classname', 'custodians'));
    }

    // To edit the table
    public function edit(AssetGroup $assetGroup)
    {
        $assetGroup->load('owner', 'classification', 'custodians');

        $classname = DB::table('classification_table')->get();
        $custodians = Custodian::select('custodian_role_id', 'custodian_role_title')->get();
        $grpowner = Owner::select('owner_role_id', 'owner_name')->get();
        $custodianRoleIds = $assetGroup->custodians()->pluck('custodian_role_id')->toArray();


        return view('4-Process/4-AssetGroup/1-AssetGroupForm', compact('assetGroup', 'grpowner', 'classname', 'custodians', 'custodianRoleIds'));
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


        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $assetGroup->custodians()->attach($custodiansArray);
        }


        return redirect()->route('assetgroup.index')->with('success', 'Asset Group saved successfully.');
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

        if ($custodians && $custodiansArray = json_decode($custodians, true)) {
            $assetGroup->custodians()->sync($custodiansArray);
        }

        return redirect()->route('assetgroup.index')->with('success', 'Asset Group saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        // $assetGroups = DB::table('asset_group_table')->get();
        $assetGroups = AssetGroup::with('owner', 'classification')->get();

        return view('4-Process/4-AssetGroup/1-AssetGroupList', compact('assetGroups'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $data = AssetGroup::where('id', $attributes['record'])->orWhere('asset_group_id', $attributes['record'])->first();
        $data->delete();

        return redirect('/asset-group-list');

        // $selectedassetGroup = $request->input('selectedassetGroup');

        // if (!empty($selectedassetGroup)) {
        //     DB::table('asset_group_table')->whereIn('asset_group_id', $selectedassetGroup)->delete();
        // }
    }

    // 4.Controller - DETAILED TABLE
    public function show(AssetGroup $assetGroup)
    {
        $assetGroup->load('owner', 'classification', 'custodians');

        return view('4-Process/4-AssetGroup/1-AssetGroupTable', compact('assetGroup'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $assetOwnerNames = DB::table('owner_table')
            ->select('*')
            ->distinct()
            ->join('owner_role_table', 'owner_table.owner_role_id', '=', 'owner_role_table.owner_role_id')
            ->get();
        $assetCustNames = DB::table('custodian_name_table')
            ->select('*')
            ->distinct()
            ->get();
        $assetClassNames = DB::table('classification_table')
            ->select('*')
            ->distinct()
            ->get();
        $assetCategory = DB::table('category_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/4-AssetGroup/1-AssetGroupForm', compact('assetOwnerNames', 'assetCustNames', 'assetClassNames', 'assetCategory'));
    }
}
