<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Process;

class CMSController extends Controller
{
    public function index()
    {
        $process = Process::select('id', 'process_id', 'title')->paginate(20);

        return view('4-Process/cms/process/index', compact('process'));
    }

    public function show(Process $process)
    {
        $process->load('resources');

        return view('4-Process/cms/process/show', compact('process'));
    }

    public function create()
    {
        $process = null;
        return view('4-Process/cms/process/create', compact('process'));
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

        return redirect(route('process.index'))
            ->with('success', 'Process saved successfully.');
    }

    public function edit(Request $request, Process $process)
    {
        return view('4-Process/cms/process/create', compact('process'));
    }

    public function update(Request $request, Process $process)
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


    public function destroy(Process $process)
    {
        $process->load('resources');
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
