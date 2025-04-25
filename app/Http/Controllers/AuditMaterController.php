<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\AuditFinding;
use App\Models\ControlMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditMaterController extends Controller
{
    private $_routeName = "audit-registrations";
    private $_primaryKey = "audit_id";

    // 2.Controller - SHOW DATA INTO THE LIST
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
            ->get();
        // $audits = Audit::select('id', 'audit_id', 'audit_name', 'audit_start_date', 'audit_end_date')->with('findings.controls')->get();


        // $auditData = DB::table('audit_master_table as a')
        //     ->join('audit_findings_table as af', 'a.audit_id', '=', 'af.audit_id')
        //     ->join('audit_finding_vs_control_table as avc', 'af.audit_finding_id', '=', 'avc.audit_finding_id')
        //     ->select(
        //         'a.audit_id',
        //         'a.audit_name',
        //         DB::raw("CONCAT(a.audit_id, ' - ', a.audit_name) as audit_fullname"),
        //         'a.audit_description',
        //         DB::raw("CONCAT(DATE_FORMAT(a.audit_start_date, '%d %b %Y'), ' - ', DATE_FORMAT(a.audit_end_date, '%d %b %Y')) as start_end_date"),
        //         DB::raw("GROUP_CONCAT(avc.control_id SEPARATOR '<br>') as control_ids")
        //     )
        //     ->groupBy('a.audit_id', 'a.audit_name', 'a.audit_description', 'a.audit_start_date', 'a.audit_end_date')
        //     ->when($auditId, function ($query, $auditId) {
        //         return $query->where('a.audit_id', $auditId);
        //     })->when($controlId, function ($query, $controlId) {
        //         return $query->where('avc.control_id', $controlId);
        //     })->when($startEndDate, function ($query, $startEndDate) {
        //         return $query->where('a.control_assessment_start_date', $startEndDate);
        //     })->when($startEndDate, function ($query, $startEndDate) {
        //         return $query->orWhere('a.control_assessment_end_date', $startEndDate);
        //     })
        //     ->orderBy('a.audit_id')
        //     ->get();



        $auditNames = Audit::selectRaw("DISTINCT CONCAT(audit_id, ' - ', audit_name) as name, audit_id")
            ->get();

        $controlNames = ControlMaster::from('control_master_table as cm')
            ->selectRaw("DISTINCT cm.control_id, CONCAT(cm.control_id, ' - ', cm.control_name) as name")
            ->join('audit_finding_vs_control_table as avc', 'cm.control_id', '=', 'avc.control_id')
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/1-AuditMasterList', compact('audits', 'auditNames', 'controlNames', 'routeName', 'primaryKey'));
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

        return redirect(route('audit-findings.create', $audit->audit_id));
    }


    public function update(Audit $audit, Request $request)
    {
        $attributes = $request->validate([
            'audit_id' => ['required', 'unique:audit_master_table,audit_id,' . $audit->id],
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

        $audit->update($attributes);

        return redirect(route('audit-registrations.index'));
    }

    public function destroy(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = Audit::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();

        foreach ($data->findings as $finding) {
            $finding->categories()->detach();
            $finding->controls()->detach();
            $finding->delete();
        }

        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $assessments = $request->input('assessments');


        if ($assessments) {
            $assessmentIds = explode(',', $assessments);

            foreach ($assessmentIds as $assessmentId) {
                $assessment = Audit::find($assessmentId);

                if ($assessment) {
                    $findings = AuditFinding::where('audit_id', $assessment->audit_id)->get();

                    foreach ($findings as $finding) {
                        $finding->categories()->detach();
                        $finding->controls()->detach();
                        $finding->delete();
                    }

                    $assessment->delete();
                }
            }
        }

        return redirect(route('audit-registrations.index'));
    }



    // 4.Controller - DETAILED TABLE
    public function show(Audit $audit)
    {
        $data = $audit->load('location', 'auditor', 'classification', 'findings', 'bestPractice');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/1-AuditMasterTable', compact('audit', 'data', 'routeName', 'primaryKey'));
    }

    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function create(Request $request)
    {

        $data = $request->session()->get('data');
        $classNames = DB::table('classification_table')
            ->select('classification_id', 'classification_name')
            ->distinct()
            ->get();
        $locNames = DB::table('location_table')
            ->select('location_id', 'location_name')
            ->distinct()
            ->get();
        $auditorNames = DB::table('auditor_table')
            ->select('auditor_id', 'auditor_first_name', 'auditor_last_name')
            ->distinct()
            ->get();

        $practNames = DB::table('best_practice_table')
            ->select('best_practices_id', 'best_practices_name')
            ->distinct()
            ->get();
        $AuditNames = DB::table('audit_master_table')
            ->select('*')
            ->distinct()
            ->get();
        $categories = DB::table('category_table')
            ->select('*')
            ->distinct()
            ->get();
        $controls = DB::table('control_master_table')
            ->select('id', 'control_id', 'control_name')
            ->distinct()
            ->get();

        $DomainNames = DB::table('domain_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditeeNames = DB::table('auditee_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditeeDepartNames = DB::table('department_table')
            ->select('*')
            ->distinct()
            ->get();

        if (is_null($data)) {
            $data = [
                "audit_id" => "",
                "audit_name" => "",
                "audit_description" => "",
                "audit_objectives" => "",
                "classification_name" => "",
                "location_name" => "",
                "audit_start_date" => "",
                "audit_end_date" => "",
                "audit_type" => "",
                "audit_internal_external" => "External",
                "auditing_entity" => "",
                "auditor_first_name" => "",
                "audit_scope" => "",
                "audit_approach" => "",
                "standard_references" => "",
                "best_practice" => "",
            ];
        }

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/1-AuditMasterForm', compact(
            'classNames',
            'locNames',
            'auditorNames',
            'practNames',
            'AuditNames',
            'categories',
            'controls',
            'DomainNames',
            'AuditeeNames',
            'AuditeeDepartNames',
            'data',
            'routeName',
            'primaryKey'
        ));
    }

    public function edit(Audit $audit, Request $request)
    {
        $data = $audit->load('location', 'auditor', 'classification', 'findings', 'bestPractice');

        $classNames = DB::table('classification_table')
            ->select('classification_id', 'classification_name')
            ->distinct()
            ->get();
        $locNames = DB::table('location_table')
            ->select('location_id', 'location_name')
            ->distinct()
            ->get();
        $auditorNames = DB::table('auditor_table')
            ->select('auditor_id', 'auditor_first_name')
            ->distinct()
            ->get();

        $practNames = DB::table('best_practice_table')
            ->select('best_practices_id', 'best_practices_name')
            ->distinct()
            ->get();
        $AuditNames = DB::table('audit_master_table')
            ->select('*')
            ->distinct()
            ->get();
        $categories = DB::table('category_table')
            ->select('*')
            ->distinct()
            ->get();
        $controls = DB::table('control_master_table')
            ->select('id', 'control_id', 'control_name')
            ->distinct()
            ->get();
        $DomainNames = DB::table('domain_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditeeNames = DB::table('auditee_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditeeDepartNames = DB::table('department_table')
            ->select('*')
            ->distinct()
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/1-AuditMasterEditForm', compact('audit', 'classNames', 'locNames', 'auditorNames', 'practNames', 'AuditNames', 'categories', 'controls', 'DomainNames', 'AuditeeNames', 'AuditeeDepartNames', 'routeName', 'data', 'primaryKey'));
    }
}
