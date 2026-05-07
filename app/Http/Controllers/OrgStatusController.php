<?php

namespace App\Http\Controllers;

use App\Services\ReportService;

class OrgStatusController extends Controller
{
    public function __construct(protected ReportService $reportService) {}

    public function __invoke()
    {
        $dashboardData = [
            'regulatoryPosture' => 74,
            'criticalGaps' => 12,
            'riskAppetite' => 'Moderate',

            'frameworks' => [
                ['name' => 'NCA ECC 2018',  'controls' => 114, 'compliance' => 68, 'risk' => 'High'],
                ['name' => 'SAMA CSF 2017', 'controls' => 132, 'compliance' => 81, 'risk' => 'Medium'],
                ['name' => 'NCA CSCC 2019', 'controls' => 48, 'compliance' => 55, 'risk' => 'High'],
                ['name' => 'NCA CCC 2020',  'controls' => 36, 'compliance' => 72, 'risk' => 'Medium'],
                ['name' => 'NCA DCC 2022',  'controls' => 29, 'compliance' => 90, 'risk' => 'Low'],
            ],

            'controlEffectiveness' => [
                'effective' => 58,
                'partiallyEffective' => 27,
                'ineffective' => 15,
            ],

            'topRisks' => [
                ['category' => 'Access Control',         'count' => 24],
                ['category' => 'Data Protection',        'count' => 19],
                ['category' => 'Third-Party Management', 'count' => 16],
                ['category' => 'Incident Response',      'count' => 14],
                ['category' => 'Network Security',       'count' => 11],
                ['category' => 'Physical Security',      'count' => 8],
            ],

            'eccCompliance' => [
                'Compliant' => 58,
                'Non-Compliant' => 18,
                'Partially Compliant' => 28,
                'Not Applicable' => 10,
            ],

            'samaCompliance' => [
                'Compliant' => 72,
                'Non-Compliant' => 24,
                'Partially Compliant' => 22,
                'Not Applicable' => 14,
            ],

            'riskSummary' => [
                'Open' => 34,
                'Closed' => 89,
            ],

            'riskHeatmap' => [
                ['name' => 'Very High', 'data' => [1, 2, 4, 6, 8]],
                ['name' => 'High',      'data' => [0, 1, 3, 5, 6]],
                ['name' => 'Medium',    'data' => [0, 1, 2, 3, 4]],
                ['name' => 'Low',       'data' => [0, 0, 1, 2, 2]],
                ['name' => 'Very Low',  'data' => [0, 0, 0, 1, 1]],
            ],
        ];

        return view('org-status', [
            'eccComplianceStatus' => $this->reportService->getEccComplianceStatus('NCA-ECC-2018'),
            'samaComplianceStatus' => $this->reportService->getEccComplianceStatus('SAMA-CSF-2017'),
            'riskStatus' => $this->reportService->getRiskStatusData(),
            'assetGroupOverview' => $this->reportService->getAssetGroupData(),
            'dashboardData' => $dashboardData,
        ]);
    }
}
