<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function create(Process $process)
    {
        return view('4-Process/cms/resources/create', compact('process'));
    }

    public function upload(Request $request)
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
                'glossaryUploadEle' => 'glossary'
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
                'resources' => $resources
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error occurred during the upload process',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An unexpected error occurred during the upload process',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
