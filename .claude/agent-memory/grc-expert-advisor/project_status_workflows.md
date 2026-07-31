---
name: project-status-workflows
description: How control implementation status and risk status are currently stored and updated in Eagle Eye — fields, enums, derivation logic, and automation gaps
metadata:
  type: project
---

## Control Implementation Status

- Field: `control_assessment_details_table.control_implementation_status`
- Type: `varchar(900)` (no DB-level constraint — free text in practice)
- Allowed values (enforced only in UI dropdown): "Not Implemented", "Implemented", "Partially Implemented", "Not Applicable"
- Default: NULL (no DB default)
- Set by: auditor manually selecting from dropdown when creating/editing a ControlAssessmentFinding
- No observer, event, or trigger exists to automate this

**Why:** Current workflow treats implementation status as a manual assessor judgement entered per control-finding row. There is no automation.

**How to apply:** When designing action-driven status, remember this field lives on the finding row, not on the control master. The control master has no status field at all.

## Risk Status (implementation_status)

- Field: `risk_assessment_details_table.implementation_status`
- Type: `enum('Open','Close')` with default 'Open'
- Set by: auditor manually selecting Open/Close when creating/editing a RiskAssessmentFinding
- Partial automation exists: when a risk is selected on the finding form, an AJAX call to `get_control_by_risk` computes a suggested status — "Close" if ALL linked controls are "Implemented", "Open" otherwise — and pre-fills the dropdown via `input[name="auto_status"]`
- The auditor can override this suggestion before saving

**Why:** The auto-suggest was added as a convenience but the final value is still a manual save action.

## Assessment-Level Completion Status

- Neither RiskAssessment nor ControlAssessment has a `status` column in its master table
- Completion is derived at query time by counting assessed vs total controls/risks
- ControlAssessment "completed" = remaining_controls_count = 0
- RiskAssessment "completed" = findings_count >= scoped_risks_count AND scoped_risks_count > 0

## No Automation Infrastructure

- No Laravel Observers, Events, Listeners, or Jobs exist in the codebase
- No DB-level triggers exist (confirmed via schema dump)
- All status values are set by direct form saves

**How to apply:** Any action-driven redesign must be built from scratch. The Observer pattern in Laravel is the natural fit given the existing Eloquent model structure.
