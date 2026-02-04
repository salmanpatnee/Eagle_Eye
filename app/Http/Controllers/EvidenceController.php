<?php

namespace App\Http\Controllers;

use App\Models\Artifact;
use App\Models\Category;
use App\Models\Classification;
use App\Models\ControlMaster;
use App\Models\Evidence;
use App\Models\EvidenceControl;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvidenceController extends Controller
{
    public function index()
    {
        $evidences = Evidence::paginate(20);

        return view('process.evidence-management.evidences.index', compact('evidences'));
    }

    public function show(Evidence $evidence)
    {
        $evidence->load('classification', 'owner', 'controls', 'artifacts', 'categories');

        return view('process.evidence-management.evidences.show', compact('evidence'));
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

        $artifacts = Artifact::select('id', 'artifact_id', 'artifact_name')
            ->distinct()
            ->get();

        $controls = ControlMaster::select('id', 'control_id', 'control_name')
            ->distinct()
            ->get();

        $selectedArtifactIds = $selectedControlIds = $categoryIds = [];
        $evidence = null;

        return view('process.evidence-management.evidences.create', compact(
            'classifications',
            'categories',
            'owners',
            'artifacts',
            'controls',
            'selectedArtifactIds',
            'selectedControlIds',
            'categoryIds',
            'evidence'
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

        $evidence->controls()->attach($controls ?? []);
        $evidence->artifacts()->attach($attachments ?? []);
        $evidence->categories()->attach($categories ?? []);

        return redirect(route('evidences.index'))
            ->with('success', 'Evidence added.');
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

        return view('process.evidence-management.evidences.create', compact(
            'evidence',
            'artifacts',
            'categories',
            'categoryIds',
            'selectedArtifactIds',
            'selectedControlIds',
            'classifications',
            'owners',
            'controls',
        ));
    }

    public function update(Evidence $evidence, Request $request)
    {

        $attributes = $request->validate([
            'evidence_id' => ['required', 'unique:evidence_table,evidence_id,'.$evidence->id],
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

        $evidence->controls()->sync($controls ?? []);
        $evidence->artifacts()->sync($attachments ?? []);
        $evidence->categories()->sync($categories ?? []);

        return redirect(route('evidences.index'))
            ->with('success', 'Evidence updated.');
    }

    public function destroy(Evidence $evidence)
    {
        $evidence->controls()->detach();
        $evidence->categories()->detach();
        $evidence->artifacts()->detach();
        $evidence->delete();

        return redirect(route('evidences.index'))
            ->with('success', 'Evidence deleted.');
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
    }

    public function update_attachment(Request $request)
    {

        $rules = [
            'attachment' => 'required',
            'EviId' => 'required',
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

        return redirect()->back()->with('success', 'Attachment has been saved.');
    }
}
