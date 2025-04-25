<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ControlMaster;
use App\Models\BestPractice;
use App\Models\Domain;
use App\Models\SubDomain;

use function PHPUnit\Framework\isNull;

class ControlEvidenceController extends Controller
{
    public function controlVsEvidence(Request $request)
    {
        $bestPracticeId = $request->input('practice') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;


        $practices  = BestPractice::select('id', 'best_practices_id', 'best_practices_name')
            ->get();

        if ($bestPracticeId != '') {
            $domains = Domain::join('best_practice_vs_domain_table as bvd', 'domain_table.main_domain_id', '=', 'bvd.main_domain_id')
                ->join('best_practice_table as b', 'bvd.best_practices_id', '=', 'b.best_practices_id')
                ->when($bestPracticeId, function ($query, $bestPracticeId) {
                    $query->where('b.best_practices_id', $bestPracticeId);
                })
                ->select('domain_table.id', 'domain_table.main_domain_id', 'domain_table.main_domain_name')
                ->get();
        } else {
            $domainId = null;
            $subDomainId = null;
        }


        if (count($domains)) {

            $subDomains = SubDomain::select('id', 'sub_domain_id', 'sub_domain_name')
                ->where('main_domain_id', $domainId)
                ->get();
        }


        $controlIds = ControlMaster::join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')
            ->when($bestPracticeId, function ($query, $bestPracticeId) {
                $query->where('b.best_practices_id', $bestPracticeId);
            })->orderControls()
            ->pluck('control_master_table.control_id');


        $controlEvidence = DB::table('evidence_vs_control_table AS evc')
            ->join('control_master_table AS c', 'evc.control_id', '=', 'c.control_id')
            ->join('evidence_table AS e', 'evc.evidence_id', '=', 'e.evidence_id')
            ->join('control_master_table_vs_best_practice_table AS cvb', 'cvb.control_id', '=', 'c.control_id')
            ->join('best_practice_table AS b', 'b.best_practices_id', '=', 'cvb.best_practice_id')
            ->join('control_master_table_vs_domain_table AS cvd', 'cvd.control_id', '=', 'c.control_id')
            ->join('domain_table AS d', 'd.main_domain_id', '=', 'cvd.main_domain_id')
            ->join('control_master_table_vs_sub_domain_table AS cvsd', 'cvsd.control_id', '=', 'c.control_id')
            ->join('sub_domain_table AS s', 's.sub_domain_id', '=', 'cvsd.sub_domain_id')
            ->join('evidence_vs_artifact_table AS eva', 'e.evidence_id', '=', 'eva.evidence_id')
            ->join('artifact_table AS a', 'eva.artifact_id', '=', 'a.artifact_id')
            ->select(
                'c.control_id',
                'c.control_name',
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/evidences/', e.evidence_id, '\" target=\"_blank\">', e.evidence_name, '</a>') SEPARATOR '<br>') AS evidences"),

                DB::raw("GROUP_CONCAT(CONCAT('<a href=\"/artifacts/', a.id, '\" target=\"_blank\">', a.artifact_name, '</a>') SEPARATOR '<br>') AS artifacts")
            )->when($bestPracticeId, function ($query, $bestPracticeId) {
                $query->where('b.best_practices_id', $bestPracticeId);
            })->when($domainId, function ($query, $domainId) {
                $query->where('d.main_domain_id', $domainId);
            })->when($subDomainId, function ($query, $subDomainId) {
                $query->where('s.sub_domain_id', $subDomainId);
            })->when($controlId, function ($query, $controlId) {
                $query->where('c.control_id', $controlId);
            })
            ->groupBy('c.control_id', 'c.control_name', 'b.sort_order')
            ->orderBy('b.sort_order')
            ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(c.control_id, '-', 1) AS UNSIGNED)"))
            ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 3), '-', -1) AS UNSIGNED)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 4), '-', -1) AS UNSIGNED), 0)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 5), '-', -1) AS UNSIGNED), 0)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)"))
            ->get();


      
        return view(
            '4-Process/10-Evidence/3-ControlEvidenceTable',
            compact('controlEvidence', 'controlIds', 'practices', 'domains', 'subDomains')
        );
    }

    public function evicontshow(Request $request)
    {
        $bestPracticeId = $request->input('practice') ?? null;
        $domainId = $request->input('domain') ?? null;
        $domains = $subDomains = [];
        $subDomainId = $request->input('subdomain') ?? null;
        $controlId = $request->input('control_id') ?? null;

        $practices  = BestPractice::select('id', 'best_practices_id', 'best_practices_name')->get();

        if ($bestPracticeId != '') {
            $domains = Domain::join('best_practice_vs_domain_table as bvd', 'domain_table.main_domain_id', '=', 'bvd.main_domain_id')
                ->join('best_practice_table as b', 'bvd.best_practices_id', '=', 'b.best_practices_id')
                ->when($bestPracticeId, function ($query, $bestPracticeId) {
                    $query->where('b.best_practices_id', $bestPracticeId);
                })
                ->select('domain_table.id', 'domain_table.main_domain_id', 'domain_table.main_domain_name')
                ->get();
        } else {
            $domainId = null;
            $subDomainId = null;
        }


        if (count($domains)) {

            $subDomains = SubDomain::select('id', 'sub_domain_id', 'sub_domain_name')
                ->where('main_domain_id', $domainId)
                ->get();
        }

        $controlIds = ControlMaster::join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practices_id')
            ->when($bestPracticeId, function ($query, $bestPracticeId) {
                $query->where('b.best_practices_id', $bestPracticeId);
            })->orderControls()
            ->pluck('control_master_table.control_id');


        // $evidencecontrol = DB::table('evidence_table as e')
        //     ->select('e.evidence_id', 'e.evidence_name', 'controlmaster.control_id', 'controlmaster.control_name')
        //     ->join('evidence_vs_control_table as evc', 'e.evidence_id', '=', 'evc.evidence_id')
        //     ->join('control_master_table as controlmaster', 'evc.control_id', '=', 'controlmaster.control_id')
        //     ->join('control_master_table_vs_best_practice_table as controlbestpractice', 'controlbestpractice.control_id', '=', 'controlmaster.control_id')
        //     ->join('best_practice_table as bestpractice', 'bestpractice.best_practices_id', '=', 'controlbestpractice.best_practice_id')
        //     ->join('control_master_table_vs_domain_table as controldomain', 'controldomain.control_id', '=', 'controlmaster.control_id')
        //     ->join('domain_table as domain', 'domain.main_domain_id', '=', 'controldomain.main_domain_id')
        //     ->join('control_master_table_vs_sub_domain_table as controlsubdomain', 'controlsubdomain.control_id', '=', 'controlmaster.control_id')
        //     ->join('sub_domain_table as subdomain', 'subdomain.sub_domain_id', '=', 'controlsubdomain.sub_domain_id')
        //     ->orderBy('e.evidence_id');

        // if ($request->has('practice') && !is_null($request->input('practice')))
        //     $evidencecontrol->where('bestpractice.best_practices_id', $request->input('practice'));

        // if ($request->has('domain') && !is_null($request->input('domain')))
        //     $evidencecontrol->where('domain.main_domain_id', $request->input('domain'));

        // if ($request->has('subdomain') && !is_null($request->input('subdomain')))
        //     $evidencecontrol->where('subdomain.sub_domain_id', $request->input('subdomain'));

        // if ($request->has('control_id') && !is_null($request->input('control_id')))
        //     $evidencecontrol->where('controlmaster.control_id', $request->input('control_id'));

        // $evidencecontrol = $evidencecontrol->get();

        $evidencecontrol = DB::table('evidence_vs_control_table AS evc')
            ->join('evidence_table AS e', 'evc.evidence_id', '=', 'e.evidence_id')
            ->join('control_master_table AS c', 'evc.control_id', '=', 'c.control_id')
            ->join('control_master_table_vs_best_practice_table AS cvb', 'cvb.control_id', '=', 'c.control_id')
            ->join('best_practice_table AS b', 'b.best_practices_id', '=', 'cvb.best_practice_id')
            ->join('control_master_table_vs_domain_table AS cvd', 'cvd.control_id', '=', 'c.control_id')
            ->join('domain_table AS d', 'd.main_domain_id', '=', 'cvd.main_domain_id')
            ->join('control_master_table_vs_sub_domain_table AS cvsd', 'cvsd.control_id', '=', 'c.control_id')
            ->join('sub_domain_table AS s', 's.sub_domain_id', '=', 'cvsd.sub_domain_id')
            ->join('evidence_vs_artifact_table AS eva', 'e.evidence_id', '=', 'eva.evidence_id')
            ->join('artifact_table AS a', 'eva.artifact_id', '=', 'a.artifact_id')
            ->select(
                'e.evidence_id',
                'e.evidence_name',
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/control-identification-table/', c.control_id, '\" target=\"_blank\">', c.control_id, ' - ', c.control_name, '</a>') SEPARATOR '<br>') AS controls"),
                DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"/artifacts/', a.id, '\" target=\"_blank\">', a.artifact_name, '</a>') SEPARATOR '<br>') AS artifacts")
            )
            ->when($bestPracticeId, function ($query, $bestPracticeId) {
                $query->where('b.best_practices_id', $bestPracticeId);
            })
            ->when($domainId, function ($query, $domainId) {
                $query->where('d.main_domain_id', $domainId);
            })
            ->when($subDomainId, function ($query, $subDomainId) {
                $query->where('s.sub_domain_id', $subDomainId);
            })
            ->when($controlId, function ($query, $controlId) {
                $query->where('c.control_id', $controlId);
            })
            ->groupBy('e.evidence_id', 'e.evidence_name')
            ->orderBy('e.evidence_name') // Adjust ordering as needed
            ->get();

        // return $evidencecontrol;
        return view(
            '4-Process/10-Evidence/2-EvidenceControlTable',
            [
                'evidencecontrol' => $evidencecontrol,
                'id'              => null,
                'controlIds'      => $controlIds,
                'practices'       => $practices,
                'domains'         => $domains,
                'subDomains'      => $subDomains
            ]
        );
    }
}
