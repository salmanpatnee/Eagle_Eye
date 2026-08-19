<?php

namespace App\Http\Controllers;

use App\Services\ReportService;

class OrgStatusController extends Controller
{
    public function __construct(protected ReportService $reportService) {}

    public function __invoke()
    {
        $controlCoverage = $this->reportService->getControlAssessmentCoverage();
        $riskCoverage = $this->reportService->getRiskAssessmentCoverage();
        $controlStatus = (array) $this->reportService->getControlImplementationStatus();
        $riskStatus = (array) $this->reportService->getRiskStatusData();
        $riskCategories = $this->reportService->getRiskCategoryBreakdown();
        $assetGroupExposure = $this->reportService->getAssetGroupExposureRows()->take(8);
        $controlOwners = $this->reportService->getControlOwnershipRows()->take(10);
        $hasRiskScoreVariance = $this->reportService->riskScoresHaveVariance();

        $controlsImplementedPct = $controlCoverage['assessed'] > 0
            ? round($controlStatus['Implemented'] / $controlCoverage['assessed'] * 100)
            : 0;

        $dashboardData = [
            'controlCoverage' => $controlCoverage,
            'riskCoverage' => $riskCoverage,
            'controlsImplementedPct' => $controlsImplementedPct,
            'openRisks' => (int) ($riskStatus['Open'] ?? 0),

            'frameworks' => [
                ['id' => 'NCA-ECC-2018', 'name' => 'NCA ECC 2018', 'status' => (array) $this->reportService->getEccComplianceStatus('NCA-ECC-2018')],
                ['id' => 'SAMA-CSF-2017', 'name' => 'SAMA CSF 2017', 'status' => (array) $this->reportService->getEccComplianceStatus('SAMA-CSF-2017')],
                ['id' => 'NCA-CSCC-2019', 'name' => 'NCA CSCC 2019', 'status' => (array) $this->reportService->getEccComplianceStatus('NCA-CSCC-2019')],
                ['id' => 'NCA-CCC-2020', 'name' => 'NCA CCC 2020', 'status' => (array) $this->reportService->getEccComplianceStatus('NCA-CCC-2020')],
                ['id' => 'NCA-DCC-2022', 'name' => 'NCA DCC 2022', 'status' => (array) $this->reportService->getEccComplianceStatus('NCA-DCC-2022')],
            ],

            'controlImplementationStatus' => $controlStatus,

            'riskStatus' => $riskStatus,

            'riskCategories' => [
                'labels' => $riskCategories->pluck('category_name'),
                'counts' => $riskCategories->pluck('risk_count'),
            ],

            'assetGroupExposure' => [
                'labels' => $assetGroupExposure->pluck('asset_group_name'),
                'open' => $assetGroupExposure->pluck('open_risks'),
                'closed' => $assetGroupExposure->pluck('closed_risks'),
                'notYetAssessed' => $assetGroupExposure->pluck('not_yet_assessed'),
            ],

            'controlOwners' => [
                'labels' => $controlOwners->pluck('owner_name')->map(fn ($name) => preg_replace('/\s+Owner$/', '', $name)),
                'implemented' => $controlOwners->pluck('implemented'),
                'partiallyImplemented' => $controlOwners->pluck('partially_implemented'),
                'notImplemented' => $controlOwners->pluck('not_implemented'),
                'notApplicable' => $controlOwners->pluck('not_applicable'),
                'notYetAssessed' => $controlOwners->pluck('not_yet_assessed'),
            ],

            'hasRiskScoreVariance' => $hasRiskScoreVariance,
            'riskHeatmap' => $hasRiskScoreVariance ? $this->reportService->getRiskHeatmapData() : [],
        ];

        return view('org-status', [
            'dashboardData' => $dashboardData,
        ]);
    }
}
