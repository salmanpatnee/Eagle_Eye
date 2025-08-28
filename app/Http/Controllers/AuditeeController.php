<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use App\Models\Department;
use Illuminate\Http\Request;

class AuditeeController extends Controller
{

    public function index()
    {
        $auditees = Auditee::with('department')->paginate(20);
        return view('process/audit-management/auditee/index', compact('auditees'));
    }

    public function show(Auditee $auditee)
    {
        $auditee->load('department');
        return view('process/audit-management/auditee/show', compact('auditee'));
    }

    public function create()
    {
        $auditee = null;
        $departments = Department::select('department_id', 'department_name')->distinct()->get();

        return view('process/audit-management/auditee/create', compact('departments', 'auditee'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'auditee_id' => ['required', 'unique:auditee_table'],
            'auditee_first_name' => ['required'],
            'auditee_last_name' => ['nullable'],
            'auditee_department' => ['required'],
        ]);

        Auditee::create($attributes);

        return redirect(route('auditees.index'))->with('success', 'Auditee information has been saved.');
    }

    public function edit(Auditee $auditee)
    {
        $departments = Department::select('department_id', 'department_name')->distinct()->get();

        return view('process/audit-management/auditee/create', compact('departments', 'auditee'));
    }

    public function update(Auditee $auditee, Request $request)
    {
        $attributes = $request->validate([
            'auditee_id' => ['required', 'unique:auditee_table,auditee_id,' . $auditee->id],
            'auditee_first_name' => ['required'],
            'auditee_last_name' => ['nullable'],
            'auditee_department' => ['required'],
        ]);

        $auditee->update($attributes);

        return redirect(route('auditees.index'))->with('success', 'Auditee information has been saved.');
    }


    public function destroy(Auditee $auditee)
    {
        $auditee->delete();
        return redirect(route('auditees.index'))->with('success', 'Auditee has been deleted.');
    }
}
