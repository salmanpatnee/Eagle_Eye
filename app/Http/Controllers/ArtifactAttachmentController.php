<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtifactAttachmentController extends Controller
{
    public function destroy(Attachment $attachment)
    {

        // Delete the directory containing the attachment
        Storage::delete($attachment->path);

        // Delete the attachment record from the database
        $attachment->delete();

        // Redirect back to the previous page
        return redirect()->back()->with('success', 'Attachment deleted successfully.');
    }

    public function show(Attachment $attachment)
    {
        // Return the requested file as a download response
        return response()->download(
            storage_path('app/' . $attachment->path),
            $attachment->name
        );
    }
}
