<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function create() {

        $options = Option::all();

        return view('4-Process.1-InitialSetup.options.create', compact('options'));
    }

    public function update(Request $request){

        $attributes = $request->validate([
            'system_expired_at' => 'nullable|date'
        ]);

        $option = Option::where('key', 'system_expired_at')->first();
        $option->value = $attributes['system_expired_at'];
        $option->save();

        return redirect()->back()->with('success', 'System Expiry Date updated successfully!');
       
    }
}
