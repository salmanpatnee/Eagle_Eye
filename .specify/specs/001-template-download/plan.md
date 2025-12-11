# Implementation Plan: Download Import Template

**Branch**: `001-template-download` | **Date**: 2025-12-11 | **Spec**: [spec.md](spec.md)

## Summary

Implement a template download feature for data import mappings. Users can click a "Download Template" button in the actions column of the import mappings list to generate and download an Excel file that matches their mapping configuration. The Excel file will have two columns with headers matching the mapping's entity labels, ready for users to populate with data and import.

**Technical approach**: Add a download button to the mapping list view, create a controller method to generate Excel templates using Maatwebsite/Excel, serve the file as a downloadable resource, and ensure proper filename conventions.

## Technical Context

**Language/Version**: PHP 8.0.2+, Laravel 9.52.16

**Primary Dependencies**:
- Maatwebsite/Excel 3.1 (already installed - used for Excel import/export)
- Laravel's response and file handling mechanisms

**Storage**: Temporary file generation (no persistent storage needed - files generated on-demand)

**Testing**: PHPUnit ^9.5.10 (existing test framework)

**Target Platform**: Laravel web application running on HTTP server

**Project Type**: Web application (Laravel backend + Blade frontend)

**Performance Goals**:
- Template generation: <2 seconds per download
- File size: <100KB regardless of mapping complexity
- Concurrent downloads: No specific target, standard web application scaling

**Constraints**:
- <2 second response time for download (SC-004)
- Memory efficient (no pre-generation/caching required)
- Character encoding support for international entity labels

**Scale/Scope**:
- Small feature addition (~200-300 lines of new code)
- Minimal database changes (none required - uses existing ImportMapping model)
- Affects only the import mappings interface

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

No project constitution defined. This feature follows established Eagle Eye GRC patterns:
- Simple, focused change to existing import mappings interface
- Uses existing Maatwebsite/Excel library (no new dependencies)
- Minimal code complexity required
- Single responsibility: generate and serve template files

**Gate Status**: ✅ PASS - Feature is simple and focused, no complexity justification needed.

## Project Structure

### Documentation (this feature)

```
.specify/specs/001-template-download/
├── spec.md              # Feature specification
├── plan.md              # This file (implementation architecture)
├── research.md          # Phase 0 research findings
├── data-model.md        # Phase 1 data model
├── quickstart.md        # Phase 1 implementation quickstart
├── contracts/           # Phase 1 API contracts
└── checklists/
    └── requirements.md  # Quality checklist
```

### Source Code (existing repository structure)

```
app/
├── Http/
│   └── Controllers/
│       └── Admin/
│           ├── ImportMappingController.php  # MODIFY: Add download method
│           └── [existing files]
├── Models/
│   └── ImportMapping.php  # USE: Existing model, no changes
└── Exports/               # USE: May create ExportTemplateClass if needed
    └── [existing exports]

resources/
└── views/
    └── admin/
        └── import-manager/
            └── mapping-configuration.blade.php  # MODIFY: Add download button to actions

tests/
├── Feature/
│   └── [new test file for template download]
└── Unit/
    └── [new test file for template generation]
```

**Structure Decision**: Minimal changes to existing structure. Feature integrates into existing ImportMappingController and mapping list view. No new models or services required - logic can be handled directly in controller using Maatwebsite/Excel's API.

## Complexity Tracking

No violations. Feature is intentionally simple and focused:
- Single controller method for download generation
- Direct use of Maatwebsite/Excel API (no abstraction layer needed)
- Template rendering logic is straightforward (2-column spreadsheet)
- No new database models or migrations required

## Phase 0: Research & Clarification

### Research Tasks

1. **Maatwebsite/Excel API best practices for dynamic Excel generation**
   - How to create headings/rows dynamically
   - How to stream files instead of storing temporarily
   - Performance considerations for large-scale usage
   - Character encoding for international labels

2. **Filename sanitization best practices for web downloads**
   - Preventing path traversal attacks
   - Handling special characters in mapping names
   - Cross-platform filename compatibility

3. **Laravel file response and download handling**
   - Using response()->download() vs response()->streamDownload()
   - Setting proper content-type headers for Excel files
   - Browser compatibility considerations

### Key Findings (from research)

**Maatwebsite/Excel Implementation**:
- Decision: Use `Maatwebsite\Excel\Facades\Excel::download()` with a spreadsheet builder
- Rationale: Built-in streaming support, proper header handling, no temporary files needed
- Approach: Define template structure in method or use an Exportable class for reusability

**Filename Sanitization**:
- Decision: Use Laravel's `Str::slug()` combined with sanitization
- Pattern: `{slug_name}_template.xlsx` where slug_name = Str::slug($mapping->name)
- Handles special characters, spaces, unicode automatically

**File Delivery**:
- Decision: Use Laravel's response()->download() with appropriate headers
- Rationale: Proper content-disposition, works across browsers, simple integration
- Content-Type: `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

## Phase 1: Design & Contracts

### Data Model

**ImportMapping** (existing - no changes needed):
```
- id: integer
- name: string (unique)
- left_entity_label: string
- right_entity_label: string
- [other fields...]
```

**Template Generation** (logic, not persistence):
- Input: ImportMapping instance
- Output: Excel file with:
  - Sheet name: "Import Template" (or configurable)
  - Row 1: Headers (left_entity_label, right_entity_label)
  - Rows 2+: Empty (ready for user data)

### API Contract

#### Endpoint: Download Template

```
GET /admin/mappings/{id}/download-template
OR
GET /admin/mappings/{mapping_id}/template/download

Required Parameters:
  - mapping_id (path parameter): ID of the ImportMapping

Response:
  - Status: 200 OK
  - Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
  - Content-Disposition: attachment; filename="[mapping_name]_template.xlsx"
  - Body: Binary Excel file stream

Error Responses:
  - 404 Not Found: If mapping doesn't exist
  - 403 Forbidden: If user lacks permission to view mapping
  - 500 Server Error: If template generation fails
```

### Implementation Approach

**1. Controller Method** (`ImportMappingController.php`):
```php
public function downloadTemplate(ImportMapping $mapping)
{
    // Generate filename: {mapping_name}_template.xlsx
    // Create Spreadsheet instance
    // Add headers (left_entity_label, right_entity_label)
    // Download/stream as Excel file
}
```

**2. View Modification** (`mapping-configuration.blade.php`):
- Add download button in the actions column for each mapping
- Button triggers GET request to `downloadTemplate()` endpoint
- Could be:
  - Direct link: `<a href="{{ route('mappings.downloadTemplate', $mapping) }}">`
  - Icon button with tooltip (for UX consistency)

**3. Helper/Service (Optional)**:
- Could create `TemplateService` if template logic becomes complex
- For now: Keep logic in controller (YAGNI principle)

### Contracts

**TemplateDownloadService.php** (if extracted):
```php
public function generateTemplate(ImportMapping $mapping): \Illuminate\Http\Response
{
    // Build spreadsheet
    // Return response()->download()
}
```

### Quickstart

**Step 1**: Modify `ImportMappingController`
- Add route: `Route::get('/mappings/{mapping}/download-template', 'downloadTemplate')`
- Create method that:
  1. Retrieves ImportMapping by ID
  2. Validates user permission (via existing middleware)
  3. Creates new Spreadsheet (from Maatwebsite/Excel)
  4. Adds sheet with headers
  5. Returns Excel download response

**Step 2**: Modify `mapping-configuration.blade.php`
- Locate actions column in table
- Add download button/link
- Link to downloadTemplate route with mapping ID

**Step 3**: Add Tests
- Feature test: Download button appears for each mapping
- Feature test: Clicking button returns valid Excel file
- Unit test: Template structure matches mapping (headers correct)

**Step 4**: Verify
- Download template for various mappings
- Open in Excel/Google Sheets/LibreOffice
- Verify headers match entity labels
- Verify filename follows naming convention

## Phase 2 Output

This plan completes Phase 1 design. Phase 2 (task generation) will follow via `/sp.tasks` command, which will create granular, actionable tasks from this architecture.

### Next Steps

1. ✅ Phase 0 & 1 complete (this document)
2. ⏳ Run `/sp.tasks` to generate task breakdown
3. ⏳ Implement per tasks.md
4. ⏳ Run tests and validation per acceptance scenarios
5. ⏳ Create pull request to main branch
