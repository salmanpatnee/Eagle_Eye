<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNis2ContentResourceRequest;
use App\Models\Nis2Content;
use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class Nis2ContentResourceController extends Controller
{
    private const FILE_INPUT_MAP = [
        'videoUploadEle' => 'guide',
        'checklistUploadEle' => 'checklist',
        'templateUploadEle' => 'template',
        'glossaryUploadEle' => 'glossary',
    ];

    public function create(Nis2Content $nis2_content): View
    {
        return view('nis2-contents.resource', ['nis2Content' => $nis2_content]);
    }

    public function store(StoreNis2ContentResourceRequest $request): JsonResponse
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

    private function storeResourceFile(StoreNis2ContentResourceRequest $request, string $inputName, string $resourceType): Resource
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
