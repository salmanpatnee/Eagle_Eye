<?php
namespace App\Http\Controllers; 


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function domainControllersReport(Request $request) {
         $domains = DB::table('domain_table as dm')
             ->leftJoin('control_master_table_vs_domain_table as cdm', 'dm.main_domain_id', '=', 'cdm.main_domain_id')
             ->select(DB::raw('dm.main_domain_id, dm.main_domain_name, COUNT(cdm.id) as controls'))
             ->orderBy('dm.main_domain_name')
             ->groupBy(['dm.main_domain_id', 'dm.main_domain_name'])
             ->get();

        return view('4-Process/18-Reporting/3-Dashboard/1-DomainVsControlDashboard')->with([
            'domainNames' => json_encode($domains->pluck('main_domain_name')),
            'numberOfControls' => json_encode($domains->pluck('controls'))
        ]);
    }

    public function controlRisksReport(Request $request) {
        $controls = DB::table('control_master_table as cm')
            ->leftJoin('risk_vs_control_table as crm', 'cm.control_id', '=', 'crm.control_id')
            ->select(DB::raw('cm.control_id, cm.control_name, COUNT(crm.id) as risks'))
            ->orderBy('cm.control_name')
            ->groupBy(['cm.control_id', 'cm.control_name'])
            ->get();

        return view('4-Process/18-Reporting/3-Dashboard/2-RiskVsControlDashboard')->with([
            'controlNames' => json_encode($controls->pluck('control_name')),
            'numberOfRisks' => json_encode($controls->pluck('risks'))
        ]);
    }

    public function riskAssetsReport(Request $request) {
        $assetGroups = DB::table('asset_group_table as agm')
            ->leftJoin('risk_vs_asset_group_table as agr', 'agm.asset_group_id', '=', 'agr.asset_group_id')
            ->select(DB::raw('agm.asset_group_id, agm.asset_group_name, COUNT(agr.id) as risks'))
            ->orderBy('agm.asset_group_name')
            ->groupBy(['agm.asset_group_id', 'agm.asset_group_name'])
            ->get();

        //dd($assetGroups);

        return view('4-Process/18-Reporting/3-Dashboard/3-RiskVsAssetGroupDashboard')->with([
            'assetGroupNames' => json_encode($assetGroups->pluck('asset_group_name')),
            'numberOfRisks' => json_encode($assetGroups->pluck('risks'))
        ]);
    }
}