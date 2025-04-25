<?php

namespace App\Repositories;

use App\Models\AssetGroup;
use App\Models\BestPractice;
use App\Models\Risk;
use App\Models\RiskAssessmentDetail;
use App\Models\PenTest;
use Illuminate\Support\Facades\DB;

class ReportRepository
{

    public function getPenTestStatusDistribution(String $vaPenTestId)
    {
        return DB::table('va_pt_test_table as va')
            ->join('va_pt_test_findings_table as vaf', 'va.va_pt_test_id', '=', 'vaf.va_pt_test_id')
            ->where('va.va_pt_test_id', $vaPenTestId)
            ->selectRaw("
        SUM(CASE WHEN vaf.va_pt_status = 'Open - WIP' THEN 1 ELSE 0 END) as 'Open - WIP',
        SUM(CASE WHEN vaf.va_pt_status = 'Open - Not Started' THEN 1 ELSE 0 END) as 'Open - Not Started',
        SUM(CASE WHEN vaf.va_pt_status = 'Closed' THEN 1 ELSE 0 END) as 'Closed'
        ")->first();
    }

    public function getPenTestSeverityDistribution(String $vaPenTestId)
    {
        return PenTest::select(
            'no_of_findings',
            'critical_findings',
            'high_findings',
            'medium_findings',
            'low_findings'
        )
            ->where('va_pt_test_id', $vaPenTestId)
            ->first();
    }

    public function getEccComplianceStatus(String $bestPracticeId = 'NCA-ECC-2018')
    {
        return  DB::table('control_master_table as c')
            ->join('control_master_table_vs_best_practice_table as cvb', 'c.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')
            ->leftJoin('control_assessment_details_table as cad', function ($join) {
                $join->on('c.control_id', '=', 'cad.control_id')
                    ->whereRaw('cad.id = (SELECT MAX(id) FROM control_assessment_details_table WHERE control_id = c.control_id)');
            })
            ->where('b.best_practices_id', $bestPracticeId)
            ->select(
                DB::raw("COUNT(CASE WHEN cad.control_implementation_status = 'Implemented' THEN 1 END) AS 'Implemented'"),
                DB::raw("COUNT(CASE WHEN cad.control_implementation_status = 'Not Implemented' OR cad.control_implementation_status IS NULL THEN 1 END) AS 'Not Implemented'"),
                DB::raw("COUNT(CASE WHEN cad.control_implementation_status = 'Partially Implemented' THEN 1 END) AS 'Partially Implemented'"),
                DB::raw("COUNT(CASE WHEN cad.control_implementation_status = 'Not Applicable' THEN 1 END) AS 'Not Applicable'")
            )
            ->groupBy('b.best_practices_id')
            ->first();
    }

    public function getAssetGroupData()
    {
        return AssetGroup::select('asset_group_table.asset_group_id', 'asset_group_table.asset_group_name', DB::raw('COUNT(a.asset_id) as total_assets'))
            ->join('asset_register_table as a', 'asset_group_table.asset_group_id', '=', 'a.asset_group_id')
            ->groupBy('asset_group_table.asset_group_id', 'asset_group_table.asset_group_name')
            ->get();
    }

    public function getBestPracticeData()
    {
        return BestPractice::from('best_practice_table AS bp')
            ->select('bp.best_practices_name', DB::raw('COUNT(cad.control_implementation_status) AS controls_implemented'))
            ->leftJoin('control_master_table_vs_best_practice_table AS cvb', 'bp.best_practices_id', '=', 'cvb.best_practice_id')
            ->leftJoin('control_master_table AS cm', 'cvb.control_id', '=', 'cm.control_id')
            ->leftJoin('control_assessment_details_table AS cad', 'cm.control_id', '=', 'cad.control_id')
            ->where(function ($query) {
                $query->where('cad.control_implementation_status', 'Implemented')
                    ->orWhereNull('cad.control_implementation_status');
            })
            ->whereIn('bp.best_practices_id', ['NCA-ECC-2018', 'NCA-CSCC-2019', 'NCA-CCC-2020', 'NCA-TCC-2021', 'NCA-OSMACC-2021', 'NCA-DCC-2022', 'SAMA-CSF-2017'])
            ->groupBy('bp.best_practices_name')
            ->get();
    }

    public function getAssetByTechData()
    {
        return DB::table('asset_register_table')
            ->selectRaw("
        SUM(CASE WHEN critical_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Critical Asset',
        SUM(CASE WHEN cloud_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Cloud Asset',
        SUM(CASE WHEN telework_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Telework Asset',
        SUM(CASE WHEN social_media_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Social Media Asset',
        SUM(CASE WHEN data_privacy_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Data Privacy Asset',
        SUM(CASE WHEN data_pii_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Data PII Asset',
        SUM(CASE WHEN pci_dss_asset = 'Yes' THEN 1 ELSE 0 END) AS 'PCI DSS Asset',
        SUM(CASE WHEN e_commerce_asset = 'Yes' THEN 1 ELSE 0 END) AS 'E-Commerce Asset',
        SUM(CASE WHEN infrastructure_assets = 'Yes' THEN 1 ELSE 0 END) AS 'Infrastructure Assets',
        SUM(CASE WHEN application_assets = 'Yes' THEN 1 ELSE 0 END) AS 'Application Assets',
        SUM(CASE WHEN hr_asset = 'Yes' THEN 1 ELSE 0 END) AS 'HR Asset',
        SUM(CASE WHEN physical_assets = 'Yes' THEN 1 ELSE 0 END) AS 'Physical Assets',
        SUM(CASE WHEN third_party_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Third Party Asset',
        SUM(CASE WHEN operational_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Operational Asset',
        SUM(CASE WHEN e_banking_asset = 'Yes' THEN 1 ELSE 0 END) AS 'E-Banking Asset',
        SUM(CASE WHEN payment_asset = 'Yes' THEN 1 ELSE 0 END) AS 'Payment Asset'
        ")->first();
    }

    public function getEvidenceByBestPractices()
    {
        return BestPractice::select('best_practice_table.best_practices_id', 'best_practice_table.best_practices_name')
            ->selectRaw('COUNT(evidence_table.evidence_id) as evidence_count')
            ->join('best_practice_vs_domain_table', 'best_practice_table.best_practices_id', '=', 'best_practice_vs_domain_table.best_practices_id')
            ->join('domain_table', 'best_practice_vs_domain_table.main_domain_id', '=', 'domain_table.main_domain_id')
            ->join('control_master_table_vs_domain_table', 'domain_table.main_domain_id', '=', 'control_master_table_vs_domain_table.main_domain_id')
            ->join('control_master_table', 'control_master_table_vs_domain_table.control_id', '=', 'control_master_table.control_id')
            ->leftJoin('evidence_vs_control_table', 'control_master_table.control_id', '=', 'evidence_vs_control_table.control_id')
            ->leftJoin('evidence_table', 'evidence_vs_control_table.evidence_id', '=', 'evidence_table.evidence_id')
            ->whereIn('best_practice_table.best_practices_id', ['NCA-ECC-2018', 'NCA-CSCC-2019', 'NCA-CCC-2020', 'NCA-TCC-2021', 'NCA-OSMACC-2021', 'NCA-DCC-2022', 'SAMA-CSF-2017'])
            ->groupBy('best_practice_table.best_practices_id', 'best_practice_table.best_practices_name')
            ->distinct()
            ->get();
    }

    public function getRiskStatusData()
    {
        $latestRiskStatus = RiskAssessmentDetail::select('risk_assessment_details_table.risk_id', 'implementation_status')
            ->leftJoin(DB::raw('(SELECT risk_assessment_details_table.risk_id, MAX(id) AS latest_id FROM risk_assessment_details_table GROUP BY risk_id) as latest'), function ($join) {
                $join->on('risk_assessment_details_table.risk_id', '=', 'latest.risk_id')
                    ->on('risk_assessment_details_table.id', '=', 'latest.latest_id');
            })
            ->toBase(); // Convert to base query to use in join


        return Risk::leftJoinSub($latestRiskStatus, 'latest_risk_status', function ($join) {
            $join->on('risk_master_table.risk_id', '=', 'latest_risk_status.risk_id');
        })
            // ->selectRaw('COUNT(risk_master_table.risk_id) AS total_risks')
            ->selectRaw('SUM(CASE WHEN latest_risk_status.implementation_status IS NULL OR latest_risk_status.implementation_status = "Open" THEN 1 ELSE 0 END) AS Open')
            ->selectRaw('SUM(CASE WHEN latest_risk_status.implementation_status = "Close" THEN 1 ELSE 0 END) AS Closed')
            ->first();
    }

    public function getRiskCountByTech()
    {
        return DB::table('risk_master_table')
            ->select(
                DB::raw("COUNT(CASE WHEN risk_critical_asset = 'Yes' THEN 1 END) AS `Critical Risks`"),
                DB::raw("COUNT(CASE WHEN risk_cloud = 'Yes' THEN 1 END) AS `Cloud Risks`"),
                DB::raw("COUNT(CASE WHEN risk_telework = 'Yes' THEN 1 END) AS `Telework Risks`"),
                DB::raw("COUNT(CASE WHEN risk_social_media = 'Yes' THEN 1 END) AS `Social Media Risks`"),
                DB::raw("COUNT(CASE WHEN risk_data_privicy = 'Yes' THEN 1 END) AS `Data Privacy Risks`"),
                DB::raw("COUNT(CASE WHEN risk_pii = 'Yes' THEN 1 END) AS `Data PII Risks`"),
                DB::raw("COUNT(CASE WHEN risk_pci_dss = 'Yes' THEN 1 END) AS `PCI DSS Risks`"),
                DB::raw("COUNT(CASE WHEN risk_e_commerce = 'Yes' THEN 1 END) AS `E-Commerce Risks`"),
                DB::raw("COUNT(CASE WHEN risk_infrastructure = 'Yes' THEN 1 END) AS `Infrastructure Risks`"),
                DB::raw("COUNT(CASE WHEN risk_application = 'Yes' THEN 1 END) AS `Application Risks`"),
                DB::raw("COUNT(CASE WHEN risk_hr = 'Yes' THEN 1 END) AS `HR Risks`"),
                DB::raw("COUNT(CASE WHEN risk_physical_security = 'Yes' THEN 1 END) AS `Physical Risks`"),
                DB::raw("COUNT(CASE WHEN risk_third_party = 'Yes' THEN 1 END) AS `Third Party Risks`"),
                DB::raw("COUNT(CASE WHEN risk_operational = 'Yes' THEN 1 END) AS `Operational Risks`"),
                DB::raw("COUNT(CASE WHEN risk_e_banking = 'Yes' THEN 1 END) AS `E-banking Risks`"),
                DB::raw("COUNT(CASE WHEN risk_payment = 'Yes' THEN 1 END) AS `Payment Risks`")
            )
            ->first();
    }

    public function getAssetCountByTech()
    {
        return DB::table('asset_register_table')
            ->select(
                DB::raw("COUNT(CASE WHEN critical_asset = 'Yes' THEN 1 END) AS `Critical Assets`"),
                DB::raw("COUNT(CASE WHEN cloud_asset = 'Yes' THEN 1 END) AS `Cloud Assets`"),
                DB::raw("COUNT(CASE WHEN telework_asset = 'Yes' THEN 1 END) AS `Telework Assets`"),
                DB::raw("COUNT(CASE WHEN social_media_asset = 'Yes' THEN 1 END) AS `Social Media Assets`"),
                DB::raw("COUNT(CASE WHEN data_privacy_asset = 'Yes' THEN 1 END) AS `Data Privacy Assets`"),
                DB::raw("COUNT(CASE WHEN data_pii_asset = 'Yes' THEN 1 END) AS `Data PII Assets`"),
                DB::raw("COUNT(CASE WHEN pci_dss_asset = 'Yes' THEN 1 END) AS `PCI DSS Assets`"),
                DB::raw("COUNT(CASE WHEN e_commerce_asset = 'Yes' THEN 1 END) AS `E-Commerce Assets`"),
                DB::raw("COUNT(CASE WHEN infrastructure_assets = 'Yes' THEN 1 END) AS `Infrastructure Assets`"),
                DB::raw("COUNT(CASE WHEN application_assets = 'Yes' THEN 1 END) AS `Application Assets`"),
                DB::raw("COUNT(CASE WHEN hr_asset = 'Yes' THEN 1 END) AS `HR Assets`"),
                DB::raw("COUNT(CASE WHEN physical_assets = 'Yes' THEN 1 END) AS `Physical Assets`"),
                DB::raw("COUNT(CASE WHEN third_party_asset = 'Yes' THEN 1 END) AS `Third Party Assets`"),
                DB::raw("COUNT(CASE WHEN operational_asset = 'Yes' THEN 1 END) AS `Operational Assets`"),
                DB::raw("COUNT(CASE WHEN e_banking_asset = 'Yes' THEN 1 END) AS `E-banking Assets`"),
                DB::raw("COUNT(CASE WHEN payment_asset = 'Yes' THEN 1 END) AS `Payment Assets`")
            )
            ->first();
    }

    public function getControlCountByTech()
    {
        return DB::table('control_master_table')
            ->select(
                DB::raw("COUNT(CASE WHEN control_critical_asset = 'Yes' THEN 1 END) AS `Critical Controls`"),
                DB::raw("COUNT(CASE WHEN control_cloud != 'No' THEN 1 END) AS `Cloud Controls`"),
                DB::raw("COUNT(CASE WHEN control_telework = 'Yes' THEN 1 END) AS `Telework Controls`"),
                DB::raw("COUNT(CASE WHEN control_social_media = 'Yes' THEN 1 END) AS `Social Media Controls`"),
                DB::raw("COUNT(CASE WHEN control_data_privicy = 'Yes' THEN 1 END) AS `Data Privacy Controls`"),
                DB::raw("COUNT(CASE WHEN control_pii = 'Yes' THEN 1 END) AS `Data PII Controls`"),
                DB::raw("COUNT(CASE WHEN control_pci_dss = 'Yes' THEN 1 END) AS `PCI DSS Controls`"),
                DB::raw("COUNT(CASE WHEN control_e_commerce = 'Yes' THEN 1 END) AS `E-Commerce Controls`"),
                DB::raw("COUNT(CASE WHEN control_infrastructure = 'Yes' THEN 1 END) AS `Infrastructure Controls`"),
                DB::raw("COUNT(CASE WHEN control_application = 'Yes' THEN 1 END) AS `Application Controls`"),
                DB::raw("COUNT(CASE WHEN control_hr = 'Yes' THEN 1 END) AS `HR Controls`"),
                DB::raw("COUNT(CASE WHEN control_physical_security = 'Yes' THEN 1 END) AS `Physical Controls`"),
                DB::raw("COUNT(CASE WHEN control_third_party = 'Yes' THEN 1 END) AS `Third Party Controls`"),
                DB::raw("COUNT(CASE WHEN control_operational = 'Yes' THEN 1 END) AS `Operational Controls`"),
                DB::raw("COUNT(CASE WHEN control_e_banking = 'Yes' THEN 1 END) AS `E-banking Controls`"),
                DB::raw("COUNT(CASE WHEN control_payment = 'Yes' THEN 1 END) AS `Payment Controls`")
            )
            ->first();
    }

    public function getSamaControlCountByTech()
    {
        return DB::table('control_master_table')
            ->select(
                DB::raw("COUNT(CASE WHEN control_critical_asset = 'Yes' THEN 1 END) AS `Critical Controls`"),
                DB::raw("COUNT(CASE WHEN control_cloud != 'No' THEN 1 END) AS `Cloud Controls`"),
                DB::raw("COUNT(CASE WHEN control_telework = 'Yes' THEN 1 END) AS `Telework Controls`"),
                DB::raw("COUNT(CASE WHEN control_social_media = 'Yes' THEN 1 END) AS `Social Media Controls`"),
                DB::raw("COUNT(CASE WHEN control_data_privicy = 'Yes' THEN 1 END) AS `Data Privacy Controls`"),
                DB::raw("COUNT(CASE WHEN control_pii = 'Yes' THEN 1 END) AS `Data PII Controls`"),
                DB::raw("COUNT(CASE WHEN control_pci_dss = 'Yes' THEN 1 END) AS `PCI DSS Controls`"),
                DB::raw("COUNT(CASE WHEN control_e_commerce = 'Yes' THEN 1 END) AS `E-Commerce Controls`"),
                DB::raw("COUNT(CASE WHEN control_infrastructure = 'Yes' THEN 1 END) AS `Infrastructure Controls`"),
                DB::raw("COUNT(CASE WHEN control_application = 'Yes' THEN 1 END) AS `Application Controls`"),
                DB::raw("COUNT(CASE WHEN control_hr = 'Yes' THEN 1 END) AS `HR Controls`"),
                DB::raw("COUNT(CASE WHEN control_physical_security = 'Yes' THEN 1 END) AS `Physical Controls`"),
                DB::raw("COUNT(CASE WHEN control_third_party = 'Yes' THEN 1 END) AS `Third Party Controls`"),
                DB::raw("COUNT(CASE WHEN control_operational = 'Yes' THEN 1 END) AS `Operational Controls`"),
                DB::raw("COUNT(CASE WHEN control_e_banking = 'Yes' THEN 1 END) AS `E-banking Controls`"),
                DB::raw("COUNT(CASE WHEN control_payment = 'Yes' THEN 1 END) AS `Payment Controls`")
            )->where('control_id', 'LIKE', 'SAMA-CSF-%')
            ->first();
    }

    public function getSamaControlCountByMaturityLevel($level = null)
    {
        return DB::table('best_practice_table as b')
            ->join('control_assessment_master_table as ca', 'ca.best_practices_id', '=', 'b.best_practices_id')
            ->join('control_assessment_details_table as cad', 'cad.control_assessment_id', '=', 'ca.control_assessment_id')
            ->where('b.best_practices_id', 'SAMA-CSF-2017')
            ->select(DB::raw('count(cad.control_id) as total_controls, cad.control_maturity_level'))
            ->groupBy('cad.control_maturity_level')
            ->get();
    }

    public function getControlOwnersData()
    {
        return DB::table('owner_table as o')
            ->join('control_master_table as c', 'o.owner_role_id', '=', 'c.owner_id')
            ->leftJoin(DB::raw('(
                SELECT 
                    ca1.control_id,
                    ca1.control_implementation_status
                FROM 
                    control_assessment_details_table ca1
                INNER JOIN 
                    (
                        SELECT 
                            control_id,
                            MAX(id) as recent_id
                        FROM 
                            control_assessment_details_table
                        GROUP BY 
                            control_id
                    ) ca2 ON ca1.control_id = ca2.control_id AND ca1.id = ca2.recent_id
            ) as recent_status'), 'c.control_id', '=', 'recent_status.control_id')
            ->select(
                'o.owner_role_id as owner_id',
                'o.owner_name as owner_name',
                DB::raw('COUNT(c.control_id) as total_controls'),
                DB::raw('COUNT(CASE WHEN recent_status.control_implementation_status = "Implemented" THEN 1 END) as implemented'),
                DB::raw('COUNT(CASE WHEN recent_status.control_implementation_status = "Partially Implemented" THEN 1 END) as partially_implemented'),
                DB::raw('COUNT(CASE WHEN recent_status.control_implementation_status = "Not Applicable" THEN 1 END) as not_applicable'),
                DB::raw('COUNT(c.control_id) - 
                        COUNT(CASE WHEN recent_status.control_implementation_status = "Implemented" THEN 1 END) - 
                        COUNT(CASE WHEN recent_status.control_implementation_status = "Partially Implemented" THEN 1 END) - 
                        COUNT(CASE WHEN recent_status.control_implementation_status = "Not Applicable" THEN 1 END) AS not_implemented')
            )
            ->groupBy('o.owner_role_id', 'o.owner_name')
            ->get();
    }

    public function getAssetGroupRiskStatus()
    {
        return AssetGroup::select(
            'a.asset_group_id',
            'a.asset_group_name',
            DB::raw('COUNT(DISTINCT rvg.risk_id) AS risk_count'),
            DB::raw('COUNT(CASE WHEN COALESCE(rad.implementation_status, "Open") = "Open" THEN rvg.risk_id END) AS open_risks'),
            DB::raw('COUNT(CASE WHEN rad.implementation_status = "Close" THEN rvg.risk_id END) AS closed_risks')
        )
            ->from('asset_group_table AS a')
            ->join('risk_vs_asset_group_table AS rvg', 'a.asset_group_id', '=', 'rvg.asset_group_id')
            ->leftJoinSub(
                DB::table('risk_assessment_details_table')
                    ->select('risk_id', 'implementation_status')
                    ->whereIn('risk_assessment_id', function ($query) {
                        $query->select(DB::raw('MAX(risk_assessment_id)'))
                            ->from('risk_assessment_details_table')
                            ->groupBy('risk_id');
                    }),
                'rad', // Alias for the subquery
                'rvg.risk_id',
                '=',
                'rad.risk_id'
            )
            ->groupBy('a.asset_group_id', 'a.asset_group_name')
            ->get();
    }

    public function getHeatmapData()
    {
        return DB::table('risk_appetite_table')
            ->selectRaw('COUNT(risk_appetite_id) as risk_appetites, risk_appetite_name')
            ->groupBy('risk_appetite_name')
            ->get();
    }
}
