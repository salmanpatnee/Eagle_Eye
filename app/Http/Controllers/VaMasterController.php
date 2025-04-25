<?php

namespace App\Http\Controllers;

use App\Models\Vulnerability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VaMasterController extends Controller
{
    private $_routeName = "va";
    private $_primaryKey = "va_id";


    // To add data into the table
    public function create()
    {
        $data = $va = null;
        $cveNames = DB::table('cve_table')->get();
        $cvssNames = DB::table('cvss_table')->get();
        $vatypeNames = DB::table('va_type_table')->get();
        $vasubtypeNames = DB::table('va_sub_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/6-Vulnerabilities/1-VaForm', compact('va', 'cveNames', 'cvssNames', 'vatypeNames', 'vasubtypeNames', 'routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data = $va = DB::table('va_table')->where('va_id', $id)->first();
        $cveNames = DB::table('cve_table')->get();
        $cvssNames = DB::table('cvss_table')->get();
        $vatypeNames = DB::table('va_type_table')->get();
        $vasubtypeNames = DB::table('va_sub_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;


        return view('4-Process/6-Vulnerabilities/1-VaForm', compact('va', 'cveNames', 'cvssNames', 'vatypeNames', 'vasubtypeNames', 'routeName', 'data', 'primaryKey'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_id' => ['required', 'unique:va_table'],
            'va_name' => 'required',
            'va_master_description' => 'nullable',
            //  'cve_id' => 'nullable',
            //  'cvss_id' => 'nullable',
            'va_type_id' => 'required',
            'va_sub_type_id' => 'required',
        ]);

        Vulnerability::create($attributes);



        return redirect()->route('va.index')->with('success', 'VA Saved Successfully.');
    }

    // To store the edited data into the table
    public function update(Vulnerability $vulnerability, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'va_id' => ['required', 'unique:va_table,va_id,' . $vulnerability->id],
            'va_name' => 'required',
            'va_master_description' => 'nullable',
            //  'cve_id' => 'nullable',
            //  'cvss_id' => 'nullable',
            'va_type_id' => 'required',
            'va_sub_type_id' => 'required',
        ]);

        $vulnerability->update($attributes);


        return redirect()->route('va.index')->with('success', 'VA Saved Successfully.');
    }

    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        // $vanames = DB::table('va_table')->get();
        $vanames = Vulnerability::with('type', 'subType')->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/6-Vulnerabilities/1-VaList', compact('routeName', 'vanames', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);
        
        $data = Vulnerability::where('id', $attributes['record'])->orWhere('va_id', $attributes['record'])->first();
        $data->delete();

        return redirect('/va-list');
        
        $selectedvanames = $request->input('selectedvanames');

        if (!empty($selectedvanames)) {
            DB::table('va_table')->whereIn('va_id', $selectedvanames)->delete();
        }
    }


    // 4.Controller - DETAILED TABLE
    public function show(Vulnerability $vulnerability)
    {
        $data =  $vulnerability->load('type', 'subType');
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/6-Vulnerabilities/1-VaTable', compact('vulnerability', 'routeName', 'data', 'primaryKey'));
    }


    // 6.Controller - FIELD RELATED TO THE ANOTHER TABLE
    public function view()
    {
        $cveNames = DB::table('cve_table')
            ->select('*')
            ->distinct()
            ->get();
        $cvssNames = DB::table('cvss_table')
            ->select('*')
            ->distinct()
            ->get();
        $vatypeNames = DB::table('va_type_table')
            ->select('*')
            ->distinct()
            ->get();
        $vasubtypeNames = DB::table('va_sub_type_table')
            ->select('*')
            ->distinct()
            ->get();
        return view('4-Process/6-Vulnerabilities/1-VaForm', compact('cveNames', 'cvssNames', 'vatypeNames', 'vasubtypeNames'));
    }
}
