<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuditPlanRequest;
use App\Models\Auditee;
use App\Models\Auditor;
use App\Models\AuditPlan;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditPlanController extends Controller
{
    private $_routeName = "audit.plan";
    private $_primaryKey = "audit_id";

    public function index()
    {
        $auditPlans = AuditPlan::select('audit_id', 'audit_name', 'audit_plan_start_date', 'audit_plan_end_date')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/AuditPlan/index', compact('auditPlans', 'routeName', 'primaryKey'));
    }

    public function show(AuditPlan $auditPlan)
    {
        $data = $auditPlan->with(['auditee', 'auditor', 'location'])->first();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/AuditPlan/show', compact('auditPlan', 'data', 'routeName', 'primaryKey'));
    }

    public function create()
    {
        $auditors = Auditor::select('auditor_id', 'auditor_first_name', 'auditor_last_name')->get();
        $auditees = Auditee::select('auditee_id', 'auditee_first_name', 'auditee_last_name')->get();
        $locations = Location::select('location_id', 'location_name')->get();
        $auditPlan = null;

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/AuditPlan/create', compact('auditors', 'auditees', 'locations', 'routeName',  'primaryKey', 'auditPlan'));
    }

    public function store(AuditPlanRequest $request)
    {
        $attributes = $request->validated();

        AuditPlan::create($attributes);

        return redirect(route('audit.plan.index'))->with('success', 'Audit plan has been saved.');
    }

    public function edit(AuditPlan $auditPlan)
    {
        $data = $auditPlan->with(['auditee', 'auditor', 'location'])->first();
        $auditors = Auditor::select('auditor_id', 'auditor_first_name', 'auditor_last_name')->get();
        $auditees = Auditee::select('auditee_id', 'auditee_first_name', 'auditee_last_name')->get();
        $locations = Location::select('location_id', 'location_name')->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/AuditPlan/create', compact('auditors', 'auditees', 'locations', 'auditPlan', 'routeName', 'data', 'primaryKey'));
    }

    public function update(AuditPlan $auditPlan, AuditPlanRequest $request)
    {
        $attributes = $request->validated();

        $auditPlan->update($attributes);

        return redirect(route('audit.plan.index'))->with('success', 'Audit plan has been updated.');
    }
            

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);


        $data = AuditPlan::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();
        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');


        if (!empty($selecteddelete)) {
            DB::table('audit_plan_table')->whereIn('audit_id', $selecteddelete)->delete();
        }
        return redirect('/audit-plan-list');
    }





    
}
