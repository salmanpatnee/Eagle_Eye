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

    // public function index()
    // {
    //     $controlAssessmentFindings = ControlAssessmentFinding::all();
    //     $routeName = $this->_routeName;
    //     $primaryKey = $this->_primaryKey;
    //     return view('process/ControlAssessmentFindings/index', compact('controlAssessmentFindings', 'routeName', 'primaryKey'));
    // }

    public function show(ControlAssessmentFinding $controlAssessmentFinding)
    {
        $controlAssessmentFinding->load('categories');
        return view('process/assessments/control-assessment-findings/show', compact('controlAssessmentFinding'));
    }

    public function create(ControlAssessment $controlAssessment)
    {
        $controlAssessment->load(['bestPractice', 'location', 'auditor', 'classification']);
        $controlAssessmentFinding = null;
        $selectedCategoryIds = [];
        // TODO
        $controls = DB::table('control_master_table as c')
            ->join('control_master_table_vs_best_practice_table as cmp', 'c.control_id', '=', 'cmp.control_id')
            ->join('best_practice_table as bpt', 'cmp.best_practice_id', '=', 'bpt.best_practice_id')
            ->leftJoin('control_assessment_details_table as cadt', function ($join) use ($controlAssessment) {
                $join->on('c.control_id', '=', 'cadt.control_id')
                    ->where('cadt.control_assessment_id', '=', $controlAssessment->control_assessment_id);
            })
            ->where('bpt.best_practice_id', $controlAssessment->best_practice_id)
            ->where('c.is_parent_control', 'No')
            ->whereNull('cadt.control_assessment_id')
            ->select('c.control_id', 'c.control_name')
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();


        return view('process/assessments/control-assessment-findings/create', compact('controls', 'categories', 'controlAssessment', 'controlAssessmentFinding', 'selectedCategoryIds'));
    }

    public function store(ControlAssessment $controlAssessment, ControlAssessmentFindingRequest $request)
    {
        $attributes = $request->validated();

        $categories = $attributes['categories'];
        unset($attributes['categories']);

        $controlAssessmentFinding = $controlAssessment->findings()->create($attributes);

        $controlAssessmentFinding->categories()->attach($categories ?? []);

        if ($request->input('submit') === 'exit') {
            return redirect(route('control-assessments.index'))->with('success', 'Control Assessment Finding added successfully.');
        }

        return redirect()->back();
    }

    public function edit(ControlAssessmentFinding $controlAssessmentFinding)
    {
        $controlAssessmentFinding->load('categories');
        $controlAssessment = $controlAssessmentFinding->controlAssessment->load(['bestPractice', 'auditor', 'classification']);

        $controls = DB::table('control_master_table as c')
            ->join('control_master_table_vs_best_practice_table as cmp', 'c.control_id', '=', 'cmp.control_id')
            ->join('best_practice_table as bpt', 'cmp.best_practice_id', '=', 'bpt.best_practice_id')
            ->leftJoin('control_assessment_details_table as cadt', function ($join) use ($controlAssessmentFinding) {
                $join->on('c.control_id', '=', 'cadt.control_id')
                    ->where('cadt.control_assessment_id', '=', $controlAssessmentFinding->control_assessment_id)->whereNot('control_finding_id', $controlAssessmentFinding->control_finding_id);
            })
            ->where('bpt.best_practice_id', $controlAssessment->best_practice_id)
            ->whereNull('cadt.control_assessment_id')
            ->select('c.control_id', 'c.control_name')
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();

        $selectedCategoryIds =  $controlAssessmentFinding->categories->pluck('category_id')->toArray();


        return view('process/assessments/control-assessment-findings/create', compact('controls', 'categories', 'controlAssessment', 'controlAssessmentFinding', 'selectedCategoryIds'));
    }

    public function update(ControlAssessmentFinding $controlAssessmentFinding, ControlAssessmentFindingRequest $request)
    {
        $attributes =  $request->validated();

        $categories = $attributes['categories'] ?? null;
        unset($attributes['categories']);

        $controlAssessmentFinding->update($attributes);

        $controlAssessmentFinding->categories()->sync($categories ?? []);

        return redirect(route('control-assessments.index'))->with('success', 'Control Assessment Finding updated successfully.');
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

            $html = "<div class='max-w-full overflow-x-auto lg:overflow-visible custom-scrollbar'><table class='text-white w-full min-w-[970px]'>";
            $html .= "<thead class='bg-brand-950 border-brand-500 border-y text-left'>";
            $html .= "<tr>";
            $html .= "<th class='px-3 py-3 whitespace-nowrap'><span class='block'>Evidence ID</span></th>";
            $html .= "<th class='px-3 py-3 whitespace-nowrap'><span class='block'>Evidence Name</span></th>";
            $html .= "<th class='px-3 py-3 whitespace-nowrap'><span class='block'>Artifacts</span></th>";
            $html .= "</tr>";
            $html .= "</thead>";
            $html .= "<tbody class='divide-y divide-gray-100'>";

            $id = "";

            foreach ($results as $row) {

                $row_id = $id != $row->evidence_id ? $row->id : '';
                $evidence_id = $id != $row->evidence_id ? $row->evidence_id : '';
                $evidence_name = $id != $row->evidence_id ? $row->evidence_name : '';

                $html .= "<tr>";
                $html .= "<td class='px-3 py-3 whitespace-nowrap'><span class='block font-medium text-gray-700 text-theme-sm'><a target='_blank' href='/evidences/{$row_id}'>{$evidence_id}</a></span></td>";
                $html .= "<td class='px-3 py-3 whitespace-nowrap'><span class='block font-medium text-gray-700 text-theme-sm'>{$evidence_name}</span></td>";
                $html .= "<td class='px-3 py-3 whitespace-nowrap'><span class='block font-medium text-gray-700 text-theme-sm'><a target='_blank' href='/artifacts/{$row->id}'>View</a></span></td>";
                $html .= "</tr>";
                $id = $row->evidence_id;
            }

            $html .= "</tbody>";
            $html .= "</table></div>";
        } else {
            $html = "No result";
        }
        return response()->json($html);
        // return $html;
    }
}
