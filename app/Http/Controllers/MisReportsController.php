<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MisReportsController extends Controller
{

    public function criticalAssets()
    {
        $criticalAssets = Asset::select('id', 'asset_id', 'asset_name', 'asset_group_id', 'asset_type_id', 'location_id')
            ->where('critical_asset', 'Yes')
            ->whereHas('assetGroup')
            ->whereHas('assetType')
            ->whereHas('location')
            ->with([
                'assetGroup' => function ($query) {
                    $query->select('asset_group_id', 'asset_group_name');
                },
                'assetType' => function ($query) {
                    $query->select('asset_type_id', 'asset_type_name');
                },
                'location' => function ($query) {
                    $query->select('location_id', 'location_name');
                },
            ])
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($criticalAssets, 'critical-asset-report.pdf', 'pdf/1-critical-asset-pdf', 'Critical Asset');
        } else {
            return view('process/reporting/critical/assets', compact('criticalAssets'));
        }
    }

    public function riskCriticalAssets()
    {
        $riskAssets = DB::table('risk_master_table as riskmaster')
            ->select(
                'riskmaster.id as rid',
                'riskmaster.*',
                'riskgroup.risk_group_name',
                'riskinherent.*'

            )
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_critical_asset', 'Yes')
            ->get();


        if (request()->has('pdf')) {
            $this->_downloadPdf($riskAssets, 'Risks-Related-to-Critical-Assets.pdf', 'pdf/2-risks-related-to-critical-assets-pdf', 'Risks Related to Critical Assets');
        } else {
            return view('process/reporting/critical/risks', compact('riskAssets'));
        }
    }

    public function controlCriticalAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_critical_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-Critical-Assets.pdf', 'pdf/3-controls-related-to-critical-assets-pdf', 'Controls Related to Critical Assets');
        } else {

            return view('process/reporting/critical/controls', compact('result'));
        }
    }

    public function cloudAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('cloud_asset', 'Yes')
            ->select('assetregister.*', 'assetgroup.asset_group_name', 'assettype.asset_type_name', 'assetlocation.location_name')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Cloud-Assets.pdf', 'pdf/cloud-assets-pdf', 'Cloud Assets');
        } else {
            return view('process/reporting/cloud/assets', compact('result'));
        }
    }

    public function riskCloudAssets()
    {
        $result = DB::table('risk_master_table as riskmaster')
            ->select(
                'riskmaster.id as rid',
                'riskmaster.*',
                'riskgroup.risk_group_name',
                'riskinherent.*'

            )
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_cloud', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risks-Related-to-Cloud-Assets.pdf', 'pdf/risk-cloud-assets-pdf', 'Risks Related to Cloud Assets');
        } else {

            return view('process/reporting/cloud/risks', compact('result'));
        }
    }

    public function controlCloudAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_cloud', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-Cloud-Assets.pdf', 'pdf/controls-cloud-assets-pdf', 'Controls Related to Cloud Assets');
        } else {

            return view('process/reporting/cloud/controls', compact('result'));
        }
    }

    public function teleworkAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('telework_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
        } else {
            return view('process/reporting/telework/assets', compact('result'));
        }
    }

    public function riskTeleworkAssets()
    {
        $result = DB::table('risk_master_table as riskmaster')
            ->select(
                'riskmaster.id as rid',
                'riskmaster.*',
                'riskgroup.risk_group_name',
                'riskinherent.*'

            )
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_telework', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Telework-Risk.pdf', 'pdf/Telework-Risk-pdf', 'Risks Related to Telework Assets');
        } else {

            return view('process/reporting/telework/risks', compact('result'));
        }
    }

    public function controlTeleworkAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_telework', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Control-Telework-Asset.pdf', 'pdf/control-telework-asset-pdf', 'Controls Related to Telework Assets');
        } else {


            return view('process/reporting/telework/controls', compact('result'));
        }
    }

    public function socialMediaAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('social_media_asset', 'Yes')
            ->get();
        if (request()->has('pdf')) {
        } else {

            return view('process/reporting/social-media/assets', compact('result'));
        }
    }

    public function riskSocialMediaAssets()
    {
        $result = DB::table('risk_master_table as riskmaster')
            ->select(
                'riskmaster.id as rid',
                'riskmaster.*',
                'riskgroup.risk_group_name',
                'riskinherent.*'

            )
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_social_media', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risk-Social-Media-Asset.pdf', 'pdf/risk-social-media-asset-pdf', 'Risks Related to Social Media Assets');
        } else {

            return view('process/reporting/social-media/risks', compact('result'));
        }
    }

    public function controlSocialMediaAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_social_media', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-Social-Media-Assets.pdf', 'pdf/control-social-media-asset-pdf', 'Controls Related to Social Media Assets');
        } else {

            return view('process/reporting/social-media/controls', compact('result'));
        }
    }

    public function dataPrivacyAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('data_privacy_asset', 'Yes')
            ->get();
        if (request()->has('pdf')) {
        } else {
            return view('process/reporting/data-privacy/assets', compact('result'));
        }
    }

    public function riskDataPrivacyAssets()
    {
        $result = DB::table('risk_master_table as riskmaster')
            ->select(
                'riskmaster.id as rid',
                'riskmaster.*',
                'riskgroup.risk_group_name',
                'riskinherent.*'

            )
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_data_privicy', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risk-data-privacy-Asset.pdf', 'pdf/risk-data-privacy-asset-pdf', 'Risks Related to Data Privacy Assets');
        } else {
            return view('process/reporting/data-privacy/risks', compact('result'));
        }
    }

    public function controlDataPrivacyAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_data_privicy', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-data-privacy-Assets.pdf', 'pdf/control-data-privacy-asset-pdf', 'Controls Related to Data Privacy Assets');
        } else {
            return view('process/reporting/data-privacy/controls', compact('result'));
        }
    }
}
