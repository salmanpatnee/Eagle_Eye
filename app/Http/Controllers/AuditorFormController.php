<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditorFormController extends Controller
{
    private $_routeName = "auditors";
    private $_primaryKey = "auditor_id";

    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
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

        return redirect('/auditor-list')->with('success', 'Location information has been saved.');
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

        return redirect('/auditor-list')->with('success', 'Location information has been saved.');
    }

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('auditor_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/2-AuditorList', compact('columns', 'routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = Auditor::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('auditor_table')->whereIn('auditor_id', $selecteddelete)->delete();
        }
        return redirect('/auditor-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($auditor_id)
    {
        // Fetch data from the database based on department_id
        $data=$auditor_id = DB::table('auditor_table')->where('auditor_id', $auditor_id)->first();

        if (!$auditor_id) {
            abort(404);
        }

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/2-AuditorTable', compact('auditor_id', 'routeName', 'data', 'primaryKey'));
    }

    public function edit(Auditor $auditor, Request $request)
    {
        $data=$auditor;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/2-AuditorEditForm', compact('auditor', 'routeName', 'data', 'primaryKey'));
    }
}
