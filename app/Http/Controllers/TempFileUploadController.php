<?php

namespace App\Http\Controllers;

use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempFileUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('fileAttachment')) {
            $file       = $request->file('fileAttachment');
            $fileName   = $file->getClientOriginalName();
            $folder     = uniqid('file-', true);
            $file->storeAs('files/tmp/' . $folder, $fileName);

            TempFile::create([
                'folder'    => $folder,
                'file'      => $fileName
            ]);

            return $fileName;
        }

        return '';
    }

    public function destroy()
    {
        $tempFile = TempFile::where('file', request()->getContent())->first();

        if ($tempFile) {
            Storage::deleteDirectory('files/tmp/' . $tempFile->folder);
            $tempFile->delete();
        }

        // return response()->noContent();
    }
}
