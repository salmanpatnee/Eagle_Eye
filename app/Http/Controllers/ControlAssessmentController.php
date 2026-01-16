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

        $controlAssessments = ControlAssessment::with('findings')
            ->withCount('findings')
            ->select(
                'id',
                'control_assessment_id',
                'control_assessment_name'
            )
            ->selectRaw("CONCAT(DATE_FORMAT(control_assessment_start_date, '%d %b %Y'), ' - ', DATE_FORMAT(control_assessment_end_date, '%d %b %Y')) as start_end_date")
            ->when($controlAssessmentId, function ($query) use ($controlAssessmentId) {
                return $query->where('control_assessment_id', $controlAssessmentId);
            })
            ->when($controlId, function ($query) use ($controlId) {
                return $query->whereHas('findings', function ($q) use ($controlId) {
                    $q->where('control_id', $controlId);
                });
            })
            ->when($startEndDate, function ($query) use ($startEndDate) {
                return $query->where('control_assessment_start_date', $startEndDate);
            })
            ->when($startEndDate, function ($query) use ($startEndDate) {
                return $query->orWhere('control_assessment_end_date', $startEndDate);
            })
            ->paginate(20);


        $assessments = ControlAssessment::selectRaw("DISTINCT CONCAT(control_assessment_id, ' - ', control_assessment_name) as name, control_assessment_id")
            ->get();

        $controls = ControlMaster::selectRaw("DISTINCT control_master_table.control_id, control_master_table.control_name")
            ->join('control_assessment_details_table', 'control_master_table.control_id', '=', 'control_assessment_details_table.control_id')
            ->get();

        return view('process/assessments/control-assessments/index', compact('controlAssessments', 'assessments', 'controls', 'controlAssessmentId', 'controlId', 'startEndDate'));
    }

    public function show(ControlAssessment $controlAssessment)
    {
        $controlAssessment->load(['bestPractice', 'location', 'auditor', 'classification',  'findings']);

        return view('process/assessments/control-assessments/show', compact('controlAssessment'));
    }

    public function create()
    {
        $controlAssessment = null;
        $bestPractices = BestPractice::select('id', 'best_practice_id', 'best_practice_name', 'sort_order')
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
        $attributes = $request->all();

        $controlAssessment = ControlAssessment::create($attributes);

        return redirect(route('control-assessment-findings.create', $controlAssessment->id))->with('success', 'Control Assessment saved successfully.');
    }

    public function edit(ControlAssessment $controlAssessment)
    {
        $bestPractices = BestPractice::select('id', 'best_practice_id', 'best_practice_name')
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

    public function update(ControlAssessment $controlAssessment, Request $request)
    {
        $attributes = $request->all();

        $controlAssessment->update($attributes);

        return redirect(route('control-assessments.index'))->with('success', 'Control Assessment updated successfully.');
    }

    public function destroy(ControlAssessment $controlAssessment)
    {

        $findings = $controlAssessment->findings;

        foreach ($findings as $finding) {
            $finding->categories()->detach();
            $finding->delete();
        }

        $controlAssessment->delete();
        return redirect(route('control-assessments.index'))->with('success', 'Control Assessment deleted successfully.');
    }
}
