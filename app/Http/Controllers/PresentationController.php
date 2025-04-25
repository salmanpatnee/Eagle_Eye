<?php

namespace App\Http\Controllers;

use App\Services\PresentationService;
use PhpOffice\PhpPresentation\DocumentLayout;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Shape\Chart\Gridlines;
use PhpOffice\PhpPresentation\Shape\Chart\Legend;
use PhpOffice\PhpPresentation\Shape\Chart\Series;
use PhpOffice\PhpPresentation\Shape\Chart\Type\Bar;
use PhpOffice\PhpPresentation\Shape\Chart\Type\Pie;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\Style\Border;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Fill;
// use PhpOffice\PhpSpreadsheet\Helper\Dimension;
use PhpOffice\PhpPresentation\Slide\Background\Color as SlideColor;
use PhpOffice\PhpPresentation\Style\Bullet;
use PhpParser\Node\Expr\Cast\String_;

class PresentationController extends Controller
{
    protected $presentationService;

    private $reportContent = [
        'NCA_ECC_COMPLIANCE_STATUS' => [
            'The pie chart illustrates the distribution of cybersecurity controls across four categories: implemented, not implemented, partially implemented, and not applicable.',
            'A significant portion of the controls are already implemented, reflecting progress in meeting compliance requirements.',
            'Controls marked as not implemented or partially implemented indicate areas requiring attention to achieve full compliance.',
            'The chart helps prioritize efforts by highlighting critical gaps and partially implemented controls that need immediate focus.',
            'Not applicable controls represent requirements irrelevant to the organization\'s context, showcasing a tailored compliance approach.'
        ]
    ];


    public function __construct(PresentationService $presentationService)
    {
        $this->presentationService = $presentationService;
    }

    private function createNewSlide(PhpPresentation $presentation, string $title = "")
    {
        // Create a new slide
        $slide = $presentation->createSlide();

        $topBar = $slide->createRichTextShape()
            ->setHeight('40')
            ->setWidth('960')
            ->setOffsetX(0)
            ->setOffsetY(0);

        $fill = new Fill();
        $fill->setFillType(Fill::FILL_GRADIENT_LINEAR)
            ->setRotation(90)
            ->setStartColor(new Color('FF0BA3B7'))
            ->setEndColor(new Color('FF0B69B6'));
        $topBar->setFill($fill);

        $leftBar = $slide->createRichTextShape()
            ->setHeight('500')
            ->setWidth('40')
            ->setOffsetX(0)
            ->setOffsetY(40);

        $fill = new Fill();
        $fill->setFillType(Fill::FILL_SOLID)
            ->setStartColor(new Color('FF133E5E'));
        $leftBar->setFill($fill);

        // Create a shape (title text) for the slide
        $titleShape = $slide->createRichTextShape()
            ->setHeight(0)
            ->setWidth(600)
            ->setOffsetX(60)
            ->setOffsetY(60);

        // $titleShape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $textRun = $titleShape->createTextRun($title);
        $textRun->getFont()->setBold(true)
            ->setSize(20);
        // ->setColor(new Color('FF203966'));

        $border = $slide->createRichTextShape()
            ->setHeight('5')
            ->setWidth('800')
            ->setOffsetX(70)
            ->setOffsetY(100);

        $fill = new Fill();
        $fill->setFillType(Fill::FILL_GRADIENT_LINEAR)
            ->setRotation(90)
            ->setStartColor(new Color('FF0BA3B7'))
            ->setEndColor(new Color('FF0B69B6'));
        $border->setFill($fill);

        return $slide;
    }


    private function generatePieChart($slide, $data, $colors, $seriesName)
    {
        $pieChart = new Pie();
        $pieChart->setExplosion(150); // Pie chart explosion effect
        $series = new Series($seriesName, $data);

        foreach ($data as $key => $value) {
            $index = array_search($key, array_keys($data)); // Get the index of the current data point
            if (isset($colors[$key])) {
                $series->getDataPointFill($index)
                    ->setFillType(Fill::FILL_SOLID)
                    ->setStartColor(new Color($colors[$key]));  // Set the color based on the key
            }
        }

        $series->setShowValue(false);
        $series->getFont()->setSize(14);
        $series->setShowPercentage(true);
        $series->getFont()->setColor(new Color(COLOR::COLOR_WHITE));

        $pieChart->addSeries($series);

        // Create pie chart shape for the first slide
        $shape = $slide->createChartShape();
        $shape->getTitle()->setVisible(false);

        $shape->setResizeProportional(false)
            ->setHeight(410)
            ->setWidth(590)
            ->setOffsetX(120)
            ->setOffsetY(120);
        $shape->getPlotArea()->setType($pieChart);
        $shape->getLegend()->getFont()->setItalic(true);
    }

    private function generateBarChart($slide, $data, $yAxisLabel, $barColor = "FF0089FA")
    {
        // Create a Bar chart (vertical bar)
        $barChart = new Bar();

        $gridlines = $this->getGridLines();

        // Set the data for the chart
        $series = new Series($yAxisLabel, $data);

        // Set bar color to #0089FA
        foreach ($data as $key => $value) {
            $series->getDataPointFill(array_search($key, array_keys($data)))
                ->setFillType(Fill::FILL_SOLID)
                ->setStartColor(new Color($barColor)); // Color: #0089FA
        }

        // Configure the chart to show value (counts) on bars
        $series->setShowValue(false);

        // Add the series to the bar chart
        $barChart->addSeries($series);

        // Create a chart shape on the second slide
        $shape = $slide->createChartShape();
        $shape->getPlotArea()->getAxisX()->setTitle('');
        $shape->getPlotArea()->getAxisY()->setTitle('');
        $shape->getTitle()->setVisible(false);
        $shape
            ->setResizeProportional(false)
            ->setHeight(410)
            ->setWidth(800)
            ->setOffsetX(60)
            ->setOffsetY(120);
        $shape->getPlotArea()->setType($barChart);
        $shape->getLegend()->getBorder()->setLineStyle(Border::LINE_SINGLE);
        $shape->getLegend()->getFont()->setItalic(true);
        $shape->getLegend()->setVisible(false);
        $shape->getPlotArea()->getAxisX()->setMinorGridlines($gridlines);
        $shape->getPlotArea()->getAxisY()->setMajorGridlines($gridlines);
    }

    private function generateGroupBarChart($slide, $seriesData)
    {
        $barChart = new Bar();
        $gridlines = $this->getGridLines();
        $barChart->setGapWidthPercent(100);

        foreach ($seriesData as $data) {

            $series = new Series($data['label'], $data['data']);
            $series->setShowSeriesName(false);
            $series->setShowValue(false);
            $series->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color($data['color']));
            $series->getFont()->getColor()->setRGB('FFFFFF');
            $series->getFont()->setSize(25);

            $barChart->addSeries($series);
        }

        $shape = $slide->createChartShape();
        $shape->setName('')
            ->setResizeProportional(false)
            ->setHeight(450)
            ->setWidth(910)
            ->setOffsetX(60)
            ->setOffsetY(80);
        $shape->getTitle()->setText('');
        $shape->getTitle()->getFont()->setItalic(true);
        $shape->getTitle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $shape->getPlotArea()->getAxisX()->setTitle('');
        $shape->getPlotArea()->getAxisY()->getFont()->getColor()->setRGB('00FF00');
        $shape->getPlotArea()->getAxisY()->setTitle('');
        $shape->getPlotArea()->setType($barChart);
        $shape->getLegend()->getBorder()->setLineStyle(Border::LINE_NONE);
        $shape->getLegend()->getFont()->setItalic(false);
        $shape->getLegend()->setPosition(Legend::POSITION_TOP);
        $shape->getPlotArea()->getAxisX()->setMinorGridlines($gridlines);
        $shape->getPlotArea()->getAxisY()->setMajorGridlines($gridlines);
    }

    private function generatePenTestSeverityChart($slide, $seriesData, $penTest)
    {
        $barChart = new Bar();
        $gridlines = $this->getGridLines();
        $barChart->setGapWidthPercent(100);
        
        $data = [
            [
                'label' => 'Critical',
                'color' => 'FFC00000',
                'data' => [$penTest->va_pt_test_name => $seriesData->critical_findings ?? 0]
            ],
            [
                'label' => 'High', 
                'color' => 'FFFF0000',
                'data' => [$penTest->va_pt_test_name => $seriesData->high_findings ?? 0]
            ],
            [
                'label' => 'Medium',
                'color' => 'FFFFC000', 
                'data' => [$penTest->va_pt_test_name => $seriesData->medium_findings ?? 0]
            ],
            [
                'label' => 'Low',
                'color' => 'FFFFE599',
                'data' => [$penTest->va_pt_test_name => $seriesData->low_findings ?? 0]
            ]
        ];

 

        foreach ($data as $item) {

            $series = new Series($item['label'], $item['data']);
            $series->setShowSeriesName(false);
            $series->setShowValue(false);
            $series->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color($item['color']));
            $series->getFont()->getColor()->setRGB('FFFFFF');
            $series->getFont()->setSize(25);

            $barChart->addSeries($series);
        }

        $shape = $slide->createChartShape();
        $shape->setName('')
            ->setResizeProportional(false)
            ->setHeight(450)
            ->setWidth(910)
            ->setOffsetX(60)
            ->setOffsetY(80);
        $shape->getTitle()->setText('');
        $shape->getTitle()->getFont()->setItalic(true);
        $shape->getTitle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $shape->getPlotArea()->getAxisX()->setTitle('');
        $shape->getPlotArea()->getAxisY()->getFont()->getColor()->setRGB('00FF00');
        $shape->getPlotArea()->getAxisY()->setTitle('');
        $shape->getPlotArea()->setType($barChart);
        $shape->getLegend()->getBorder()->setLineStyle(Border::LINE_NONE);
        $shape->getLegend()->getFont()->setItalic(false);
        $shape->getLegend()->setPosition(Legend::POSITION_TOP);
        $shape->getPlotArea()->getAxisX()->setMinorGridlines($gridlines);
        $shape->getPlotArea()->getAxisY()->setMajorGridlines($gridlines);
    }

    private function getGridLines()
    {
        $gridlines = new Gridlines();
        $gridlines->getOutline()->setWidth(1);
        $gridlines->getOutline()->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('FFE5E5E5'));
        return $gridlines;
    }

    private function createTitlePage(PhpPresentation $presentation, String $titleText, String $subtitleText)
    {
        // Create a new slide
        $slide = $presentation->createSlide();

        $slideBgColor = new SlideColor();
        $slideBgColor->setColor(new Color('FF133E5E'));
        $slide->setBackground($slideBgColor);

        if ($titleText) {

            $title = $slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(700)
                ->setOffsetX(120)
                ->setOffsetY(200);

            $title->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
            $textRun = $title->createTextRun($titleText);
            $textRun->getFont()->setBold(true)
                ->setSize(40)
                ->setColor(new Color('FFFFFFFF'));
        }

        if ($subtitleText) {

            $subtitle = $slide->createRichTextShape()
                ->setHeight(50)
                ->setWidth(200)
                ->setOffsetX(370)
                ->setOffsetY(270);

            $subtitle->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
            $textRun = $subtitle->createTextRun($subtitleText);
            $textRun->getFont()->setBold(false)
                ->setSize(20)
                ->setColor(new Color('FFD9D9D9'));
        }
    }

    private function createInfoSlide(PhpPresentation $presentation, String $title, $lines)
    {
        $slide = $this->createNewSlide($presentation, $title);

        // Add a RichTextShape to the slide
        $shape = $slide->createRichTextShape()
            ->setHeight(500)
            ->setWidth(800)
            ->setOffsetX(60)
            ->setOffsetY(90);

        foreach ($lines as $line) {
            $paragraph = $shape->createParagraph();
            $paragraph->setLineSpacing(125);

            // Set bullet style
            $bulletStyle = $paragraph->getBulletStyle();
            $bulletStyle->setBulletType(Bullet::TYPE_BULLET);
            $bulletStyle->setBulletChar('•');
            $bulletStyle->setBulletColor(new Color('FF000000'));

            $alignment = $paragraph->getAlignment();
            $alignment->setMarginLeft(20);
            $alignment->setMarginBottom(40);
            $alignment->setIndent(-20);

            $textRun = $paragraph->createTextRun($line);
            $textRun->getFont()->setSize(16); // Optional: set font size
        }
    }

    public function generateChart()
    {
        // Open PowerPoint
        $presentation = new PhpPresentation();
        $presentation->getLayout()->setDocumentLayout(DocumentLayout::LAYOUT_SCREEN_16X9);
        $presentation->removeSlideByIndex(0);

        $this->createTitlePage($presentation, "Compliance Dashboard", "Eagle Eye");

        // NCA-ECC Compliance Status
        $this->createInfoSlide($presentation, 'NCA-ECC Compliance Status', $this->reportContent['NCA_ECC_COMPLIANCE_STATUS']);
        $eccComplianceSlide = $this->createNewSlide($presentation, "NCA-ECC Compliance Status");
        $data = $this->presentationService->prepareEccComplianceDataForPpt('NCA-ECC-2018');
        $this->generatePieChart($eccComplianceSlide, $data['data'], $data['colors'], 'Compliance Status');

        // SAMA Compliance Status
        // $this->createInfoSlide($presentation, 'SAMA Compliance Status', $this->reportContent['NCA_ECC_COMPLIANCE_STATUS']);
        $samaComplianceSlide = $this->createNewSlide($presentation, "SAMA Compliance Status");
        $data = $this->presentationService->prepareEccComplianceDataForPpt('SAMA-CSF-2017');
        $this->generatePieChart($samaComplianceSlide, $data['data'], $data['colors'], 'Compliance Status');


        // Asset Distribution by Group
        $assetDistributionSlide = $this->createNewSlide($presentation, "Asset Distribution by Group");
        $data = $this->presentationService->prepareAssetGroupDataForPpt();
        $this->generateBarChart($assetDistributionSlide, $data, 'Asset Count');


        // Implemented Controls of NCA Best Practices
        $implementedControlsSlide = $this->createNewSlide($presentation, "Implemented Controls of Best Practices");
        $data = $this->presentationService->prepareBestPracticeDataForPpt();
        $this->generateBarChart($implementedControlsSlide, $data, 'Controls Count');

        // Owner's Control Status
        $ownerControlsSlide = $this->createNewSlide($presentation, "Owner's Control Status");
        $data = $this->presentationService->prepareControOwnerDataForPpt();
        
        $this->generateGroupBarChart($ownerControlsSlide, $data);


        // Asset Technology Distribution Overview
        $assetDistributionSlide = $this->createNewSlide($presentation, "Asset Technology Distribution Overview");
        $data = $this->presentationService->prepareAssetByTechDataForPpt();
        $this->generateBarChart($assetDistributionSlide, $data, 'Assets Count');

        // Evidence Summary by Best Practices
        $evidenceSummarySlide = $this->createNewSlide($presentation, "Evidence Summary by Best Practices");
        $data = $this->presentationService->prepareEvidenceByBestPracticesForPpt();
        $this->generateBarChart($evidenceSummarySlide, $data, 'Evidence Count', 'FF069806');

        // Risk Status by Asset Group
        $assetGroupSlide = $this->createNewSlide($presentation, "Risk Status by Asset Group");
        $data = [
            [
                'label' => 'Total Risks',
                'color' => 'FF2196F3',
                'data' => ['Critical Software' => 7, 'Router' => 19, 'Critical Router' => 29, 'Switch' => 27, 'Critical Switch' => 27]
            ],
            [
                'label' => 'Open',
                'color' => 'FFFF0000',
                'data' => ['Critical Software' => 1, 'Router' => 9, 'Critical Router' => 20, 'Switch' => 5, 'Critical Switch' => 5]
            ],
            [
                'label' => 'Closed',
                'color' => 'FF228B22',
                'data' => ['Critical Software' => 3, 'Router' => 7, 'Critical Router' => 10, 'Switch' => 12, 'Critical Switch' => 12]
            ],
        ];
        $this->generateGroupBarChart($assetGroupSlide, $data);

        // Risk Status
        $riskStatusSlide = $this->createNewSlide($presentation, "Risk Status");
        $data = $this->presentationService->prepareRiskStatusDataForPpt();
        $this->generatePieChart($riskStatusSlide, $data['data'], $data['colors'], 'Risk Status');

        // Asset Distribution by Technologies
        $assetDistrbutionSlide = $this->createNewSlide($presentation, "Asset Distribution by Technologies");
        $data = $this->presentationService->prepareAssetCountByTechForPpt();
        $this->generateBarChart($assetDistrbutionSlide, $data, 'Asset Count');

        // Risk Distribution by Technologies
        $riskDistrbutionSlide = $this->createNewSlide($presentation, "Risk Distribution by Technologies");
        $data = $this->presentationService->prepareRiskCountByTechForPpt();
        $this->generateBarChart($riskDistrbutionSlide, $data, 'Risk Count');

        // Control Distribution by Technologies
        $controlDistrbutionSlide = $this->createNewSlide($presentation, "NCA Control Distribution by Technologies");
        $data = $this->presentationService->prepareControlCountByTechForPpt();
        $this->generateBarChart($controlDistrbutionSlide, $data, 'Control Count');


        // SAMA Control Distribution by Technologies
        $samaControlDistrbutionSlide = $this->createNewSlide($presentation, "SAMA Control Distribution by Technologies");
        $data = $this->presentationService->prepareSamaControlCountByTechForPpt();
        $this->generateBarChart($samaControlDistrbutionSlide, $data, 'Control Count');

        // SAMA Control Maturity Level Distribution
        $samaControlMaturitySlide = $this->createNewSlide($presentation, "SAMA Control Maturity Level Distribution");
        $data = $this->presentationService->prepareSamaControMaturityForPpt();
        $this->generateBarChart($samaControlMaturitySlide, $data, 'Control Count');

        // Heatmap
        $heatmapSlide = $this->createNewSlide($presentation, "Heatmap - Risk Appetite Breakdown");
        $data = $this->presentationService->prepareHeatmapDataForPpt();
        $this->generatePieChart($heatmapSlide, $data['data'], $data['colors'], 'Risk Status');


        $this->createTitlePage($presentation, "Thank You", "Eagle Eye");

        // Save the PowerPoint presentation
        $filename = 'ComplianceDashboard.pptx';
        $tempPath = storage_path($filename);

        $writer = IOFactory::createWriter($presentation, 'PowerPoint2007');
        $writer->save($tempPath);

        // Return the PowerPoint file as a download
        return response()->download($tempPath)->deleteFileAfterSend(true);
    }

    public function generatePenTestChart(string $vaPenTestId)
    {
        // Open PowerPoint
        $presentation = new PhpPresentation();
        $presentation->getLayout()->setDocumentLayout(DocumentLayout::LAYOUT_SCREEN_16X9);
        $presentation->removeSlideByIndex(0);

        $this->createTitlePage($presentation, "VA Pen Test Dashboard", "Eagle Eye");

        // Vulnerability Penetration Test Status Distribution
        // $this->createInfoSlide($presentation, 'NCA-ECC Compliance Status', $this->reportContent['NCA_ECC_COMPLIANCE_STATUS']);
        $penTestStatusSlide = $this->createNewSlide($presentation, "Vulnerability Penetration Test Status Distribution");
        $data = $this->presentationService->preparePenTestStatusDistributionDataForPpt($vaPenTestId);
        $this->generatePieChart($penTestStatusSlide, $data['data'], $data['colors'], 'Compliance Status');

        // Vulnerability Penetration Test Severity Distribution
        $penTestSeveritySlide = $this->createNewSlide($presentation, "Vulnerability Penetration Test Severity Distribution");
        $data = $this->presentationService->preparePenTestSeverityDistributionDataForPpt($vaPenTestId);
        
        $this->generatePenTestSeverityChart($penTestSeveritySlide, $data[0], $data[1]);


        $this->createTitlePage($presentation, "Thank You", "Eagle Eye");

        // Save the PowerPoint presentation
        $filename = 'PenTestDashboard.pptx';
        $tempPath = storage_path($filename);

        $writer = IOFactory::createWriter($presentation, 'PowerPoint2007');
        $writer->save($tempPath);

        // Return the PowerPoint file as a download
        return response()->download($tempPath)->deleteFileAfterSend(true);
    }
}
