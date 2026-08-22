<?php

namespace App\Http\Controllers;

use App\Models\Nis2Content;
use Illuminate\Contracts\View\View;

class Nis2ContentResourcesController extends Controller
{
    public function checklist(Nis2Content $nis2_content): View
    {
        $nis2_content->load(['resources' => fn ($query) => $query->where('resource_type', 'checklist')]);

        return view('nis2.checklist', ['nis2ContentWithChecklist' => $nis2_content]);
    }

    public function videos(Nis2Content $nis2_content): View
    {
        $nis2_content->load(['resources' => fn ($query) => $query->where('file_type', 'video/mp4')]);

        return view('nis2.videos', ['nis2ContentWithVideos' => $nis2_content]);
    }

    public function template(Nis2Content $nis2_content): View
    {
        $nis2_content->load(['resources' => fn ($query) => $query->where('resource_type', 'template')]);

        return view('nis2.template', ['nis2ContentWithTemplates' => $nis2_content]);
    }

    public function glossary(Nis2Content $nis2_content): View
    {
        $nis2_content->load(['resources' => fn ($query) => $query->where('resource_type', 'glossary')]);

        return view('nis2.glossary', ['nis2ContentWithGlossary' => $nis2_content]);
    }
}
