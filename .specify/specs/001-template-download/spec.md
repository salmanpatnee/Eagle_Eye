# Feature Specification: Download Import Template

**Feature Branch**: `001-template-download`
**Created**: 2025-12-11
**Status**: Draft
**Input**: User description: "System should generate the excel file according to the mapping data, there is an already interface where all mappings are listed, i want to add a column that allow user to download the excel import template as define in the mapping."

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Download Template for Mapping (Priority: P1)

As an import manager or administrator, I want to download a sample Excel template based on a specific import mapping configuration, so I can understand the expected format and quickly populate data for import without manually creating the file structure.

**Why this priority**: This is the core feature requested. It directly enables users to get properly formatted import templates that match their mapping configurations, which is essential for the data import workflow.

**Independent Test**: Can be fully tested by navigating to the import mappings list, clicking a download button for a specific mapping, and verifying that a properly formatted Excel file is generated with the correct column headers and structure as defined in the mapping.

**Acceptance Scenarios**:

1. **Given** I am on the import mappings list page, **When** I click the download template button for a mapping, **Then** an Excel file is downloaded with columns named according to the mapping's left and right entity labels
2. **Given** I download a template for a pivot table mapping, **When** I open the Excel file, **Then** I see two columns (one for each entity) with appropriate headers and no pre-filled data
3. **Given** multiple users download the same mapping template, **When** they download it, **Then** each receives an identically formatted file
4. **Given** a mapping has special characters or non-ASCII characters in entity labels, **When** the template is generated, **Then** the column headers preserve these characters correctly

---

### User Story 2 - Template Visibility in Mapping List (Priority: P1)

As an import manager, I want to see a "Download Template" action button clearly visible in the mappings list for each mapping, so I can quickly identify and access the template download feature without navigating to detail views.

**Why this priority**: P1 because the download button must be easily accessible from the main mappings interface. This is a UX requirement for the core feature.

**Independent Test**: Can be fully tested by opening the import mappings list page and verifying that each mapping row displays a visible and functional download template action button or link.

**Acceptance Scenarios**:

1. **Given** I am viewing the import mappings list, **When** the page loads, **Then** each mapping row displays a "Download Template" button or link in the actions column
2. **Given** there are multiple mappings listed, **When** I click the download button for any specific mapping, **Then** only that mapping's template is downloaded (not others)
3. **Given** the mappings list is paginated, **When** I navigate between pages, **Then** download buttons are available on all pages

---

### User Story 3 - File Format and Naming Convention (Priority: P1)

As a system, I need to generate Excel files with proper naming conventions and format, so that users can easily organize and identify import templates among their downloaded files.

**Why this priority**: P1 because file naming and format directly affect usability. Users need to understand which template corresponds to which mapping.

**Independent Test**: Can be fully tested by downloading a template and verifying the file name follows a consistent pattern (e.g., `mapping_name_template.xlsx`) and contains properly formatted spreadsheet content.

**Acceptance Scenarios**:

1. **Given** I download a template for a mapping named "Risk to Control", **When** the file is downloaded, **Then** it is named something like `risk_to_control_template.xlsx` or `Risk-to-Control-Template.xlsx`
2. **Given** I download a template, **When** I open it in Excel or other spreadsheet application, **Then** it is a valid Excel file that opens without errors
3. **Given** a mapping has spaces or special characters in its name, **When** the template is generated, **Then** the filename is sanitized appropriately for the filesystem

---

### User Story 4 - Template Consistency with Validation Rules (Priority: P2)

As a data importer, when I download a template and populate it with data, I want to understand what columns are required and what their purpose is, so that I fill them correctly and can successfully import the data.

**Why this priority**: P2 because it enhances the usability of the template but can be addressed after the basic download functionality is in place.

**Independent Test**: Can be fully tested by downloading a template and verifying that column headers are clear and match the entity labels defined in the mapping configuration.

**Acceptance Scenarios**:

1. **Given** I download a template for a mapping, **When** I open it, **Then** column headers match exactly the entity labels configured in the mapping (e.g., left_entity_label and right_entity_label)
2. **Given** a mapping has descriptions for the entities, **When** I view the template, **Then** I can clearly understand what data should go in each column

---

### Edge Cases

- What happens when a user attempts to download a template for an inactive/disabled mapping?
- How should the system handle mappings with very long entity label names (e.g., 100+ characters)?
- What happens if the Excel file generation fails due to system resource constraints?
- Should deleted mappings still be downloadable, or should the download option be removed?

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: System MUST generate an Excel file when user clicks "Download Template" button from the import mappings list
- **FR-002**: The generated Excel file MUST contain exactly two columns (or more if the mapping includes additional column_mappings)
- **FR-003**: Column headers MUST be named according to the mapping's `left_entity_label` and `right_entity_label` fields
- **FR-004**: The Excel file MUST be properly formatted and openable in standard spreadsheet applications (Excel, Google Sheets, LibreOffice)
- **FR-005**: Users MUST be able to download the template directly from the mappings list interface without navigating to separate pages
- **FR-006**: System MUST generate and serve the file with an appropriate filename that identifies the mapping (e.g., `{mapping_name}_template.xlsx`)
- **FR-007**: The generated file MUST include only the column structure (headers) with no pre-filled data rows
- **FR-008**: Downloaded template files MUST be immediately usable for data import (users can populate and upload)

### Key Entities

- **ImportMapping**: Contains the mapping configuration including left/right entity labels, table names, and column information needed to generate the template
- **Generated Template File**: Excel file with structure matching the mapping specification

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: Users can download an import template from the mappings list within one click without leaving the page
- **SC-002**: Downloaded Excel template files open successfully in Excel, Google Sheets, and LibreOffice without errors
- **SC-003**: Column headers in downloaded templates exactly match the mapping configuration (100% accuracy)
- **SC-004**: File download completes within 2 seconds for any mapping size
- **SC-005**: Filename is human-readable and clearly identifies the source mapping
- **SC-006**: Template file size remains under 100KB regardless of mapping complexity
- **SC-007**: Users can populate a downloaded template and successfully upload it using the existing import process

## Assumptions

- The system uses Maatwebsite/Excel package (already in composer.json) for Excel generation
- Download functionality will be implemented as an AJAX route or button action from the existing mapping controller
- The template structure mirrors what the import validators expect (two columns: left ID, right ID)
- File generation is synchronous and completes within acceptable time limits
- There are no special permission requirements beyond viewing mappings (existing permissions apply)
- File storage is temporary and can be cleaned up after download (no permanent storage of templates required)

## Open Questions

None at this stage - feature scope is well-defined based on existing mapping interface and import system.
