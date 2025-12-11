# Data Model: Download Import Template Feature

**Date**: 2025-12-11
**Feature**: 001-template-download
**Status**: Complete

## Overview

This feature does not require new data models or database migrations. It works entirely with existing `ImportMapping` model, generating and serving Excel files without persistent storage.

## Existing Entity: ImportMapping

### Purpose

Defines the configuration for mapping data import templates. Contains all information needed to generate an Excel template.

### Fields (relevant to template generation)

```php
- id: integer (primary key)
- name: string(255) [UNIQUE]                    // Used for filename
- description: string(500) [nullable]            // User context (not used in template)
- left_entity_label: string(255)                 // Column 1 header in template
- right_entity_label: string(255)                // Column 2 header in template
- left_entity_table: string(255)                 // DB table for validation (not in template)
- left_entity_column: string(255)                // ID column for validation (not in template)
- right_entity_table: string(255)                // DB table for validation (not in template)
- right_entity_column: string(255)               // ID column for validation (not in template)
- pivot_table_name: string(255)                  // Junction table (not used in template)
- column_mappings: json [nullable]               // Future extensibility (not used yet)
- is_active: boolean (default: true)             // Filters inactive mappings from UI
- created_at: timestamp
- updated_at: timestamp
```

### Template Generation Logic

**Input**: ImportMapping instance with at minimum:
- `left_entity_label` (string)
- `right_entity_label` (string)
- `name` (for filename generation)

**Processing**:
1. Sanitize filename: `Str::slug($mapping->name) . '_template.xlsx'`
2. Create Excel spreadsheet
3. Add headers: `[$mapping->left_entity_label, $mapping->right_entity_label]`
4. Stream to client

**Output**: Excel file (XLSX format)

**Example**:
```
Mapping: ImportMapping {
  id: 5,
  name: "Risk to Control",
  left_entity_label: "Risk ID",
  right_entity_label: "Control ID",
  left_entity_table: "risk_master_table",
  right_entity_table: "control_master_table",
  ...
}

↓ Generate Template ↓

Filename: "risk-to-control_template.xlsx"
Content:
  Sheet 1 (Tab: "Import Template"):
    Row 1: ["Risk ID", "Control ID"]
    Row 2-∞: [empty, ready for user data]
```

## No New Models Required

This feature intentionally avoids creating new models or services:

### Why Minimal Design

1. **Template is ephemeral** - Generated on-demand, not stored
2. **No new data storage** - Uses existing ImportMapping
3. **No state tracking** - Download history not tracked
4. **YAGNI principle** - Avoid unnecessary complexity

### Future Extensibility (not implemented now)

If requirements change, could add:
- `ImportTemplate` model - to track downloads/usage (not needed)
- Template caching/storage - if performance becomes issue (won't be)
- Download audit logging - if compliance requires (possible, but in logs not DB)

Currently, all of this would violate YAGNI principle.

## Validation Rules (from Specification)

### Template Structure

**Must Have**:
- ✅ Exactly 2 columns (left_entity_label, right_entity_label)
- ✅ Headers in first row
- ✅ No data rows (empty template)
- ✅ Valid Excel format (.xlsx)

**Must Not Have**:
- ❌ Pre-filled data
- ❌ Formulas or conditional formatting
- ❌ Merged cells
- ❌ Hidden rows/columns

### Filename Requirements

**Must Have**:
- ✅ Mapping name identifier (slugified)
- ✅ "_template" suffix for clarity
- ✅ ".xlsx" extension
- ✅ No special characters that break filesystems
- ✅ Under 100 characters total
- ✅ Human-readable

**Format Pattern**: `{mapping_slug}_template.xlsx`

**Examples**:
- "Risk to Control" → `risk-to-control_template.xlsx`
- "Asset vs. Vulnerability" → `asset-vs-vulnerability_template.xlsx`
- "Process Control (Draft)" → `process-control-draft_template.xlsx`

### Character Encoding

**Requirement**: Support non-ASCII characters in entity labels
- Arabic: "معرّف المخاطر" → preserved in Excel
- Chinese: "风险编号" → preserved in Excel
- Accented: "Identificação de Riscos" → preserved

**Implementation**: UTF-8 encoding in XLSX (native support via Maatwebsite/Excel)

## Relationships

### ImportMapping → Templates

- 1 ImportMapping → Many potential templates downloaded (not tracked)
- Each download is independent (no persistent relationship)

### ImportMapping → ImportJob (existing)

- 1 ImportMapping → Many ImportJob records
- ImportJob tracks actual imports (not template downloads)
- Template download is preprocessing, not an ImportJob

### User → Template Download (implicit)

- No explicit model relationship
- Implicit: User downloads template before creating ImportJob
- Flow: User → Download Template → Populate → Upload File → Create ImportJob

## State Transitions

### Import Template Workflow (high-level)

```
User Views Mapping List
         ↓
User Clicks "Download Template"
         ↓
Controller Retrieves ImportMapping
         ↓
Template Generated (headers from mapping)
         ↓
Excel File Streamed to User
         ↓
User Populates File with Data
         ↓
User Uploads File via Import Form
         ↓
ImportJob Created & Processed
```

### No State Changes in Database

- Template download does not create any database records
- No audit trail of downloads (could be added if needed)
- No workflow state changes

## Edge Cases & Validation

### Case 1: Inactive Mapping

**Current Behavior**: Mapping still downloadable even if `is_active = false`

**Decision**: Allow download (mapping is valid data, user may want reference)

**Alternative**: Filter inactive from UI, prevent download via permission check

**Implementation**: No validation in controller, UI shows only active mappings

### Case 2: Very Long Entity Labels

**Input**: Label with 200+ characters (e.g., "This is a very detailed risk identification number for compliance tracking purposes")

**Excel Behavior**: Auto-fit column width up to terminal width, then wrap text or truncate in display

**Decision**: No special handling. Excel handles gracefully.

**Implementation**: Pass label as-is, let Excel render

### Case 3: Special Characters in Entity Labels

**Input**: Label with special chars: "Risk ID (INC#)", "Control: Type A/B", etc.

**Excel Behavior**: Renders as-is in cell

**Decision**: Preserve characters as-is (user configured them)

**Implementation**: No sanitization of labels, UTF-8 encoding ensures support

### Case 4: Deleted Mapping

**Current Behavior**: Cannot download (mapping doesn't exist, 404 error)

**Implementation**: Route model binding throws 404 (existing Laravel behavior)

**No change needed**: Standard HTTP error handling

### Case 5: Permission Denied

**Current Behavior**: User not authenticated or lacks role

**Implementation**: Existing middleware (`auth:web`, role checks) denies access

**HTTP Response**: 403 Forbidden

**No change needed**: Reuses existing permission infrastructure

### Case 6: Excel Generation Failure

**Unlikely but possible**: Server resource exhaustion, disk full, library bug

**Implementation**: Let exception bubble up, catch in middleware (optional error handling)

**HTTP Response**: 500 Internal Server Error

**Best Practice**: Log error for debugging, retry not needed (user can try again)

## Summary

| Aspect | Design Decision |
|--------|-----------------|
| New Database Models | None required |
| New Migrations | None required |
| Storage Changes | Temporary file, streamed (no persistence) |
| Validation | Existing ImportMapping validation sufficient |
| Relationships | One-way: ImportMapping → Excel stream |
| State Tracking | None (stateless operation) |
| Audit Trail | Use standard HTTP logs if needed |
| Scalability | On-demand generation (no caching) |
| Security | Existing auth/role controls apply |

## Implementation Notes

- **No ORF changes** - All logic in controller method
- **No service layer needed** - Straightforward Excel generation
- **Blade view changes only** - Add button to existing table
- **Test coverage** - Feature and unit tests for generation logic

This is intentionally minimal to avoid unnecessary complexity.
