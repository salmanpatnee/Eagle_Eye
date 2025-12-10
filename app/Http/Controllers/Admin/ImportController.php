<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessImportJob;
use App\Models\ImportMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function index()
    {
        $mappings = ImportMapping::active()->orderBy('name')->get();
        return view('admin.import-manager.index', compact('mappings'));
    }

    public function upload(Request $request)
    {
        $attributes = $request->validate([
            'mapping_id' => 'required|exists:import_mappings,id',
            'file' => 'required|file|mimes:csv,xlsx,xls|max:' . (int)(env('IMPORT_MAX_FILE_SIZE', 102400)),
        ]);

        
        $mapping = ImportMapping::findOrFail($attributes['mapping_id']);
        
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('imports', $fileName, 'public');

        ProcessImportJob::dispatch($filePath, $mapping->id, auth()->id());

        return redirect()->route('imports.index')
            ->with('success', 'Import file uploaded successfully. Its now Processing..');
    }
}
