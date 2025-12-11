# Quickstart: Download Template Implementation

**Feature**: 001-template-download
**Date**: 2025-12-11
**Status**: Ready for Implementation

## Overview

This document provides a quick reference for implementing the download template feature. For detailed architectural decisions, see [plan.md](plan.md) and [research.md](research.md).

## Implementation Checklist

```
Phase 2 Implementation:

[  ] 1. Add route for template download
[  ] 2. Create controller method: downloadTemplate()
[  ] 3. Add download button to mapping list view
[  ] 4. Write feature tests
[  ] 5. Write unit tests
[  ] 6. Test across browsers
[  ] 7. Verify file format and naming
[  ] 8. Code review and merge
```

## Code Snippets

### 1. Route Definition

**File**: `routes/web.php`

```php
// Within admin routes group
Route::middleware(['auth:web', 'role:admin'])->group(function () {
    // ... existing routes ...

    // Add this new route:
    Route::get('/admin/mappings/{mapping}/download-template',
        [ImportMappingController::class, 'downloadTemplate'])
        ->name('mappings.downloadTemplate');
});
```

**Alternative names**:
- `/admin/mappings/{id}/template-download`
- `/admin/mappings/{id}/export-template`
- `/admin/import-mappings/{id}/download`

**Chosen**: `downloadTemplate` method name matches Laravel conventions

### 2. Controller Method

**File**: `app/Http/Controllers/Admin/ImportMappingController.php`

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Models\ImportMapping;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ImportMappingController extends Controller
{
    // ... existing methods ...

    /**
     * Download Excel template for a specific mapping
     */
    public function downloadTemplate(ImportMapping $mapping)
    {
        // Generate filename
        $filename = Str::slug($mapping->name) . '_template.xlsx';

        // Create spreadsheet with headers
        $data = [
            [
                $mapping->left_entity_label,
                $mapping->right_entity_label
            ]
        ];

        // Stream Excel file to client
        return Excel::download(
            new class($data) implements \Maatwebsite\Excel\Concerns\FromArray {
                public function __construct(private array $data) {}
                public function array(): array {
                    return $this->data;
                }
            },
            $filename,
            \Maatwebsite\Excel\Excel::XLSX
        );
    }
}
```

**Alternative with Exportable Class** (if reusability needed):

Create `app/Exports/MappingTemplateExport.php`:
```php
<?php

namespace App\Exports;

use App\Models\ImportMapping;
use Maatwebsite\Excel\Concerns\FromArray;

class MappingTemplateExport implements FromArray
{
    public function __construct(private ImportMapping $mapping) {}

    public function array(): array
    {
        return [
            [
                $this->mapping->left_entity_label,
                $this->mapping->right_entity_label
            ]
        ];
    }
}
```

Then in controller:
```php
public function downloadTemplate(ImportMapping $mapping)
{
    $filename = Str::slug($mapping->name) . '_template.xlsx';
    return Excel::download(
        new MappingTemplateExport($mapping),
        $filename
    );
}
```

### 3. Blade Template Modification

**File**: `resources/views/admin/import-manager/mapping-configuration.blade.php`

Find the actions column in the table and add download button:

```blade
<td>
    <!-- Existing Edit and Delete buttons -->
    <a href="{{ route('mappings.edit', $mapping) }}" class="btn btn-sm btn-primary">
        Edit
    </a>

    <!-- Add this Download button -->
    <a href="{{ route('mappings.downloadTemplate', $mapping) }}"
       class="btn btn-sm btn-success"
       title="Download Excel Template"
       download>
        <i class="fas fa-download"></i> Download
    </a>

    <form action="{{ route('mappings.destroy', $mapping) }}"
          method="POST"
          style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </form>
</td>
```

**Alternative with Icon Only** (if space constrained):

```blade
<a href="{{ route('mappings.downloadTemplate', $mapping) }}"
   class="btn btn-sm btn-icon"
   title="Download Template"
   download>
    <i class="fas fa-download"></i>
</a>
```

**Alternative with Dropdown** (if many actions):

```blade
<div class="btn-group">
    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown">
        Actions
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('mappings.edit', $mapping) }}">Edit</a>
        <a class="dropdown-item" href="{{ route('mappings.downloadTemplate', $mapping) }}">Download Template</a>
        <form action="{{ route('mappings.destroy', $mapping) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="dropdown-item" onclick="return confirm('Delete?')">Delete</button>
        </form>
    </div>
</div>
```

**Chosen**: Simple button link for clarity and discoverability

### 4. Feature Test

**File**: `tests/Feature/ImportMappingDownloadTest.php`

```php
<?php

namespace Tests\Feature;

use App\Models\ImportMapping;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImportMappingDownloadTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_download_template()
    {
        $this->actingAs(auth()->user()); // or create test user

        $mapping = ImportMapping::create([
            'name' => 'Risk to Control',
            'left_entity_label' => 'Risk ID',
            'right_entity_label' => 'Control ID',
            'left_entity_table' => 'risk_master_table',
            'left_entity_column' => 'risk_id',
            'right_entity_table' => 'control_master_table',
            'right_entity_column' => 'id',
            'pivot_table_name' => 'risk_vs_control_table',
        ]);

        $response = $this->get(route('mappings.downloadTemplate', $mapping));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->assertHeader('Content-Disposition',
            'attachment; filename=risk-to-control_template.xlsx');
    }

    public function test_download_button_appears_in_mappings_list()
    {
        $this->actingAs(auth()->user());

        $mapping = ImportMapping::create([...]);

        $response = $this->get(route('mappings.index'));

        $response->assertSee(route('mappings.downloadTemplate', $mapping));
    }

    public function test_filename_handles_special_characters()
    {
        $this->actingAs(auth()->user());

        $mapping = ImportMapping::create([
            'name' => 'Risk/Control (Draft v2)',
            // ... other fields
        ]);

        $response = $this->get(route('mappings.downloadTemplate', $mapping));

        // Filename should be sanitized
        $response->assertHeader('Content-Disposition',
            'attachment; filename=risk-control-draft-v2_template.xlsx');
    }

    public function test_unauthenticated_user_cannot_download()
    {
        $mapping = ImportMapping::create([...]);

        $response = $this->get(route('mappings.downloadTemplate', $mapping));

        $response->assertRedirect('/login');
    }
}
```

### 5. Unit Test

**File**: `tests/Unit/TemplateGenerationTest.php`

```php
<?php

namespace Tests\Unit;

use App\Models\ImportMapping;
use Illuminate\Support\Str;
use Tests\TestCase;

class TemplateGenerationTest extends TestCase
{
    public function test_filename_generated_correctly()
    {
        $mapping = new ImportMapping([
            'name' => 'Risk to Control'
        ]);

        $filename = Str::slug($mapping->name) . '_template.xlsx';

        $this->assertEquals('risk-to-control_template.xlsx', $filename);
    }

    public function test_headers_match_entity_labels()
    {
        $mapping = new ImportMapping([
            'left_entity_label' => 'Risk ID',
            'right_entity_label' => 'Control ID'
        ]);

        $headers = [
            $mapping->left_entity_label,
            $mapping->right_entity_label
        ];

        $this->assertEquals(['Risk ID', 'Control ID'], $headers);
    }

    public function test_special_characters_preserved_in_headers()
    {
        $mapping = new ImportMapping([
            'left_entity_label' => 'معرّف المخاطر',
            'right_entity_label' => '控制编号'
        ]);

        $headers = [
            $mapping->left_entity_label,
            $mapping->right_entity_label
        ];

        $this->assertCount(2, $headers);
        $this->assertStringContainsString('معرّف', $headers[0]);
        $this->assertStringContainsString('控', $headers[1]);
    }
}
```

## Testing Steps (Manual)

### Step 1: Test Basic Download
1. Navigate to `/admin/mappings/`
2. Find a mapping and click "Download" button
3. Verify file downloads with correct name
4. Open in Excel
5. Verify headers match mapping labels

### Step 2: Test File Format
1. Download template
2. Open in Excel, Google Sheets, LibreOffice
3. Verify opens without errors
4. Verify headers display correctly

### Step 3: Test Population and Import
1. Download template for "Risk to Control" mapping
2. Open in Excel
3. Add data rows (e.g., risk_id=100, control_id=5)
4. Save and upload via import form
5. Verify import processes correctly

### Step 4: Test Special Characters
1. Create mapping with special character labels
2. Download template
3. Verify headers display correctly

### Step 5: Test Permission
1. Log out
2. Try to access download URL directly
3. Verify redirect to login

## Common Issues & Solutions

### Issue: "Class 'Maatwebsite\Excel' not found"
**Solution**: Run `composer require maatwebsite/excel:^3.1` (should already be installed)

### Issue: File downloads but won't open in Excel
**Solution**: Verify correct content-type header: `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet`

### Issue: Special characters appear as ???
**Solution**: Ensure UTF-8 encoding in XLSX. Maatwebsite/Excel handles this by default.

### Issue: Button doesn't appear in view
**Solution**: Check route name matches in Blade template and routes file. Use `{{ route('mappings.downloadTemplate', $mapping) }}`

## Files Modified/Created

| File | Type | Change |
|------|------|--------|
| `app/Http/Controllers/Admin/ImportMappingController.php` | Modify | Add `downloadTemplate()` method |
| `resources/views/admin/import-manager/mapping-configuration.blade.php` | Modify | Add download button to actions column |
| `routes/web.php` | Modify | Add download template route |
| `app/Exports/MappingTemplateExport.php` | Create (optional) | Excel exportable class |
| `tests/Feature/ImportMappingDownloadTest.php` | Create | Feature tests |
| `tests/Unit/TemplateGenerationTest.php` | Create | Unit tests |

## Estimated Implementation Time

- Route + Controller method: 15 minutes
- Blade template modification: 5 minutes
- Basic testing: 10 minutes
- Code review and refinement: 10 minutes

**Total: ~40 minutes for complete implementation**

## Dependencies

- ✅ Maatwebsite/Excel 3.1 (already installed)
- ✅ Laravel 9.19+ (already in use)
- ✅ PHP 8.0.2+ (already in use)
- ✅ Existing ImportMapping model
- ✅ Existing authentication middleware

No new dependencies needed.

## Success Criteria

✅ After implementation, verify:
1. Download button visible in mapping list for each mapping
2. Clicking button generates and downloads Excel file
3. Filename follows pattern: `{slug}_template.xlsx`
4. Excel file opens in Excel, Google Sheets, LibreOffice
5. Column headers match mapping entity labels
6. File has no pre-filled data (headers only)
7. Unauthenticated users get 403/redirect
8. All acceptance scenarios from spec pass
9. Feature tests pass (100% coverage of new code)
10. Code review approved

## Next Steps

1. Create feature branch (already done: `001-template-download`)
2. Implement according to code snippets above
3. Run tests and verify all pass
4. Create pull request
5. Code review and merge
