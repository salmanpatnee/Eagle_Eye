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
        $status = request('status');

        $audits = Audit::with('findings.controls')
            ->withCount('findings')
            ->select(
                'id',
                'audit_id',
                'audit_name',
                'status'
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
            ->when($status, fn ($q) => $q->where('status', $status))
            ->paginate(20);

        $auditNames = Audit::selectRaw("DISTINCT CONCAT(audit_id, ' - ', audit_name) as name, audit_id")
            ->get();

        $controlNames = ControlMaster::from('control_master_table as cm')
            ->selectRaw("DISTINCT cm.control_id, CONCAT(cm.control_id, ' - ', cm.control_name) as name")
            ->join('audit_finding_vs_control_table as avc', 'cm.control_id', '=', 'avc.control_id')
            ->get();

        $statusOptions = [
            (object) ['status_id' => 'In-Progress', 'status_text' => 'In-Progress'],
            (object) ['status_id' => 'Completed', 'status_text' => 'Completed'],
        ];

        return view('process/assessments/audit-assessments/index', compact('audits', 'auditNames', 'controlNames', 'auditId', 'controlId', 'startEndDate', 'status', 'statusOptions'));
    }

    public function show(Audit $auditAssessment, Request $request)
    {
        $auditAssessment->load('location', 'auditor', 'classification', 'bestPractice');

        $search = $request->input('search');
        $status = $request->input('status');

        $paginatedFindings = $auditAssessment->findings()
            ->when($search, fn ($q) => $q->where(function ($q) use ($search) {
                $q->where('audit_finding_id', 'LIKE', "%{$search}%")
                    ->orWhere('audit_finding_name', 'LIKE', "%{$search}%");
            }))
            ->when($status, fn ($q) => $q->where('audit_finding_status', $status))
            ->paginate(15)
            ->withQueryString();

        if ($request->ajax()) {
            return view('process/assessments/audit-assessments/_findings-table',
                compact('paginatedFindings'));
        }

        return view('process/assessments/audit-assessments/show',
            compact('auditAssessment', 'paginatedFindings'));
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
            'audit_id' => ['required', 'unique:audit_master_table,audit_id,'.$auditAssessment->id],
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

    public function replicate(Audit $auditAssessment, Request $request)
    {
        abort_unless(auth()->user()->canWrite(), 403);

        $request->validate([
            'audit_id' => 'required|unique:audit_master_table,audit_id',
            'audit_name' => 'required|string',
            'audit_description' => 'nullable|string',
        ]);

        $new = $auditAssessment->replicate();
        $new->audit_id = $request->audit_id;
        $new->audit_name = $request->audit_name;
        $new->audit_description = $request->audit_description;
        $new->status = 'In-Progress';
        $new->save();

        $auditAssessment->load('findings.categories', 'findings.controls', 'findings.custodians', 'findings.assets', 'findings.assetsGroups');

        foreach ($auditAssessment->findings as $finding) {
            $newFinding = $finding->replicate();
            $newFinding->audit_id = $new->audit_id;
            $newFinding->save();

            $newFinding->categories()->attach($finding->categories->pluck('category_id'));
            $newFinding->controls()->attach($finding->controls->pluck('control_id'));
            $newFinding->custodians()->attach($finding->custodians->pluck('custodian_role_id'));
            $newFinding->assets()->attach($finding->assets->pluck('asset_id'));
            $newFinding->assetsGroups()->attach($finding->assetsGroups->pluck('asset_group_id'));
        }

        return redirect(route('audit-assessments.edit', $new->id))
            ->with('success', 'Audit Assessment replicated successfully.');
    }

    public function complete(Audit $auditAssessment)
    {
        abort_unless(auth()->user()->canWrite(), 403);

        $auditAssessment->status = 'Completed';
        $auditAssessment->save();

        return redirect(route('audit-assessments.show', $auditAssessment->id))
            ->with('success', 'Audit Assessment marked as Completed.');
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
