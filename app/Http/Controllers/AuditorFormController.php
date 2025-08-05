<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use Illuminate\Http\Request;

class AuditorFormController extends Controller
{

    public function index()
    {
        $auditors = Auditor::paginate(20);

        return view('process\audit-management\auditors\index', compact('auditors'));
    }

    public function show(Auditor $auditor)
    {
        return view('process\audit-management\auditors\show', compact('auditor'));
    }

    public function create()
    {
        $auditor = null;

        return view('process\audit-management\auditors\create', compact('auditor'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'auditor_id' => ['required', 'unique:auditor_table'],
            'auditor_first_name' => ['required'],
            'auditor_last_name' => ['nullable'],
            'auditor_organization' => ['nullable'],
            'auditor_contact_number' => ['nullable'],
            'auditor_contact_email' => ['nullable'],
        ]);

        Auditor::create($attributes);

        return redirect(route('auditors.index'))->with('success', 'Auditor information has been saved.');
    }

    public function edit(Auditor $auditor)
    {
        return view('process\audit-management\auditors\create', compact('auditor'));
    }

    public function update(Auditor $auditor, Request $request)
    {
        $attributes = $request->validate([
            'auditor_id' => ['required', 'unique:auditor_table,auditor_id,' . $auditor->id],
            'auditor_first_name' => ['required'],
            'auditor_last_name' => ['nullable'],
            'auditor_organization' => ['nullable'],
            'auditor_contact_number' => ['nullable'],
            'auditor_contact_email' => ['nullable'],
        ]);

        $auditor->update($attributes);

        return redirect(route('auditors.index'))->with('success', 'Auditor information has been updated.');
    }


    public function destroy(Auditor $auditor)
    {
        $auditor->delete();
        return redirect(route('auditors.index'))->with('success', 'Auditor has been deleted.');
    }
}
