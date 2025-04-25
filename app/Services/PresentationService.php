<?php

namespace App\Services;

use App\Models\PenTest;
use App\Repositories\ReportRepository;

class PresentationService
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function preparePenTestStatusDistributionDataForPpt(String $vaPenTestId)
    {
        $data = $this->reportRepository->getPenTestStatusDistribution($vaPenTestId);
        $data = $data ? (array)$data : [];
        $colors = ['Open - WIP' => 'FFFFC107',  'Open - Not Started' => 'FFFF0000', 'Closed' => 'FF228B22'];

        return [
            'data' => $data,
            'colors' => $colors
        ];
    }

    public function preparePenTestSeverityDistributionDataForPpt(String $vaPenTestId)
    {
        $penTest = PenTest::where('va_pt_test_id', $vaPenTestId)->first();

        $penTestSeverityData = $this->reportRepository->getPenTestSeverityDistribution($vaPenTestId);
        return [$penTestSeverityData, $penTest];
        // $statusLabels = ['Critical', 'High', 'Medium', 'Low'];
        // $colors = ['FFFF0000', 'FFFFC107', 'FF228B22', 'FF00B050'];

        // $data = [];

        // return $penTestSeverityData; 

        // foreach ($statusLabels as $index => $status) {
        //     $statusKey = strtolower(str_replace(' ', '_', $status));
        //     $data[] = [
        //         'label' => $status,
        //         'color' => $colors[$index],
        //         'data' => $penTestSeverityData->reduce(function ($carry, $owner) use ($statusKey) {
        //             $carry[$owner->owner_name] = $owner->$statusKey;
        //             return $carry;
        //         }, [])
        //     ];
        // }

        // return $data;


        
        
    }   

    public function prepareEccComplianceDataForPpt(String $bestPracticeId)
    {
        $data = $this->reportRepository->getEccComplianceStatus($bestPracticeId);
        $data = $data ? (array)$data : [];
        $colors = ['Implemented' => 'FF228B22',  'Not Implemented' => 'FFFF0000', 'Partially Implemented' => 'FFFFC107', 'Not Applicable' => 'FF9E9E9E'];

        return [
            'data' => $data,
            'colors' => $colors
        ];
    }

    public function prepareAssetGroupDataForPpt()
    {
        $assetGroups =  $this->reportRepository->getAssetGroupData();

        $data = [];

        foreach ($assetGroups as $item) {
            $groupName = ucfirst(strtolower($item['asset_group_name']));

            if (isset($data[$groupName])) {
                $data[$groupName] += $item['total_assets'];
            } else {
                $data[$groupName] = $item['total_assets'];
            }
        }

        return $data;
    }

    public function prepareBestPracticeDataForPpt()
    {
        $bestPracticeData =  $this->reportRepository->getBestPracticeData();

        $data = [];

        foreach ($bestPracticeData as $item) {
            $data[$item['best_practices_name']] = $item['controls_implemented'];
        }

        return $data;
    }

    public function prepareAssetByTechDataForPpt()
    {
        $assetByTechData =  $this->reportRepository->getAssetByTechData();

        $data = [];

        foreach ($assetByTechData as $key => $value) {
            $data[$key] = (string)$value;
        }

        return $data;
    }

    public function prepareEvidenceByBestPracticesForPpt()
    {
        $evidenceSummary =  $this->reportRepository->getEvidenceByBestPractices();

        $data = [];

        foreach ($evidenceSummary as $item) {
            $bestPracticeName = $item['best_practices_name'];
            $evidenceCount = $item['evidence_count'];

            $data[$bestPracticeName] = $evidenceCount;
        }

        return $data;
    }

    public function prepareRiskStatusDataForPpt()
    {
        $riskStatusCount = $this->reportRepository->getRiskStatusData();

        $colors = ['Closed' => 'FF228B22', 'Open' => 'FFFF0000'];

        $data = [
            'Open' => (int) $riskStatusCount['Open'],
            'Closed' => (int) $riskStatusCount['Closed']
        ];

        return [
            'data' => $data,
            'colors' => $colors
        ];
    }

    public function prepareHeatmapDataForPpt()
    {
        $heatmapData = $this->reportRepository->getHeatmapData();

        // Define risk labels with default values
        $formattedData = [
            "Very Low" => "0",
            "Low" => "0",
            "Medium" => "0",
            "High" => "0",
            "Critical" => "0"
        ];

        $colors = ['Very Low' => 'FF00B050', 'Low' => 'FFA8D08D', 'Medium' => 'FFFFFF00', 'High' => 'FFFFC000', 'Critical' => 'FFFF0000'];

        // Loop through the given data and update values
        foreach ($heatmapData as $row) {
            if (isset($row->risk_appetite_name, $row->risk_appetites)) {
                $formattedData[$row->risk_appetite_name] = (string) $row->risk_appetites;
            }
        }

        return [
            'data' => $formattedData,
            'colors' => $colors
        ];
    }


    public function prepareRiskCountByTechForPpt()
    {
        $getRiskCountByTech = $this->reportRepository->getRiskCountByTech();

        $data = [];

        foreach ($getRiskCountByTech as $key => $value) {
            $newKey = str_replace(' Risks', ' Risk', $key);
            $data[$newKey] = $value;
        }

        return $data;
    }

    public function prepareAssetCountByTechForPpt()
    {
        $assetCountByTech = $this->reportRepository->getAssetCountByTech();

        $data = [];

        foreach ($assetCountByTech as $key => $value) {
            $newKey = str_replace(' Assets', ' Asset', $key);
            $data[$newKey] = $value;
        }

        return $data;
    }

    public function prepareControlCountByTechForPpt()
    {
        $controlCountByTech = $this->reportRepository->getControlCountByTech();

        $data = [];

        foreach ($controlCountByTech as $key => $value) {
            $newKey = str_replace(' Controls', ' Control', $key);
            $data[$newKey] = $value;
        }

        return $data;
    }

    public function prepareSamaControlCountByTechForPpt()
    {
        $controlCountByTech = $this->reportRepository->getSamaControlCountByTech();

        $data = [];

        foreach ($controlCountByTech as $key => $value) {
            $newKey = str_replace(' Controls', ' Control', $key);
            $data[$newKey] = $value;
        }

        return $data;
    }

    public function prepareSamaControMaturityForPpt()
    {
        $samaControlCountByMaturityLevel = $this->reportRepository->getSamaControlCountByMaturityLevel();

        // Initialize an associative array with maturity levels as keys
        $formattedData = [
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0
        ];

        // Populate the array with actual values from the query results
        foreach ($samaControlCountByMaturityLevel as $row) {
            $maturityLevel = $row->control_maturity_level;
            $formattedData[(string) $maturityLevel] = $row->total_controls;
        }

        return $formattedData;
    }

    public function prepareControOwnerDataForPpt()
    {

        $controlOwnersData = $this->reportRepository->getControlOwnersData();

        $statusLabels = ['Total Controls', 'Implemented', 'Partially Implemented', 'Not Implemented', 'Not Applicable'];
        $colors = ['FF2196F3', 'FF228B22', 'FFFFC107', 'FFFF0000', 'FF9E9E9E'];

        $data = [];

        foreach ($statusLabels as $index => $status) {
            $statusKey = strtolower(str_replace(' ', '_', $status));
            $data[] = [
                'label' => $status,
                'color' => $colors[$index],
                'data' => $controlOwnersData->reduce(function ($carry, $owner) use ($statusKey) {
                    $carry[$owner->owner_name] = $owner->$statusKey;
                    return $carry;
                }, [])
            ];
        }

        return $data;
    }

    public function prepareAssetGroupRiskStatusForPpt()
    {

        $controlOwnersData = $this->reportRepository->getAssetGroupRiskStatus();
        $statusLabels = ['Total Risks', 'Open', 'Closed'];
        $colors = ['FF2196F3', 'FFFF0000', 'FF228B2'];


        $data = [];

        // Loop through the labels and map the data
        foreach ($statusLabels as $index => $label) {
            $statusKey = match ($label) {
                'Total Risks' => 'risk_count',
                'Open' => 'open_risks',
                'Closed' => 'closed_risks',
            };

            $data[] = [
                'label' => $label,
                'color' => $colors[$index],
                'data' => $controlOwnersData->reduce(function ($carry, $assetGroup) use ($statusKey) {
                    $carry[$assetGroup['asset_group_name']] = $assetGroup[$statusKey]; // Access property dynamically
                    return $carry;
                }, [])
            ];
        }

        return $data;
    }
}
