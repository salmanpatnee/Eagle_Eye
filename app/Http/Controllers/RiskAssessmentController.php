<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\Classification;
use App\Models\ControlMaster;
use App\Models\Location;
use App\Models\Risk;
use App\Models\RiskAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAssessmentController extends Controller
{
    public function index()
    {
        $riskAssessmentId = request('risk_assessment_id');
        $riskId = request('risk_id');
        $startEndDate = request('start_end_date');

        $riskAssessments = RiskAssessment::withCount('findings')
            ->select(
                'id',
                'risk_assessment_id',
                'risk_assessment_name',
                'risk_assessment_start_date',
                'risk_assessment_end_date'
            )
            ->selectRaw("CONCAT(
                IFNULL(DATE_FORMAT(risk_assessment_start_date, '%d %b %Y'), 'N/A'), 
                ' - ', 
                IFNULL(DATE_FORMAT(risk_assessment_end_date, '%d %b %Y'), 'N/A')
             ) as start_end_date")
            ->when($riskAssessmentId, function ($query) use ($riskAssessmentId) {
                return $query->where('risk_assessment_id', $riskAssessmentId);
            })
            ->when($riskId, function ($query) use ($riskId) {
                return $query->whereHas('findings', function ($q) use ($riskId) {
                    $q->where('risk_id', $riskId);
                });
            })
            ->when($startEndDate, function ($query) use ($startEndDate) {
                $query->where(function ($q) use ($startEndDate) {
                    $q->where('risk_assessment_start_date', $startEndDate)
                        ->orWhere('risk_assessment_end_date', $startEndDate);
                });
            })
            ->paginate(20);

        $riskAssessmentNames = RiskAssessment::selectRaw("DISTINCT CONCAT(risk_assessment_id, ' - ', risk_assessment_name) as name, risk_assessment_id")
            ->get();

        $riskNames = ControlMaster::from('risk_master_table as r')
            ->selectRaw("DISTINCT r.risk_id, CONCAT(r.risk_id, ' - ', r.risk_name) as name")
            ->join('risk_vs_control_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->get();

        return view('process/assessments/risk-assessments/index', compact('riskAssessments', 'riskAssessmentNames', 'riskNames', 'riskAssessmentId', 'riskId', 'startEndDate'));
    }

    public function show(RiskAssessment $riskAssessment)
    {
        $riskAssessment->load('location', 'auditor', 'classification', 'findings');

        return view('process/assessments/risk-assessments/show', compact('riskAssessment'));
    }

    public function create(Request $request)
    {
        $riskAssessment = null;

        $completedControlAssessments = $this->getCompletedControlAssessments();

        if ($completedControlAssessments->isEmpty()) {
            return redirect(route('risk-assessments.index'))
                ->with('error', 'No completed control assessments found. Complete at least one control assessment before creating a risk assessment.');
        }

        $locations = Location::select('id', 'location_id', 'location_name')
            ->distinct()
            ->get();

        $auditors = Auditor::select('id', 'auditor_id', DB::raw('CONCAT(auditor_first_name, " ", auditor_last_name) as auditor_name'))
            ->distinct()
            ->get();

        $classifications = Classification::select('id', 'classification_id', 'classification_name')
            ->distinct()
            ->get();

        return view('process/assessments/risk-assessments/create', compact('locations', 'auditors', 'classifications', 'riskAssessment', 'completedControlAssessments'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'risk_assessment_id' => ['required', 'unique:risk_assessment_master_table'],
            'risk_assessment_name' => 'required',
            'risk_assessment_description' => 'nullable',
            'risk_assessment_start_date' => 'required',
            'risk_assessment_end_date' => 'nullable',
            'risk_assessment_type' => 'nullable',
            'risk_assessment_internal_external' => 'nullable',
            'risk_assessment_approach' => 'nullable',
            'risk_assessment_objectives' => 'nullable',
            'risk_assessment_scope' => 'nullable',
            'standard_references' => 'nullable',
            'risk_assessment_against' => 'nullable',
            'location_id' => 'required',
            'auditor_id' => 'required',
            'classification_id' => 'required',
            'risk_assessing_entity' => 'nullable',
            'control_assessment_ids' => ['required', 'array', 'min:1'],
            'control_assessment_ids.*' => ['exists:control_assessment_master_table,control_assessment_id'],
        ]);

        $controlAssessmentIds = $attributes['control_assessment_ids'];
        unset($attributes['control_assessment_ids']);

        $riskAssessment = RiskAssessment::create($attributes);
        $riskAssessment->controlAssessments()->attach($controlAssessmentIds);

        return redirect(route('risk-assessment-findings.create', $riskAssessment->id))->with('success', 'Risk Assessment created successfully.');
    }

    public function edit(RiskAssessment $riskAssessment)
    {
        $riskAssessment->load('location', 'auditor', 'classification', 'controlAssessments');

        $completedControlAssessments = $this->getCompletedControlAssessments();

        $locations = Location::select('id', 'location_id', 'location_name')
            ->distinct()
            ->get();

        $auditors = Auditor::select('id', 'auditor_id', DB::raw('CONCAT(auditor_first_name, " ", auditor_last_name) as auditor_name'))
            ->distinct()
            ->get();

        $classifications = Classification::select('id', 'classification_id', 'classification_name')
            ->distinct()
            ->get();

        return view('process/assessments/risk-assessments/create', compact('locations', 'auditors', 'classifications', 'riskAssessment', 'completedControlAssessments'));
    }

    public function update(RiskAssessment $riskAssessment, Request $request)
    {
        $attributes = $request->validate([
            'risk_assessment_id' => ['required', 'unique:risk_assessment_master_table,risk_assessment_id,'.$riskAssessment->id],
            'risk_assessment_name' => 'required',
            'risk_assessment_description' => 'nullable',
            'risk_assessment_start_date' => 'required',
            'risk_assessment_end_date' => 'nullable',
            'risk_assessment_type' => 'nullable',
            'risk_assessment_internal_external' => 'nullable',
            'risk_assessment_approach' => 'nullable',
            'risk_assessment_objectives' => 'nullable',
            'risk_assessment_scope' => 'nullable',
            'standard_references' => 'nullable',
            'risk_assessment_against' => 'nullable',
            'location_id' => 'required',
            'auditor_id' => 'required',
            'classification_id' => 'required',
            'risk_assessing_entity' => 'nullable',
        ]);

        $riskAssessment->update($attributes);

        return redirect(route('risk-assessments.index'))->with('success', 'Risk Assessment updated successfully.');
    }

    public function destroy(RiskAssessment $riskAssessment)
    {
        foreach ($riskAssessment->findings as $finding) {
            $finding->delete();
        }

        $riskAssessment->delete();

        return redirect(route('risk-assessments.index'))->with('success', 'Risk Assessment deleted successfully.');
    }

    public function get_control_by_risk(Request $request)
    {
        $riskId = $request->selectedValue;
        $riskAssessmentId = $request->risk_assessment_id;

        $riskDescription = DB::table('risk_master_table')
            ->where('risk_id', $riskId)
            ->value('risk_description');

        $descHtml = $riskDescription
            ? "<div class='border risk_description mb-4 p-3 rounded bg-blue-50'><b>Risk Description:</b> ".e($riskDescription).'</div>'
            : '';

        $selectedCaIds = DB::table('risk_assessment_vs_control_assessment_table')
            ->where('risk_assessment_id', $riskAssessmentId)
            ->pluck('control_assessment_id');

        $latestAssessmentSubquery = DB::table('control_assessment_details_table')
            ->select('control_id', DB::raw('MAX(id) AS latest_id'))
            ->whereIn('control_assessment_id', $selectedCaIds)
            ->groupBy('control_id');

        $controls = DB::table('control_master_table as c')
            ->join('risk_vs_control_table as rvc', 'c.control_id', '=', 'rvc.control_id')
            ->join('risk_master_table as r', 'rvc.risk_id', '=', 'r.risk_id')
            ->leftJoinSub($latestAssessmentSubquery, 'latest_cad', function ($join) {
                $join->on('c.control_id', '=', 'latest_cad.control_id');
            })
            ->leftJoin('control_assessment_details_table as cad', function ($join) {
                $join->on('latest_cad.control_id', '=', 'cad.control_id')
                    ->on('latest_cad.latest_id', '=', 'cad.id');
            })
            ->select('c.id', 'c.control_id', 'c.control_name', DB::raw('COALESCE(cad.control_implementation_status, "Not Implemented") AS status'))
            ->where('r.risk_id', $riskId)
            ->whereExists(function ($query) use ($selectedCaIds) {
                $query->select(DB::raw(1))
                    ->from('control_assessment_details_table as cad_scope')
                    ->whereColumn('cad_scope.control_id', 'c.control_id')
                    ->whereIn('cad_scope.control_assessment_id', $selectedCaIds);
            })
            ->get();

        $counts = DB::table('control_master_table as c')
            ->join('risk_vs_control_table as rvc', 'c.control_id', '=', 'rvc.control_id')
            ->join('risk_master_table as r', 'rvc.risk_id', '=', 'r.risk_id')
            ->leftJoinSub($latestAssessmentSubquery, 'latest_cad', function ($join) {
                $join->on('c.control_id', '=', 'latest_cad.control_id');
            })
            ->leftJoin('control_assessment_details_table as cad', function ($join) {
                $join->on('latest_cad.control_id', '=', 'cad.control_id')
                    ->on('latest_cad.latest_id', '=', 'cad.id');
            })
            ->where('r.risk_id', $riskId)
            ->whereExists(function ($query) use ($selectedCaIds) {
                $query->select(DB::raw(1))
                    ->from('control_assessment_details_table as cad_scope')
                    ->whereColumn('cad_scope.control_id', 'c.control_id')
                    ->whereIn('cad_scope.control_assessment_id', $selectedCaIds);
            })
            ->select(
                DB::raw('COUNT(DISTINCT c.control_id) AS total_controls'),
                DB::raw('COUNT(DISTINCT CASE WHEN cad.control_implementation_status = "Implemented" THEN c.control_id END) AS implemented_controls')
            )
            ->first();

        $status = 'Open';
        $statusAr = 'يفتح';

        if ($counts && $counts->total_controls == $counts->implemented_controls) {
            $status = 'Close';
            $statusAr = 'يغلق';
        }

        if (count($controls)) {
            $html = $descHtml."<div class='max-w-full overflow-x-auto lg:overflow-visible custom-scrollbar'><table class='text-white w-full min-w-[970px]'>";
            $html .= "<thead class='bg-brand-950 border-brand-500 border-y text-left'>";
            $html .= '<tr>';
            $html .= "<th class='px-3 py-3 whitespace-nowrap'><span class='block'>Control ID</span></th>";
            $html .= "<th class='px-3 py-3 whitespace-nowrap'><span class='block'>Control Name</span></th>";
            $html .= "<th class='px-3 py-3 whitespace-nowrap'><span class='block'>Status</span></th>";
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= "<tbody class='divide-y divide-gray-100'>";

            $id = '';

            foreach ($controls as $control) {

                $row_id = $id != $control->control_id ? $control->id : '';
                $control_id = $id != $control->control_id ? $control->control_id : '';
                $control_name = $id != $control->control_id ? $control->control_name : '';

                $html .= '<tr>';
                $html .= "<td class='px-3 py-3 whitespace-nowrap'><span class='block font-medium text-gray-700 text-theme-sm'><a href='/controls/".$row_id."' target='_blank'>{$control_id}</a></span></td>";
                $html .= "<td class='px-3 py-3 whitespace-nowrap'><span class='block font-medium text-gray-700 text-theme-sm'>{$control_name}</span></td>";
                $html .= "<td class='px-3 py-3 whitespace-nowrap'><span class='block font-medium text-gray-700 text-theme-sm'>{$control->status}</span></td>";
                $html .= '</tr>';
                $id = $control->control_id;
            }

            $html .= '</tbody>';
            $html .= '</table>';

            // $html .= '<div class="column"><div class="FieldHead" style="width: 480px;"><p class="FieldHeadEngTxt">Risk Status</p><p class="FieldHeadArbTxt">حالة المخاطر</p></div>';
            // $html .= '<p class="status-para"><span class="status ' . $status . '">' . $status . '</span> <span class="status ' . $status . '">' . $statusAr . '</span></p></div>';
            $html .= "<input type='hidden' name='auto_status' value='".$status."'>";
        } else {
            $noControls = "<div class='flex items-center gap-2 rounded-lg border border-yellow-300 bg-yellow-50 p-3 text-sm text-yellow-800'>"
                ."<svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 shrink-0' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z'/></svg>"
                .'<span>No controls found for this risk in the selected control assessments.</span>'
                .'</div>';
            $html = $descHtml.$noControls;
        }

        return response()->json($html);
    }

    private function getCompletedControlAssessments()
    {
        return DB::table('control_assessment_master_table')
            ->selectRaw("control_assessment_id, control_assessment_name,
                (SELECT COUNT(*) FROM control_master_table c
                    INNER JOIN control_master_table_vs_best_practice_table cmp ON c.control_id = cmp.control_id
                    WHERE cmp.best_practice_id = control_assessment_master_table.best_practices_id
                    AND c.is_parent_control = 'No'
                    AND NOT EXISTS (
                        SELECT 1 FROM control_assessment_details_table cadt
                        WHERE cadt.control_id = c.control_id
                        AND cadt.control_assessment_id = control_assessment_master_table.control_assessment_id
                    )
                ) AS remaining_controls_count")
            ->havingRaw('remaining_controls_count = 0')
            ->get();
    }
}
