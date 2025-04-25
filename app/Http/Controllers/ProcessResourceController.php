<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcessResourceController extends Controller
{
    public function videos(Process $process)
    {
        $processWithVideos = $process->load(['resources' => function ($query) {
            $query->where('file_type', 'video/mp4');
        }]);

        // return $processWithVideos;

        return view('4-Process/process/resources/videos', compact('processWithVideos'));
    }

    public function stream(Resource $resource)
    {
        // $video = Resource::findOrFail(Resource $resource);

        // Ensure it's a video
        if ($resource->file_type !== 'video/mp4') {
            abort(403, 'Unauthorized');
        }

        // Path in storage (assuming `storage/app/videos/filename.mp4`)
        $path = storage_path('app/public/' . $resource->file_path);


        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Type' => 'video/mp4',
            'Content-Disposition' => 'inline; filename="' . $resource->file_name . '"'
        ]);
    }

    public function checklist(Process $process)
    {
        $processWithChecklist = $process->load(['resources' => function ($query) {
            $query->where('resource_type', 'checklist');
        }]);

        // return $processWithChecklist;

        return view('4-Process/process/resources/checklist', compact('processWithChecklist'));
    }

    public function template(Process $process)
    {
        $processWithTemplates = $process->load(['resources' => function ($query) {
            $query->where('resource_type', 'template');
        }]);

        // return $processWithTemplates;

        return view('4-Process/process/resources/template', compact('processWithTemplates'));
    }

    public function pdfTemplate(Resource $resource) {

        $resource->load('resourceable');
        return view('4-Process/process/resources/template-pdf', compact('resource'));
    }

    public function glossary(Process $process)
    {
        $processWithGlossary = $process->load(['resources' => function ($query) {
            $query->where('resource_type', 'glossary');
        }]);
        
        return view('4-Process/process/resources/glossary', compact('processWithGlossary'));
    }

    public function destroy(Resource $resource)
    {

        // Delete the directory containing the attachment
        Storage::delete($resource->file_path);

        // Delete the resource record from the database
        $resource->delete();

        // Redirect back to the previous page
        return redirect()->back()->with('success', 'Attachment deleted successfully.');
    }
}
