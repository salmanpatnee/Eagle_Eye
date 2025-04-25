<?php

namespace App\Http\Controllers;

use App\Models\ControlType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlTypeController extends Controller
{
    private $_routeName = "controltype";
    private $_primaryKey = "control_type_id";


    // To add data into the table
    public function create()
    {
        $data=$controltype = null;
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/8-Control/4-ControlTypeForm', compact('controltype','routeName', 'data', 'primaryKey'));
    }

    // To edit the table
    public function edit($id)
    {
        $data=$controltype = DB::table('control_type_table')->where('control_type_id', $id)->first();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/8-Control/4-ControlTypeForm', compact('controltype','routeName', 'data', 'primaryKey'));
    }


    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'control_type_id' => ['required', 'unique:control_type_table'],
            'control_type_name' => 'required',
            'control_type_description' => 'nullable',
        ]);

        ControlType::create($attributes);

        return redirect()->route('controltype.index')->with('success', 'Control Type Saved Successfully.');
    }

    public function update(ControlType $controlType, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'control_type_id' => ['required', 'unique:control_type_table,control_type_id,' . $controlType->id],
            'control_type_name' => 'required',
            'control_type_description' => 'nullable',
        ]);

        $controlType->update($attributes);

        return redirect()->route('controltype.index')->with('success', 'Control Type Saved Successfully.');
    }





    //--------------------------------------------------------------------//

    // 2.Controller - SHOW DATA INTO THE LIST
    public function index()
    {
        $columns = DB::table('control_type_table')->get();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/8-Control/4-ControlTypeList', compact('columns','routeName', 'primaryKey'));
    }

    // 3.Controller - DELETE RECORD FROM LIST
    public function delete(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
            ]);
            
            $data = ControlType::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
            $data->delete();
            
            return redirect(route($this->_routeName.'.index'));

        $selecteddelete = $request->input('selecteddelete');

        if (!empty($selecteddelete)) {
            DB::table('control_type_table')->whereIn('control_type_id', $selecteddelete)->delete();
        }
        return redirect('/control-type-list');
    }



    // 4.Controller - DETAILED TABLE
    public function show($control_type_id)
    {
        // Fetch data from the database based on department_id
        $data=$control_type_id = DB::table('control_type_table')->where('control_type_id', $control_type_id)->first();

        if (!$control_type_id) {
            abort(404);
        }

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/8-Control/4-ControlTypeTable', compact('control_type_id','routeName', 'data', 'primaryKey'));
    }
}
