<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;
use App\Models\ControlMaster;
use App\Models\Domain;
use App\Models\SubDomain;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class ControlEvidenceController extends Controller
{
    public function controlVsEvidence(Request $request): View|Response
    {
        $filters = $this->extractFilters($request);
        $filterData = $this->loadFilterData($filters);

        $controlEvidence = $this->buildBaseQuery($filters)
            ->select(
                'c.id',
                'c.control_id',
                'c.control_name',
                $this->buildEvidenceLinksExpression(),
                $this->buildArtifactLinksExpression()
            )
            ->groupBy('c.id', 'c.control_id', 'c.control_name', 'b.sort_order')
            ->orderBy('b.sort_order')
            ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(c.control_id, '-', 1) AS UNSIGNED)"))
            ->orderBy(DB::raw("CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 3), '-', -1) AS UNSIGNED)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 4), '-', -1) AS UNSIGNED), 0)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 5), '-', -1) AS UNSIGNED), 0)"))
            ->orderBy(DB::raw("COALESCE(CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(c.control_id, '-', 6), '-', -1) AS UNSIGNED), 0)"))
            ->get();

        if ($request->has('pdf')) {
            return $this->generatePdfResponse(
                'process.evidence-management.evidence-control.control-vs-evidence-pdf',
                ['controlEvidence' => $controlEvidence],
                'Control-vs-Evidence.pdf'
            );
        }

        return view('process.evidence-management.evidence-control.control-vs-evidence', [
            'controlEvidence' => $controlEvidence,
            ...$filterData,
            ...$filters,
        ]);
    }

    public function evidenceVsControl(Request $request): View|Response
    {
        $filters = $this->extractFilters($request);
        $filterData = $this->loadFilterData($filters);

        DB::statement('SET SESSION group_concat_max_len = 1000000');

        $evidenceControl = $this->buildBaseQuery($filters)
            ->select(
                'e.id',
                'e.evidence_id',
                'e.evidence_name',
                $this->buildControlLinksExpression(),
                $this->buildArtifactLinksExpression()
            )
            ->groupBy('e.id', 'e.evidence_id', 'e.evidence_name')
            ->orderBy('e.evidence_name')
            ->get();

        if ($request->has('pdf')) {
            return $this->generatePdfResponse(
                'process.evidence-management.evidence-control.evidence-vs-control-pdf',
                ['evidenceControl' => $evidenceControl],
                'Evidence-vs-Control.pdf'
            );
        }

        return view('process.evidence-management.evidence-control.evidence-vs-control', [
            'evidenceControl' => $evidenceControl,
            ...$filterData,
            ...$filters,
        ]);
    }

    /**
     * @return array{bestPracticeId: string|null, domainId: string|null, subDomainId: string|null, controlId: string|null}
     */
    private function extractFilters(Request $request): array
    {
        $bestPracticeId = $request->input('practice');
        $domainId = $request->input('domain');
        $subDomainId = $request->input('subdomain');
        $controlId = $request->input('control_id');

        if (empty($bestPracticeId)) {
            $domainId = null;
            $subDomainId = null;
        }

        return [
            'bestPracticeId' => $bestPracticeId,
            'domainId' => $domainId,
            'subDomainId' => $subDomainId,
            'controlId' => $controlId,
        ];
    }

    /**
     * @param  array{bestPracticeId: string|null, domainId: string|null, subDomainId: string|null, controlId: string|null}  $filters
     * @return array{practices: Collection, domains: Collection, subDomains: Collection, controlIds: Collection}
     */
    private function loadFilterData(array $filters): array
    {
        $practices = BestPractice::select('id', 'best_practice_id', 'best_practice_name')->get();

        $domains = collect();
        $subDomains = collect();

        if (! empty($filters['bestPracticeId'])) {
            $domains = Domain::query()
                ->join('best_practice_vs_domain_table as bvd', 'domain_table.main_domain_id', '=', 'bvd.main_domain_id')
                ->join('best_practice_table as b', 'bvd.best_practice_id', '=', 'b.best_practice_id')
                ->where('b.best_practice_id', $filters['bestPracticeId'])
                ->select('domain_table.id', 'domain_table.main_domain_id', 'domain_table.main_domain_name')
                ->get();

            if ($domains->isNotEmpty() && $filters['domainId']) {
                $subDomains = SubDomain::select('id', 'sub_domain_id', 'sub_domain_name')
                    ->where('main_domain_id', $filters['domainId'])
                    ->get();
            }
        }

        $controlIds = ControlMaster::query()
            ->join('control_master_table_vs_best_practice_table as cvb', 'control_master_table.control_id', '=', 'cvb.control_id')
            ->join('best_practice_table as b', 'cvb.best_practice_id', '=', 'b.best_practice_id')
            ->when($filters['bestPracticeId'], fn ($query, $bestPracticeId) => $query->where('b.best_practice_id', $bestPracticeId))
            ->orderControls()
            ->pluck('control_master_table.control_id');

        return [
            'practices' => $practices,
            'domains' => $domains,
            'subDomains' => $subDomains,
            'controlIds' => $controlIds,
        ];
    }

    /**
     * @param  array{bestPracticeId: string|null, domainId: string|null, subDomainId: string|null, controlId: string|null}  $filters
     */
    private function buildBaseQuery(array $filters): \Illuminate\Database\Query\Builder
    {
        return DB::table('evidence_vs_control_table AS evc')
            ->join('control_master_table AS c', 'evc.control_id', '=', 'c.control_id')
            ->join('evidence_table AS e', 'evc.evidence_id', '=', 'e.evidence_id')
            ->join('control_master_table_vs_best_practice_table AS cvb', 'cvb.control_id', '=', 'c.control_id')
            ->join('best_practice_table AS b', 'b.best_practice_id', '=', 'cvb.best_practice_id')
            ->join('control_master_table_vs_domain_table AS cvd', 'cvd.control_id', '=', 'c.control_id')
            ->join('domain_table AS d', 'd.main_domain_id', '=', 'cvd.main_domain_id')
            ->join('control_master_table_vs_sub_domain_table AS cvsd', 'cvsd.control_id', '=', 'c.control_id')
            ->join('sub_domain_table AS s', 's.sub_domain_id', '=', 'cvsd.sub_domain_id')
            ->join('evidence_vs_artifact_table AS eva', 'e.evidence_id', '=', 'eva.evidence_id')
            ->join('artifact_table AS a', 'eva.artifact_id', '=', 'a.artifact_id')
            ->when($filters['bestPracticeId'], fn ($query, $value) => $query->where('b.best_practice_id', $value))
            ->when($filters['domainId'], fn ($query, $value) => $query->where('d.main_domain_id', $value))
            ->when($filters['subDomainId'], fn ($query, $value) => $query->where('s.sub_domain_id', $value))
            ->when($filters['controlId'], fn ($query, $value) => $query->where('c.control_id', $value));
    }

    private function buildEvidenceLinksExpression(): \Illuminate\Database\Query\Expression
    {
        $baseUrl = config('app.url');

        return DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"{$baseUrl}evidences/', e.id, '\" style=\"text-decoration: none; color: inherit;\">', e.evidence_name, '</a>') SEPARATOR '<br>') AS evidences");
    }

    private function buildControlLinksExpression(): \Illuminate\Database\Query\Expression
    {
        $baseUrl = config('app.url');

        return DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"{$baseUrl}controls/', c.id, '\" style=\"text-decoration: none; color: inherit; line-height:2em;\">', c.control_id, ' - ', c.control_name, '</a>') SEPARATOR '<br>') AS controls");
    }

    private function buildArtifactLinksExpression(): \Illuminate\Database\Query\Expression
    {
        $baseUrl = config('app.url');

        return DB::raw("GROUP_CONCAT(DISTINCT CONCAT('<a href=\"{$baseUrl}artifacts/', a.id, '\" style=\"text-decoration: none; color: inherit;\">', a.artifact_name, '</a>') SEPARATOR '<br>') AS artifacts");
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function generatePdfResponse(string $view, array $data, string $filename): Response
    {
        $mpdf = new Mpdf;
        $html = view($view, $data)->render();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output($filename, 'D'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }

    /**
     * Get domains by best practice ID via AJAX
     */
    public function getDomainsByBestPractice($bestPracticeId)
    {
        $domains = Domain::query()
            ->join('best_practice_vs_domain_table as bvd', 'domain_table.main_domain_id', '=', 'bvd.main_domain_id')
            ->join('best_practice_table as b', 'bvd.best_practice_id', '=', 'b.best_practice_id')
            ->where('b.best_practice_id', $bestPracticeId)
            ->select('domain_table.id', 'domain_table.main_domain_id', 'domain_table.main_domain_name')
            ->get();

        return response()->json($domains);
    }

    /**
     * Get subdomains by domain ID via AJAX
     */
    public function getSubDomainsByDomain($domainId)
    {
        $subDomains = SubDomain::select('id', 'sub_domain_id', 'sub_domain_name')
            ->where('main_domain_id', $domainId)
            ->get();

        return response()->json($subDomains);
    }
}
