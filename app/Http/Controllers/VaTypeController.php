<?php

namespace App\Http\Controllers;

use App\Models\VulnerabilityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaTypeController extends Controller
{
    private $_routeName = "vatype";
    private $_primaryKey = "va_type_id";

    // To add data into the table
    public function create()
    {
        $data = $vatype = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/6-Vulnerabilities/4-VaTypeForm', compact('vatype', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $vatype = DB::table('va_type_table')->where('va_type_id', $id)->first();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/6-Vulnerabilities/4-VaTypeForm', compact('vatype', 'routeName', 'data', 'primaryKey'));
    }


    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_type_id' => ['required', 'unique:va_type_table'],
            'va_type_name' => 'required',
            'va_description' => 'nullable',
            'va_remarks' => 'nullable',
        ]);

        VulnerabilityType::create($attributes);


        return redirect()->route('vatype.index')->with('success', 'VA Type saved successfully.');
    }

    // To store the edited data into the table
    public function update(VulnerabilityType $vulnerabilityType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_type_id' => ['required', 'unique:va_type_table,va_type_id,' . $vulnerabilityType->id],
            'va_type_name' => 'required',
            'va_description' => 'nullable',
            'va_remarks' => 'nullable',
        ]);

        $vulnerabilityType->update($attributes);


        return redirect()->route('vatype.index')->with('success', 'VA Type saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('va_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/6-Vulnerabilities/4-VaTypeList', compact('routeName', 'columns', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);
        
        $data = VulnerabilityType::where('id', $attributes['record'])->orWhere('va_type_id', $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName.'.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('va_type_table')->whereIn('va_type_id', $selecteddelete)->delete();
        }
        return redirect('/va-types-list');
    }



    // 4.Controller - DETAILED TABLE

    public function show($vatype)
    {
        // Fetch data from the database based on department_id
        $data = $vatype = DB::table('va_type_table')
            ->where('va_type_id', $vatype)
            ->first();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/6-Vulnerabilities/4-VaTypeTable', compact('vatype', 'routeName', 'data', 'primaryKey'));
    }
}
