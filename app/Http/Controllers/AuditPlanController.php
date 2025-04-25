<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\AuditPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditPlanController extends Controller
{
    private $_routeName = "audits";
    private $_primaryKey = "audit_id";
    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
    {

        $attributes = $request->validate([
            'audit_id' => ['required', 'unique:audit_plan_table'],
            'audit_name' => ['required'],
            'audit_description' => ['nullable'],
            'audit_sponsor' => ['nullable'],
            'audit_scope' => ['nullable'],
            'audit_objectives' => ['nullable'],
            'audit_criteria' => ['nullable'],
            'audit_methodology' => ['nullable'],
            'audit_plan_start_date' => ['required'],
            'audit_plan_end_date' => ['required'],
            'auditing_entity' => ['nullable'],
            'auditee_id' => ['required'],
            'location_id' => ['required'],
            'audit_nature' => ['nullable'],
            'audit_type' => ['nullable'],
        ]);

        AuditPlan::create($attributes);

        return redirect('/audit-plan-list')->with('success', 'Location information has been saved.');
    }

    public function update(AuditPlan $auditPlan, Request $request)
    {

        $attributes = $request->validate([
            'audit_id' => ['required', 'unique:audit_plan_table,audit_id,' . $auditPlan->id],
            'audit_name' => ['required'],
            'audit_description' => ['nullable'],
            'audit_sponsor' => ['nullable'],
            'audit_scope' => ['nullable'],
            'audit_objectives' => ['nullable'],
            'audit_criteria' => ['nullable'],
            'audit_methodology' => ['nullable'],
            'audit_plan_start_date' => ['required'],
            'audit_plan_end_date' => ['required'],
            'auditing_entity' => ['nullable'],
            'auditee_id' => ['required'],
            'location_id' => ['required'],
            'audit_nature' => ['nullable'],
            'audit_type' => ['nullable'],
        ]);

        $auditPlan->update($attributes);


        return redirect('/audit-plan-list')->with('success', 'Location information has been saved.');
    }

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('audit_plan_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/9-Audit/6-AuditPlanList', compact('columns', 'routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        
        $data = AuditPlan::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();
        return redirect(route($this->_routeName.'.index'));

        $selecteddelete = $request->input('selecteddelete');


        if (!empty($selecteddelete)) {
            DB::table('audit_plan_table')->whereIn('audit_id', $selecteddelete)->delete();
        }
        return redirect('/audit-plan-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($audit_id)
    {
        $data = $auditData = DB::table('audit_plan_table')
            ->join('auditee_table', 'audit_plan_table.auditee_id', '=', 'auditee_table.auditee_id')
            ->join('location_table', 'audit_plan_table.location_id', '=', 'location_table.location_id') // Corrected join condition
            ->where('audit_plan_table.audit_id', $audit_id)
            ->select('*')
            ->first();


        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/9-Audit/6-AuditPlanTable', compact('auditData', 'routeName', 'data', 'primaryKey'));
    }




    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $AuditeeNames = DB::table('auditee_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditLocNames = DB::table('location_table')
            ->select('*')
            ->distinct()
            ->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/6-AuditPlanForm', compact('AuditeeNames', 'AuditLocNames', 'routeName',  'primaryKey'));
    }

    public function edit($audit_id)
    {
        $data = $auditData = DB::table('audit_plan_table')
            ->join('auditee_table', 'audit_plan_table.auditee_id', '=', 'auditee_table.auditee_id')
            ->join('location_table', 'audit_plan_table.location_id', '=', 'location_table.location_id') // Corrected join condition
            ->where('audit_plan_table.audit_id', $audit_id)
            ->select('*')
            ->first();


        $AuditeeNames = DB::table('auditee_table')
            ->select('*')
            ->distinct()
            ->get();
        $AuditLocNames = DB::table('location_table')
            ->select('*')
            ->distinct()
            ->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/9-Audit/6-AuditPlanEditForm', compact('AuditeeNames', 'AuditLocNames', 'auditData', 'routeName', 'data', 'primaryKey'));
    }
}
