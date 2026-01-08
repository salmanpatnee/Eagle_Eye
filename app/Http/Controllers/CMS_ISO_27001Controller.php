<?php

namespace App\Http\Controllers;

use App\Models\ISO27001;
use Illuminate\Http\Request;
use App\Models\Process;

class CMS_ISO_27001Controller extends Controller
{
    public function index()
    {
        $sections = ISO27001::select('id', 'section_id', 'title')->paginate(20);
        
        return view('process/cms/iso27001/index', compact('sections'));
    }

    public function show(ISO27001 $iso27001)
    {
        $process = $iso27001;
        $process->load('resources');
        
        return view('process/cms/iso27001/show', compact('process'));
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

    public function edit(Request $request, ISO27001 $iso27001)
    {
        $section = $iso27001;
        return view('process/cms/iso27001/create', compact('section'));
    }

    public function update(Request $request, ISO27001 $iso27001)
    {
        $attributes = $request->validate([
            'section_id' => ['required', 'unique:cms_iso27001,section_id,' . $iso27001->id],
            'title' => 'required',
            'title_ar' => 'nullable',
            'description' => 'nullable',
        ]);

        $iso27001->update($attributes);

        return redirect(route('iso27001.index'))
            ->with('success', 'Section saved successfully.');
    }


    public function destroy(ISO27001 $iso27001)
    {
        $iso27001->load('resources');
        
        if ($iso27001->resources()->count() > 0) {
            return redirect(route('iso27001.index'))
                ->with('error', 'Section cannot be deleted as it has resources attached to it.');
        } else {
            $iso27001->delete();
        }
        return redirect(route('iso27001.index'))
            ->with('success', 'Section deleted successfully.');
    }
}
