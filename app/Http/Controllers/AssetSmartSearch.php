<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetSmartSearch extends Controller
{
    public function __invoke(Request $request)
    {
        $asset = $request->input('asset_name') ?? null;
        $asset_group_name = $request->input('asset_group_name') ?? null;
        $asset_type_name = $request->input('asset_type_name') ?? null;
        $asset_sub_type_name = $request->input('asset_sub_type_name') ?? null;
        $location_name = $request->input('location_name') ?? null;
        $relation = $request->input('relation') ?? null;


        // Fetch necessary data for dropdowns
        $assets = DB::table('asset_register_table')->pluck('asset_name'); // Pluck only asset names
        $assetGroups = DB::table('asset_group_table')->pluck('asset_group_name'); // Pluck only asset group names
        $assetTypes = DB::table('asset_type_table')->pluck('asset_type_name');
        $assetSubTypes = DB::table('asset_sub_type_table')->pluck('asset_sub_type_name');
        $locations = DB::table('location_table')->pluck('location_name');
        $categories = [
            (object)['category_id' => 'critical_asset', 'category_name' => 'Critical Assets'],
            (object)['category_id' => 'cloud_asset', 'category_name' => 'Cloud Assets'],
            (object)['category_id' => 'telework_asset', 'category_name' => 'Telework Assets'],
            (object)['category_id' => 'social_media_asset', 'category_name' => 'Social Media Assets'],
            (object)['category_id' => 'infrastructure_assets', 'category_name' => 'Infrastructure Assets'],
            (object)['category_id' => 'application_assets', 'category_name' => 'Application Assets'],
            (object)['category_id' => 'hr_asset', 'category_name' => 'HR Assets'],
            (object)['category_id' => 'physical_assets', 'category_name' => 'Physical Assets'],
            (object)['category_id' => 'third_party_asset', 'category_name' => 'Third Party Assets'],
            (object)['category_id' => 'operational_asset', 'category_name' => 'Operational Assets'],
            (object)['category_id' => 'it_asset', 'category_name' => 'IT Assets'],
            (object)['category_id' => 'data_privacy_asset', 'category_name' => 'Data Privacy Assets'],
            (object)['category_id' => 'data_pii_asset', 'category_name' => 'Data PII Assets'],
            (object)['category_id' => 'payment_asset', 'category_name' => 'Payment Assets'],
            (object)['category_id' => 'pci_dss_asset', 'category_name' => 'PCI DSS Assets'],
            (object)['category_id' => 'e_commerce_asset', 'category_name' => 'E-Commerce Assets'],
            (object)['category_id' => 'e_banking_asset', 'category_name' => 'E-Banking Assets'],
        ];


        $query = DB::table('asset_register_table as art')
            ->leftJoin('asset_group_table as agt', 'agt.asset_group_id', '=', 'art.asset_group_id')
            ->leftJoin('asset_type_table as att', 'att.asset_type_id', '=', 'art.asset_type_id')
            ->leftJoin('asset_sub_type_table as astt', 'astt.asset_sub_type_id', '=', 'art.asset_sub_type_id')
            ->leftJoin('location_table as lt', 'lt.location_id', '=', 'art.location_id')
            ->orderBy('art.id');

        // Apply filtering based on request parameters
        $query
            ->when($request->input('asset_name'), function ($query, $value) {
                $query->where('art.asset_name', $value);
            })
            ->when($request->input('asset_group_name'), function ($query, $value) {
                $query->where('agt.asset_group_name', $value);
            })
            ->when($request->input('asset_type_name'), function ($query, $value) {
                $query->where('att.asset_type_name', $value);
            })
            ->when($request->input('asset_sub_type_name'), function ($query, $value) {
                $query->where('astt.asset_sub_type_name', $value);
            })
            ->when($request->input('location_name'), function ($query, $value) {
                $query->where('lt.location_name', $value);
            })
            ->when($request->input('relation'), function ($query, $value) {
                $query->where($value, 'Yes');
            });

        // Get the filtered assets based on the query
        $result = $query->paginate(20);

        $result->appends([
            'asset' => $asset,
            'asset_group_name' => $asset_group_name,
            'asset_type_name' => $asset_type_name,
            'asset_sub_type_name' => $asset_sub_type_name,
            'location_name' => $location_name,
            'relation' => $relation,
        ]);

        return view('process/assets/asset-smart-search/index', compact(
            'result',
            'assets',
            'assetGroups',
            'assetTypes',
            'assetSubTypes',
            'locations',
            'categories',
            'asset',
            'asset_group_name',
            'asset_type_name',
            'asset_sub_type_name',
            'location_name',
            'relation'
        ));
    }
}
