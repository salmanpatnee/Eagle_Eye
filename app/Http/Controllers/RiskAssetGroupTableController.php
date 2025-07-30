<?php

namespace App\Http\Controllers;

use App\Models\AssetGroup;
use App\Models\Risk;
use Illuminate\Http\Request;

class RiskAssetGroupTableController extends Controller
{

    public function assetGroupVsRisk(Request $request)
    {
        $riskId = $request->input('risk') ?? null;
        $assetGroupId = $request->input('assetGroup') ?? null;

        // Fetch risks and asset groups
        $risks = Risk::select('risk_id', 'risk_name')->get();
        $assetGroups = AssetGroup::select('asset_group_id', 'asset_group_name')->orderBy('id')->get();

        // Filter asset groups based on risk and fetch associated risks
        $riskassetgroup = AssetGroup::whereHas('risks', function ($query) use ($riskId) {
            if ($riskId) {
                $query->where('risk_master_table.risk_id', $riskId); // Ensure the correct table and column name
            }
        })
            ->with(['risks' => function ($query) use ($riskId) {
                if ($riskId) {
                    $query->where('risk_master_table.risk_id', $riskId); // Ensure the correct table and column name
                }
            }])
            ->when($assetGroupId, function ($query, $assetGroupId) {
                $query->where('asset_group_table.asset_group_id', $assetGroupId); // Apply filtering by asset group if provided
            })
            ->get();


        return view('4-Process\risk-identification\risk-asset-group\asset-group-vs-risk', compact('riskassetgroup', 'risks', 'assetGroups', 'riskId', 'assetGroupId'));
    }

    public function riskVsAssetGroup(Request $request)
    {
        $riskId = $request->input('risk') ?? null;
        $assetGroupId = $request->input('assetGroup') ?? null;

        $risks       = Risk::select('risk_id', 'risk_name')->get();
        $assetGroups = AssetGroup::select('asset_group_id', 'asset_group_name')->get();


        $riskassetgroup = Risk::whereHas('assetGroups', function ($query) use ($assetGroupId) {
            if ($assetGroupId) {
                $query->where('asset_group_table.asset_group_id', $assetGroupId);
            }
        })
            ->with(['assetGroups' => function ($query) use ($assetGroupId) {
                if ($assetGroupId) {
                    $query->where('asset_group_table.asset_group_id', $assetGroupId);
                }
            }])
            ->when($riskId, function ($query, $riskId) {
                $query->where('risk_master_table.risk_id', $riskId);
            })
            ->get();


        return view('4-Process\risk-identification\risk-asset-group\risk-vs-asset-group', compact('riskassetgroup', 'risks', 'assetGroups', 'riskId', 'assetGroupId'));
    }
}
