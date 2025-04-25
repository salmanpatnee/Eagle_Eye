<?php

namespace App\Http\Controllers;

use App\Models\AuditFinding;
use App\Models\ControlMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlAuditFindingController extends Controller
{
    public function index(Request $request)
    {
        $auditFindingId = $request->input('audit_finding_id') ?? null;
        $controlId = $request->input('control_id') ?? null;

        $controls = ControlMaster::select('control_id', 'control_name')
            ->whereHas('findings')
            ->get();

        $findings = AuditFinding::select('audit_finding_id', 'audit_finding_name')->whereHas('controls')->get();


        $controlsWithAuditFindings = ControlMaster::whereHas('findings', function ($query) use ($auditFindingId) {
            if ($auditFindingId) {
                $query->where('audit_findings_table.audit_finding_id', $auditFindingId);
            }
        })
            ->with(['findings' => function ($query) use ($auditFindingId) {
                if ($auditFindingId) {
                    $query->where('audit_findings_table.audit_finding_id', $auditFindingId);
                }
            }])
            ->when($controlId, function ($query, $controlId) {
                $query->where('control_master_table.control_id', $controlId);
            })
            ->get();

        return view('4-Process/9-Audit/7-ControlAuditTable', compact('controlsWithAuditFindings', 'controls', 'findings'));
    }

    public function auditVsControls(Request $request)
    {
        $controlId = $request->input('control_id') ?? null;
        $auditFindingId = $request->input('audit_finding_id') ?? null;

        $controls = ControlMaster::select('control_id', 'control_name')
            ->whereHas('findings')
            ->get();

        $findings = AuditFinding::select('audit_finding_id', 'audit_finding_name')->whereHas('controls')->get();

        $auditFindingsWithControls = AuditFinding::whereHas('controls', function ($query) use ($controlId) {
            if ($controlId) {
                $query->where('control_master_table.control_id', $controlId);
            }
        })
            ->with(['controls' => function ($query) use ($controlId) {
                if ($controlId) {
                    $query->where('control_master_table.control_id', $controlId);
                }
            }])
            ->when($auditFindingId, function ($query, $auditFindingId) {
                $query->where('audit_findings_table.audit_finding_id', $auditFindingId);
            })
            ->get();


        return view('4-Process/9-Audit/7-AuditControlTable', compact('auditFindingsWithControls', 'controls', 'findings'));
    }
}
