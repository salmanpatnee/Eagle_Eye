<?php

namespace App\Http\Controllers;

use App\Http\Requests\CisoEssentialFrameworkRequest;
use App\Models\CisoEssentialFramework;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CisoEssentialFrameworkController extends Controller
{
    public function index(): View
    {
        $frameworks = CisoEssentialFramework::select('id', 'title')->paginate(20);

        return view('ciso-essential-frameworks.index', compact('frameworks'));
    }

    public function show(CisoEssentialFramework $cisoEssentialFramework): View
    {
        $cisoEssentialFramework->load('resources');

        return view('ciso-essential-frameworks.show', compact('cisoEssentialFramework'));
    }

    public function create(): View
    {
        $cisoEssentialFramework = null;

        return view('ciso-essential-frameworks.create', compact('cisoEssentialFramework'));
    }

    public function store(CisoEssentialFrameworkRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('ciso-essential-frameworks/images', 'public');
        }

        CisoEssentialFramework::create($data);

        return redirect(route('ciso-essential-frameworks.index'))
            ->with('success', 'Framework saved successfully.');
    }

    public function edit(CisoEssentialFramework $cisoEssentialFramework): View
    {
        return view('ciso-essential-frameworks.create', compact('cisoEssentialFramework'));
    }

    public function update(CisoEssentialFrameworkRequest $request, CisoEssentialFramework $cisoEssentialFramework): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($cisoEssentialFramework->image) {
                Storage::disk('public')->delete($cisoEssentialFramework->image);
            }
            $data['image'] = $request->file('image')->store('ciso-essential-frameworks/images', 'public');
        }

        $cisoEssentialFramework->update($data);

        return redirect(route('ciso-essential-frameworks.index'))
            ->with('success', 'Framework saved successfully.');
    }

    public function destroy(CisoEssentialFramework $cisoEssentialFramework): RedirectResponse
    {
        $resources = $cisoEssentialFramework->resources()->get();

        foreach ($resources as $resource) {
            Storage::delete($resource->file_path);
        }

        $cisoEssentialFramework->resources()->delete();

        if ($cisoEssentialFramework->image) {
            Storage::disk('public')->delete($cisoEssentialFramework->image);
        }

        $cisoEssentialFramework->delete();

        return redirect(route('ciso-essential-frameworks.index'))
            ->with('success', 'Framework deleted successfully.');
    }
}
