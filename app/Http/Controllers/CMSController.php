<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Process;

class CMSController extends Controller
{
    public function index()
    {
        $process = Process::select('id', 'process_id', 'title')->paginate(20);

        return view('process/cms/process/index', compact('process'));
    }

    public function show(Process $cm)
    {
        $process = $cm;
        $process->load('resources');

        return view('process/cms/process/show', compact('process'));
    }

    public function create()
    {
        $cm = null;
        return view('process/cms/process/create', compact('cm'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'process_id' => ['required', 'unique:cms_process'],
            'title' => 'required',
            'title_ar' => 'nullable',
            'description' => 'nullable',
        ]);

        Process::create($attributes);

        return redirect(route('cms.index'))
            ->with('success', 'Process saved successfully.');
    }

    public function edit(Request $request, Process $cm)
    {
        return view('process/cms/process/create', compact('cm'));
    }

    public function update(Request $request, Process $cm)
    {
        $attributes = $request->validate([
            'process_id' => ['required', 'unique:cms_process,process_id,' . $cm->id],
            'title' => 'required',
            'title_ar' => 'nullable',
            'description' => 'nullable',
        ]);

        $cm->update($attributes);

        return redirect(route('cms.index'))
            ->with('success', 'Process saved successfully.');
    }


    public function destroy(Process $cm)
    {
        $cm->load('resources');
        if ($cm->resources()->count() > 0) {
            return redirect(route('cms.index'))
                ->with('error', 'Process cannot be deleted as it has resources attached to it.');
        } else {
            $cm->delete();
        }
        return redirect(route('cms.index'))
            ->with('success', 'Process deleted successfully.');
    }
}
