<?php

namespace App\Http\Controllers;

use App\Models\AssetStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetStatusController extends Controller
{
    // To add data into the table
    public function create(){
        $assetstatus = null;
        return view('4-Process/3-Asset/3-AssetStatusForm', compact('assetstatus'));
    }

    // To edit the table
     public function edit($id)
     {
         $assetstatus = DB::table('asset_status_table')->where('asset_status_id', $id)->first();
 
         return view('4-Process/3-Asset/3-AssetStatusForm', compact('assetstatus'));
     }

    
     // To store the edited data into the table
    public function store(Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_status_id' => ['required', 'unique:asset_status_table'],
            'asset_current_status' => 'required',
            'asset_status_description' => 'nullable',
        ]);
        
        DB::table('asset_status_table')->insert($attributes);

        return redirect()->route('assetstatus.index')->with('success', 'Location saved successfully.');
    }


    public function update(AssetStatus $assetStatus, Request $request)
    {
        // Validation
        $attributes = $request->validate([
            'asset_status_id' => ['required', 'unique:asset_status_table,asset_status_id,'.$assetStatus->id],
            'asset_current_status' => 'required',
            'asset_status_description' => 'nullable',
        ]);

        $assetStatus->update($attributes);

        return redirect()->route('assetstatus.index')->with('success', 'Location saved successfully.');
    }

    //----------------------------------------------------------------------------------------------//

    
        // 2.Controller - SHOW DATA INTO THE LIST

        public function index() 
        {
            $AssetStatus = DB::table('asset_status_table')->get();
            return view('4-Process/3-Asset/3-AssetStatusList', ['AssetStatus' => $AssetStatus]);
        }


        // 3.Controller - DELETE RECORD FROM LIST
        public function delete(Request $request) {

        
            $attributes =  $request->validate([
                'record' => ['required'],
            ]);

            $data = AssetStatus::where('id', $attributes['record'])->orWhere('asset_status_id', $attributes['record'])->first();
            $data->delete();
            
            // return $assetStatus;
            // AssetStatus::where('id', $attributes['record'])->delete();


            return redirect('/asset-status-list');  
        }

        // 4.Controller - DETAILED TABLE
        public function show($asset_status_id)
        {
            // Fetch data from the database based on department_id
            $asset_status_id = DB::table('asset_status_table')->where('asset_status_id', $asset_status_id)->first();

            if (!$asset_status_id) {
                abort(404);
            }

            return view('4-Process/3-Asset/3-AssetStatusTable', compact('asset_status_id'));
        } 


}