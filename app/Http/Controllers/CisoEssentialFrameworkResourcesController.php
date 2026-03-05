<?php

namespace App\Http\Controllers;

use App\Models\CisoEssentialFramework;
use Illuminate\Contracts\View\View;

class CisoEssentialFrameworkResourcesController extends Controller
{
    public function checklist(CisoEssentialFramework $cisoEssentialFramework): View
    {
        $frameworkWithChecklist = $cisoEssentialFramework->load(['resources' => function ($query) {
            $query->where('resource_type', 'checklist');
        }]);

        return view('ciso-essential-framework.checklist', compact('frameworkWithChecklist'));
    }

    public function videos(CisoEssentialFramework $cisoEssentialFramework): View
    {
        $frameworkWithVideos = $cisoEssentialFramework->load(['resources' => function ($query) {
            $query->where('file_type', 'video/mp4');
        }]);

        return view('ciso-essential-framework.videos', compact('frameworkWithVideos'));
    }

    public function template(CisoEssentialFramework $cisoEssentialFramework): View
    {
        $frameworkWithTemplates = $cisoEssentialFramework->load(['resources' => function ($query) {
            $query->where('resource_type', 'template');
        }]);

        return view('ciso-essential-framework.template', compact('frameworkWithTemplates'));
    }

    public function glossary(CisoEssentialFramework $cisoEssentialFramework): View
    {
        $frameworkWithGlossary = $cisoEssentialFramework->load(['resources' => function ($query) {
            $query->where('resource_type', 'glossary');
        }]);

        return view('ciso-essential-framework.glossary', compact('frameworkWithGlossary'));
    }
}
