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
        Content::create($request->validated());

        return redirect(route('contents.index'))
            ->with('success', 'Content saved successfully.');
    }

    public function edit(Content $content): View
    {
        return view('contents.create', compact('content'));
    }

    public function update(ContentRequest $request, Content $content): RedirectResponse
    {
        $content->update($request->validated());

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
        $content->delete();

        return redirect(route('contents.index'))
            ->with('success', 'Content deleted successfully.');
    }
}
