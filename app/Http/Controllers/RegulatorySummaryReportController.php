<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class RegulatorySummaryReportController extends Controller
{
    private function _getReport($bestPracticeId, $controlAssessmentId, $domainId, $subDomainId, $controlId, $ownerId, $statusId, $controlType = null)
    {
        $report = DB::table('control_master_table as c')
            ->join('owner_table as o', 'c.owner_id', '=', 'o.owner_role_id')
            ->join('control_master_table_vs_domain_table as cvd', 'c.control_id', '=', 'cvd.control_id')
            ->join('domain_table as d', 'cvd.main_domain_id', '=', 'd.main_domain_id')
            ->join('control_master_table_vs_sub_domain_table as cvs', 'c.control_id', '=', 'cvs.control_id')
            ->join('sub_domain_table as s', 'cvs.sub_domain_id', '=', 's.sub_domain_id')
            ->join('control_master_table_vs_best_practice_table as cvb', 'c.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')

            ->leftJoin('control_assessment_details_table as latest_cad', function ($join) {
                $join->on('c.control_id', '=', 'latest_cad.control_id')
                    ->whereIn('latest_cad.id', function ($query) {
                        $query->selectRaw('MAX(id)')
                            ->from('control_assessment_details_table')
                            ->groupBy('control_id');
                    });
            })

            ->where('b.best_practices_id', $bestPracticeId)
            ->select([
                DB::raw('CONCAT(c.control_id, " - ", c.control_name) AS control'),
                DB::raw('CONCAT(c.control_id, " - ", o.owner_name) AS owner'),
                DB::raw('CONCAT(d.main_domain_id, " - ", d.main_domain_name) AS domain'),
                'd.main_domain_id',
                's.sub_domain_id',
                'b.best_practices_id',
                DB::raw('CONCAT(s.sub_domain_id, " - ", s.sub_domain_name) AS subdomain'),
                DB::raw('COALESCE(latest_cad.control_implementation_status, "Not Implemented") AS status'),
                'latest_cad.control_finding_id',
                'latest_cad.control_finding_name as finding_name',
                'latest_cad.corrective_action_due_date',
                'latest_cad.control_assessment_id',
            ])
            ->when($domainId, function ($query, $domainId) {
                $query->where('d.main_domain_id', $domainId);
            })
            ->when($subDomainId, function ($query, $subDomainId) {
                $query->where('s.sub_domain_id', $subDomainId);
            })
            ->when($controlId, function ($query, $controlId) {
                $query->where('c.control_id', $controlId);
            })
            ->when($ownerId, function ($query, $ownerId) {
                $query->where('o.owner_role_id', $ownerId);
            })
            ->when($statusId, function ($query, $statusId) {
                $query->where('latest_cad.control_implementation_status', $statusId);
            })
            ->when($controlType, function ($query, $controlType) {
                $query->where('c.control_cloud', $controlType);
            })
            ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(c.control_id, '-', 1) AS UNSIGNED)"))
            ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 3), '-', -1) AS UNSIGNED)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 4), '-', -1) AS UNSIGNED), 0)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 5), '-', -1) AS UNSIGNED), 0)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)"))
            ->get();

        return $report;
    }
    public function eccsummaryreport(Request $request)
    {
        $controlAssessmentId = $request->input('controlAssessmentId') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = $controls = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;
        $ownerId = $request->input('owner') ?? null;
        $statusId = $request->input('status') ?? null;
        $bestPracticeId = "NCA-ECC-2018";

        $bestPractice = BestPractice::with('domains.subDomains.controls.owner')
            ->find($bestPracticeId);

        $domains = $bestPractice->domains;

        // Initialize an empty collection for subdomains
        $subDomains = collect();

        if ($domains->isNotEmpty()) {
            $subDomains = $domains->flatMap(function ($domain) use ($domainId) {
                return $domain->subDomains->where('main_domain_id', $domainId)->load('controls.owner');
            });
        }

        // Get controls from the best practice
        $controls = $bestPractice->controls;

        $controls->load('owner');

        $owners = $controls->pluck('owner')->unique('owner_role_id');

        $report = $this->_getReport($bestPracticeId, $controlAssessmentId, $domainId, $subDomainId, $controlId, $ownerId, $statusId);


        return view('4-Process/19-NCASummaryReport/ecc', compact('report', 'domains', 'subDomains', 'controls', 'owners', 'controlAssessmentId'));
    }

    public function csccsummaryreport(Request $request)
    {
        $controlAssessmentId = $request->input('controlAssessmentId') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = $controls = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;
        $ownerId = $request->input('owner') ?? null;
        $statusId = $request->input('status') ?? null;
        $bestPracticeId = "NCA-CSCC-2019";

        $bestPractice = BestPractice::with('domains.subDomains.controls.owner')
            ->find($bestPracticeId);

        $domains = $bestPractice->domains;

        $subDomains = collect();

        if ($domains->isNotEmpty()) {
            $subDomains = $domains->flatMap(function ($domain) use ($domainId) {
                return $domain->subDomains->where('main_domain_id', $domainId)->load('controls.owner');
            });
        }

        // Get controls from the best practice
        $controls = $bestPractice->controls;

        $controls->load('owner');

        $owners = $controls->pluck('owner')->unique('owner_role_id');

        $report = $this->_getReport($bestPracticeId, $controlAssessmentId, $domainId, $subDomainId, $controlId, $ownerId, $statusId);


        return view('4-Process/19-NCASummaryReport/cscc', compact('report', 'domains', 'subDomains', 'controls', 'owners', 'controlAssessmentId'));

        
    }

    public function cccsummaryreport(Request $request)
    {
        $controlAssessmentId = $request->input('controlAssessmentId') ?? null;
        $controlType = $request->input('cloudControlType') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = $controls = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;
        $ownerId = $request->input('owner') ?? null;
        $statusId = $request->input('status') ?? null;
        $bestPracticeId = "NCA-CCC-2020";

        $bestPractice = BestPractice::with('domains.subDomains.controls.owner')
            ->find($bestPracticeId);

        $domains = $bestPractice->domains;

        $subDomains = collect();

        if ($domains->isNotEmpty()) {
            $subDomains = $domains->flatMap(function ($domain) use ($domainId) {
                return $domain->subDomains->where('main_domain_id', $domainId)->load('controls.owner');
            });
        }

        // Get controls from the best practice
        $controls = $bestPractice->controls;

        $controls->load('owner');

        $owners = $controls->pluck('owner')->unique('owner_role_id');
        $report = $this->_getReport($bestPracticeId, $controlAssessmentId, $domainId, $subDomainId, $controlId, $ownerId, $statusId, $controlType);


        return view('4-Process/19-NCASummaryReport/ccc', compact('report', 'domains', 'subDomains', 'controls', 'owners', 'controlAssessmentId', 'controlType'));


    }

    public function tccsummaryreport(Request $request)
    {
        $controlAssessmentId = $request->input('controlAssessmentId') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = $controls = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;
        $ownerId = $request->input('owner') ?? null;
        $statusId = $request->input('status') ?? null;
        $bestPracticeId = "NCA-TCC-2021";

        $bestPractice = BestPractice::with('domains.subDomains.controls.owner')
            ->find($bestPracticeId);

        $domains = $bestPractice->domains;

        $subDomains = collect();

        if ($domains->isNotEmpty()) {
            $subDomains = $domains->flatMap(function ($domain) use ($domainId) {
                return $domain->subDomains->where('main_domain_id', $domainId)->load('controls.owner');
            });
        }

        // Get controls from the best practice
        $controls = $bestPractice->controls;

        $controls->load('owner');

        $owners = $controls->pluck('owner')->unique('owner_role_id');

        $report = $this->_getReport($bestPracticeId, $controlAssessmentId, $domainId, $subDomainId, $controlId, $ownerId, $statusId);


        return view('4-Process/19-NCASummaryReport/tcc', compact('report', 'domains', 'subDomains', 'controls', 'owners', 'controlAssessmentId'));

       
    }

    public function Osmaccsummaryreport(Request $request)
    {
        $controlAssessmentId = $request->input('controlAssessmentId') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = $controls = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;
        $ownerId = $request->input('owner') ?? null;
        $statusId = $request->input('status') ?? null;
        $bestPracticeId = "NCA-OSMACC-2021";

        $bestPractice = BestPractice::with('domains.subDomains.controls.owner')
            ->find($bestPracticeId);

        $domains = $bestPractice->domains;

        $subDomains = collect();

        if ($domains->isNotEmpty()) {
            $subDomains = $domains->flatMap(function ($domain) use ($domainId) {
                return $domain->subDomains->where('main_domain_id', $domainId)->load('controls.owner');
            });
        }

        // Get controls from the best practice
        $controls = $bestPractice->controls;

        $controls->load('owner');

        $owners = $controls->pluck('owner')->unique('owner_role_id');

        $report = $this->_getReport($bestPracticeId, $controlAssessmentId, $domainId, $subDomainId, $controlId, $ownerId, $statusId);


        return view('4-Process/19-NCASummaryReport/osmacc', compact('report', 'domains', 'subDomains', 'controls', 'owners', 'controlAssessmentId'));


    }

    public function Dccsummaryreport(Request $request)
    {$controlAssessmentId = $request->input('controlAssessmentId') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = $controls = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;
        $ownerId = $request->input('owner') ?? null;
        $statusId = $request->input('status') ?? null;
        $bestPracticeId = "NCA-DCC-2022";

        $bestPractice = BestPractice::with('domains.subDomains.controls.owner')
            ->find($bestPracticeId);

        $domains = $bestPractice->domains;

        $subDomains = collect();

        if ($domains->isNotEmpty()) {
            $subDomains = $domains->flatMap(function ($domain) use ($domainId) {
                return $domain->subDomains->where('main_domain_id', $domainId)->load('controls.owner');
            });
        }

        // Get controls from the best practice
        $controls = $bestPractice->controls;

        $controls->load('owner');

        $owners = $controls->pluck('owner')->unique('owner_role_id');

        $report = $this->_getReport($bestPracticeId, $controlAssessmentId, $domainId, $subDomainId, $controlId, $ownerId, $statusId);


        return view('4-Process/19-NCASummaryReport/dcc', compact('report', 'domains', 'subDomains', 'controls', 'owners', 'controlAssessmentId'));

     
    }
}
