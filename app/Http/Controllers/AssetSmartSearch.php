<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetSmartSearch extends Controller
{
    public function show(Request $request)
{
    // Fetch necessary data for dropdowns
    $assetname = DB::table('asset_register_table')->pluck('asset_name'); // Pluck only asset names
    $astgroup = DB::table('asset_group_table')->pluck('asset_group_name'); // Pluck only asset group names
    $asttype = DB::table('asset_type_table')->pluck('asset_type_name');
    $astsubtype = DB::table('asset_sub_type_table')->pluck('asset_sub_type_name');
    $loctable = DB::table('location_table')->pluck('location_name');

    // Prepare query to fetch assets with joins and optional filtering
    $assetsmartQuery = DB::table('asset_register_table as art')
        ->leftJoin('asset_group_table as agt', 'agt.asset_group_id', '=', 'art.asset_group_id')
        ->leftJoin('asset_type_table as att', 'att.asset_type_id', '=', 'art.asset_type_id')
        ->leftJoin('asset_sub_type_table as astt', 'astt.asset_sub_type_id', '=', 'art.asset_sub_type_id')
        ->leftJoin('location_table as lt', 'lt.location_id', '=', 'art.location_id')
        ->orderBy('art.id');

    // Apply filtering based on request parameters
    if ($request->has('asset_name') && !is_null($request->input('asset_name'))) {
        $assetsmartQuery->where('art.asset_name', $request->input('asset_name'));
    }
    if ($request->has('asset_group_name') && !is_null($request->input('asset_group_name'))) {
        $assetsmartQuery->where('agt.asset_group_name', $request->input('asset_group_name'));
    }
    if ($request->has('asset_type_name') && !is_null($request->input('asset_type_name'))) {
        $assetsmartQuery->where('att.asset_type_name', $request->input('asset_type_name'));
    }
    if ($request->has('asset_sub_type_name') && !is_null($request->input('asset_sub_type_name'))) {
        $assetsmartQuery->where('astt.asset_sub_type_name', $request->input('asset_sub_type_name'));
    }
    if ($request->has('location_name') && !is_null($request->input('location_name'))) {
        $assetsmartQuery->where('lt.location_name', $request->input('location_name'));
    }
    if($request->has('relation') && !is_null($request->input('relation')))
            $assetsmartQuery->where($request->input('relation'), 'Yes');

    // Get the filtered assets based on the query
    $assetsmart = $assetsmartQuery->get();

    // Pass data to the view for rendering
    return view('4-Process/18-Reporting/2-MISReporting/17-AssetSmartSearch', [
        'assetsmart' => $assetsmart,
        'assetname' => $assetname,
        'astgroup' => $astgroup,
        'asttype' => $asttype,
        'astsubtype' => $astsubtype,
        'loctable' => $loctable,
    ]);
}


    private function getFilters()
    {
        return [
            'asset_name',
            'asset_group_name',
            'asset_type_name',
            'asset_sub_type_name',
            'location_name',
            'relation',
        ];
    }
}