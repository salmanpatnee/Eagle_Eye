<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlAssessmentRequest;
use App\Models\Auditor;
use App\Models\BestPractice;
use App\Models\Classification;
use App\Models\ControlAssessment;
use App\Models\ControlAssessmentFinding;
use App\Models\ControlMaster;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlAssessmentController extends Controller
{
    private $_routeName = "control-assessments";
    private $_primaryKey = "control_assessment_id";

    public function index(Request $request)
    {

        $controlAssessmentId = request('control_assessment_id');
        $controlId = request('control_id');
        $startEndDate = request('start_end_date');

        $controlAssessments = ControlAssessment::with('findings')
            ->withCount('findings')
            ->select(
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
            ->get();


        $assessments = ControlAssessment::selectRaw("DISTINCT CONCAT(control_assessment_id, ' - ', control_assessment_name) as name, control_assessment_id")
            ->get();

        $controls = ControlMaster::selectRaw("DISTINCT control_master_table.control_id, CONCAT(control_master_table.control_id, ' - ', control_master_table.control_name) as name")
            ->join('control_assessment_details_table', 'control_master_table.control_id', '=', 'control_assessment_details_table.control_id')
            ->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/13-ControlAssessment/index', compact('controlAssessments', 'assessments', 'controls', 'routeName', 'primaryKey'));
    }

    public function show(ControlAssessment $controlAssessment)
    {
        $data = $controlAssessment->load(['bestPractice', 'location', 'auditor', 'classification',  'findings']);
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/13-ControlAssessment/show', compact('controlAssessment', 'routeName', 'data', 'primaryKey'));
    }

    public function create()
    {
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

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/13-ControlAssessment/create', compact('bestPractices', 'locations', 'auditors', 'classifications', 'routeName', 'primaryKey'));
    }

    public function store(ControlAssessmentRequest $request)
    {
        $attributes = $request->all();

        $controlAssessment = ControlAssessment::create($attributes);

        return redirect(route('control-assessment-findings.create', $controlAssessment->control_assessment_id));
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

        $data = $controlAssessment;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/13-ControlAssessment/edit', compact('controlAssessment', 'bestPractices', 'locations', 'auditors', 'classifications', 'routeName', 'data', 'primaryKey'));
    }

    public function update(ControlAssessment $controlAssessment, Request $request)
    {
        $attributes = $request->all();

        $controlAssessment->update($attributes);

        return redirect(route('control-assessments.index'));
    }

    public function destroy(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = ControlAssessment::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $findings = $data->findings();

        foreach ($findings as $finding) {
            $finding->categories()->detach();
            $finding->delete();
        }

        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $assessments = $request->input('assessments');

        if ($assessments) {
            $assessmentIds = explode(',', $assessments);

            foreach ($assessmentIds as $assessmentId) {
                $assessment = ControlAssessment::find($assessmentId);

                if ($assessment) {
                    $findings = ControlAssessmentFinding::where('control_assessment_id', $assessmentId)->get();

                    foreach ($findings as $finding) {
                        $finding->categories()->detach();
                        $finding->delete();
                    }

                    $assessment->delete();
                }
            }
        }

        return redirect(route('control-assessments.index'));
    }
}
