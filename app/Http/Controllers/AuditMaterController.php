<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\ControlMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditMaterController extends Controller
{

    public function index()
    {
        $auditId = request('audit_id');
        $controlId = request('control_id');
        $startEndDate = request('start_end_date');


        $audits = Audit::with('findings.controls')
            ->withCount('findings')
            ->select(
                'id',
                'audit_id',
                'audit_name'
            )
            ->selectRaw("CONCAT(DATE_FORMAT(audit_start_date, '%d %b %Y'), ' - ', DATE_FORMAT(audit_end_date, '%d %b %Y')) as start_end_date")
            ->when($auditId, function ($query) use ($auditId) {
                return $query->where('audit_id', $auditId);
            })
            ->when($controlId, function ($query) use ($controlId) {
                return $query->whereHas('findings.controls', function ($q) use ($controlId) {
                    $q->where('control_master_table.control_id', $controlId);
                });
            })
            ->when($startEndDate, function ($query) use ($startEndDate) {
                return $query->where('audit_start_date', $startEndDate);
            })
            ->when($startEndDate, function ($query) use ($startEndDate) {
                return $query->orWhere('audit_end_date', $startEndDate);
            })
            ->paginate(20);

        $auditNames = Audit::selectRaw("DISTINCT CONCAT(audit_id, ' - ', audit_name) as name, audit_id")
            ->get();

        $controlNames = ControlMaster::from('control_master_table as cm')
            ->selectRaw("DISTINCT cm.control_id, CONCAT(cm.control_id, ' - ', cm.control_name) as name")
            ->join('audit_finding_vs_control_table as avc', 'cm.control_id', '=', 'avc.control_id')
            ->get();

        return view('process/assessments/audit-assessments/index', compact('audits', 'auditNames', 'controlNames', 'auditId', 'controlId', 'startEndDate'));
    }

    public function show(Audit $auditAssessment)
    {
        $auditAssessment->load('location', 'auditor', 'classification', 'findings', 'bestPractice');

        return view('process/assessments/audit-assessments/show', compact('auditAssessment'));
    }

    public function create()
    {

        $auditAssessment = null;

        $classifications = DB::table('classification_table')
            ->select('classification_id', 'classification_name')
            ->distinct()
            ->get();
        $locations = DB::table('location_table')
            ->select('location_id', 'location_name')
            ->distinct()
            ->get();
        $auditors = DB::table('auditor_table')
            ->select('auditor_id', 'auditor_first_name', 'auditor_last_name')
            ->distinct()
            ->get();

        $bestPractices = DB::table('best_practice_table')
            ->select('best_practices_id', 'best_practices_name')
            ->distinct()
            ->get();
        $audits = DB::table('audit_master_table')
            ->select('*')
            ->distinct()
            ->get();


        return view('process/assessments/audit-assessments/create', compact(
            'classifications',
            'locations',
            'auditors',
            'bestPractices',
            'audits',
            'auditAssessment'
        ));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'audit_id' => ['required', 'unique:audit_master_table'],
            'audit_name' => ['required'],
            'audit_description' => ['nullable'],
            'classification_id' => ['required'],
            'audit_objectives' => ['nullable'],
            'location_id' => ['required'],
            'audit_start_date' => ['required'],
            'audit_end_date' => ['required'],
            'auditor_id' => ['required'],
            'audit_type' => ['nullable'],
            'audit_internal_external' => ['nullable'],
            'auditing_entity' => ['nullable'],
            'audit_scope' => ['nullable'],
            'audit_approach' => ['nullable'],
            'standard_references' => ['nullable'],
            'best_practice' => ['nullable'],
        ]);

        $audit = Audit::create($attributes);

        return redirect(route('audit-findings.create', $audit->id));
    }

    public function edit(Audit $auditAssessment)
    {
        $auditAssessment->load('location', 'auditor', 'classification', 'bestPractice');

        $classifications = DB::table('classification_table')
            ->select('classification_id', 'classification_name')
            ->distinct()
            ->get();
        $locations = DB::table('location_table')
            ->select('location_id', 'location_name')
            ->distinct()
            ->get();
        $auditors = DB::table('auditor_table')
            ->select('auditor_id', 'auditor_first_name', 'auditor_last_name')
            ->distinct()
            ->get();

        $bestPractices = DB::table('best_practice_table')
            ->select('best_practices_id', 'best_practices_name')
            ->distinct()
            ->get();
        $audits = DB::table('audit_master_table')
            ->select('*')
            ->distinct()
            ->get();


        return view('process/assessments/audit-assessments/create', compact(
            'classifications',
            'locations',
            'auditors',
            'bestPractices',
            'audits',
            'auditAssessment'
        ));
    }


    public function update(Audit $auditAssessment, Request $request)
    {
        $attributes = $request->validate([
            'audit_id' => ['required', 'unique:audit_master_table,audit_id,' . $auditAssessment->id],
            'audit_name' => ['required'],
            'audit_description' => ['nullable'],
            'classification_id' => ['required'],
            'audit_objectives' => ['nullable'],
            'location_id' => ['required'],
            'audit_start_date' => ['required'],
            'audit_end_date' => ['required'],
            'auditor_id' => ['required'],
            'audit_type' => ['nullable'],
            'audit_internal_external' => ['nullable'],
            'auditing_entity' => ['nullable'],
            'audit_scope' => ['nullable'],
            'audit_approach' => ['nullable'],
            'standard_references' => ['nullable'],
            'best_practice' => ['nullable'],
        ]);

        $auditAssessment->update($attributes);

        return redirect(route('audit-assessments.index'));
    }

    public function destroy(Audit $auditAssessment)
    {
        $auditAssessment->load('findings');

        foreach ($auditAssessment->findings as $finding) {
            $finding->categories()->detach();
            $finding->controls()->detach();
            $finding->delete();
        }

        $auditAssessment->delete();

        return redirect(route('audit-assessments.index'))->with('success', 'Audit Assessment deleted successfully.');
    }
}
