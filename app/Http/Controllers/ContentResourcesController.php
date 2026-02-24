<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ISO27001;
use App\Models\Resource;
use Illuminate\Http\Request;

class ContentResourcesController extends Controller
{
    public function checklist(Content $content)
    {
        $contentWithChecklist = $content->load(['resources' => function ($query) {
            $query->where('resource_type', 'checklist');
        }]);

        return view('resource.checklist', compact('contentWithChecklist'));
    }

    public function videos(Content $content)
    {
        $contentWithVideos = $content->load(['resources' => function ($query) {
            $query->where('file_type', 'video/mp4');
        }]);

        return view('resource.videos', compact('contentWithVideos'));
    }

    public function template(Content $content)
    {
        $contentWithTemplates = $content->load(['resources' => function ($query) {
            $query->where('resource_type', 'template');
        }]);

        return view('resource.template', compact('contentWithTemplates'));
    }

    public function glossary(Content $content)
    {
        $contentWithGlossary = $content->load(['resources' => function ($query) {
            $query->where('resource_type', 'glossary');
        }]);

        return view('resource.glossary', compact('contentWithGlossary'));
    }

    public function create(ISO27001 $section)
    {
        return view('process\cms\iso27001\resource', compact('section'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'videoUploadEle' => 'nullable|file|max:20480',
                'checklistUploadEle' => 'nullable|file|max:20480',
                'templateUploadEle' => 'nullable|file|max:20480',
                'glossaryUploadEle' => 'nullable|file|max:20480',
                'resource_type' => 'required|in:guide,template,checklist,glossary',
                'resourceable_id' => 'required|string',
                'resourceable_type' => 'required|string',
            ]);

            $resources = collect([
                'videoUploadEle' => 'guide',
                'checklistUploadEle' => 'checklist',
                'templateUploadEle' => 'template',
                'glossaryUploadEle' => 'glossary',
            ])->mapWithKeys(function ($resourceType, $inputName) use ($request) {
                if ($request->hasFile($inputName)) {
                    $file = $request->file($inputName);
                    $path = $file->store('resources', 'public');

                    return [$resourceType => Resource::create([
                        'file_name' => $file->getClientOriginalName(),
                        'file_path' => $path,
                        'file_type' => $file->getClientMimeType(),
                        'resource_type' => $resourceType,
                        'resourceable_id' => $request->resourceable_id,
                        'resourceable_type' => $request->resourceable_type,
                    ])];
                }

                return [];
            });

            return response()->json([
                'message' => 'Resources uploaded successfully',
                'resources' => $resources,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error occurred during the upload process',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An unexpected error occurred during the upload process',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
