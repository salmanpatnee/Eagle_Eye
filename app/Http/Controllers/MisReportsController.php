<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MisReportsController extends Controller
{

    // 2.Controller - SHOW DATA INTO THE LIST

    // -------Report of Critical Assets-------
    public function listcritical()
    {
        $criticalAssets = Asset::select('asset_id', 'asset_name', 'asset_group_id', 'asset_type_id', 'location_id')
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
            return view('process/18-Reporting/2-MISReporting/1-list-critical-assets', compact('criticalAssets'));
        }
    }


    // -------Risk Related Critical Assets-------
    public function riskcritical()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_critical_asset', 'Yes')
            ->get();


        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risks-Related-to-Critical-Assets.pdf', 'pdf/2-risks-related-to-critical-assets-pdf', 'Risks Related to Critical Assets');
        } else {
            return view('process/18-Reporting/2-MISReporting/1-risk-critical-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related Critical Assets-------
    public function controlcritical()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_critical_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-Critical-Assets.pdf', 'pdf/3-controls-related-to-critical-assets-pdf', 'Controls Related to Critical Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/1-control-critical-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Report of Cloud Assets-------
    public function listcloud()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('cloud_asset', 'Yes')
            ->get();



        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Cloud-Assets.pdf', 'pdf/cloud-assets-pdf', 'Cloud Assets');
        } else {
            return view('process/18-Reporting/2-MISReporting/2-list-cloud-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related Cloud Assets-------
    public function riskcloud()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_cloud', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risks-Related-to-Cloud-Assets.pdf', 'pdf/risk-cloud-assets-pdf', 'Risks Related to Cloud Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/2-risk-cloud-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related Cloud Assets-------
    public function controlcloud()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_cloud', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-Cloud-Assets.pdf', 'pdf/controls-cloud-assets-pdf', 'Controls Related to Cloud Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/2-control-cloud-assets', ['assetregister' => $assetregister]);
        }
    }

    // -------Report of Telework Assets-------
    public function listtelework()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('telework_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Telework-Assets.pdf', 'pdf/Telework-Assets-pdf', 'List of Telework Assets');
        } else {
            return view('process/18-Reporting/2-MISReporting/3-list-telework-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related Telework Assets-------
    public function risktelework()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_telework', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Telework-Risk.pdf', 'pdf/Telework-Risk-pdf', 'Risks Related to Telework Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/3-risk-telework-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related Telework Assets-------
    public function controltelework()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_telework', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Control-Telework-Asset.pdf', 'pdf/control-telework-asset-pdf', 'Controls Related to Telework Assets');
        } else {


            return view('process/18-Reporting/2-MISReporting/3-control-telework-assets', ['assetregister' => $assetregister]);
        }
    }

    // -------Report of Social Media Assets-------
    public function listSocialMedia()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('social_media_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Social-Media-Asset.pdf', 'pdf/social-media-asset-pdf', 'List of Social Media Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/4-list-social-media-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related Social Media Assets-------
    public function riskSocialMedia()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_social_media', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risk-Social-Media-Asset.pdf', 'pdf/risk-social-media-asset-pdf', 'Risks Related to Social Media Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/4-risk-social-media-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related Social Media Assets-------
    public function controlSocialMedia()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_social_media', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-Social-Media-Assets.pdf', 'pdf/control-social-media-asset-pdf', 'Controls Related to Social Media Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/4-risk-social-media-assets', ['assetregister' => $assetregister]);
        }
    }

    // -------Report of Data Privacy Assets-------
    public function listDataPrivacy()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('data_privacy_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'data-privacy-Asset.pdf', 'pdf/data-privacy-asset-pdf', 'List of Data Privacy Assets');
        } else {
            return view('process/18-Reporting/2-MISReporting/5-list-data-privacy-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related Data Privacy Assets-------
    public function riskDataPrivacy()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_data_privicy', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risk-data-privacy-Asset.pdf', 'pdf/risk-data-privacy-asset-pdf', 'Risks Related to Data Privacy Assets');
        } else {
            return view('process/18-Reporting/2-MISReporting/5-risk-data-privacy-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related Data Privacy Assets-------
    public function controlDataPrivacy()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_data_privicy', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-data-privacy-Assets.pdf', 'pdf/control-data-privacy-asset-pdf', 'Controls Related to Data Privacy Assets');
        } else {
            return view('process/18-Reporting/2-MISReporting/5-control-data-privacy-assets', ['assetregister' => $assetregister]);
        }
    }

    // -------Report of PII Assets-------
    public function listPii()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('data_pii_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'PII-Asset.pdf', 'pdf/pii-asset-pdf', 'List of Personally Identifiable Information Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/6-list-pii-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related PII Assets-------
    public function riskPii()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_pii', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risk-PII-Asset.pdf', 'pdf/risk-pii-asset-pdf', 'Risks Related to Personally Identifiable Information Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/6-risk-pii-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related PII Assets-------
    public function controlPii()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_pii', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-PII-Assets.pdf', 'pdf/control-pii-asset-pdf', 'Controls Related to Personally Identifiable Information Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/6-control-pii-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Report of Payment Assets-------
    public function listPayment()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('payment_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Payment-Asset.pdf', 'pdf/payment-asset-pdf', 'List of Payment Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/7-list-payment-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related Payment Assets-------
    public function riskPayment()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_payment', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risk-Payment-Asset.pdf', 'pdf/risk-payment-asset-pdf', 'Risks Related to Payment Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/7-risk-payment-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related Payment Assets-------
    public function controlPayment()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_payment', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-Payment-Assets.pdf', 'pdf/control-payment-asset-pdf', 'Controls Related to Payment Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/7-control-payment-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Report of PCI-DSS Assets-------
    public function listPci()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('pci_dss_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'PCI-DSS-Asset.pdf', 'pdf/pci-dss-asset-pdf', 'List of PCI DSS Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/8-list-pci-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related PCI-DSS Assets-------
    public function riskPci()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_pci_dss', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risk-PCI-DSS-Asset.pdf', 'pdf/risk-pci-dss-asset-pdf', 'Risks Related to PCI DSS Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/8-risk-pci-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related PCI-DSS Assets-------
    public function controlPci()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_pci_dss', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-PCI-DSS-Assets.pdf', 'pdf/control-pci-dss-asset-pdf', 'Controls Related to PCI DSS Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/8-control-pci-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Report of E-Banking Assets-------
    public function listEcom()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('e_commerce_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Ecommerce-Asset.pdf', 'pdf/ecommerce-asset-pdf', 'List of Ecommerce Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/9-list-e-commerce-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related E-Commerce Assets-------
    public function riskEcom()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_e_commerce', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risk-Ecommerce-Asset.pdf', 'pdf/risk-ecommerce-asset-pdf', 'Risks Related to Ecommerce Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/9-risk-e-commerce-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related E-Commerce Assets-------
    public function controlEcom()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_e_commerce', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-Ecommerce-Assets.pdf', 'pdf/control-ecommerce-asset-pdf', 'Controls Related to Ecommerce Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/9-control-e-commerce-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Report of E-Banking Assets-------
    public function listEbank()
    {
        $assetregister = DB::table('asset_register_table as assetregister')
            ->join('asset_group_table as assetgroup', 'asset-groups.asset_group_id', '=', 'assetregister.asset_group_id')
            ->join('asset_type_table as assettype', 'asset-types.asset_type_id', '=', 'assetregister.asset_type_id')
            ->join('location_table as assetlocation', 'assetlocation.location_id', '=', 'assetregister.location_id')
            ->where('e_banking_asset', 'Yes')
            ->get();

        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'E-Banking-Asset.pdf', 'pdf/e-banking-asset-pdf', 'List of E-Banking Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/10-list-e-banking-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Risk Related E-Banking Assets-------
    public function riskEbank()
    {
        $assetregister = DB::table('risk_master_table as riskmaster')
            ->join('risk_group_table as riskgroup', 'riskgroup.risk_group_id', '=', 'riskmaster.risk_group_id')
            ->join('risk_inherent_table as riskinherent', 'riskinherent.risk_inherent_id', '=', 'riskmaster.risk_inherent_id')
            ->where('risk_e_banking', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Risk-E-Banking-Asset.pdf', 'pdf/risk-e-banking-asset-pdf', 'Risks Related to E-Banking Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/10-risk-e-banking-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Control Related E-Banking Assets-------
    public function controlEbank()
    {
        $assetregister = DB::table('control_master_table')
            ->where('control_e_banking', 'Yes')
            ->get();
        if (request()->has('pdf')) {
            $this->_downloadPdf($assetregister, 'Controls-Related-to-E-Banking-Assets.pdf', 'pdf/control-e-banking-asset-pdf', 'Controls Related to E-Banking Assets');
        } else {

            return view('process/18-Reporting/2-MISReporting/10-control-e-banking-assets', ['assetregister' => $assetregister]);
        }
    }


    // -------Implemented Controls-------
    public function controlImple()
    {
        $assetregister = DB::table('control_master_table')
            ->where('implemented', 'Yes')
            ->get();
        return view('process/18-Reporting/2-MISReporting/12-list-control-implemented', ['assetregister' => $assetregister]);
    }

    // -------Implemented Controls-------
    public function controlNotImple()
    {
        $assetregister = DB::table('control_master_table')
            ->where('implemented', 'No')
            ->get();
        return view('process/18-Reporting/2-MISReporting/13-list-control-not-implemented', ['assetregister' => $assetregister]);
    }

    // -------Implemented Controls-------
    public function controlPending()
    {
        $assetregister = DB::table('control_master_table')
            ->where('implemented', 'Pending')
            ->get();
        return view('process/18-Reporting/2-MISReporting/14-list-control-pending',     ['assetregister' => $assetregister]);
    }

    private function _downloadPdf($report, $filename, $template, $title = "")
    {
        $mpdf = new Mpdf([
            'orientation' => 'L'
        ]);

        ini_set("pcre.backtrack_limit", "5000000");

        $html = view("process/18-Reporting/2-MISReporting/{$template}", compact('report', 'title'))->render();

        $mpdf->WriteHTML($html);

        // Set the headers to prompt the file download
        return response($mpdf->Output($filename, 'D'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    private function _downloadControlExcel($report)
    {
        $filePath = storage_path('app/public/reports/MBE-Controls-Template.xlsx');
        $outputFilePath = storage_path('app/public/reports/MBE-Controls.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A' => 'sno',
            'B' => 'control_id',
            'C' => 'control_name',
            'D' => 'status',
            'E' => 'owner_name',
            'F' => 'custodian_links',
            'G' => 'risks',
        ];

        $startingRow = 3;
        $sNo = 1;


        foreach ($report as $rowData) {

            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";
                $custodians = str_replace("<br>", ", \n", strip_tags($rowData->custodian_links, "<br>"));
                $risks = str_replace("<br>", ", \n", strip_tags($rowData->risks, "<br>"));

                $sheet->setCellValue("A{$startingRow}", $sNo);
                $sheet->setCellValue("B{$startingRow}", $rowData->control_id);
                $sheet->setCellValue("C{$startingRow}", $rowData->control_name);
                $sheet->setCellValue("D{$startingRow}", $rowData->status);
                $sheet->setCellValue("E{$startingRow}", $rowData->owner_name);
                $sheet->setCellValue("F{$startingRow}", $custodians);
                $sheet->setCellValue("G{$startingRow}", $risks);

                $horizontalAlign = Alignment::HORIZONTAL_LEFT;
                $verticalAlign = Alignment::VERTICAL_TOP;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
            }
            $sNo++;
            $startingRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    private function _downloadRiskExcel($report)
    {
        $filePath = storage_path('app/public/reports/MBE-Risks-Template.xlsx');
        $outputFilePath = storage_path('app/public/reports/MBE-Risks.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'A' => 'sno',
            'B' => 'risk_id',
            'C' => 'risk_name',
            'D' => 'status',
            'E' => 'owner_name',
            'F' => 'custodian_links',
            'G' => 'control_links',
        ];

        $startingRow = 3;
        $sNo = 1;

        foreach ($report as $rowData) {

            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";
                $custodians = str_replace("<br>", ", \n", strip_tags($rowData->custodian_links, "<br>"));
                $controls = str_replace("<br>", ", \n", strip_tags($rowData->control_links, "<br>"));

                $sheet->setCellValue("A{$startingRow}", $sNo);
                $sheet->setCellValue("B{$startingRow}", $rowData->risk_id);
                $sheet->setCellValue("C{$startingRow}", $rowData->risk_name);
                $sheet->setCellValue("D{$startingRow}", $rowData->status);
                $sheet->setCellValue("E{$startingRow}", $rowData->owner_name);
                $sheet->setCellValue("F{$startingRow}", $custodians);
                $sheet->setCellValue("G{$startingRow}", $controls);

                $horizontalAlign = Alignment::HORIZONTAL_LEFT;
                $verticalAlign = Alignment::VERTICAL_TOP;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
            }

            $sNo++;
            $startingRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }

    private function _downloadAssetExcel($report)
    {
        $filePath = storage_path('app/public/reports/MBE-Assets-Template.xlsx');
        $outputFilePath = storage_path('app/public/reports/MBE-Assets.xlsx');

        copy($filePath, $outputFilePath);

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();


        $headers = [
            'A' => 'sno',
            'B' => 'asset_id',
            'C' => 'asset_name',
            'D' => 'asset_group_name',
            'E' => 'owner_name',
            'F' => 'custodians',
            'G' => 'risks',
            'H' => 'controls',
        ];

        $startingRow = 3;
        $sNo = 1;

        foreach ($report as $rowData) {

            foreach ($headers as $column => $key) {
                $cellCoordinate = "{$column}{$startingRow}";
                $custodians = str_replace("<br>", ", \n", strip_tags($rowData->custodians, "<br>"));
                $controls = str_replace("<br>", ", \n", strip_tags($rowData->controls, "<br>"));
                $risks = str_replace("<br>", ", \n", strip_tags($rowData->risks, "<br>"));

                $sheet->setCellValue("A{$startingRow}", $sNo);
                $sheet->setCellValue("B{$startingRow}", $rowData->asset_id);
                $sheet->setCellValue("C{$startingRow}", $rowData->asset_name);
                $sheet->setCellValue("D{$startingRow}", $rowData->asset_group_name);
                $sheet->setCellValue("E{$startingRow}", $rowData->owner_name);
                $sheet->setCellValue("F{$startingRow}", $custodians);
                $sheet->setCellValue("G{$startingRow}", $risks);
                $sheet->setCellValue("H{$startingRow}", $controls);

                $horizontalAlign = Alignment::HORIZONTAL_LEFT;
                $verticalAlign = Alignment::VERTICAL_TOP;

                $sheet->getStyle($cellCoordinate)
                    ->getAlignment()
                    ->setHorizontal($horizontalAlign)
                    ->setVertical($verticalAlign)
                    ->setWrapText(true);
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
            }

            $sNo++;
            $startingRow++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($outputFilePath);
        return response()->download($outputFilePath)->deleteFileAfterSend(true);

        return response()->json(['message' => 'File updated successfully.']);
    }
}
