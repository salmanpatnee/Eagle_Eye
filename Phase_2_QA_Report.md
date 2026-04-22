# Phase 2 QA Report: Artifact → Evidence → Control Verification

**Total Issues Found: 38**
**Date:** 2026-04-21

---

## CRITICAL BUGS (Fix First — These Show Wrong Data)

### BUG-01: Evidence Show — Wrong Field Displayed
**File:** `resources/views/process/evidence-management/evidences/show.blade.php` line 142
**Problem:** Shows `$evidence->payment` where it should show `$evidence->e_banking`
**Effect:** E-Banking field shows wrong value in UI
**Fix:** Change to `{{ $evidence->e_banking ?? '—' }}`

---

### BUG-02: Artifact Show — Infrastructure Field Shows E-Commerce Twice
**File:** `resources/views/process/evidence-management/artifacts/show.blade.php` line 89
**Problem:** `$artifact->artifact_e_commerce` shown twice — should be `artifact_infrastructure` on second occurrence
**Effect:** Infrastructure field never shown; E-Commerce shown twice
**Fix:** Change line 89 to `{{ $artifact->artifact_infrastructure ?? '—' }}`

---

### BUG-03: Assessment Finding Show — Wrong Field for Remarks
**File:** `resources/views/process/assessments/control-assessment-findings/show.blade.php` line 56
**Problem:** Shows `control_maturity_justification` in remarks field
**Effect:** User sees justification text where remarks should appear
**Fix:** Change to `{{ $controlAssessmentFinding->remarks ?? '—' }}`

---

## SECURITY ISSUES

### SEC-01: XSS Risk in Control vs Evidence Report
**File:** `app/Http/Controllers/ControlEvidenceController.php` lines 75–77, 173–179
**Problem:** Builds raw HTML `<a>` tags inside SQL `GROUP_CONCAT()` without escaping evidence/artifact names
**Effect:** If an evidence name contains `<script>alert(1)</script>`, it executes in the browser
**Fix:** Build HTML in PHP using `htmlspecialchars()`, not inside SQL

---

### SEC-02: No File Type/Size Validation on Uploads
**File:** `app/Http/Controllers/ArtifactController.php` line 51–75
**Problem:** No validation on uploaded file type, size, or MIME type
**Effect:** Malware files, huge files, or dangerous types can be uploaded
**Fix:** Add `'fileAttachment' => 'mimes:pdf,doc,docx,xls,xlsx|max:10240'`

---

### SEC-03: No Authorization Check on Control Assessments
**File:** `app/Http/Controllers/ControlAssessmentController.php` lines 59, 98, 119, 128
**Problem:** No check that logged-in user owns or has access to the assessment
**Effect:** User A can view/edit/delete User B's assessments
**Fix:** Add authorization gates or policy checks on show/edit/update/destroy

---

### SEC-04: SQL Injection Risk on AJAX Evidence Lookup
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` line 141
**Problem:** `$request->selectedValue` used in query without validation
**Fix:** Add `$request->validate(['selectedValue' => 'required|string|max:50'])`

---

## LOGIC ERRORS

### LOGIC-01: Update Allows Removing All Controls/Artifacts, Store Does Not
**File:** `app/Http/Controllers/EvidenceController.php` lines 80–81 vs 193–194
**Problem:** `store()` requires controls + artifacts; `update()` makes them nullable
**Effect:** User can update evidence to have no controls or artifacts — breaks the core link
**Fix:** Make both store and update consistently require at least one control and one artifact

---

### LOGIC-02: Evidence With No Artifacts Hidden from Reports
**File:** `app/Http/Controllers/ControlEvidenceController.php` line 67–68
**Problem:** Uses INNER JOIN on `evidence_vs_artifact_table` — evidence without artifacts is excluded
**Effect:** Valid evidence linked to controls disappears from Control vs Evidence report
**Fix:** Use LEFT JOIN instead

---

### LOGIC-03: Duplicate Findings Allowed (Same Control, Same Assessment)
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` lines 56–72
**Problem:** No uniqueness check on `(control_assessment_id, control_id)` pair
**Effect:** Assessor can create two findings for the same control in one assessment
**Fix:** Add unique DB constraint + validation rule

---

### LOGIC-04: Temp File Deletion Affects All Users on Validation Error
**File:** `app/Http/Controllers/ArtifactController.php` lines 77–85
**Problem:** On validation failure, deletes ALL temp files, not just current user's
**Effect:** If two users upload concurrently and one fails, other user's temp files deleted
**Fix:** Scope deletion to current request's temp files only

---

### LOGIC-05: Artifact Delete Leaves Orphaned Evidence Links
**File:** `app/Http/Controllers/ArtifactController.php` lines 157–164
**Problem:** Deletes artifact but doesn't detach from evidence pivot table
**Effect:** `evidence_vs_artifact_table` has orphaned rows pointing to deleted artifact
**Fix:** Add `$artifact->evidences()->detach()` before delete

---

### LOGIC-06: Evidence Delete Doesn't Check Dependent Assessments
**File:** `app/Http/Controllers/EvidenceController.php` lines 237–245
**Problem:** Evidence can be deleted even if it's referenced in active assessment findings
**Effect:** Assessment findings lose their evidence backing silently
**Fix:** Block delete if evidence is used in any active assessment

---

### LOGIC-07: Assessment Start Date Not Validated Against End Date
**File:** `app/Http/Controllers/ControlAssessmentController.php` lines 89–96
**Problem:** No check that start date < end date
**Effect:** User can create assessment where end date is before start date
**Fix:** Add `'control_assessment_end_date' => 'required|after:control_assessment_start_date'`

---

## VALIDATION GAPS

### VAL-01: Evidence Fields Have Trailing Spaces in Form Names
**File:** `resources/views/process/evidence-management/evidences/create.blade.php` line 133
**Problem:** `name="evidence_telework   "` has trailing spaces
**Effect:** Field value never saved — silently ignored
**Fix:** Remove spaces: `name="evidence_telework"`

---

### VAL-02: Evidence Field Name Capital E Mismatch
**File:** `app/Http/Controllers/EvidenceController.php` lines 89, 138, 202
**Problem:** Validation uses `'Evidence_social_media'` (capital E) but form sends `evidence_social_media`
**Effect:** Validation rule never matches, field validation silently skipped
**Fix:** Standardize to lowercase: `'evidence_social_media'`

---

### VAL-03: No Existence Check on Classification ID
**File:** `app/Http/Controllers/ArtifactController.php` line 57
**Problem:** `'classification_id' => 'nullable|string'` — doesn't check if ID exists in DB
**Fix:** Change to `'classification_id' => 'nullable|exists:classification_table,classification_id'`

---

### VAL-04: Control ID Not Validated Against DB on Finding Creation
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` lines 56–65
**Problem:** No `exists:` rule on `control_id`
**Effect:** Finding can be saved with non-existent control ID
**Fix:** Add `'control_id' => 'required|exists:control_master_table,control_id'`

---

### VAL-05: Control Finding ID Not Unique
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` line 56
**Problem:** No uniqueness check on `control_finding_id`
**Fix:** Add `'control_finding_id' => 'required|unique:control_assessment_details_table,control_finding_id'`

---

## UI / UX ISSUES

### UI-01: Control vs Evidence — No Empty State When No Results
**File:** `resources/views/process/evidence-management/evidence-control/control-vs-evidence.blade.php` lines 56–70
**Problem:** No `@empty` block in `@forelse` — blank table shown with no message
**Fix:** Add `@empty` with message: "No controls with evidence found for selected filters."

---

### UI-02: Evidence vs Control Report — Missing Artifacts Column
**File:** `resources/views/process/evidence-management/evidence-control/evidence-vs-control.blade.php` lines 48–72
**Problem:** Shows evidence + controls but not linked artifacts (control-vs-evidence has it, this doesn't)
**Fix:** Add Artifacts column matching the control-vs-evidence view

---

### UI-03: Artifact Upload — No Guidance on Edit Mode
**File:** `resources/views/process/evidence-management/artifacts/create.blade.php` line 54
**Problem:** On edit, file upload appears optional but no message explaining "leave blank to keep existing files"
**Fix:** Add helper text when in edit mode

---

### UI-04: Assessment — No Way to Go Back and Edit After Creating
**File:** `app/Http/Controllers/ControlAssessmentController.php` line 95
**Problem:** After creating assessment, redirects directly to findings form with no back button
**Fix:** Add breadcrumb/back link to assessment edit page from findings form

---

## MISSING FEATURES (Important for Completeness)

### MISS-01: No Null Safety on Classification Relationship in Views
**File:** `resources/views/process/evidence-management/evidences/show.blade.php` line 29
**Problem:** `$evidence->classification->classification_name` — crashes if classification is null
**Fix:** Use null safe: `$evidence->classification?->classification_name ?? '—'`

---

### MISS-02: AJAX Evidence Lookup — No Null Check on Control
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` lines 123–133
**Problem:** `$control->control_id` returned without checking if `$control` is null
**Effect:** Returns null as JSON if control not found — frontend breaks silently
**Fix:** Add: `if (!$control) return response()->json(['error' => 'Not found'], 404);`

---

### MISS-03: Function Name Typo
**File:** `app/Http/Controllers/ControlAssessmentFindingController.php` line 135
**Problem:** `get_evidence_by_conroller` — misspelled "controller"
**Fix:** Rename to `get_evidence_by_control`

---

## HUMAN VERIFICATION STEPS

Run these manually in the browser to verify Phase 2 works end to end.

### Step 1 — Create an Artifact
1. Go to **Artifacts** → **Create New**
2. Fill in: Artifact ID, Name, Date, Category, Classification
3. Upload a PDF file
4. Submit
5. **Verify:** Record appears in list. Click "Show" — all fields display correctly, no duplicate fields, file attachment is visible and downloadable

---

### Step 2 — Create Evidence Linked to Artifact
1. Go to **Evidence** → **Create New**
2. Fill in: Evidence ID, Name, Nature, Type, Owner
3. In the **Artifacts** multi-select: select the artifact created in Step 1
4. In the **Controls** multi-select: select at least one control
5. Submit
6. **Verify:** Evidence appears in list. Click "Show" — linked artifact appears with correct name and link. Linked control appears. All tech scope fields show correct values (check E-Banking vs Payment — should be separate)

---

### Step 3 — View Control vs Evidence Report
1. Go to **Evidence Management** → **Control vs Evidence**
2. Leave filters blank, click Search/Filter
3. **Verify:**
   - The control from Step 2 appears in the list
   - Linked evidence name is shown as a clickable link
   - Linked artifact is shown (not blank)
   - If no results, a message appears (not a blank table)
4. Apply a filter by Best Practice or Domain — verify results narrow correctly
5. Click **Export PDF** — verify PDF downloads and shows same data

---

### Step 4 — View Evidence vs Control Report
1. Go to **Evidence Management** → **Evidence vs Control**
2. **Verify:**
   - Evidence from Step 2 appears
   - Linked control name is shown
   - Artifacts column is present (if not — this is UI-02 bug)

---

### Step 5 — Create a Control Assessment
1. Go to **Control Assessments** → **Create New**
2. Fill in: Assessment ID, Name, Best Practice, Auditor, Location, Start Date, End Date
3. Set End Date BEFORE Start Date — **Verify:** validation error appears (if not — this is LOGIC-07 bug)
4. Fix dates and submit
5. **Verify:** Redirected to Add Findings form for this assessment

---

### Step 6 — Add a Finding (Verify Control)
1. In the findings form, select a control from the dropdown
2. Click the AJAX "Load Evidence" button for that control
3. **Verify:** Evidence linked to that control in Step 2 appears in the evidence panel
4. Fill in: Implementation Status = "Partially Implemented", Maturity Level, Corrective Action, Due Date
5. Submit
6. **Verify:** Finding saved. Go back to Assessment Show page — finding appears with correct control name and status

---

### Step 7 — Test Edit Evidence (Removing All Controls)
1. Go to the evidence created in Step 2, click Edit
2. Remove ALL controls from the multi-select
3. Submit
4. **Verify:** System should reject this (controls required) — if it saves with no controls, this is LOGIC-01 bug

---

### Step 8 — Test Delete Artifact Used by Evidence
1. Try to delete the artifact created in Step 1 (which is linked to evidence in Step 2)
2. **Verify:** Either system blocks the delete with a clear message, OR after delete the evidence show page still works without crashing (no orphaned link errors)

---

### Step 9 — Test Assessment Finding Show Page
1. Click on the finding created in Step 6
2. **Verify:**
   - Remarks field shows remarks (not maturity justification text) — if wrong, this is BUG-03
   - All fields display correctly

---

### Step 10 — Test PDF Export
1. Go to **Control vs Evidence**, click Export PDF
2. **Verify:**
   - PDF downloads
   - Evidence names in PDF do not contain raw HTML tags (check for XSS — SEC-01)
   - All links/names render as plain text in PDF

---

## PRIORITY ORDER FOR FIXES

| # | Issue | Severity |
|---|-------|----------|
| 1 | BUG-01, 02, 03 — Wrong fields displayed | Critical |
| 2 | SEC-01 — XSS in reports | Critical |
| 3 | SEC-02 — No file upload validation | High |
| 4 | SEC-03 — No authorization on assessments | High |
| 5 | LOGIC-01 — Update allows empty controls/artifacts | High |
| 6 | LOGIC-02 — Evidence without artifacts hidden from reports | High |
| 7 | LOGIC-03 — Duplicate findings allowed | High |
| 8 | VAL-01 — Trailing spaces in form field names | High |
| 9 | VAL-02 — Capital E field name mismatch | High |
| 10 | LOGIC-07 — Start/end date not validated | Medium |
| 11 | UI-01 — Empty state missing | Medium |
| 12 | UI-02 — Artifacts column missing from evidence-vs-control | Medium |
| 13 | MISS-01, 02 — Null safety crashes | Medium |
| 14 | LOGIC-05, 06 — Orphaned records on delete | Medium |
| 15 | All remaining low priority issues | Low |
