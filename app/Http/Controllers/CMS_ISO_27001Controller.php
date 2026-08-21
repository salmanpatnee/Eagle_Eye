<?php

namespace App\Http\Controllers;

use App\Http\Requests\ISO27001Request;
use App\Models\ISO27001;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $section = null;

        return view('process/cms/iso27001/create', compact('section'));
    }

    public function store(ISO27001Request $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $data['title_ar'] = $data['title_ar'] ?? '';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('iso27001/images', 'public');
        }

        ISO27001::create($data);

        return redirect(route('iso27001.index'))
            ->with('success', 'Section saved successfully.');
    }

    public function edit(Request $request, ISO27001 $iso27001)
    {
        $section = $iso27001;

        return view('process/cms/iso27001/create', compact('section'));
    }

    public function update(ISO27001Request $request, ISO27001 $iso27001)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($iso27001->image) {
                Storage::disk('public')->delete($iso27001->image);
            }
            $data['image'] = $request->file('image')->store('iso27001/images', 'public');
        }

        $iso27001->update($data);

        return redirect(route('iso27001.index'))
            ->with('success', 'Section saved successfully.');
    }

    public function destroy(ISO27001 $iso27001)
    {
        $iso27001->load('resources');

        if ($iso27001->resources()->count() > 0) {
            return redirect(route('iso27001.index'))
                ->with('error', 'Section cannot be deleted as it has resources attached to it.');
        }

        if ($iso27001->image) {
            Storage::disk('public')->delete($iso27001->image);
        }

        $iso27001->delete();

        return redirect(route('iso27001.index'))
            ->with('success', 'Section deleted successfully.');
    }
}
