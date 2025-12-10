<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportMappingController extends Controller
{
    public function index()
    {
        $mappings = ImportMapping::orderBy('name')->paginate(20);
        return view('admin.import-manager.mapping-configuration', compact('mappings'));
    }

    public function create()
    {
        $mapping = null;
        $tables = $this->getAvailableTables();
        return view('admin.import-manager.mapping-form', compact('mapping', 'tables'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:import_mappings,name',
            'description' => 'nullable|string|max:500',
            'pivot_table_name' => 'required|string|max:255',
            'left_entity_table' => 'required|string|max:255',
            'left_entity_column' => 'required|string|max:255',
            'right_entity_table' => 'required|string|max:255',
            'right_entity_column' => 'required|string|max:255',
            'left_entity_label' => 'required|string|max:255',
            'right_entity_label' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        ImportMapping::create($validated);

        return redirect()->route('imports.mappings.index')
            ->with('success', 'Import mapping created successfully.');
    }

    public function edit($id)
    {
        $mapping = ImportMapping::findOrFail($id);
        $tables = $this->getAvailableTables();
        return view('admin.import-manager.mapping-form', compact('mapping', 'tables'));
    }

    public function update(Request $request, $id)
    {
        $mapping = ImportMapping::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:import_mappings,name,' . $id,
            'description' => 'nullable|string|max:500',
            'pivot_table_name' => 'required|string|max:255',
            'left_entity_table' => 'required|string|max:255',
            'left_entity_column' => 'required|string|max:255',
            'right_entity_table' => 'required|string|max:255',
            'right_entity_column' => 'required|string|max:255',
            'left_entity_label' => 'required|string|max:255',
            'right_entity_label' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $mapping->update($validated);

        return redirect()->route('imports.mappings.index')
            ->with('success', 'Import mapping updated successfully.');
    }

    public function destroy($id)
    {
        $mapping = ImportMapping::findOrFail($id);
        $mapping->delete();

        return redirect()->route('imports.mappings.index')
            ->with('success', 'Import mapping deleted successfully.');
    }

    private function getAvailableTables()
    {
        $tables = DB::select('SHOW TABLES');
        $database = config('database.connections.mysql.database');
        $tableKey = 'Tables_in_' . $database;

        return collect($tables)->pluck($tableKey)->sort()->values()->toArray();
    }
}
