<?php

namespace App\Http\Controllers;

use App\Models\VulnerabilitySubType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaSubTypeController extends Controller
{
    private $_routeName = "vasubtype";
    private $_primaryKey = "va_sub_type_id";

    // To add data into the table
    public function create()
    {
        $data = $vasubtype = null;
        $vatypes = DB::table('va_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/6-Vulnerabilities/5-VaSubTypeForm', compact('vasubtype', 'vatypes', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $vasubtype = DB::table('va_sub_type_table')->where('va_sub_type_id', $id)->first();
        $vatypes = DB::table('va_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/6-Vulnerabilities/5-VaSubTypeForm', compact('vasubtype', 'vatypes', 'routeName', 'data', 'primaryKey'));
    }


    // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_sub_type_id' => ['required', 'unique:va_sub_type_table'],
            'va_sub_type_name' => 'required',
            'va_sub_type_description' => 'nullable',
            'va_sub_type_remarks' => 'nullable',
            'va_type_id' => 'required',
        ]);

        VulnerabilitySubType::create($attributes);



        return redirect()->route('vasubtype.index')->with('success', 'VA Sub-type saved successfully.');
    }

    public function update(VulnerabilitySubType $vulnerabilitySubType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_sub_type_id' => ['required', 'unique:va_sub_type_table,va_sub_type_id,' . $vulnerabilitySubType->id],
            'va_sub_type_name' => 'required',
            'va_sub_type_description' => 'nullable',
            'va_sub_type_remarks' => 'nullable',
            'va_type_id' => 'required',
        ]);

        $vulnerabilitySubType->update($attributes);


        return redirect()->route('vasubtype.index')->with('success', 'VA Sub-type saved successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        // $columns = DB::table('va_sub_type_table')->get();
        $columns = VulnerabilitySubType::with('type')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/6-Vulnerabilities/5-VaSubTypeList', compact('routeName', 'primaryKey', 'columns'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = VulnerabilitySubType::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('va_sub_type_table')->whereIn('id', $selecteddelete)->delete();
        }
        return redirect('/va-sub-type-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show(VulnerabilitySubType $vulnerabilitySubType)
    {
        $data = $vulnerabilitySubType->load('type');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        // return $vulnerabilitySubType;

        return view('4-Process/6-Vulnerabilities/5-VaSubTypeTable', compact('vulnerabilitySubType', 'routeName', 'data', 'primaryKey'));
    }



    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $vasubtypes = DB::table('va_type_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/6-Vulnerabilities/5-VaSubTypeForm', compact('vasubtypes'));
    }
}
