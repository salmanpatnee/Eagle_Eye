<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use Illuminate\Http\Request;

class LandingSectionController extends Controller
{
    public function index()
    {
        $landingSections = LandingSection::all();

        return view('process/initial-setup/landing-content/index', compact('landingSections'));
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'sections' => 'required|array',
            'sections.*.eyebrow' => 'nullable|string',
            'sections.*.title' => 'nullable|string',
            'sections.*.body' => 'nullable|string',
            'sections.*.meta' => 'nullable|array',
            'sections.*.meta.items' => 'nullable|array',
            'sections.*.meta.items.*.title' => 'nullable|string',
            'sections.*.meta.items.*.body' => 'nullable|string',
            'sections.*.meta.items.*.value' => 'nullable|string',
            'sections.*.meta.items.*.label' => 'nullable|string',
        ]);

        foreach ($attributes['sections'] as $id => $section) {
            if (isset($section['meta'])) {
                $section['meta'] = json_encode($section['meta']);
            }

            LandingSection::whereKey($id)->update($section);
        }

        return redirect(route('landing-content.index'))
            ->with('success', 'Landing page content saved successfully.');
    }
}
