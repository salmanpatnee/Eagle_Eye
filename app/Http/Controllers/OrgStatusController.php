<?php

namespace App\Http\Controllers;

use App\Services\ReportService;

class OrgStatusController extends Controller
{
    public function __construct(protected ReportService $reportService) {}

    public function __invoke()
    {
        return view('org-status', [
            'eccComplianceStatus'  => $this->reportService->getEccComplianceStatus('NCA-ECC-2018'),
            'samaComplianceStatus' => $this->reportService->getEccComplianceStatus('SAMA-CSF-2017'),
            'riskStatus'           => $this->reportService->getRiskStatusData(),
            'assetGroupOverview'   => $this->reportService->getAssetGroupData(),
        ]);
    }
}
