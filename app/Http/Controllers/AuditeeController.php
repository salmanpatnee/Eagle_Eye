<?php

namespace App\Http\Controllers;

use App\Models\Auditee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditeeController extends Controller
{
    private $_routeName = "auditees";
    private $_primaryKey = "auditee_id";

    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'auditee_id' => ['required', 'unique:auditee_table'],
            'auditee_first_name' => ['required'],
            'auditee_last_name' => ['nullable'],
            'auditee_department' => ['required'],
        ]);

        Auditee::create($attributes);

        return redirect('/auditee-list')->with('success', 'Location information has been saved.');
    }

    // 1.Controller - DATA ENTER INTO THE DATABASE TABLE
    public function update(Auditee $auditee, Request $request)
    {
        $attributes = $request->validate([
            'auditee_id' => ['required', 'unique:auditee_table,auditee_id,' . $auditee->id],
            'auditee_first_name' => ['required'],
            'auditee_last_name' => ['nullable'],
            'auditee_department' => ['required'],
        ]);

        $auditee->update($attributes);

        return redirect('/auditee-list')->with('success', 'Location information has been saved.');
    }


    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('auditee_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/4-AuditeeList', compact('columns', 'routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {

        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = Auditee::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('auditee_table')->whereIn('auditee_id', $selecteddelete)->delete();
        }
        return redirect('/auditee-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show(Auditee $auditee)
    {
        $data = $auditee;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/4-AuditeeTable', compact('auditee', 'routeName', 'data', 'primaryKey'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $DepartNames = DB::table('department_table')
            ->select('*')
            ->distinct()
            ->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/4-AuditeeForm', compact('DepartNames', 'routeName', 'primaryKey'));
    }

    public function edit(Auditee $auditee)
    {
        $data = $auditee;
        $DepartNames = DB::table('department_table')
            ->select('*')
            ->distinct()
            ->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/9-Audit/4-AuditeeEditForm', compact('DepartNames', 'auditee', 'routeName', 'data', 'primaryKey'));
    }
}
