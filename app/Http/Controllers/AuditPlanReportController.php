<?php

namespace App\Http\Controllers;

use App\Models\AuditPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuditPlanReportController extends Controller
{
    public function index()
    {
        $auditPlans = AuditPlan::with('auditor')->get()->map(function ($plan) {
            return [
                'audit_id' => $plan->audit_id,
                'audit_name' => $plan->audit_name,
                'auditor_id' => optional($plan->auditor)->auditor_id,
                'auditor_organization' => optional($plan->auditor)->auditor_organization,
                'auditor' => trim(optional($plan->auditor)->auditor_first_name . ' ' . optional($plan->auditor)->auditor_last_name),
                'audit_type' => $plan->audit_type,
                'audit_scope' => $plan->audit_scope,
                'audit_methodology' => $plan->audit_methodology,
                'audit_criteria' => $plan->audit_criteria,
                'sampling' => $plan->sampling,
                'evidence_needed' => $plan->evidence_needed,
                'schedule' => $plan->schedule,
                'audit_plan_start_date' => $plan->audit_plan_start_date,
                'audit_plan_end_date' => $plan->audit_plan_end_date,
                'cost' => $plan->cost,
                'comment' => $plan->comment,
                'duration_in_days' => Carbon::parse($plan->audit_plan_end_date)->diffInDays(Carbon::parse($plan->audit_plan_start_date)),
            ];
        });


        return view('4-Process/AuditPlanReport/index', compact('auditPlans'));
    }
}
