<?php

namespace App\Services;

use App\Repositories\ReportRepository;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function getEccComplianceStatus(String $bestPracticeId)
    {
        return $this->reportRepository->getEccComplianceStatus($bestPracticeId);
    }

    public function getAssetGroupData()
    {
        $assetGroups =  $this->reportRepository->getAssetGroupData();

        $assetGroupIds = $assetGroups->pluck('asset_group_id');
        $assetGroupLabels = $assetGroups->pluck('asset_group_name');
        $assetCounts = $assetGroups->pluck('total_assets');

        return  ['assetGroupIds' => $assetGroupIds, 'assetGroupLabels' => $assetGroupLabels, 'assetCounts' => $assetCounts];
    }

    public function getBestPracticeData()
    {
        return $this->reportRepository->getBestPracticeData();
    }

    public function getAssetByTechData()
    {
        return $this->reportRepository->getAssetByTechData();
    }

    public function getEvidenceByBestPractices()
    {
        return $this->reportRepository->getEvidenceByBestPractices();
    }

    public function getRiskStatusData()
    {
        return $this->reportRepository->getRiskStatusData();
    }

    public function getRiskCountByTech()
    {
        return $this->reportRepository->getRiskCountByTech();
    }

    public function getAssetCountByTech()
    {
        return $this->reportRepository->getAssetCountByTech();
    }

    public function getControlCountByTech()
    {
        return $this->reportRepository->getControlCountByTech();
    }

    public function getSamaControlCountByTech()
    {
        return $this->reportRepository->getSamaControlCountByTech();
    }

    public function getSamaControlCountByMaturityLevel()
    {
        $samaControlCountByMaturityLevel  = $this->reportRepository->getSamaControlCountByMaturityLevel();

        // Initialize arrays
        $totalControls = [0, 0, 0, 0, 0];  // Assuming levels are from 1 to 5
        $controlMaturityLevels = [1, 2, 3, 4, 5];

        // Populate the totalControls array with the counts from the query results
        foreach ($samaControlCountByMaturityLevel as $row) {
            $maturityLevel = $row->control_maturity_level;
            $totalControls[$maturityLevel - 1] = $row->total_controls;  // Store the count for the respective level
        }


        // Format the response
        return [
            'total_controls' => $totalControls,
            'control_maturity_level' => $controlMaturityLevels,
        ];
    }

    public function getControlOwnersData()
    {
        $controlOwnersData = $this->reportRepository->getControlOwnersData();

        return [
            'owner_role_ids' => $controlOwnersData->pluck('owner_id'),
            'owner_name' => $controlOwnersData->pluck('owner_name'),
            'total_controls' => $controlOwnersData->pluck('total_controls'),
            'implemented' => $controlOwnersData->pluck('implemented'),
            'partially_implemented' => $controlOwnersData->pluck('partially_implemented'),
            'not_applicable' => $controlOwnersData->pluck('not_applicable'),
            'not_implemented' => $controlOwnersData->pluck('not_implemented'),
        ];
    }

    public function getAssetGroupRiskStatus()
    {
        $risk - vs - asset - group . index = $this->reportRepository->getAssetGroupRiskStatus();

        return [
            'assetGroupId' => $risk - vs - asset - group . index->pluck('asset_group_id'),
            'assetGroupName' => $risk - vs - asset - group . index->pluck('asset_group_name'),
            'risk_count' => $risk - vs - asset - group . index->pluck('risk_count'),
            'open_risks' => $risk - vs - asset - group . index->pluck('open_risks'),
            'closed_risks' => $risk - vs - asset - group . index->pluck('closed_risks'),
        ];
    }

    public function getHeatmapData()
    {
        $heatmap =  $this->reportRepository->getHeatmapData();
        return $heatmap->pluck('risk_appetites');
    }
}
