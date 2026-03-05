<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentResourceRequest;
use App\Models\CisoEssentialFramework;
use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class CisoEssentialFrameworkResourceController extends Controller
{
    private const FILE_INPUT_MAP = [
        'videoUploadEle' => 'guide',
        'checklistUploadEle' => 'checklist',
        'templateUploadEle' => 'template',
        'glossaryUploadEle' => 'glossary',
    ];

    public function create(CisoEssentialFramework $cisoEssentialFramework): View
    {
        return view('ciso-essential-frameworks.resource', compact('cisoEssentialFramework'));
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
