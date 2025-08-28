<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuditPlanRequest;
use App\Models\Auditee;
use App\Models\Auditor;
use App\Models\AuditPlan;
use App\Models\Location;

class AuditPlanController extends Controller
{

    public function index()
    {
        $auditPlans = AuditPlan::select('id', 'audit_id', 'audit_name', 'audit_plan_start_date', 'audit_plan_end_date')->paginate(20);

        return view('process/audit-management/audit-plans/index', compact('auditPlans'));
    }

    public function show(AuditPlan $auditPlan)
    {
        $auditPlan->with(['auditee', 'auditor', 'location'])->first();

        return view('process/audit-management/audit-plans/show', compact('auditPlan'));
    }

    public function create()
    {
        $auditors = Auditor::select('auditor_id', 'auditor_first_name', 'auditor_last_name')->get();
        $auditees = Auditee::select('auditee_id', 'auditee_first_name', 'auditee_last_name')->get();
        $locations = Location::select('location_id', 'location_name')->get();
        $auditPlan = null;

        return view('process/audit-management/audit-plans/create', compact('auditors', 'auditees', 'locations', 'auditPlan'));
    }

    public function store(AuditPlanRequest $request)
    {
        $attributes = $request->validated();

        AuditPlan::create($attributes);

        return redirect(route('audit-plans.index'))->with('success', 'Audit plan has been saved.');
    }

    public function edit(AuditPlan $auditPlan)
    {
        $auditPlan->with(['auditee', 'auditor', 'location'])->first();
        $auditors = Auditor::select('auditor_id', 'auditor_first_name', 'auditor_last_name')->get();
        $auditees = Auditee::select('auditee_id', 'auditee_first_name', 'auditee_last_name')->get();
        $locations = Location::select('location_id', 'location_name')->get();


        return view('process/audit-management/audit-plans/create', compact('auditors', 'auditees', 'locations', 'auditPlan'));
    }

    public function update(AuditPlan $auditPlan, AuditPlanRequest $request)
    {
        $attributes = $request->validated();

        $auditPlan->update($attributes);

        return redirect(route('audit-plans.index'))->with('success', 'Audit plan has been updated.');
    }

    public function destroy(AuditPlan $auditPlan)
    {
        $auditPlan->delete();
        return redirect(route('audit-plans.index'))->with('success', 'Audit plan has been deleted.');
    }
}
