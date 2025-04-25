<?php

namespace App\Http\Controllers;

use App\Models\Artifact;
use App\Models\Category;
use App\Models\Classification;
use App\Models\ControlMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evidence;
use App\Models\EvidenceControl;
use App\Models\Owner;

class EvidenceController extends Controller
{
    private $_routeName = "evidences";
    private $_primaryKey = "evidence_id";


    public function index()
    {
        $evidences = Evidence::all();
        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;

        return view('4-Process/10-Evidence/index', compact(
            'evidences',
            'routeName',
            'primaryKey'
        ));
    }

    public function show(Evidence $evidence)
    {
        $data=$evidence->load('classification', 'owner', 'controls', 'artifacts', 'categories');

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        return view('4-Process/10-Evidence/show', compact(
            'evidence',
            'routeName',
            'data',
            'primaryKey'
        ));
    }

    public function create()
    {
        $classifications = Classification::select('id', 'classification_id', 'classification_name')
            ->distinct()
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();

        $owners = Owner::select('id', 'owner_role_id', 'owner_name')
            ->distinct()
            ->get();

        // $bestPractices = BestPractice::Select('id', 'best_practices_id', 'best_practices_name')
        //     ->distinct()
        //     ->get();

        $artifacts = Artifact::select('id', 'artifact_id', 'artifact_name')
            ->distinct()
            ->get();

        $controls = ControlMaster::select('id', 'control_id', 'control_name')
            ->distinct()
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        
        return view('4-Process/10-Evidence/create', compact(
            'classifications',
            'categories',
            'owners',
            'artifacts',
            'controls',
            'routeName',
            
            'primaryKey'
        ));
    }


    public function store(Request $request)
    {

        $attributes = $request->validate([
            'evidence_id' => ['required', 'unique:evidence_table'],
            'evidence_name' => 'required',
            'evidence_description' => 'nullable',
            'classification_id' => 'nullable',
            'categories' => 'nullable',
            'controls' => 'required',
            'attachments' => 'required',
            'evidence_nature' => 'required',
            'evidence_source' => 'nullable',
            'evidence_type' => 'required',
            'owner_id' => 'required',
            'evidence_critical_asset' => 'nullable',
            'evidence_cloud' => 'nullable',
            'evidence_telework' => 'nullable',
            'Evidence_social_media' => 'nullable',
            'Evidence_data_privacy' => 'nullable',
            'evidence_pii' => 'nullable',
            'evidence_pci_dss' => 'nullable',
            'Evidence_e_commerce' => 'nullable',
            'Evidence_infrastructure' => 'nullable',
            'Evidence_application' => 'nullable',
            'Evidence_hr' => 'nullable',
            'physical_security' => 'nullable',
            'third_party' => 'nullable',
            'operational_technology' => 'nullable',
            'payment' => 'nullable',
            'e_banking' => 'nullable',
        ]);

        // $attributes = $request->validated();
        $categories = $attributes['categories'];
        $controls = $attributes['controls'];
        $attachments = $attributes['attachments'];

        unset($attributes['categories']);
        unset($attributes['controls']);
        unset($attributes['attachments']);


        $evidence = Evidence::create($attributes);

        if ($controls && $controlsArray = json_decode($controls, true)) {
            $evidence->controls()
                ->attach($controlsArray);
        }

        if ($attachments && $attachmentsArray = json_decode($attachments, true)) {
            $evidence->artifacts()
                ->attach($attachmentsArray);
        }

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $evidence->categories()
                ->attach($categoriesArray);
        }


        return redirect(route('evidences.index'))
            ->with('success', 'Evidences added.');
    }

    public function edit(Evidence $evidence, Request $request)
    {

        $classifications = Classification::select('id', 'classification_id', 'classification_name')
            ->distinct()
            ->get();

        $categories = Category::select('id', 'category_id', 'category_name')
            ->distinct()
            ->get();


        $owners = Owner::select('id', 'owner_role_id', 'owner_name')
            ->distinct()
            ->get();

        $artifacts = DB::table('evidence_table as e')
            ->join('evidence_vs_artifact_table as eva', 'e.evidence_id', '=', 'eva.evidence_id')
            ->join('artifact_table as a', 'eva.artifact_id', '=', 'a.artifact_id')
            ->join('artifact_attachments as aa', 'a.id', '=', 'aa.artifact_id')
            ->where('e.evidence_id', $evidence->evidence_id)
            ->select('e.evidence_id', 'e.evidence_name', 'a.artifact_id', 'a.artifact_name', 'aa.name', 'aa.path')
            ->get();

        $selectedArtifactIds = $artifacts->pluck('artifact_id')->toArray();

        $controls = ControlMaster::select('id', 'control_id', 'control_name')
            ->distinct()
            ->get();

        $selectedControlIds = EvidenceControl::where('evidence_id', $evidence->evidence_id)
            ->pluck('control_id')->toArray();

        $categoryIds = $evidence->categories()->pluck('category_table.category_id')->toArray();

        $owners = Owner::select('id', 'owner_role_id', 'owner_name')
            ->distinct()
            ->get();


        $artifacts = Artifact::select('id', 'artifact_id', 'artifact_name')
            ->distinct()
            ->get();

        $routeName = $this->_routeName;
        $primaryKey = $this->_primaryKey;
        $data=$evidence;
        return view('4-Process/10-Evidence/edit', compact(
            'evidence',
            'artifacts',
            'categories',
            'categoryIds',
            'selectedArtifactIds',
            'selectedControlIds',
            'classifications',
            'owners',
            'controls',
            'routeName',
            'data',
            'primaryKey'
        ));
    }


    public function update(Evidence $evidence, Request $request)
    {

        $attributes = $request->validate([
            'evidence_id' => ['required', 'unique:evidence_table,evidence_id,' . $evidence->id],
            'evidence_name' => 'required',
            'evidence_description' => 'nullable',
            'classification_id' => 'nullable',
            'categories' => 'nullable',
            'controls' => 'nullable',
            'attachments' => 'nullable',
            'evidence_nature' => 'required',
            'evidence_source' => 'nullable',
            'evidence_type' => 'required',
            'owner_id' => 'required',
            'evidence_critical_asset' => 'nullable',
            'evidence_cloud' => 'nullable',
            'evidence_telework' => 'nullable',
            'Evidence_social_media' => 'nullable',
            'Evidence_data_privacy' => 'nullable',
            'evidence_pii' => 'nullable',
            'evidence_pci_dss' => 'nullable',
            'Evidence_e_commerce' => 'nullable',
            'Evidence_infrastructure' => 'nullable',
            'Evidence_application' => 'nullable',
            'Evidence_hr' => 'nullable',
            'physical_security' => 'nullable',
            'third_party' => 'nullable',
            'operational_technology' => 'nullable',
            'payment' => 'nullable',
            'e_banking' => 'nullable',
        ]);

        $categories = $attributes['categories'];
        $controls = $attributes['controls'];
        $attachments = $attributes['attachments'];

        unset($attributes['categories']);
        unset($attributes['controls']);
        unset($attributes['attachments']);


        $evidence->update($attributes);

        if ($controls && $controlsArray = json_decode($controls, true)) {
            $evidence->controls()->sync($controlsArray);
        }

        if ($attachments && $attachmentsArray = json_decode($attachments, true)) {
            $evidence->artifacts()->sync($attachmentsArray);
        }

        if ($categories && $categoriesArray = json_decode($categories, true)) {
            $evidence->categories()
                ->sync($categoriesArray);
        }


        return redirect(route('evidences.index'))
            ->with('success', 'Evidences updated.');
    }

    public function destroy(Request $request)
    {
        $attributes = $request->validate([
            'record' => ['required'],
        ]);

        $data = Evidence::where('id', $attributes['record'])->orWhere($this->_primaryKey, $attributes['record'])->first();
        $data->controls()->detach();
        $data->artifacts()->detach();
        $data->delete();
        $data->delete();

        return redirect(route($this->_routeName . '.index'));

        $selectedEvidenceIds = $request->input('selectedEvidence');

        if (count($selectedEvidenceIds)) {
            foreach ($selectedEvidenceIds as $evidenceId) {
                $evidence = Evidence::find($evidenceId);

                $evidence->controls()->detach();
                $evidence->artifacts()->detach();
                $evidence->delete();
            }
        }

        return redirect(route('evidences.index'));
    }

    public function viewevilist(Evidence $evidence)
    {

        $evidence = DB::table('evidence_table as e')
            ->select('e.id', 'e.evidence_id', 'e.evidence_name', 'a.id as artifact_id', 'a.artifact_id', 'a.artifact_name', 'af.id as attachment_file_id', 'af.name', 'af.path')
            ->join('evidence_vs_artifact_table as eva', 'e.evidence_id', '=', 'eva.evidence_id')
            ->join('artifact_table as a', 'eva.artifact_id', '=', 'a.artifact_id')
            ->join('attachments as af', 'a.id', '=', 'af.artifact_id')
            ->join('evidence_vs_control_table as ec', 'e.evidence_id', '=', 'ec.evidence_id')
            ->join('control_master_table as cmt', 'ec.control_id', '=', 'cmt.control_id')
            ->where('e.evidence_id', '=', $evidence->evidence_id)
            ->get();

        $attachments = DB::table('artifact_table')
            ->select('*')
            ->distinct()
            ->get();

        return view('4-Process/10-Evidence/1-EvidenceViewTable', compact('evidence', 'attachments'));
    }





    public function delete_attachment(Request $request)
    {

        try {

            $result = DB::table('evidence_vs_artifact_table')
                ->where('evidence_id', $request->input('evidenceId'))
                ->where('artifact_id', $request->input('attachmentFileId'))->delete();

            return response()->json(['message' => 'Attachment deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete resource.'], 500);
        }


        /* To remove files from storage. */
        /*
    try {
        $parts = explode("/", $attachment_file->path);
        Storage::deleteDirectory('files/' . $parts[0]);
        
        $attachment_file->delete();

        return response()->json(['message' => 'Attachment deleted successfully.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to delete resource.'], 500);
    }
    */
    }

    public function update_attachment(Request $request)
    {

        $rules = [
            'attachment' => 'required',
            'EviId' => 'required'
        ];

        $validatedData = $request->validate($rules);


        $EviId = $request->input('EviId');
        $attachmentIds = json_decode($request->attachment);

        foreach ($attachmentIds as $attachmentId) {
            DB::table('evidence_vs_artifact_table')->insert([
                'evidence_id' => $EviId,
                'artifact_id' => $attachmentId,
            ]);
        }

        /*
    $tempFiles = TempFile::all();

    if ($validator->fails()) {
        foreach ($tempFiles as $tempFile) {
            Storage::deleteDirectory('files/tmp/' . $tempFile->folder);
            $tempFile->delete();
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $AttachId = $request->input('AttachId');

   
    foreach ($tempFiles as $tempFile) {
        Storage::copy('files/tmp/' . $tempFile->folder . '/' . $tempFile->file, 'files/' . $tempFile->folder . '/' . $tempFile->file);

        Attachment::create([
            'artifact_id' => $AttachId,
            'name'          => $tempFile->file,
            'path'          => $tempFile->folder . '/' . $tempFile->file
        ]);

        Storage::deleteDirectory('files/tmp/' . $tempFile->folder);
        $tempFile->delete();

    }
    */

        return redirect()->back()->with('success', 'Attachment has been saved.');
    }
}
