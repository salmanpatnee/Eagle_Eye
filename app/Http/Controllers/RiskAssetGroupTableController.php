<?php

namespace App\Http\Controllers;

use App\Models\AssetGroup;
use App\Models\Risk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAssetGroupTableController extends Controller
{

    public function assetVsRisk(Request $request)
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


        return view('4-Process/7-Risk/14-AssetGroupRisk', compact('riskassetgroup', 'risks', 'assetGroups'));
    }

    public function index(Request $request)
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


        return view('4-Process/7-Risk/14-RiskAssetGroup', compact('riskassetgroup', 'risks', 'assetGroups'));
    }



    //     public function index(Request $request)
    // {
    //     $controlNames = DB::table('risk_master_table')->distinct()->pluck('asset_group_name');
    //     $selectedControl = $request->input('asset_group_name');

    //     $query = DB::table('risk_master_table');

    //     if ($selectedControl) {
    //         $query->where('asset_group_name', $selectedControl);
    //     }

    //     $risks = $query->get();

    //     return view('4-Process/7-Risk/14-RiskAssetGroup', compact('risks', 'controlNames', 'selectedControl'));
    // }
}
