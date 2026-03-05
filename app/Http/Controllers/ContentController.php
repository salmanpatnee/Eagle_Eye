<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index(): View
    {
        $contents = Content::select('id', 'title', 'category')->paginate(20);

        return view('contents.index', compact('contents'));
    }

    public function show(Content $content): View
    {
        $content->load('resources');

        return view('contents.show', compact('content'));
    }

    public function create(): View
    {
        $content = null;

        return view('contents.create', compact('content'));
    }

    public function store(ContentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('contents/images', 'public');
        }

        Content::create($data);

        return redirect(route('contents.index'))
            ->with('success', 'Content saved successfully.');
    }

    public function edit(Content $content): View
    {
        return view('contents.create', compact('content'));
    }

    public function update(ContentRequest $request, Content $content): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($content->image) {
                Storage::disk('public')->delete($content->image);
            }
            $data['image'] = $request->file('image')->store('contents/images', 'public');
        }

        $content->update($data);

        return redirect(route('contents.index'))
            ->with('success', 'Content saved successfully.');
    }

    public function destroy(Content $content): RedirectResponse
    {
        $resources = $content->resources()->get();

        foreach ($resources as $resource) {
            Storage::delete($resource->file_path);
        }

        $content->resources()->delete();

        if ($content->image) {
            Storage::disk('public')->delete($content->image);
        }

        $content->delete();

        return redirect(route('contents.index'))
            ->with('success', 'Content deleted successfully.');
    }
}
