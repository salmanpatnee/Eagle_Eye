<?php

namespace App\Http\Controllers;

use App\Models\Artifact;
use App\Models\Asset;
use App\Models\CustodianName;
use App\Models\HumanResource;
use App\Models\Owner;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DataUploaderController extends Controller
{
    public function create()
    {
        return view('4-Process/3-Asset/1-AssetUploadForm');
    }

    public function uploadAssets(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        // Load the uploaded file
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Extract headers
        $headers = array_shift($rows);
        array_pop($headers);

        foreach ($rows as $row) {
            $categories = array_pop($row);

            $data = array_combine($headers, $row);

            // Ensure asset_id is present to avoid errors
            if (!isset($data['asset_id'])) {
                continue;
            }

            $asset = Asset::updateOrCreate(
                ['asset_id' => $data['asset_id']],
                $data
            );

            if (!empty($categories)) {
                $categoryIds = explode(',', $categories);
                $asset->categories()->sync($categoryIds);
            }
        }

        return back()->with('success', 'Innovations data uploaded successfully!');
    }

    public function createOwner()
    {
        return view('4-Process/1-InitialSetup/owners/upload');
    }

    public function uploadOwners(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        // Load the uploaded file
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Extract headers
        $headers = array_shift($rows);


        foreach ($rows as $row) {

            $data = array_combine($headers, $row);

            // Ensure asset_id is present to avoid errors
            if (!isset($data['owner_id'])) {
                continue;
            }

            Owner::updateOrCreate(
                ['owner_id' => $data['owner_id']],
                $data
            );
        }

        return back()->with('success', 'Owner data uploaded successfully!');
    }

    public function createCustodian()
    {
        return view('4-Process/1-InitialSetup/custodians/upload');
    }

    public function uploadCustodian(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        // Load the uploaded file
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Extract headers
        $headers = array_shift($rows);


        foreach ($rows as $row) {

            $data = array_combine($headers, $row);

            // Ensure asset_id is present to avoid errors
            if (!isset($data['custodian_name_id'])) {
                continue;
            }

            CustodianName::updateOrCreate(
                ['custodian_name_id' => $data['custodian_name_id']],
                $data
            );
        }

        return back()->with('success', 'Custodian data uploaded successfully!');
    }

    public function createArtifact()
    {
        return view('4-Process/11-Attachment/UploadForm');
    }

    public function uploadArtifact(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        // Load the uploaded file
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        // Extract headers
        $headers = array_shift($rows);


        foreach ($rows as $row) {

            $data = array_combine($headers, $row);

            // Ensure asset_id is present to avoid errors
            if (!isset($data['artifact_id'])) {
                continue;
            }

            Artifact::updateOrCreate(
                ['artifact_id' => $data['artifact_id']],
                $data
            );
        }

        return back()->with('success', 'Artifact data uploaded successfully!');
    }

    public function createHr()
    {
        return view('3-People/HRUpload');
    }

    public function UploadHr(Request $request)
    {

        // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);



        // Load the uploaded file
        $file = $request->file('excel_file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        // Extract headers
        $headers = array_shift($rows);
        array_pop($headers);
        array_pop($headers);
        array_pop($headers);

        foreach ($rows as $row) {
            $experties = array_pop($row);
            $roles = array_pop($row);
            $certifications = array_pop($row);

            $data = array_combine($headers, $row);

            // Ensure asset_id is present to avoid errors
            if (!isset($data['expert_id'])) {
                continue;
            }

            $expert = HumanResource::updateOrCreate(
                ['expert_id' => $data['expert_id']],
                $data
            );

            if (!empty($experties)) {
                $expertIds = explode(',', $experties);
                $expert->experties()->sync($expertIds);
            }
            if (!empty($roles)) {
                $roleIds = explode(',', $roles);
                $expert->roles()->sync($roleIds);
            }
            if (!empty($certifications)) {
                $certificationIds = explode(',', $certifications);
                $expert->certifications()->sync($certificationIds);
            }
        }

        return back()->with('success', 'HR data uploaded successfully!');
    }
}
