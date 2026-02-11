<?php

namespace App\Http\Controllers;

use App\Http\Requests\LandingPageContentRequest;
use App\Models\LandingPageContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LandingPageContentController extends Controller
{
    public function welcome(): View
    {
        $landingPageContent = LandingPageContent::first();

        return view('welcome', compact('landingPageContent'));
    }

    public function create(): View
    {
        $landingPageContent = LandingPageContent::first();

        return view('landing-page-content.create', compact('landingPageContent'));
    }

    public function store(LandingPageContentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('hero_image_path')) {
            $data['hero_image_path'] = $request->file('hero_image_path')->store('landing-page', 'public');
        }

        if ($request->hasFile('features_image_path')) {
            $data['features_image_path'] = $request->file('features_image_path')->store('landing-page', 'public');
        }

        $landingPageContent = LandingPageContent::first();

        if ($landingPageContent) {
            $landingPageContent->update($data);
        } else {
            LandingPageContent::create($data);
        }

        return redirect(route('landing-page-content.create'))
            ->with('success', 'Landing page content saved successfully.');
    }
}
