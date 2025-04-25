<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\Classification;
use App\Models\ControlMaster;
use App\Models\Location;
use App\Models\Risk;
use App\Models\RiskAssessment;
use App\Models\RiskAssessmentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiskAssessmentController extends Controller
{

    private $_routeName = "risk-assessments";
    private $_primaryKey = "risk_assessment_id";

    public function index()
    {
        $riskAssessmentId = request('risk_assessment_id');
        $riskId = request('risk_id');
        $startEndDate = request('start_end_date');

        $riskAssessments = RiskAssessment::with('findings')
            ->withCount('findings')
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
                return $query->where('risk_assessment_start_date', $startEndDate);
            })
            ->when($startEndDate, function ($query) use ($startEndDate) {
                return $query->orWhere('risk_assessment_end_date', $startEndDate);
            })
            ->get();

        $riskAssessmentNames = RiskAssessment::selectRaw("DISTINCT CONCAT(risk_assessment_id, ' - ', risk_assessment_name) as name, risk_assessment_id")
            ->get();


        $riskNames = ControlMaster::from('risk_master_table as r')
            ->selectRaw("DISTINCT r.risk_id, CONCAT(r.risk_id, ' - ', r.risk_name) as name")
            ->join('risk_vs_control_table as rvc', 'r.risk_id', '=', 'rvc.risk_id')
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/12-RiskAssessment/1-RiskAssessmentList', compact('riskAssessments', 'riskAssessmentNames', 'riskNames', 'routeName', 'primaryKey'));
    }

    public function destroy(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        
        $data = RiskAssessment::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        foreach ($data->findings as $finding) {
            $finding->delete();
        }

        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $assessments = $request->input('assessments');


        if ($assessments) {
            $assessmentIds = explode(',', $assessments);

            foreach ($assessmentIds as $assessmentId) {
                $assessment = RiskAssessment::find($assessmentId);



                if ($assessment) {
                    $assessment->load('findings');
                    // return $assessment;
                    // $findings = RiskAssessmentDetail::where('risk_assessment_id', $assessmentId)->get();

                    foreach ($assessment->findings as $finding) {
                        $finding->delete();
                    }

                    $assessment->delete();
                }
            }
        }

        return redirect(route('risk-assessments.index'));
    }


    // 2.Controller - SHOW DATA INTO THE LIST


    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('risk_assessment_master_table')->whereIn('risk_assessment_id', $selecteddelete)->delete();
        }
        return redirect(route('risk-assessments.index'));
    }



    // 4.Controller - DETAILED TABLE
    public function show(RiskAssessment $riskAssessment)
    {
        $data = $riskAssessment->load('location', 'auditor', 'classification', 'findings');


        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/12-RiskAssessment/1-RiskAssessmentTable', compact('riskAssessment','routeName', 'data', 'primaryKey'));
    }


    public function create(Request $request)
    {
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

        return view('4-Process/12-RiskAssessment/create', compact('locations', 'auditors', 'classifications', 'routeName', 'primaryKey'));
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
        ]);

        $riskAssessmsnt = RiskAssessment::create($attributes);

        return redirect(route('risk-assessment-findings.create', $riskAssessmsnt->risk_assessment_id));
    }

    public function edit(RiskAssessment $riskAssessment)
    {
        $data = $riskAssessment->load('location', 'auditor', 'classification');

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

        return view('4-Process/12-RiskAssessment/edit', compact('locations', 'auditors', 'classifications', 'riskAssessment', 'routeName', 'data', 'primaryKey'));
    }

    public function update(RiskAssessment $riskAssessment, Request $request)
    {


        $attributes = $request->validate([
            'risk_assessment_id' => ['required', 'unique:risk_assessment_master_table,risk_assessment_id,' . $riskAssessment->id],
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

        return redirect(route('risk-assessments.index'));
    }


    public function get_control_by_risk(Request $request)
    {
        $riskId = $request->selectedValue;

        $latestAssessmentSubquery = DB::table('control_assessment_details_table')
            ->select('control_id', DB::raw('MAX(id) AS latest_id'))
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
            ->select('c.control_id', 'c.control_name', DB::raw('COALESCE(cad.control_implementation_status, "Not Implemented") AS status'))
            ->where('r.risk_id', $riskId)
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
            ->select(
                DB::raw('COUNT(DISTINCT c.control_id) AS total_controls'),
                DB::raw('COUNT(DISTINCT CASE WHEN cad.control_implementation_status = "Implemented" THEN c.control_id END) AS implemented_controls')
            )
            ->first();

        $status = "Open";
        $statusAr = "يفتح";

        if ($counts->total_controls == $counts->implemented_controls) {
            $status = "Close";
            $statusAr = "يغلق";
        }



        if (count($controls)) {
            $html = "<table>";
            $html .= "<thead>";
            $html .= "<tr>";
            $html .= "<th>Control ID</th>";
            $html .= "<th>Control Name</th>";
            $html .= "<th>Status</th>";
            $html .= "</tr>";
            $html .= "</thead>";
            $html .= "<tbody>";

            $id = "";

            foreach ($controls as $control) {

                $control_id = $id != $control->control_id ? $control->control_id : '';
                $control_name = $id != $control->control_id ? $control->control_name : '';

                $html .= "<tr>";
                $html .= "<td><a href='/control-identification-table/" . $control_id . "' target='_blank'>{$control_id}</a></td>";
                $html .= "<td>{$control_name}</td>";
                $html .= "<td>{$control->status}</td>";
                $html .= "</tr>";
                $id = $control->control_id;
            }

            $html .= "</tbody>";
            $html .= "</table>";


            $html .= '<div class="column"><div class="FieldHead" style="width: 480px;"><p class="FieldHeadEngTxt">Risk Status</p><p class="FieldHeadArbTxt">حالة المخاطر</p></div>';
            $html .= '<p class="status-para"><span class="status ' . $status . '">' . $status . '</span> <span class="status ' . $status . '">' . $statusAr . '</span></p></div>';
            $html .= "<input type='hidden' name='status' value='" . $status . "'>";
        } else {
            $html = "No result";
        }

        return response()->json($html);
    }
}
