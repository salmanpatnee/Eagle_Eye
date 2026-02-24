<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentResourceRequest;
use App\Models\Content;
use App\Models\ISO27001;
use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ContentResourceController extends Controller
{
    private const FILE_INPUT_MAP = [
        'videoUploadEle' => 'guide',
        'checklistUploadEle' => 'checklist',
        'templateUploadEle' => 'template',
        'glossaryUploadEle' => 'glossary',
    ];

    public function checklist(ISO27001 $section): View
    {
        $section->load(['resources' => fn ($query) => $query->where('resource_type', 'checklist')]);

        return view('ciso.iso27001.resources.checklist', ['sectionWithChecklist' => $section]);
    }

    public function videos(ISO27001 $section): View
    {
        $section->load(['resources' => fn ($query) => $query->where('file_type', 'video/mp4')]);

        return view('ciso.iso27001.resources.videos', ['sectionWithVideos' => $section]);
    }

    public function template(ISO27001 $section): View
    {
        $section->load(['resources' => fn ($query) => $query->where('resource_type', 'template')]);

        return view('ciso.iso27001.resources.template', ['sectionWithTemplates' => $section]);
    }

    public function glossary(ISO27001 $section): View
    {
        $section->load(['resources' => fn ($query) => $query->where('resource_type', 'glossary')]);

        return view('ciso.iso27001.resources.glossary', ['sectionWithGlossary' => $section]);
    }

    public function create(Content $content): View
    {
        return view('contents.resource', compact('content'));
    }

    public function store(StoreContentResourceRequest $request): JsonResponse
    {
        $resources = collect(self::FILE_INPUT_MAP)
            ->filter(fn ($resourceType, $inputName) => $request->hasFile($inputName))
            ->mapWithKeys(fn ($resourceType, $inputName) => [
                $resourceType => $this->storeResourceFile($request, $inputName, $resourceType),
            ]);

        return response()->json([
            'message' => 'Resources uploaded successfully',
            'resources' => $resources,
        ]);
    }

    private function storeResourceFile(StoreContentResourceRequest $request, string $inputName, string $resourceType): Resource
    {
        $file = $request->file($inputName);
        $path = $file->store('resources', 'public');

        return Resource::create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $file->getClientMimeType(),
            'resource_type' => $resourceType,
            'resourceable_id' => $request->resourceable_id,
            'resourceable_type' => $request->resourceable_type,
        ]);
    }
}
