<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Process;

class CMSController extends Controller
{


    public function processIndex()
    {
        $allProcess = Process::select('id', 'process_id', 'title')->get();
        return view('4-Process/cms/process/index', compact('allProcess'));
    }

    public function processShow(Process $process)
    {
        $process->load('resources');
        return view('4-Process/cms/process/show', compact('process'));
    }

    public function processCreate()
    {
        $process = null;
        return view('4-Process/cms/process/create', compact('process'));
    }

    public function processStore(Request $request)
    {
        $attributes = $request->validate([
            'process_id' => ['required', 'unique:cms_process'],
            'title' => 'required',
            'title_ar' => 'nullable',
            'description' => 'nullable',
        ]);

        Process::create($attributes);

        return redirect(route('process.index'))
            ->with('success', 'Process saved successfully.');
    }

    public function processEdit(Request $request, Process $process)
    {
        return view('4-Process/cms/process/create', compact('process'));
    }

    public function processUpdate(Request $request, Process $process)
    {
        $attributes = $request->validate([
            'process_id' => ['required', 'unique:cms_process,process_id,' . $process->id],
            'title' => 'required',
            'title_ar' => 'nullable',
            'description' => 'nullable',
        ]);

        $process->update($attributes);

        return redirect(route('process.index'))
            ->with('success', 'Process saved successfully.');
    }


    public function processDelete(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        $process = Process::findOrFail($attributes['record']);
        
        if ($process->resources()->count() > 0) {
            return redirect(route('process.index'))
                ->with('error', 'Process cannot be deleted as it has resources attached to it.');
        } else {
            $process->delete();
        }

        

        return redirect(route('process.index'))
            ->with('success', 'Process deleted successfully.');
    }
}
