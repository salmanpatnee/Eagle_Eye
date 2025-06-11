<?php

namespace App\Http\Controllers;

use App\Models\ControlAssessment;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Mpdf\Mpdf;
use Illuminate\Support\Str;

class RegulatoryReportController extends Controller
{
    public function index()
    {
        return view('4-Process/19-NCAReporting/index');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bestPracticeId = request('best_practice');

        $controlAssessments = ControlAssessment::select(
            'control_assessment_id',
            DB::raw("DATE_FORMAT(control_assessment_start_date, '%d %b %Y') as formatted_start_date"),
            DB::raw("CONCAT(control_assessment_id, ' - ', control_assessment_name) as name")
        )
            ->where('best_practices_id', $bestPracticeId)
            ->get();


        return view('4-Process/19-NCAReporting/create', compact('controlAssessments', 'bestPracticeId'));
    }

    public function show()
    {
        $bestPracticeId = request('best_practice');
        $controlAssessmentId = request('control_assessments_id');
        $cloudControlType = request('cloud_control_type');
        $version = request('version');



        if ($bestPracticeId === 'NCA-ECC-2018' && $version === 'v1') {
            return redirect()
                ->route('ecc-regulatory-report.show', ['controlAssessmentId' => $controlAssessmentId]);
        } else if ($bestPracticeId === 'NCA-CCC-2020') {
            return redirect()
                ->route('ccc-regulatory-report.show', ['controlAssessmentId' => $controlAssessmentId, 'cloudControlType' => $cloudControlType]);
        } else {
            return redirect()
                ->route('ecc-2024-regulatory-report.show', ['controlAssessmentId' => $controlAssessmentId]);
        }
    }

    public function ecc(Request $request)
    {
        $controlAssessmentId = request('controlAssessmentId');
        $report = $this->getReport("NCA-ECC-2018", $controlAssessmentId);
        $path = "4-Process/19-NCAReporting/ecc";

        if (request()->has('pdf')) {
            $this->generatePdf($path, $report, 'NCA-ECC-Report.pdf');
        } else {
            return view("{$path}/index", compact('report', 'controlAssessmentId'));
        }
    }

    public function ecc_2024(Request $request)
    {
        $controlAssessmentId = request('controlAssessmentId');
        $report = $this->getReport("NCA-ECC-2024", $controlAssessmentId);


        $path = "4-Process/19-NCAReporting/ecc2";

        if (request()->has('pdf')) {
            $this->generatePdf($path, $report, 'NCA-ECC-Report.pdf');
        } else {
            return view("{$path}/index", compact('report', 'controlAssessmentId'));
        }
    }

    public function cscc(Request $request)
    {
        $controlAssessmentId = request('controlAssessmentId');
        $report = $this->getReport("NCA-CSCC-2019", $controlAssessmentId);
        $path = "4-Process/19-NCAReporting/cscc";

        if (request()->has('pdf')) {
            $this->generatePdf($path, $report, 'NCA-CSCC-Report.pdf');
        } else {

            return view("{$path}/index", compact('report', 'controlAssessmentId'));
        }
    }

    public function ccc(Request $request)
    {
        $controlAssessmentId = request('controlAssessmentId');
        $cloudControlType = request('cloudControlType');

        $path = "4-Process/19-NCAReporting/ccc";

        if ($cloudControlType === 'csp') {
            $template = "{$path}/csp/index";
            $pdfTemplate = "{$path}/csp";
        } else {
            $template = "{$path}/cst/index";
            $pdfTemplate = "{$path}/cst";
        }

        $report =  $this->getReport("NCA-CCC-2020", $controlAssessmentId, $cloudControlType);


        if (request()->has('pdf')) {

            $this->generatePdf($pdfTemplate, $report, 'NCA-CCC-Report.pdf');
        } else {

            return view($template, compact('report', 'controlAssessmentId', 'cloudControlType'));
        }
    }

    public function tcc(Request $report)
    {
        $controlAssessmentId = request('controlAssessmentId');
        $report = $this->getReport("NCA-TCC-2021", $controlAssessmentId);
        $path = "4-Process/19-NCAReporting/tcc";

        if (request()->has('pdf')) {

            $this->generatePdf($path, $report, 'NCA-TCC-Report.pdf');
        } else {

            return view("{$path}/index", compact('report', 'controlAssessmentId'));
        }
    }

    public function osmacc()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $isDownloadRequest = request('download');
        $report =  $this->getReport("NCA-OSMACC-2021", $controlAssessmentId);
        $path = "4-Process/19-NCAReporting/osmacc";

        if (request()->has('pdf')) {

            $this->generatePdf($path, $report, 'NCA-OSMACC-Report.pdf');
        } else {

            if ($isDownloadRequest) {
                $htmlContent = view("{$path}/index", compact('report', 'controlAssessmentId'))->render();
                return $htmlContent;
            }

            return view("{$path}/index", compact('report', 'controlAssessmentId'));
        }
    }

    public function dcc()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $report = $this->getReport("NCA-DCC-2022", $controlAssessmentId);
        $path = "4-Process/19-NCAReporting/dcc";

        if (request()->has('pdf')) {
            $this->generatePdf($path, $report, 'NCA-DCC-Report.pdf');
        } else {

            return view("{$path}/index", compact('report', 'controlAssessmentId'));
        }
    }

    public function sama()
    {
        $controlAssessmentId = request('controlAssessmentId');
        $report = $this->getReport("SAMA-CSF-2017", $controlAssessmentId);
        $path = "4-Process/SAMAReporting";

        if (request()->has('pdf')) {
            $this->generatePdf($path, $report, 'SAMA-Report.pdf');
        } else {
            return view("{$path}/index", compact('report', 'controlAssessmentId'));
        }
    }

    private function generatePdf(string $path, Collection $report, string $reportName)
    {
        // Increase PCRE backtrack limit
        ini_set("pcre.backtrack_limit", "5000000");

        $mpdf = new Mpdf(['orientation' => 'L']);

        // Get the HTML content
        $html = view("{$path}/pdf", compact('report'))->render();

        // Split HTML into smaller chunks (e.g. 500KB each)
        $chunks = str_split($html, 500000);

        // Write HTML chunks separately
        foreach ($chunks as $chunk) {
            $mpdf->WriteHTML($chunk);
        }

        // Set the headers to prompt the file download
        return response($mpdf->Output($reportName, 'D'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $reportName . '"');
    }

    private function getReport($bestPracticeId, $controlAssessmentId, string $cloudControlType = null)
    {

        $report = DB::table('control_master_table AS c')
            ->join('control_master_table_vs_best_practice_table AS cv', 'c.control_id', '=', 'cv.control_id')
            ->join('best_practice_table AS bp', 'cv.best_practice_id', '=', 'bp.best_practices_id')
            ->join('control_master_table_vs_domain_table AS cvd', 'c.control_id', '=', 'cvd.control_id')
            ->join('domain_table AS d', 'cvd.main_domain_id', '=', 'd.main_domain_id')
            ->join('control_master_table_vs_sub_domain_table AS cvsd', 'c.control_id', '=', 'cvsd.control_id')
            ->join('sub_domain_table AS sd', 'cvsd.sub_domain_id', '=', 'sd.sub_domain_id')
            ->leftJoin(DB::raw('(
                    SELECT cad.control_id,
                           cad.control_implementation_status,
                           cad.remarks,
                           cad.corrective_action_due_date,
                           cad.corrective_action
                    FROM control_assessment_details_table AS cad
                    INNER JOIN (
                        SELECT control_id, MAX(id) AS max_id
                        FROM control_assessment_details_table
                        GROUP BY control_id
                    ) AS latest_assessment ON cad.control_id = latest_assessment.control_id
                                           AND cad.id = latest_assessment.max_id
                ) AS latest_cad'), 'c.control_id', '=', 'latest_cad.control_id')
            ->where('bp.best_practices_id', '=', $bestPracticeId)
            ->when($cloudControlType, function ($query, $cloudControlType) {
                $query->where('c.control_cloud', $cloudControlType);
            })
            ->select(
                'c.control_id',
                'c.control_name',
                'c.control_description',
                'c.control_description_ar',
                'c.control_level_title',
                'c.sort_order', // Add sort_order to SELECT to fix MySQL 8+ error with DISTINCT
                'bp.best_practices_id',
                'bp.best_practices_name',
                'd.main_domain_id',
                'd.main_domain_name',
                'sd.sub_domain_id',
                'sd.sub_domain_name',
                DB::raw("COALESCE(latest_cad.control_implementation_status, 'Not Implemented') AS status"),
                DB::raw("COALESCE(latest_cad.remarks, '') AS remarks"),
                DB::raw("COALESCE(latest_cad.corrective_action_due_date, '') AS corrective_action_due_date"),
                DB::raw("COALESCE(latest_cad.corrective_action, '') AS corrective_action"),
                DB::raw(
                    "
                    CASE 
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Partially Implemented' THEN 'مطبق جزئيًا'
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Implemented' THEN 'مطبق كليًا'
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Not Implemented' THEN 'غير مطبق'
                        WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Not Applicable' THEN 'لاينطبق'
                        ELSE 'غير مطبق'
                    END AS status_ar"
                )
            )
            ->distinct()
            ->when($bestPracticeId === 'SAMA-CSF-2017', function ($query) {
                return $query->orderBy('c.sort_order');
            }, function ($query) {
                return $query->orderByRaw("
                    CAST(SUBSTRING_INDEX(c.control_id, '-', 1) AS UNSIGNED),
                    CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 3), '-', -1) AS UNSIGNED),
                    COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 4), '-', -1) AS UNSIGNED), 0),
                    COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 5), '-', -1) AS UNSIGNED), 0),
                    COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)
                ");
            })
            ->get();


        // $report = DB::table('control_master_table as c')
        //     ->distinct()
        //     ->join('control_master_table_vs_best_practice_table as cv', 'c.control_id', '=', 'cv.control_id')
        //     ->join('best_practice_table as bp', 'cv.best_practice_id', '=', 'bp.best_practices_id')
        //     ->join('control_master_table_vs_domain_table as cvd', 'c.control_id', '=', 'cvd.control_id')
        //     ->join('domain_table as d', 'cvd.main_domain_id', '=', 'd.main_domain_id')
        //     ->join('control_master_table_vs_sub_domain_table as cvsd', 'c.control_id', '=', 'cvsd.control_id')
        //     ->join('sub_domain_table as sd', 'cvsd.sub_domain_id', '=', 'sd.sub_domain_id')
        //     ->leftJoin('control_assessment_details_table as latest_cad', function ($join) use ($controlAssessmentId) {
        //         $join->on('c.control_id', '=', 'latest_cad.control_id')
        //             ->where('latest_cad.id', '=', DB::raw('(SELECT MAX(id) FROM control_assessment_details_table WHERE control_id = c.control_id AND control_assessment_id = "' . $controlAssessmentId . '")'));
        //     })
        //     // ->leftJoin(
        //     //     DB::raw("(SELECT control_id, MAX(id) AS latest_id FROM control_assessment_details_table GROUP BY control_id) as latest_cad"),
        //     //     'c.control_id',
        //     //     '=',
        //     //     'latest_cad.control_id'
        //     // )
        //     // ->leftJoin('control_assessment_details_table as cad', function ($join) use ($controlAssessmentId) {
        //     //     $join->on('latest_cad.latest_id', '=', 'cad.id')
        //     //         ->where('cad.control_assessment_id', '=', $controlAssessmentId);
        //     // })
        //     ->where('bp.best_practices_id', '=', $bestPracticeId)
        //     ->when($cloudControlType, function ($query, $cloudControlType) {
        //         $query->where('c.control_cloud', $cloudControlType);
        //     })
        //     ->select(
        //         'c.control_id',
        //         'c.control_name',
        //         'c.control_description',
        //         'c.control_description_ar',
        //         'c.control_level_title',
        //         'bp.best_practices_id',
        //         'bp.best_practices_name',
        //         'd.main_domain_id',
        //         'd.main_domain_name',
        //         'sd.sub_domain_id',
        //         'sd.sub_domain_name',
        //         DB::raw("COALESCE(latest_cad.control_implementation_status, 'Not Implemented') as status"),
        //         DB::raw("COALESCE(latest_cad.remarks, '') as remarks"),
        //         DB::raw("COALESCE(latest_cad.corrective_action_due_date, '') as corrective_action_due_date"),
        //         DB::raw("COALESCE(latest_cad.corrective_action, '') as corrective_action"),
        //         DB::raw("
        //     CASE 
        //         WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Partially Implemented' THEN 'مطبق جزئيًا'
        //         WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Implemented' THEN 'مطبق كليًا'
        //         WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Not Implemented' THEN 'غير مطبق'
        //         WHEN COALESCE(latest_cad.control_implementation_status, 'Not Implemented') = 'Not Applicable' THEN 'لاينطبق'
        //         ELSE 'غير مطبق'
        //     END as status_ar
        // ")
        //     )
        //     ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(c.control_id, '-', 1) AS UNSIGNED)"))
        //     ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 3), '-', -1) AS UNSIGNED)"))
        //     ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 4), '-', -1) AS UNSIGNED), 0)"))
        //     ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 5), '-', -1) AS UNSIGNED), 0)"))
        //     ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)"))
        //     ->get();


        return $report;
    }
}
