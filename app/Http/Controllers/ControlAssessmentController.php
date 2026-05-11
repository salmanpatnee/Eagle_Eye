<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlAssessmentRequest;
use App\Models\Auditor;
use App\Models\BestPractice;
use App\Models\Classification;
use App\Models\ControlAssessment;
use App\Models\ControlMaster;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlAssessmentController extends Controller
{
    public function index(Request $request)
    {

        $controlAssessmentId = request('control_assessment_id');
        $controlId = request('control_id');
        $startEndDate = request('start_end_date');
        $status = request('status');

        $controlAssessments = ControlAssessment::with('findings')
            ->withCount('findings')
            ->select(
                'id',
                'control_assessment_id',
                'control_assessment_name',
                'best_practices_id'
            )
            ->selectRaw("CONCAT(DATE_FORMAT(control_assessment_start_date, '%d %b %Y'), ' - ', DATE_FORMAT(control_assessment_end_date, '%d %b %Y')) as start_end_date")
            ->selectSub(
                DB::table('control_master_table as c')
                    ->join('control_master_table_vs_best_practice_table as cmp', 'c.control_id', '=', 'cmp.control_id')
                    ->whereColumn('cmp.best_practice_id', 'control_assessment_master_table.best_practices_id')
                    ->where('c.is_parent_control', 'No')
                    ->whereNotExists(function ($q) {
                        $q->select(DB::raw(1))
                            ->from('control_assessment_details_table as cadt')
                            ->whereColumn('cadt.control_id', 'c.control_id')
                            ->whereColumn('cadt.control_assessment_id', 'control_assessment_master_table.control_assessment_id');
                    })
                    ->selectRaw('COUNT(*)'),
                'remaining_controls_count'
            )
            ->when($controlAssessmentId, function ($query) use ($controlAssessmentId) {
                return $query->where('control_assessment_id', $controlAssessmentId);
            })
            ->when($controlId, function ($query) use ($controlId) {
                return $query->whereHas('findings', function ($q) use ($controlId) {
                    $q->where('control_id', $controlId);
                });
            })
            ->when($startEndDate, function ($query) use ($startEndDate) {
                $query->where(function ($q) use ($startEndDate) {
                    $q->where('control_assessment_start_date', $startEndDate)
                        ->orWhere('control_assessment_end_date', $startEndDate);
                });
            })
            ->when($status === 'completed', function ($query) {
                $query->whereRaw(
                    '(SELECT COUNT(*) FROM control_master_table c
                      INNER JOIN control_master_table_vs_best_practice_table cmp ON c.control_id = cmp.control_id
                      WHERE cmp.best_practice_id = control_assessment_master_table.best_practices_id
                      AND c.is_parent_control = "No"
                      AND NOT EXISTS (
                          SELECT 1 FROM control_assessment_details_table cadt
                          WHERE cadt.control_id = c.control_id
                          AND cadt.control_assessment_id = control_assessment_master_table.control_assessment_id
                      )) = 0'
                );
            })
            ->when($status === 'in-progress', function ($query) {
                $query->whereRaw(
                    '(SELECT COUNT(*) FROM control_master_table c
                      INNER JOIN control_master_table_vs_best_practice_table cmp ON c.control_id = cmp.control_id
                      WHERE cmp.best_practice_id = control_assessment_master_table.best_practices_id
                      AND c.is_parent_control = "No"
                      AND NOT EXISTS (
                          SELECT 1 FROM control_assessment_details_table cadt
                          WHERE cadt.control_id = c.control_id
                          AND cadt.control_assessment_id = control_assessment_master_table.control_assessment_id
                      )) > 0'
                );
            })
            ->paginate(20);

        $assessments = ControlAssessment::selectRaw("DISTINCT CONCAT(control_assessment_id, ' - ', control_assessment_name) as name, control_assessment_id")
            ->get();

        $controls = ControlMaster::selectRaw('DISTINCT control_master_table.control_id, control_master_table.control_name')
            ->join('control_assessment_details_table', 'control_master_table.control_id', '=', 'control_assessment_details_table.control_id')
            ->get();

        $statusOptions = [
            (object) ['status_id' => 'completed',   'status_text' => 'Completed'],
            (object) ['status_id' => 'in-progress',  'status_text' => 'In-Progress'],
        ];

        return view('process/assessments/control-assessments/index', compact('controlAssessments', 'assessments', 'controls', 'controlAssessmentId', 'controlId', 'startEndDate', 'status', 'statusOptions'));
    }

    public function show(ControlAssessment $controlAssessment)
    {
        $controlAssessment->load(['bestPractice', 'location', 'auditor', 'classification', 'findings']);

        $remainingControlsCount = DB::table('control_master_table as c')
            ->join('control_master_table_vs_best_practice_table as cmp', 'c.control_id', '=', 'cmp.control_id')
            ->join('best_practice_table as bpt', 'cmp.best_practice_id', '=', 'bpt.best_practices_id')
            ->leftJoin('control_assessment_details_table as cadt', function ($join) use ($controlAssessment) {
                $join->on('c.control_id', '=', 'cadt.control_id')
                    ->where('cadt.control_assessment_id', '=', $controlAssessment->control_assessment_id);
            })
            ->where('bpt.best_practices_id', $controlAssessment->best_practices_id)
            ->where('c.is_parent_control', 'No')
            ->whereNull('cadt.control_assessment_id')
            ->count();

        $findings = $controlAssessment->findings;
        $findingStats = [
            'implemented' => $findings->where('control_implementation_status', 'Implemented')->count(),
            'partially_implemented' => $findings->where('control_implementation_status', 'Partially Implemented')->count(),
            'not_implemented' => $findings->where('control_implementation_status', 'Not Implemented')->count(),
            'not_applicable' => $findings->where('control_implementation_status', 'Not Applicable')->count(),
        ];
        $totalControls = $remainingControlsCount + $findings->count();
        $completionPercent = $totalControls > 0 ? round(($findings->count() / $totalControls) * 100) : 0;

        return view('process/assessments/control-assessments/show', compact('controlAssessment', 'remainingControlsCount', 'findingStats', 'totalControls', 'completionPercent'));
    }

    public function create()
    {
        $controlAssessment = null;
        $bestPractices = BestPractice::select('id', 'best_practices_id', 'best_practices_name', 'sort_order')
            ->distinct()
            ->orderBy('sort_order')
            ->get();

        $locations = Location::select('id', 'location_id', 'location_name')
            ->distinct()
            ->get();

        $auditors = Auditor::select('id', 'auditor_id', DB::raw('CONCAT(auditor_first_name, " ", auditor_last_name) as auditor_name'))
            ->distinct()
            ->get();

        $classifications = Classification::select('id', 'classification_id', 'classification_name')
            ->distinct()
            ->get();

        return view('process/assessments/control-assessments/create', compact('bestPractices', 'locations', 'auditors', 'classifications', 'controlAssessment'));
    }

    public function store(ControlAssessmentRequest $request)
    {
        abort_unless(auth()->user()->canWrite(), 403);
        $attributes = $request->all();

        $controlAssessment = ControlAssessment::create($attributes);

        return redirect(route('control-assessment-findings.create', $controlAssessment->id))->with('success', 'Control Assessment saved successfully.');
    }

    public function edit(ControlAssessment $controlAssessment)
    {
        $bestPractices = BestPractice::select('id', 'best_practices_id', 'best_practices_name')
            ->distinct()
            ->get();

        $locations = Location::select('id', 'location_id', 'location_name')
            ->distinct()
            ->get();

        $auditors = Auditor::select('id', 'auditor_id', DB::raw('CONCAT(auditor_first_name, " ", auditor_last_name) as auditor_name'))
            ->distinct()
            ->get();

        $classifications = Classification::select('id', 'classification_id', 'classification_name')
            ->distinct()
            ->get();

        return view('process/assessments/control-assessments/create', compact('controlAssessment', 'bestPractices', 'locations', 'auditors', 'classifications'));
    }

    public function update(ControlAssessment $controlAssessment, ControlAssessmentRequest $request)
    {
        abort_unless(auth()->user()->canWrite(), 403);
        $attributes = $request->validated();

        $controlAssessment->update($attributes);

        return redirect(route('control-assessments.index'))->with('success', 'Control Assessment updated successfully.');
    }

    public function destroy(ControlAssessment $controlAssessment)
    {
        abort_unless(auth()->user()->canDelete(), 403);

        $findings = $controlAssessment->findings;

        foreach ($findings as $finding) {
            $finding->categories()->detach();
            $finding->delete();
        }

        $controlAssessment->delete();

        return redirect(route('control-assessments.index'))->with('success', 'Control Assessment deleted successfully.');
    }
}
