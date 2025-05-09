<?php

namespace App\Http\Controllers;

use App\Http\Requests\ControlAssessmentFindingRequest;
use App\Models\Category;
use App\Models\ControlAssessment;
use App\Models\ControlAssessmentFinding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlAssessmentFindingController extends Controller
{
    private $_routeName = "control-assessment-findings";
    private $_primaryKey = "control_finding_id";

    public function index()
    {
        $controlAssessmentFindings = ControlAssessmentFinding::all();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/ControlAssessmentFindings/index', compact('controlAssessmentFindings', 'routeName', 'primaryKey'));
    }

    public function show(ControlAssessmentFinding $controlAssessmentFinding)
    {
        $data=$controlAssessmentFinding->load('categories');
        $controlAssessment = ControlAssessment::find($controlAssessmentFinding->control_assessment_id);
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/ControlAssessmentFindings/show', compact('controlAssessment', 'controlAssessmentFinding', 'routeName', 'data', 'primaryKey'));
    }

    public function create(ControlAssessment $controlAssessment, Request $request)
    {
        $controlAssessment->with(['bestPractice', 'location', 'auditor', 'classification']);

        // TODO
        $controls = DB::table('control_master_table as c')
            ->join('control_master_table_vs_best_practice_table as cmp', 'c.control_id', '=', 'cmp.control_id')
            ->join('best_practice_table as bpt', 'cmp.best_practice_id', '=', 'bpt.best_practices_id')
            ->leftJoin('control_assessment_details_table as cadt', function ($join) use ($controlAssessment) {
                $join->on('c.control_id', '=', 'cadt.control_id')
                    ->where('cadt.control_assessment_id', '=', $controlAssessment->control_assessment_id);
            })
            ->where('bpt.best_practices_id', $controlAssessment->best_practices_id)
            ->where('c.is_parent_control', 'No')
            ->whereNull('cadt.control_assessment_id')
            ->select('c.control_id', 'c.control_name')
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/ControlAssessmentFindings/create', compact('controls', 'categories', 'controlAssessment', 'routeName', 'primaryKey'));
    }

    public function store(ControlAssessment $controlAssessment, ControlAssessmentFindingRequest $request)
    {
        $attributes = $request->validated();

        $categories = $attributes['categories'];
        unset($attributes['categories']);

        $controlAssessmentFinding = $controlAssessment->findings()->create($attributes);

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $controlAssessmentFinding->categories()->attach($categoriesArray);
        }

        if ($request->input('submit') === 'exit') {
            return redirect(route('control-assessments.index'));
        }

        return redirect()->back();
    }

    public function edit(ControlAssessmentFinding $controlAssessmentFinding)
    {
        $data=$controlAssessmentFinding;
        $controlAssessment = ControlAssessment::find($controlAssessmentFinding->control_assessment_id);

        $controls = DB::table('control_master_table as c')
            ->join('control_master_table_vs_best_practice_table as cmp', 'c.control_id', '=', 'cmp.control_id')
            ->join('best_practice_table as bpt', 'cmp.best_practice_id', '=', 'bpt.best_practices_id')
            ->leftJoin('control_assessment_details_table as cadt', function ($join) use ($controlAssessmentFinding) {
                $join->on('c.control_id', '=', 'cadt.control_id')
                    ->where('cadt.control_assessment_id', '=', $controlAssessmentFinding->control_assessment_id)->whereNot('control_finding_id', $controlAssessmentFinding->control_finding_id);
            })
            ->where('bpt.best_practices_id', $controlAssessment->best_practices_id)
            ->whereNull('cadt.control_assessment_id')
            ->select('c.control_id', 'c.control_name')
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();

        $selectedCategoryIds = DB::table('category_table as c')
            ->join('control_assessment_detail_vs_category_table as cvc', 'c.category_id', '=', 'cvc.category_id')
            ->join('control_assessment_details_table as cad', 'cvc.control_assessment_finding_id', '=', 'cad.control_finding_id')
            ->where('cad.control_finding_id', $controlAssessmentFinding->control_finding_id)
            ->pluck('c.category_id')
            ->toArray();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/ControlAssessmentFindings/edit', compact('controls', 'categories', 'controlAssessment', 'controlAssessmentFinding', 'selectedCategoryIds','routeName', 'data', 'primaryKey'));
    }

    public function update(ControlAssessmentFinding $controlAssessmentFinding, ControlAssessmentFindingRequest $request)
    {
        $attributes =  $request->validated();

        $categories = $attributes['categories'] ?? null;
        unset($attributes['categories']);

        $controlAssessmentFinding->update($attributes);

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $controlAssessmentFinding->categories()->sync($categoriesArray);
        }

        return redirect(route('control-assessments.index'));
    }

    public function destroy(ControlAssessmentFinding $controlAssessmentFinding)
    {

        
        $controlAssessmentFinding->categories()->detach();
        $controlAssessmentFinding->delete();

        return redirect()->route('control-assessments.index');
    }

    public function getControlId(Request $request)
    {
        $selectedControlName = $request->input('controlName');

        // Query your database to get the Control ID
        $control = DB::table('control_master_table')
            ->where('control_name', $selectedControlName)
            ->first();

        return response()->json(['control_id' => $control->control_id]);
    }

    public function get_evidence_by_conroller(Request $request)
    {
        $results = DB::table('evidence_vs_artifact_table AS eva')
            ->join('evidence_table AS ev', 'eva.evidence_id', '=', 'ev.evidence_id')
            ->join('evidence_vs_control_table AS evc', 'ev.evidence_id', '=', 'evc.evidence_id')
            ->join('artifact_table AS at', 'eva.artifact_id', '=', 'at.artifact_id')
            ->where('evc.control_id', '=', $request->selectedValue)
            ->orderBy('ev.evidence_id')
            ->select('ev.evidence_id', 'ev.evidence_name', 'at.id')
            ->get();

        if (count($results)) {
            $html = "<table>";
            $html .= "<thead>";
            $html .= "<tr>";
            $html .= "<th>Evidence ID</th>";
            $html .= "<th>Evidence Name</th>";
            $html .= "<th>Artifacts</th>";
            $html .= "</tr>";
            $html .= "</thead>";
            $html .= "<tbody>";

            $id = "";

            foreach ($results as $row) {

                $evidence_id = $id != $row->evidence_id ? $row->evidence_id : '';
                $evidence_name = $id != $row->evidence_id ? $row->evidence_name : '';

                $html .= "<tr>";
                $html .= "<td><a target='_blank' href='/evidences/{$evidence_id}'>{$evidence_id}</a></td>";
                $html .= "<td>{$evidence_name}</td>";
                $html .= "<td><a target='_blank' href='/artifacts/{$row->id}'>View</a></td>";
                $html .= "</tr>";
                $id = $row->evidence_id;
            }

            $html .= "</tbody>";
            $html .= "</table>";
        } else {
            $html = "No result";
        }
        return response()->json($html);
        // return $html;
    }

    public function get_controls_by_bestpractice(Request $request)
    {

        $results = DB::table('control_master_table as c')
            ->join('control_master_table_vs_best_practice_table as cmp', 'c.control_id', '=', 'cmp.control_id')
            ->join('best_practice_table as bpt', 'cmp.best_practices_id', '=', 'bpt.best_practices_id')
            ->leftJoin('control_assessment_details_table as cadt', function ($join) use ($request) {
                $join->on('c.control_id', '=', 'cadt.control_id')
                    ->where('cadt.control_assessment_id', '=', $request->controlAssessmentId);
            })
            ->where('bpt.best_practices_name', $request->bestPracticeName)
            ->whereNull('cadt.control_assessment_id')
            ->select('c.control_id', 'c.control_name')
            ->get();


        if (count($results)) {
            $html = "";

            foreach ($results as $row) {

                $html .= "<option value='{$row->control_id}'>{$row->control_id} - {$row->control_name}</option>";
            }
        } else {
            $html = "No result";
        }

        return response()->json($html);
    }
}
