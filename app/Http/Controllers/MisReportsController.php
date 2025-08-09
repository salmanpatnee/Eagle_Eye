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

    public function piiAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('data_pii_asset', 'Yes')
            ->get();
        return view('process/reporting/pii/assets', compact('result'));
    }

    public function riskPiiAssets()
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
            ->where('risk_pii', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risk-PII-Asset.pdf', 'pdf/risk-pii-asset-pdf', 'Risks Related to Personally Identifiable Information Assets');
        } else {

            return view('process/reporting/pii/risks', compact('result'));
        }
    }

    public function controlPiiAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_pii', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-PII-Assets.pdf', 'pdf/control-pii-asset-pdf', 'Controls Related to Personally Identifiable Information Assets');
        } else {

            return view('process/reporting/pii/controls', compact('result'));
        }
    }

    public function paymentAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('payment_asset', 'Yes')
            ->get();
        return view('process/reporting/payments/assets', compact('result'));
    }

    public function riskPaymentAssets()
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
            ->where('risk_payment', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risk-Payment-Asset.pdf', 'pdf/risk-payment-asset-pdf', 'Risks Related to Payment Assets');
        } else {

            return view('process/reporting/payments/risks', compact('result'));
        }
    }

    public function controlPaymentAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_payment', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-Payment-Assets.pdf', 'pdf/control-payment-asset-pdf', 'Controls Related to Payment Assets');
        } else {

            return view('process/reporting/payments/controls', compact('result'));
        }
    }

    public function pciAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('pci_dss_asset', 'Yes')
            ->get();
        return view('process/reporting/pci/assets', compact('result'));
    }

    public function riskPciAssets()
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
            ->where('risk_pci_dss', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risk-PCI-DSS-Asset.pdf', 'pdf/risk-pci-dss-asset-pdf', 'Risks Related to PCI DSS Assets');
        } else {

            return view('process/reporting/pci/risks', compact('result'));
        }
    }

    public function controlPciAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_pci_dss', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-PCI-DSS-Assets.pdf', 'pdf/control-pci-dss-asset-pdf', 'Controls Related to PCI DSS Assets');
        } else {

            return view('process/reporting/pci/controls', compact('result'));
        }
    }

    public function ecomAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('e_commerce_asset', 'Yes')
            ->get();
        return view('process/reporting/ecommerce/assets', compact('result'));
    }

    public function riskEcomAssets()
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
            ->where('risk_e_commerce', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risk-Ecommerce-Asset.pdf', 'pdf/risk-ecommerce-asset-pdf', 'Risks Related to Ecommerce Assets');
        } else {

            return view('process/reporting/ecommerce/risks', compact('result'));
        }
    }

    public function controlEcomAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_e_commerce', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-Ecommerce-Assets.pdf', 'pdf/control-ecommerce-asset-pdf', 'Controls Related to Ecommerce Assets');
        } else {

            return view('process/reporting/ecommerce/controls', compact('result'));
        }
    }

    public function ebankAssets()
    {
        $result = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'assetgroup.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'assettype.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('e_banking_asset', 'Yes')
            ->get();

        return view('process/reporting/ebanking/assets', compact('result'));
    }

    public function riskEbankAssets()
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
            ->where('risk_e_banking', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Risk-E-Banking-Asset.pdf', 'pdf/risk-e-banking-asset-pdf', 'Risks Related to E-Banking Assets');
        } else {

            return view('process/reporting/ebanking/risks', compact('result'));
        }
    }

    public function controlEbankAssets()
    {
        $result = DB::table('control_master_table')
            ->where('control_e_banking', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($result, 'Controls-Related-to-E-Banking-Assets.pdf', 'pdf/control-e-banking-asset-pdf', 'Controls Related to E-Banking Assets');
        } else {

            return view('process/reporting/ebanking/controls', compact('result'));
        }
    }
}
