<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetGroup;
use App\Models\AssetType;
use Illuminate\Support\Facades\DB;
use App\Models\BestPractice;
use App\Models\ControlMaster;
use App\Models\Domain;
use App\Models\Owner;
use App\Models\Risk;
use App\Models\RiskAssessmentDetail;
use App\Models\SubDomain;
use App\Services\PresentationService;
use App\Services\ReportService;
use Illuminate\Http\Request;

class OCDController extends Controller
{
    protected $reportService;
    protected $presentationService;


    public function __construct(ReportService $reportService, PresentationService $presentationService)
    {
        $this->reportService = $reportService;
        $this->presentationService = $presentationService;
    }


    public function dashboard()
    {
        return view('4-Process/18-Reporting/3-Dashboard/4-Dashboard');
    }

    public function index()
    {
        $eccComplianceStatus = $this->reportService->getEccComplianceStatus('NCA-ECC-2018');
        $samaComplianceStatus = $this->reportService->getEccComplianceStatus('SAMA-CSF-2017');

        $assetGroupOverview = $this->reportService->getAssetGroupData();

        $bestPracticesComplainceStatus = $this->reportService->getBestPracticeData();

        $ownerControlsStatus = $this->reportService->getControlOwnersData();

        $assetTechData = $this->reportService->getAssetByTechData();

        $evidenceSummary = $this->reportService->getEvidenceByBestPractices();

        $riskStatus = $this->reportService->getRiskStatusData();

        $riskVsAssetGroup = $this->reportService->getAssetGroupRiskStatus();
        // return $riskVsAssetGroup;

        $assetCountByTech = $this->reportService->getAssetCountByTech();

        $riskCountByTech = $this->reportService->getRiskCountByTech();

        $controlCountByTech = $this->reportService->getControlCountByTech();
        $samaControlCountByTech = $this->reportService->getSamaControlCountByTech();

        $samaControlCountByMaturityLevel = $this->reportService->getSamaControlCountByMaturityLevel();

        $heatmap = $this->reportService->getHeatmapData();

        

        return view(
            '4-Process/18-Reporting/3-Dashboard/index',
            compact('eccComplianceStatus', 'samaComplianceStatus', 'assetGroupOverview', 'bestPracticesComplainceStatus', 'ownerControlsStatus', 'assetTechData', 'evidenceSummary', 'riskStatus', 'riskVsAssetGroup', 'riskCountByTech', 'controlCountByTech', 'assetCountByTech', 'samaControlCountByTech', 'samaControlCountByMaturityLevel', 'heatmap')
        );
    }

    function samaMaturityLevel(int $level)
    {

        $controls = DB::table('best_practice_table as b')
            ->join('control_assessment_master_table as ca', 'ca.best_practices_id', '=', 'b.best_practices_id')
            ->join('control_assessment_details_table as cad', 'cad.control_assessment_id', '=', 'ca.control_assessment_id')
            ->join('control_master_table as c', 'c.control_id', '=', 'cad.control_id')
            ->join(DB::raw('(
        SELECT cad1.control_id, cad1.control_implementation_status
        FROM control_assessment_details_table AS cad1
        JOIN (
            SELECT control_id, MAX(id) AS latest_id
            FROM control_assessment_details_table
            GROUP BY control_id
        ) AS cad2 ON cad1.control_id = cad2.control_id AND cad1.id = cad2.latest_id
    ) AS cad_latest'), 'cad.control_id', '=', 'cad_latest.control_id') // Get only latest status
            ->where('b.best_practices_id', 'SAMA-CSF-2017')
            ->where('cad.control_maturity_level', $level)
            ->selectRaw("
        COUNT(c.control_id) AS total_controls,
        COUNT(CASE WHEN cad_latest.control_implementation_status = 'Implemented' THEN 1 END) AS implemented,
        COUNT(CASE WHEN cad_latest.control_implementation_status = 'Partially Implemented' THEN 1 END) AS partially_implemented,
        COUNT(CASE WHEN cad_latest.control_implementation_status = 'Not Applicable' THEN 1 END) AS not_applicable,
        COUNT(CASE WHEN cad_latest.control_implementation_status IS NULL OR cad_latest.control_implementation_status NOT IN ('Implemented', 'Partially Implemented', 'Not Applicable') THEN 1 END) AS not_implemented
    ")
            ->first();

        return view('4-Process/18-Reporting/3-Dashboard/4-SAMAControlDashboard', compact(
            'controls',
            'level'
        ));
    }

    public function samaMaturityLevelDetails(int $level)
    {
        $status = $this->_getStatusCode();

        $controls = DB::table('control_master_table as c')
            ->join('owner_role_table as ort', 'c.owner_id', '=', 'ort.owner_role_id')
            ->join('owner_table as o', 'ort.owner_role_id', '=', 'o.owner_role_id')
            ->join('control_master_table_vs_custodian_role_table as cvc', 'c.control_id', '=', 'cvc.control_id')
            ->join('custodian_name_table as ct', 'cvc.custodian_id', '=', 'ct.custodian_role_id')
            ->leftJoin(DB::raw('(
        SELECT 
            cad1.control_id, 
            cad1.control_implementation_status, 
            cad1.control_assessment_id
        FROM 
            control_assessment_details_table AS cad1
        JOIN (
            SELECT 
                control_id, 
                MAX(id) AS latest_id
            FROM 
                control_assessment_details_table
            GROUP BY 
                control_id
        ) AS cad2 ON cad1.control_id = cad2.control_id AND cad1.id = cad2.latest_id
    ) as cad_latest'), 'c.control_id', '=', 'cad_latest.control_id')
            ->join('control_assessment_details_table as cad', 'cad.control_id', '=', 'c.control_id') // Correct join for maturity level
            ->select(
                'c.control_id',
                'o.owner_name',
                'o.owner_id',
                DB::raw('COALESCE(cad_latest.control_implementation_status, "Not Implemented") as status'),
                'cad_latest.control_assessment_id',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/custodian-table/", ct.custodian_name_id, "\' >", ct.custodian_name_name, "</a>") SEPARATOR "<br>") as custodians')
                // DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/storage/files/", af.path, "\' >", "View Attachments", "</a>") SEPARATOR "<br>") as evidences')
            )
            ->where('cad.control_maturity_level', $level)->where('c.control_id', 'LIKE', 'SAMA-CSF-%')
            ->when($status, function ($query, $status) {
                return $query->whereRaw('COALESCE(cad_latest.control_implementation_status, "Not Implemented") = ?', [$status]);
            })
            ->groupBy(
                'c.control_id',
                'o.owner_name',
                'o.owner_id',
                'cad_latest.control_assessment_id',
                'cad_latest.control_implementation_status'
            )
            ->get();


        if (request()->wantsJson()) {
            return response()->json($controls);
        }

        return view('4-Process/18-Reporting/3-Dashboard/4-ControlOwnerDashboard', compact('controls'));

        return $controls;
    }


    function domain($bestPractice)
    {

        $bestPractice = BestPractice::select('best_practices_id')->where('best_practices_name', $bestPractice)
            ->firstOrFail();

        $result = DB::table('domain_table as d')
            ->join('best_practice_vs_domain_table as bvd', 'd.main_domain_id', '=', 'bvd.main_domain_id')
            ->join('best_practice_table as b', 'bvd.best_practices_id', '=', 'b.best_practices_id')
            ->join('control_master_table_vs_domain_table as cvd', 'd.main_domain_id', '=', 'cvd.main_domain_id')
            ->join('control_master_table as c', 'cvd.control_id', '=', 'c.control_id')
            ->leftJoin(DB::raw('(SELECT cad1.control_id, cad1.control_implementation_status
                FROM control_assessment_details_table AS cad1
                JOIN (
                    SELECT control_id, MAX(id) AS latest_id
                    FROM control_assessment_details_table
                    GROUP BY control_id
                ) AS cad2 ON cad1.control_id = cad2.control_id AND cad1.id = cad2.latest_id
            ) AS cad_latest'), 'c.control_id', '=', 'cad_latest.control_id')
            ->select(
                'd.main_domain_id',
                'd.main_domain_name',
                DB::raw('COUNT(c.control_id) AS total_controls'),
                DB::raw('COUNT(CASE WHEN cad_latest.control_implementation_status = "Implemented" THEN 1 END) AS implemented'),
                DB::raw('COUNT(CASE WHEN cad_latest.control_implementation_status = "Partially Implemented" THEN 1 END) AS partially_implemented'),
                DB::raw('COUNT(CASE WHEN cad_latest.control_implementation_status = "Not Applicable" THEN 1 END) AS not_applicable'),
                DB::raw(
                    'COUNT(c.control_id) - 
                         COUNT(CASE WHEN cad_latest.control_implementation_status = "Implemented" THEN 1 END) - 
                         COUNT(CASE WHEN cad_latest.control_implementation_status = "Partially Implemented" THEN 1 END) - 
                         COUNT(CASE WHEN cad_latest.control_implementation_status = "Not Applicable" THEN 1 END) AS not_implemented'
                )
            )
            ->where('b.best_practices_id', $bestPractice->best_practices_id)
            ->groupBy('d.main_domain_id', 'd.main_domain_name')
            ->get();



        $domain_names = $result->pluck('main_domain_name');
        $domain_ids = $result->pluck('main_domain_id');
        $countrols_count = $result->pluck('total_controls');
        $implemented_count = $result->pluck('implemented');
        $partially_implemented_count = $result->pluck('partially_implemented');
        $not_implemented_count = $result->pluck('not_implemented');
        $not_applicable_count = $result->pluck('not_applicable');

        return view('4-Process/18-Reporting/3-Dashboard/4-DomainControlDashboard', compact(
            'domain_names',
            'domain_ids',
            'countrols_count',
            'implemented_count',
            'not_implemented_count',
            'partially_implemented_count',
            'not_applicable_count',
        ));
    }

    function subdomain($domainId)
    {
        $result = DB::table('sub_domain_table as d')
            ->join('control_master_table_vs_sub_domain_table as cvd', 'd.sub_domain_id', '=', 'cvd.sub_domain_id')
            ->join('control_master_table as c', 'cvd.control_id', '=', 'c.control_id')
            ->leftJoin(DB::raw('(
        SELECT cad1.control_id, cad1.control_implementation_status
        FROM control_assessment_details_table AS cad1
        JOIN (
            SELECT control_id, MAX(id) AS latest_id
            FROM control_assessment_details_table
            GROUP BY control_id
        ) AS cad2 ON cad1.control_id = cad2.control_id AND cad1.id = cad2.latest_id
        ) AS cad_latest'), 'c.control_id', '=', 'cad_latest.control_id')
            ->select(
                'd.sub_domain_id',
                'd.sub_domain_name',
                DB::raw('COUNT(c.control_id) AS controls_count'),
                DB::raw('COUNT(CASE WHEN cad_latest.control_implementation_status = "Implemented" THEN 1 END) AS implemented'),
                DB::raw('COUNT(CASE WHEN cad_latest.control_implementation_status = "Partially Implemented" THEN 1 END) AS partially_implemented'),
                DB::raw('COUNT(CASE WHEN cad_latest.control_implementation_status = "Not Applicable" THEN 1 END) AS not_applicable'),
                DB::raw(
                    '
            COUNT(c.control_id) - 
            COUNT(CASE WHEN cad_latest.control_implementation_status = "Implemented" THEN 1 END) - 
            COUNT(CASE WHEN cad_latest.control_implementation_status = "Partially Implemented" THEN 1 END) - 
            COUNT(CASE WHEN cad_latest.control_implementation_status = "Not Applicable" THEN 1 END) AS not_implemented'
                )
            )
            ->whereRaw("d.main_domain_id COLLATE utf8mb4_unicode_ci = ?", [$domainId])
            ->groupBy('d.sub_domain_id', 'd.sub_domain_name')
            ->get();


        // return $result;
        $sub_domain_id    = $result->pluck('sub_domain_id');
        $subdomain_names    = $result->pluck('sub_domain_name');
        $controls_count = $result->pluck('controls_count');
        $implemented = $result->pluck('implemented');
        $partially_implemented = $result->pluck('partially_implemented');
        $not_applicable = $result->pluck('not_applicable');
        $not_implemented = $result->pluck('not_implemented');


        return view('4-Process/18-Reporting/3-Dashboard/4-SubDomainControlDashboard', compact(
            'sub_domain_id',
            'subdomain_names',
            'controls_count',
            'implemented',
            'partially_implemented',
            'not_applicable',
            'not_implemented'
        ));
    }

    private function _getStatusCode()
    {
        $statusCode = request('status');
        $status = null;

        switch ($statusCode) {
            case '1':
                $status = 'Implemented';
                break;
            case '2':
                $status = 'Not Implemented';
                break;
            case '3':
                $status = 'Partially Implemented';
                break;
            case '4':
                $status = 'Not Applicable';
                break;
        }
        return $status;
    }

    public function owner($subdomainId)
    {
        $status = $this->_getStatusCode();

        $controls = DB::table('control_master_table as c')
            ->join('owner_role_table as ort', 'c.owner_id', '=', 'ort.owner_role_id')
            ->join('owner_table as o', 'ort.owner_role_id', '=', 'o.owner_role_id')
            ->join('control_master_table_vs_custodian_role_table as cvc', 'c.control_id', '=', 'cvc.control_id')
            ->join('custodian_name_table as ct', 'cvc.custodian_id', '=', 'ct.custodian_role_id')
            ->join('control_master_table_vs_sub_domain_table as cvd', 'c.control_id', '=', 'cvd.control_id')
            ->join('sub_domain_table as d', 'cvd.sub_domain_id', '=', 'd.sub_domain_id')
            ->leftJoin('evidence_vs_control_table as evc', 'c.control_id', '=', 'evc.control_id')
            ->leftJoin('evidence_table as e', 'evc.evidence_id', '=', 'e.evidence_id')
            ->leftJoin('evidence_vs_artifact_table as eva', 'e.evidence_id', '=', 'eva.evidence_id')
            ->leftJoin('artifact_table as att', 'eva.artifact_id', '=', 'att.artifact_id')
            ->leftJoin('artifact_attachments as af', 'att.id', '=', 'af.artifact_id')
            ->leftJoin(DB::raw('(
            SELECT 
                cad1.control_id, 
                cad1.control_implementation_status, 
                cad1.control_assessment_id
            FROM 
                control_assessment_details_table AS cad1
            JOIN (
                SELECT 
                    control_id, 
                    MAX(id) AS latest_id
                FROM 
                    control_assessment_details_table
                GROUP BY 
                    control_id
            ) AS cad2 ON cad1.control_id = cad2.control_id AND cad1.id = cad2.latest_id
        ) as cad_latest'), 'c.control_id', '=', 'cad_latest.control_id')
            ->select(
                'c.control_id',
                'o.owner_name',
                'o.owner_id',
                DB::raw('COALESCE(cad_latest.control_implementation_status, "Not Implemented") as status'),
                'cad_latest.control_assessment_id',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/custodian-table/", ct.custodian_name_id, "\' >", ct.custodian_name_name, "</a>") SEPARATOR "<br>") as custodians'),
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/storage/files/", af.path, "\' >", "View Attachments", "</a>") SEPARATOR "<br>") as evidences')
            )
            ->where('d.sub_domain_id', $subdomainId)
            ->when($status, function ($query, $status) {
                return $query->whereRaw('COALESCE(cad_latest.control_implementation_status, "Not Implemented") = ?', [$status]);
            })

            ->groupBy(
                'c.control_id',
                'o.owner_name',
                'o.owner_id',
                'cad_latest.control_assessment_id',
                'cad_latest.control_implementation_status'
            )
            ->get();

        if (request()->wantsJson()) {
            return response()->json($controls);
        }

        return view('4-Process/18-Reporting/3-Dashboard/4-ControlOwnerDashboard', compact('controls'));

        return $controls;
    }

    function ownerControls($ownerId)
    {
        $owner = DB::table('owner_table')->select('owner_name', 'owner_id')->where('owner_role_id', '=', $ownerId)->get();

        $status = $this->_getStatusCode();


        $recentControlAssessments = DB::table('control_assessment_details_table')
            ->select('control_id', 'control_implementation_status', 'control_assessment_id')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('control_assessment_details_table')
                    ->groupBy('control_id');
            });


        $controls = Owner::join('control_master_table as c', 'owner_table.owner_role_id', '=', 'c.owner_id')
            ->join('control_master_table_vs_custodian_role_table as cvc', 'c.control_id', '=', 'cvc.control_id')
            ->join('custodian_name_table as cn', 'cvc.custodian_id', '=', 'cn.custodian_role_id')
            ->leftJoinSub(
                DB::table('control_assessment_details_table')
                    ->selectRaw('MAX(id) AS id, control_id')
                    ->groupBy('control_id'),
                'cad_max',
                'c.control_id',
                '=',
                'cad_max.control_id'
            )
            ->leftJoin('control_assessment_details_table as cad', 'cad.id', '=', 'cad_max.id')
            ->select(
                'owner_table.owner_id',
                'owner_table.owner_name',
                'c.control_id',
                DB::raw('COALESCE(cad.control_implementation_status, "Not Implemented") as status'),
                DB::raw('GROUP_CONCAT(CONCAT("<a href=\'/custodian-table/", cn.custodian_name_id, "\' >",cn.custodian_name_name, "</a>") SEPARATOR "<br>") as custodians'),
                DB::raw('COALESCE(cad.control_assessment_id, "#") as control_assessment_id')
                // DB::raw('GROUP_CONCAT(cn.custodian_name_name) as custodians')
            )
            ->where('owner_table.owner_role_id', $ownerId)
            ->when($status, function ($query, $status) {
                return $query->whereRaw('COALESCE(cad.control_implementation_status, "Not Implemented") = ?', [$status]);
            })
            ->groupBy(
                'control_assessment_id',
                'owner_table.owner_id',
                'owner_table.owner_name',
                'c.control_id',
                'cad.control_implementation_status'
            )
            ->get();





        $controlsCount = Owner::join('control_master_table as c', 'owner_table.owner_role_id', '=', 'c.owner_id')
            ->join('control_master_table_vs_custodian_role_table as cvc', 'c.control_id', '=', 'cvc.control_id')
            ->join('custodian_name_table as cn', 'cvc.custodian_id', '=', 'cn.custodian_role_id')
            ->leftJoin(
                DB::raw('(SELECT MAX(id) as id, control_id FROM control_assessment_details_table GROUP BY control_id) as cad_max'),
                'c.control_id',
                '=',
                'cad_max.control_id'
            )
            ->leftJoin('control_assessment_details_table as cad', 'cad.id', '=', 'cad_max.id')
            ->select(
                'owner_table.owner_id',
                'owner_table.owner_name',
                DB::raw('COUNT(c.control_id) as total_controls'),
                DB::raw('COUNT(CASE WHEN cad.control_implementation_status = "Implemented" THEN 1 END) as implemented'),
                DB::raw('COUNT(CASE WHEN cad.control_implementation_status = "Partially Implemented" THEN 1 END) as partially_implemented'),
                DB::raw('COUNT(CASE WHEN cad.control_implementation_status = "Not Applicable" THEN 1 END) as not_applicable'),
                DB::raw('COUNT(c.control_id) - 
                             COUNT(CASE WHEN cad.control_implementation_status = "Implemented" THEN 1 END) - 
                             COUNT(CASE WHEN cad.control_implementation_status = "Partially Implemented" THEN 1 END) - 
                             COUNT(CASE WHEN cad.control_implementation_status = "Not Applicable" THEN 1 END) AS not_implemented')
            )
            ->where('owner_table.owner_role_id', $ownerId)
            ->groupBy('owner_table.owner_id', 'owner_table.owner_name')
            ->get();





        if (request()->wantsJson()) {
            return response()->json($controls);
        }

        $totalControlsCount = count($controls);

        return view('4-Process/18-Reporting/3-Dashboard/4-OwnerControlDashboard', compact('controls', 'controlsCount', 'totalControlsCount', 'ownerId', 'owner'));
    }

    function riskDomain()
    {

        $latestAssessments = DB::table('risk_assessment_details_table as rad')
            ->select('rad.risk_id', 'rad.implementation_status')
            ->join(DB::raw('(SELECT risk_id, MAX(id) as latest_id 
                FROM risk_assessment_details_table 
                GROUP BY risk_id) as latest'), function ($join) {
                $join->on('rad.risk_id', '=', 'latest.risk_id')
                    ->on('rad.id', '=', 'latest.latest_id');
            });


        $domainRisksCount = DB::table('category_table as c')
            ->join('risk_master_table_vs_category_table as rvc', 'c.category_id', '=', 'rvc.category_id')
            ->join('risk_master_table as r', 'rvc.risk_id', '=', 'r.risk_id')
            ->join('category_table_vs_sub_domain_table as cvs', 'c.category_id', '=', 'cvs.category_id')
            ->join('sub_domain_table as s', 'cvs.sub_domain_id', '=', 's.sub_domain_id')
            ->join('domain_table as d', 's.main_domain_id', '=', 'd.main_domain_id')
            ->leftJoinSub($latestAssessments, 'la', function ($join) {
                $join->on('r.risk_id', '=', 'la.risk_id');
            })
            ->select(
                'd.main_domain_id',
                'd.main_domain_name',
                DB::raw('COUNT(r.risk_id) AS total_risks'),
                DB::raw('COUNT(CASE WHEN la.implementation_status = "Close" THEN 1 END) AS closed_risks'),
                DB::raw('COUNT(CASE WHEN la.implementation_status = "Open" OR la.implementation_status IS NULL THEN 1 END) AS open_risks')
            )
            ->groupBy('d.main_domain_id', 'd.main_domain_name')
            ->get();



        $domainIds = $domainRisksCount->pluck('main_domain_id');
        $domainNames = $domainRisksCount->pluck('main_domain_name');
        $totalRisks = $domainRisksCount->pluck('total_risks');
        $totalRisksOpen = $domainRisksCount->pluck('open_risks');
        $totalRisksClose = $domainRisksCount->pluck('close_risks');


        return view('4-Process/18-Reporting/3-Dashboard/4-DomainRiskDashboard', compact(
            'domainIds',
            'domainNames',
            'totalRisks',
            'totalRisksOpen',
            'totalRisksClose',
            'domainRisksCount',
        ));
    }

    function riskSubdomain($domainId)
    {
        $latestAssessments = DB::table('risk_assessment_details_table as rad')
            ->select('rad.risk_id', 'rad.implementation_status')
            ->join(DB::raw('(SELECT risk_id, MAX(id) as latest_id 
                FROM risk_assessment_details_table 
                GROUP BY risk_id) as latest'), function ($join) {
                $join->on('rad.risk_id', '=', 'latest.risk_id')
                    ->on('rad.id', '=', 'latest.latest_id');
            });

        $domainRisksCount = DB::table('category_table as c')
            ->join('risk_master_table_vs_category_table as rvc', 'c.category_id', '=', 'rvc.category_id')
            ->join('risk_master_table as r', 'rvc.risk_id', '=', 'r.risk_id')
            ->join('category_table_vs_sub_domain_table as cvs', 'c.category_id', '=', 'cvs.category_id')
            ->join('sub_domain_table as s', 'cvs.sub_domain_id', '=', 's.sub_domain_id')
            ->join('domain_table as d', 's.main_domain_id', '=', 'd.main_domain_id')
            ->leftJoinSub($latestAssessments, 'la', function ($join) {
                $join->on('r.risk_id', '=', 'la.risk_id');
            })
            ->select(
                's.sub_domain_id',
                's.sub_domain_name',
                DB::raw('COUNT(r.risk_id) AS total_risks'),
                DB::raw('COUNT(CASE WHEN la.implementation_status = "Close" THEN 1 END) AS closed_risks'),
                DB::raw('COUNT(CASE WHEN la.implementation_status = "Open" OR la.implementation_status IS NULL THEN 1 END) AS open_risks')
            )
            ->where('s.main_domain_id', $domainId)
            ->groupBy('s.sub_domain_id', 'S.sub_domain_name')
            ->get();


        $domainIds = $domainRisksCount->pluck('sub_domain_id');
        $domainNames = $domainRisksCount->pluck('sub_domain_name');
        $totalRisks = $domainRisksCount->pluck('total_risks');
        $totalRisksOpen = $domainRisksCount->pluck('open_risks');
        $totalRisksClose = $domainRisksCount->pluck('close_risks');


        return view('4-Process/18-Reporting/3-Dashboard/4-SubdomainRiskDashboard', compact(
            'domainIds',
            'domainNames',
            'totalRisks',
            'totalRisksOpen',
            'totalRisksClose',
            'domainRisksCount',
        ));
    }

    function riskOwners($subdomainId)
    {

        $ownerRisksCount = DB::table('category_table as c')
            ->join('risk_master_table_vs_category_table as rvc', 'c.category_id', '=', 'rvc.category_id')
            ->join('risk_master_table as r', 'rvc.risk_id', '=', 'r.risk_id')
            ->join('category_table_vs_sub_domain_table as cvs', 'c.category_id', '=', 'cvs.category_id')
            ->join('sub_domain_table as s', 'cvs.sub_domain_id', '=', 's.sub_domain_id')
            ->join('domain_table as d', 's.main_domain_id', '=', 'd.main_domain_id')
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->leftJoin('risk_master_table_vs_custodian_role_table as rvcu', 'r.risk_id', '=', 'rvcu.risk_id')
            ->leftJoin('custodian_name_table as cu', 'rvcu.custodian_id', '=', 'cu.custodian_role_id')
            ->leftJoin(
                DB::raw('(SELECT rad.risk_id, rad.implementation_status
                  FROM risk_assessment_details_table rad
                  JOIN (SELECT risk_id, MAX(id) AS latest_id
                        FROM risk_assessment_details_table
                        GROUP BY risk_id) latest 
                        ON rad.risk_id = latest.risk_id AND rad.id = latest.latest_id) AS la'),
                'r.risk_id',
                '=',
                'la.risk_id'
            )
            ->where('s.sub_domain_id', $subdomainId)
            ->select(
                'r.owner_id',
                'o.owner_name',
                DB::raw('GROUP_CONCAT(DISTINCT cu.custodian_name_name) AS custodians'),
                DB::raw('COUNT(DISTINCT r.risk_id) AS total_risks'),
                DB::raw('COUNT(DISTINCT CASE WHEN la.implementation_status = "Close" THEN r.risk_id END) AS closed_risks'),
                DB::raw('COUNT(DISTINCT CASE WHEN la.implementation_status = "Open" OR la.implementation_status IS NULL THEN r.risk_id END) AS open_risks')
            )
            ->groupBy('r.owner_id', 'o.owner_name')
            ->get();


        $ownerId = $ownerRisksCount->pluck('owner_id');
        $ownerNames = $ownerRisksCount->pluck('owner_name');
        $totalRisks = $ownerRisksCount->pluck('total_risks');
        $totalRisksOpen = $ownerRisksCount->pluck('open_risks');
        $totalRisksClose = $ownerRisksCount->pluck('closed_risks');


        return view('4-Process/18-Reporting/3-Dashboard/4-OwnerRiskDashboard', compact(
            'ownerId',
            'ownerNames',
            'totalRisks',
            'totalRisksOpen',
            'totalRisksClose',
        ));
    }

    function riskOwner($ownerId)
    {

        $ownerRisksCount = DB::table('category_table as c')
            ->join('risk_master_table_vs_category_table as rvc', 'c.category_id', '=', 'rvc.category_id')
            ->join('risk_master_table as r', 'rvc.risk_id', '=', 'r.risk_id')
            ->join('category_table_vs_sub_domain_table as cvs', 'c.category_id', '=', 'cvs.category_id')
            ->join('sub_domain_table as s', 'cvs.sub_domain_id', '=', 's.sub_domain_id')
            ->join('domain_table as d', 's.main_domain_id', '=', 'd.main_domain_id')
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->leftJoin('risk_master_table_vs_custodian_role_table as rvcu', 'r.risk_id', '=', 'rvcu.risk_id')
            ->leftJoin('custodian_name_table as cu', 'rvcu.custodian_id', '=', 'cu.custodian_role_id')
            ->leftJoin(
                DB::raw('(SELECT rad.risk_id, rad.implementation_status
                  FROM risk_assessment_details_table rad
                  JOIN (SELECT risk_id, MAX(id) AS latest_id
                        FROM risk_assessment_details_table
                        GROUP BY risk_id) latest 
                        ON rad.risk_id = latest.risk_id AND rad.id = latest.latest_id) AS la'),
                'r.risk_id',
                '=',
                'la.risk_id'
            )
            ->where('r.owner_id', $ownerId)
            ->select(
                'r.owner_id',
                'o.owner_name',
                DB::raw('GROUP_CONCAT(DISTINCT cu.custodian_name_name) AS custodians'),
                DB::raw('COUNT(DISTINCT r.risk_id) AS total_risks'),
                DB::raw('COUNT(DISTINCT CASE WHEN la.implementation_status = "Close" THEN r.risk_id END) AS closed_risks'),
                DB::raw('COUNT(DISTINCT CASE WHEN la.implementation_status = "Open" OR la.implementation_status IS NULL THEN r.risk_id END) AS open_risks')
            )
            ->groupBy('r.owner_id', 'o.owner_name')
            ->get();





        $risks = DB::table('category_table as c')
            ->join('risk_master_table_vs_category_table as rvc', 'c.category_id', '=', 'rvc.category_id')
            ->join('risk_master_table as r', 'rvc.risk_id', '=', 'r.risk_id')
            ->join('category_table_vs_sub_domain_table as cvs', 'c.category_id', '=', 'cvs.category_id')
            ->join('sub_domain_table as s', 'cvs.sub_domain_id', '=', 's.sub_domain_id')
            ->join('domain_table as d', 's.main_domain_id', '=', 'd.main_domain_id')
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->join('risk_master_table_vs_custodian_role_table as rvcu', 'r.risk_id', '=', 'rvcu.risk_id')
            ->join('custodian_name_table as cu', 'rvcu.custodian_id', '=', 'cu.custodian_role_id')
            ->join('risk_vs_control_table as rvco', 'r.risk_id', '=', 'rvco.risk_id')
            ->join('control_master_table as co', 'rvco.control_id', '=', 'co.control_id')
            ->leftJoin(
                DB::raw('(SELECT rad.risk_id, rad.implementation_status, rad.risk_assessment_id
                  FROM risk_assessment_details_table AS rad
                  JOIN (SELECT risk_id, MAX(id) AS latest_id
                        FROM risk_assessment_details_table
                        GROUP BY risk_id) AS latest 
                        ON rad.risk_id = latest.risk_id AND rad.id = latest.latest_id) AS la'),
                'r.risk_id',
                '=',
                'la.risk_id'
            )
            ->where('r.owner_id', $ownerId)
            ->groupBy('r.risk_id', 'r.risk_name', 'la.implementation_status', 'la.risk_assessment_id', 'o.owner_id', 'o.owner_name')
            ->select(
                'r.risk_id',
                'r.risk_name',
                'la.implementation_status',
                'la.risk_assessment_id',
                'o.owner_name',
                'o.owner_id',
                DB::raw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/custodian-table/", cu.custodian_name_id, "\' >",cu.custodian_name_name, "</a>") SEPARATOR "<br>") AS custodians')

            )
            ->get();
        // return $risks;
        $ownerId = $ownerRisksCount->pluck('owner_id');
        $ownerNames = $ownerRisksCount->pluck('owner_name');
        $totalRisks = $ownerRisksCount->pluck('total_risks');
        $totalRisksOpen = $ownerRisksCount->pluck('open_risks');
        $totalRisksClose = $ownerRisksCount->pluck('closed_risks');


        return view('4-Process/18-Reporting/3-Dashboard/4-OwnerCustodiansRiskDashboard', compact(
            'risks',
            'ownerId',
            'ownerNames',
            'totalRisks',
            'totalRisksOpen',
            'totalRisksClose',
        ));
    }

    function assetType($groupId)
    {
        $assets = AssetType::select('asset_type_table.asset_type_id', 'asset_type_table.asset_type_name', DB::raw('COUNT(a.asset_id) as total_assets'))
            ->join('asset_register_table as a', 'asset_type_table.asset_type_id', '=', 'a.asset_type_id')
            ->join('asset_group_table as ag', 'ag.asset_group_id', '=', 'a.asset_group_id')
            ->where('ag.asset_group_id', $groupId)
            ->groupBy('asset_type_table.asset_type_id', 'asset_type_table.asset_type_name')
            ->get();

        $assetTypeIds = $assets->pluck('asset_type_id');
        $assetTypeLabels = $assets->pluck('asset_type_name');
        $assetsCount = $assets->pluck('total_assets');

        return view('4-Process/18-Reporting/3-Dashboard/4-AssetTypelDashboard', compact(
            'assetTypeIds',
            'assetTypeLabels',
            'assetsCount',
        ));
    }

    function domainEvidence($bestPracticeId)
    {
        $domainVsEvidence = Domain::select('domain_table.main_domain_name', 'domain_table.main_domain_id')
            ->selectRaw('COUNT(evidence_table.evidence_id) as evidence_count')
            ->join('best_practice_vs_domain_table', 'domain_table.main_domain_id', '=', 'best_practice_vs_domain_table.main_domain_id')
            ->join('best_practice_table', 'best_practice_vs_domain_table.best_practices_id', '=', 'best_practice_table.best_practices_id')
            ->join('control_master_table_vs_domain_table', 'domain_table.main_domain_id', '=', 'control_master_table_vs_domain_table.main_domain_id')
            ->join('control_master_table', 'control_master_table_vs_domain_table.control_id', '=', 'control_master_table.control_id')
            ->leftJoin('evidence_vs_control_table', 'control_master_table.control_id', '=', 'evidence_vs_control_table.control_id')
            ->leftJoin('evidence_table', 'evidence_vs_control_table.evidence_id', '=', 'evidence_table.evidence_id')
            ->where('best_practice_table.best_practices_id', $bestPracticeId)
            ->groupBy('domain_table.main_domain_name', 'domain_table.main_domain_id')
            ->distinct()
            ->get();

        $domains = $domainVsEvidence->pluck('main_domain_name');
        $domainIds = $domainVsEvidence->pluck('main_domain_id');
        $evidenceCount = $domainVsEvidence->pluck('evidence_count');

        return view('4-Process/18-Reporting/3-Dashboard/1-evidence/DomainlDashboard', compact(
            'domains',
            'domainIds',
            'evidenceCount'
        ));
    }

    function subdomainEvidence($domainId)
    {
        $subdomainVsEvidence = SubDomain::selectRaw('DISTINCT SUBSTRING(sub_domain_table.sub_domain_name, 1, 29) as sub_domain_name')
            ->addSelect('sub_domain_table.sub_domain_id')
            ->selectRaw('COUNT(evidence_table.evidence_id) as evidence_count')
            ->join('control_master_table_vs_sub_domain_table', 'sub_domain_table.sub_domain_id', '=', 'control_master_table_vs_sub_domain_table.sub_domain_id')
            ->join('control_master_table', 'control_master_table_vs_sub_domain_table.control_id', '=', 'control_master_table.control_id')
            ->leftJoin('evidence_vs_control_table', 'control_master_table.control_id', '=', 'evidence_vs_control_table.control_id')
            ->leftJoin('evidence_table', 'evidence_vs_control_table.evidence_id', '=', 'evidence_table.evidence_id')
            ->where('sub_domain_table.main_domain_id', $domainId)
            ->groupBy('sub_domain_table.sub_domain_name', 'sub_domain_table.sub_domain_id')
            ->get();

        $subdomains = $subdomainVsEvidence->pluck('sub_domain_name');
        $subdomainIds = $subdomainVsEvidence->pluck('sub_domain_id');
        $evidenceCount = $subdomainVsEvidence->pluck('evidence_count');

        return view('4-Process/18-Reporting/3-Dashboard/1-evidence/SubDomainlDashboard', compact(
            'subdomains',
            'subdomainIds',
            'evidenceCount'
        ));
    }

    function controlEvidence($subdomainId)
    {
        $status = $this->_getStatusCode();

        $controlsCount = ControlMaster::select(
            DB::raw('COUNT(DISTINCT c.control_id) AS total_controls'),
            DB::raw('COUNT(DISTINCT CASE WHEN ca.control_implementation_status = "Implemented" THEN c.control_id END) AS implemented'),
            DB::raw('COUNT(DISTINCT CASE WHEN ca.control_implementation_status = "Not Implemented" OR ca.control_implementation_status IS NULL THEN c.control_id END) AS not_implemented'),
            DB::raw('COUNT(DISTINCT CASE WHEN ca.control_implementation_status = "Partially Implemented" THEN c.control_id END) AS partially_implemented'),
            DB::raw('COUNT(DISTINCT CASE WHEN ca.control_implementation_status = "Not Applicable" THEN c.control_id END) AS not_applicable')
        )
            ->from('control_master_table AS c')
            ->join('control_master_table_vs_sub_domain_table AS cvs', 'c.control_id', '=', 'cvs.control_id')
            ->join('sub_domain_table AS s', 'cvs.sub_domain_id', '=', 's.sub_domain_id')
            ->join('evidence_vs_control_table AS evc', 'c.control_id', '=', 'evc.control_id')
            ->join('evidence_table AS e', 'evc.evidence_id', '=', 'e.evidence_id')
            ->leftJoin('control_assessment_details_table AS ca', 'c.control_id', '=', 'ca.control_id')
            ->where('s.sub_domain_id', $subdomainId)
            ->first();


        $controls = ControlMaster::select(
            'control_master_table.control_id',
            'control_master_table.control_name',
            'owner_table.owner_id',
            DB::raw('COALESCE(cad.control_implementation_status, "Not Implemented") as status'),
            'owner_table.owner_name'
        )
            ->selectRaw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/custodian-table/", custodian_name_table.custodian_name_id, "\' >", custodian_name_table.custodian_name_name, "</a>") SEPARATOR "<br>") as custodians')
            ->selectRaw('GROUP_CONCAT(DISTINCT CONCAT("<a href=\'/storage/files/", artifact_attachments.path, "\' >", "View Attachments", "</a>") SEPARATOR "<br>") as evidences')
            ->join('control_master_table_vs_sub_domain_table', 'control_master_table.control_id', '=', 'control_master_table_vs_sub_domain_table.control_id')
            ->join('sub_domain_table', 'control_master_table_vs_sub_domain_table.sub_domain_id', '=', 'sub_domain_table.sub_domain_id')
            ->leftJoin('evidence_vs_control_table', 'control_master_table.control_id', '=', 'evidence_vs_control_table.control_id')
            ->leftJoin('evidence_table', 'evidence_vs_control_table.evidence_id', '=', 'evidence_table.evidence_id')
            ->leftJoin('evidence_vs_artifact_table', 'evidence_table.evidence_id', '=', 'evidence_vs_artifact_table.evidence_id')
            ->leftJoin('artifact_table', 'evidence_vs_artifact_table.artifact_id', '=', 'artifact_table.artifact_id')
            ->leftJoin('artifact_attachments', 'artifact_table.id', '=', 'artifact_attachments.artifact_id')
            ->leftJoin(DB::raw('(SELECT control_id, control_implementation_status 
                         FROM control_assessment_details_table cad1 
                         WHERE cad1.control_assessment_id = (SELECT MAX(control_assessment_id) 
                                                             FROM control_assessment_details_table cad2 
                                                             WHERE cad1.control_id = cad2.control_id)) as cad'), 'control_master_table.control_id', '=', 'cad.control_id')
            ->join('owner_table', 'control_master_table.owner_id', '=', 'owner_table.owner_role_id')
            ->leftJoin('control_master_table_vs_custodian_role_table', 'control_master_table.control_id', '=', 'control_master_table_vs_custodian_role_table.control_id')
            ->leftJoin('custodian_name_table', 'control_master_table_vs_custodian_role_table.custodian_id', '=', 'custodian_name_table.custodian_role_id')
            ->where('sub_domain_table.sub_domain_id', $subdomainId)
            ->when($status, function ($query, $status) {
                return $query->whereRaw('COALESCE(cad.control_implementation_status, "Not Implemented") = ?', [$status]);
            })
            ->groupBy(
                'control_master_table.control_id',
                'control_master_table.control_name',
                'cad.control_implementation_status',
                'owner_table.owner_name',
                'owner_table.owner_id'
            )
            ->get();

        if (request()->wantsJson()) {
            return response()->json($controls);
        }

        return view('4-Process/18-Reporting/3-Dashboard/1-evidence/ControlDashboard', compact(
            'controls',
            'controlsCount',
            'subdomainId'
        ));
    }

    function assetGroupRisks($assetGroupId)
    {

        $assetRisksCount = DB::table('asset_group_table as g')
            ->join('asset_register_table as a', 'g.asset_group_id', '=', 'a.asset_group_id')
            ->join('risk_vs_asset_group_table as rvg', 'g.asset_group_id', '=', 'rvg.asset_group_id')
            ->join('risk_master_table as r', 'rvg.risk_id', '=', 'r.risk_id')
            ->leftJoinSub(
                DB::table('risk_assessment_details_table')
                    ->select('risk_id', 'implementation_status')
                    ->whereIn('risk_assessment_id', function ($query) {
                        $query->select(DB::raw('MAX(risk_assessment_id)'))
                            ->from('risk_assessment_details_table')
                            ->groupBy('risk_id');
                    }),
                'rad',
                'r.risk_id',
                '=',
                'rad.risk_id'
            )
            ->where('g.asset_group_id', '=', $assetGroupId)
            ->groupBy('a.asset_id')
            ->select(
                'a.asset_id',
                DB::raw('COUNT(DISTINCT r.risk_id) AS total_risks'),
                DB::raw('SUM(CASE WHEN COALESCE(rad.implementation_status, "Open") = "Open" THEN 1 ELSE 0 END) AS open_risks'),
                DB::raw('SUM(CASE WHEN COALESCE(rad.implementation_status, "Open") != "Open" THEN 1 ELSE 0 END) AS closed_risks')
            )
            ->get();



        $risks = DB::table('asset_register_table as a')
            ->selectRaw('
                DISTINCT r.risk_id, 
                ra.risk_assessment_id,
                GROUP_CONCAT(DISTINCT CONCAT(
                    "<a href=\'/asset-register-table/", a.asset_id, "\' >", a.asset_name, "</a>"
                ) SEPARATOR "<br>") AS assets,
                COALESCE(ra.implementation_status, "Open") AS status,
                o.owner_id,
                o.owner_name,
                GROUP_CONCAT(DISTINCT CONCAT(
                    "<a href=\'/custodian-table/", cn.custodian_name_id, "\' >", cn.custodian_name_name, "</a>"
                ) SEPARATOR "<br>") AS custodians
            ')
            ->join('asset_group_table as g', 'a.asset_group_id', '=', 'g.asset_group_id')
            ->join('risk_vs_asset_group_table as rvg', 'a.asset_group_id', '=', 'rvg.asset_group_id')
            ->join('risk_master_table as r', 'rvg.risk_id', '=', 'r.risk_id')
            ->leftJoin(DB::raw('(
                SELECT 
                    MAX(risk_assessment_id) AS latest_risk_assessment_id, 
                    risk_id 
                FROM risk_assessment_details_table
                GROUP BY risk_id
            ) as latest_ra'), 'r.risk_id', '=', 'latest_ra.risk_id')
            ->leftJoin('risk_assessment_details_table as ra', 'ra.risk_assessment_id', '=', 'latest_ra.latest_risk_assessment_id')
            ->join('owner_table as o', 'r.owner_id', '=', 'o.owner_role_id')
            ->join('risk_master_table_vs_custodian_role_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('custodian_name_table as cn', 'rvc.custodian_id', '=', 'cn.custodian_role_id')
            ->where('g.asset_group_id', '=', $assetGroupId)
            ->groupBy('r.risk_id', 'ra.implementation_status', 'o.owner_id', 'o.owner_name', 'ra.risk_assessment_id')
            ->get();


        // return $risks;

        $assets = Asset::select(
            'a.asset_id',
            'a.asset_name',
            DB::raw('COUNT(r.risk_id) AS risk_count'),
            // DB::raw('COUNT(CASE WHEN ra.implementation_status = "Open" OR ra.implementation_status IS NULL THEN r.risk_id END) AS open_risks'),
            // DB::raw('COUNT(CASE WHEN ra.implementation_status = "Close" THEN r.risk_id END) AS closed_risks')
        )
            ->from('asset_register_table AS a')
            ->join('asset_group_table AS g', 'a.asset_group_id', '=', 'g.asset_group_id')
            ->join('risk_vs_asset_group_table AS rvg', 'a.asset_group_id', '=', 'rvg.asset_group_id')
            ->join('risk_master_table AS r', 'rvg.risk_id', '=', 'r.risk_id')
            // ->leftJoin('risk_assessment_details_table AS ra', 'r.risk_id', '=', 'ra.risk_id')
            ->where('g.asset_group_id', '=', $assetGroupId)
            ->groupBy('a.asset_id', 'a.asset_name')
            ->get();

        $assetGroup = AssetGroup::where('asset_group_id', $assetGroupId)->first();


        $assetId = $assets->pluck('asset_id');
        $assetName = $assets->pluck('asset_name');
        $riskCount = $assetRisksCount->pluck('total_risks');
        $openRisks = $assetRisksCount->pluck('open_risks');
        $closedRisks = $assetRisksCount->pluck('closed_risks');

        return view('4-Process/18-Reporting/3-Dashboard/2-assets/AssetGroup', compact(
            'assetId',
            'assetName',
            'riskCount',
            'openRisks',
            'closedRisks',
            'risks',
            'assetGroup'
        ));
    }

    public function groupAssetRisks(Asset $asset, Request $request)
    {

        $statusId = request('status');
        $status = null;

        if ($statusId == 3) {
            $status = "Close";
        } else if ($statusId == 1) {
            $status = "Open";
        }




        $result = DB::table('asset_group_table as g')
            ->join('asset_register_table as a', 'g.asset_group_id', '=', 'a.asset_group_id')
            ->join('owner_table as o', 'a.owner_id', '=', 'o.owner_role_id')
            ->join('custodian_name_table_vs_asset_group_table as cvg', 'g.asset_group_id', '=', 'cvg.asset_group_id')
            ->join('custodian_name_table as cu', 'cvg.custodian_id', '=', 'cu.custodian_role_id')
            ->join('risk_vs_asset_group_table as rvg', 'g.asset_group_id', '=', 'rvg.asset_group_id')
            ->join('risk_master_table as r', 'rvg.risk_id', '=', 'r.risk_id')
            ->join('owner_table as ro', 'r.owner_id', '=', 'ro.owner_role_id')
            ->join('risk_master_table_vs_custodian_role_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->join('custodian_name_table as rcu', 'rvc.custodian_id', '=', 'rcu.custodian_role_id')
            ->leftJoinSub(
                DB::table('risk_assessment_details_table')
                    ->select('risk_id', 'implementation_status')
                    ->whereIn('risk_assessment_id', function ($query) {
                        $query->select(DB::raw('MAX(risk_assessment_id)'))
                            ->from('risk_assessment_details_table')
                            ->groupBy('risk_id');
                    }),
                'rad',
                'r.risk_id',
                '=',
                'rad.risk_id'
            )
            ->where('g.asset_group_id', $asset->asset_group_id)
            ->where('a.asset_id', $asset->asset_id)
            ->when($status, function ($query, $status) {
                return $query->whereRaw('COALESCE(rad.implementation_status, "Open") = ?', [$status]);
            })
            ->groupBy(
                'a.asset_id',
                'a.asset_name',
                'o.owner_id',
                'o.owner_name',
                'r.risk_id',
                'r.risk_name',
                'ro.owner_id',
                'ro.owner_name',
                'rad.implementation_status',
            )
            ->selectRaw('
        a.asset_id, 
        a.asset_name, 
        o.owner_id as asset_owner_id, 
        o.owner_name as asset_owner_name,
        GROUP_CONCAT(DISTINCT CONCAT(
            "<a href=\'/custodian-table/", cu.custodian_name_id, "\'>", cu.custodian_name_name, "</a>"
        ) SEPARATOR "<br>") as asset_custodians,
        r.risk_id, 
        r.risk_name, 
        ro.owner_id as risk_owner_id, 
        ro.owner_name as risk_owner_name,
        GROUP_CONCAT(DISTINCT CONCAT(
            "<a href=\'/custodian-table/", rcu.custodian_name_id, "\'>", rcu.custodian_name_name, "</a>"
        ) SEPARATOR "<br>") as risk_custodians,
        COALESCE(rad.implementation_status, "Open")  AS latest_status
    ')
            ->get();


        if (request()->wantsJson()) {
            return response()->json($result);
        }
    }
}
