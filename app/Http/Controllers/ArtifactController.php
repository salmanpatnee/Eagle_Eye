<?php

namespace App\Http\Controllers;

use App\Models\Artifact;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Classification;
use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArtifactController extends Controller
{
    public function index()
    {
        $artifacts = Artifact::select('id', 'artifact_id', 'artifact_name')
            ->withCount('attachments')
            ->get();

        return view('4-Process/11-Attachment/index', compact('artifacts'));
    }

    public function show(Artifact $artifact)
    {
        $artifact->load('attachments', 'classification', 'category');

        return view('4-Process/11-Attachment/show', compact('artifact'));
    }

    public function create()
    {
        $classifications = Classification::select('classification_id', 'classification_name')
            ->distinct()
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->orderBy('category_name')
            ->get();


        return view('4-Process/11-Attachment/create', compact('classifications', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artifact_id' => ['required', 'unique:artifact_table'],
            'artifact_name' => 'required|string',
            'artifact_description' => 'nullable',
            'artifact_creation_date' => 'required|string',
            'artifact_system_name' => 'nullable|string',
            'classification_id' => 'nullable|string',
            'artifact_category_id' => 'nullable|string',
            'artifact_critical_asset' => 'nullable',
            'artifact_cloud' => 'nullable',
            'artifact_telework' => 'nullable',
            'artifact_social_media' => 'nullable',
            'artifact_data_privacy' => 'nullable',
            'artifact_pii' => 'nullable',
            'artifact_pci_dss' => 'nullable',
            'artifact_e_commerce' => 'nullable',
            'artifact_infrastructure' => 'nullable',
            'artifact_application' => 'nullable',
            'artifact_hr' => 'nullable',
            'artifact_physical_asset' => 'nullable',
            'artifact_third_party' => 'nullable',
            'artifact_opertaional_tech' => 'nullable',
            'artifact_payment' => 'nullable',
            'artifact_e_banking' => 'nullable',
        ]);

        $tempFiles = TempFile::all();

        if ($validator->fails()) {
            foreach ($tempFiles as $tempFile) {
                Storage::deleteDirectory('files/tmp/' . $tempFile->folder);
                $tempFile->delete();
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $artifact = Artifact::create($validator->validated());

        $this->_uploadAttachments($tempFiles, $artifact->id);

        return redirect(route('artifacts.index'))
            ->with('success', 'Artifact added.');
    }

    public function edit(Artifact $artifact, Request $request)
    {
        $classifications = Classification::select('classification_id', 'classification_name')
            ->distinct()
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->orderBy('category_name')
            ->get();


        return view('4-Process/11-Attachment/edit', compact('artifact', 'classifications', 'categories'));
    }

    public function update(Artifact $artifact, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'artifact_id' => ['required', 'unique:artifact_table,artifact_id,' . $artifact->id],
            'artifact_name' => 'required|string',
            'artifact_description' => 'nullable',
            'artifact_creation_date' => 'required|string',
            'artifact_system_name' => 'nullable|string',
            'classification_id' => 'nullable|string',
            'artifact_category_id' => 'nullable|string',
            'artifact_critical_asset' => 'nullable',
            'artifact_cloud' => 'nullable',
            'artifact_telework' => 'nullable',
            'artifact_social_media' => 'nullable',
            'artifact_data_privacy' => 'nullable',
            'artifact_pii' => 'nullable',
            'artifact_pci_dss' => 'nullable',
            'artifact_e_commerce' => 'nullable',
            'artifact_infrastructure' => 'nullable',
            'artifact_application' => 'nullable',
            'artifact_hr' => 'nullable',
            'artifact_physical_asset' => 'nullable',
            'artifact_third_party' => 'nullable',
            'artifact_opertaional_tech' => 'nullable',
            'artifact_payment' => 'nullable',
            'artifact_e_banking' => 'nullable',
        ]);

        $tempFiles = TempFile::all();

        if ($validator->fails()) {
            foreach ($tempFiles as $tempFile) {
                Storage::deleteDirectory('files/tmp/' . $tempFile->folder);
                $tempFile->delete();
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $artifact->update($validator->validated());

        $this->_uploadAttachments($tempFiles, $artifact->id);

        return redirect(route('artifacts.index'))
            ->with('success', 'Artifact updated.');
    }

    public function destroy(?Artifact $artifact, Request $request)
    {


        if ($artifact->exists) {
            $this->_deleteArtifactAttachments($artifact);

            $artifact->delete();
        } else {

            $attributes =  $request->validate([
                'record' => ['required'],
            ]);

            $artifact = Artifact::find($attributes['record'])->first();

            $this->_deleteArtifactAttachments($artifact);

            $artifact->delete();

            // $selectedArtifacts = $request->input('selectedArtifacts');

            // if (count($selectedArtifacts)) {
            //     foreach ($selectedArtifacts as $artifactId) {
            //         $artifact = Artifact::find($artifactId);

            //         $this->_deleteArtifactAttachments($artifact);

            //         $artifact->delete();
            //     }
            // }
        }

        return redirect(route('artifacts.index'));
    }

    private function _deleteArtifactAttachments($artifact)
    {
        if ($artifact->attachments->isNotEmpty()) {
            foreach ($artifact->attachments as $attachment) {
                // Delete the file directly from the 'files' directory
                Storage::delete($attachment->path);

                // Delete the attachment record
                $attachment->delete();
            }
        }
    }

    private function _uploadAttachments($tempFiles, $artifactId)
    {
        foreach ($tempFiles as $tempFile) {
            // Copy the file directly to the 'files' directory without creating a subfolder
            Storage::copy('files/tmp/' . $tempFile->folder . '/' . $tempFile->file, 'files/' . $tempFile->file);

            // Create the attachment record with the updated path
            Attachment::create([
                'artifact_id' => $artifactId,
                'name' => $tempFile->file,
                'path' => 'files/'.$tempFile->file // Only the file name, no folder
            ]);

            // Delete the temporary directory
            Storage::deleteDirectory('files/tmp/' . $tempFile->folder);
            $tempFile->delete();
        }
    }
}
