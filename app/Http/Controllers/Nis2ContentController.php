<?php

namespace App\Http\Controllers;

use App\Http\Requests\Nis2ContentRequest;
use App\Models\Nis2Content;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class Nis2ContentController extends Controller
{
    public function index(): View
    {
        $nis2Contents = Nis2Content::select('id', 'title', 'sort_order')->orderBy('sort_order')->paginate(20);

        return view('nis2-contents.index', compact('nis2Contents'));
    }

    public function show(Nis2Content $nis2_content): View
    {
        $nis2_content->load('resources');

        return view('nis2-contents.show', ['nis2Content' => $nis2_content]);
    }

    public function create(): View
    {
        $nis2Content = null;

        return view('nis2-contents.create', compact('nis2Content'));
    }

    public function store(Nis2ContentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('nis2-contents/images', 'public');
        }

        Nis2Content::create($data);

        return redirect(route('nis2-contents.index'))
            ->with('success', 'NIS2 content saved successfully.');
    }

    public function edit(Nis2Content $nis2_content): View
    {
        return view('nis2-contents.create', ['nis2Content' => $nis2_content]);
    }

    public function update(Nis2ContentRequest $request, Nis2Content $nis2_content): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($nis2_content->image) {
                Storage::disk('public')->delete($nis2_content->image);
            }
            $data['image'] = $request->file('image')->store('nis2-contents/images', 'public');
        }

        $nis2_content->update($data);

        return redirect(route('nis2-contents.index'))
            ->with('success', 'NIS2 content saved successfully.');
    }

    public function destroy(Nis2Content $nis2_content): RedirectResponse
    {
        $resources = $nis2_content->resources()->get();

        foreach ($resources as $resource) {
            Storage::delete($resource->file_path);
        }

        $nis2_content->resources()->delete();

        if ($nis2_content->image) {
            Storage::disk('public')->delete($nis2_content->image);
        }

        $nis2_content->delete();

        return redirect(route('nis2-contents.index'))
            ->with('success', 'NIS2 content deleted successfully.');
    }
}
