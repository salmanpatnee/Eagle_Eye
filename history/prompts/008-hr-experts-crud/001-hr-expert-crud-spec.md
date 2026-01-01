---
id: 001-hr-expert-crud-spec
title: HR Expert CRUD Spec
stage: spec
date: 2026-01-01
surface: cli
model: gemini-pro
feature: 008-hr-experts-crud
branch: 008-hr-experts-crud
user: user
command: /sp.specify
labels: [spec, feature, crud]
links:
  spec: specs/008-hr-experts-crud/spec.md
  ticket: 
  adr: 
  pr: 
files:
  - specs/008-hr-experts-crud/spec.md
  - specs/008-hr-experts-crud/checklists/requirements.md
tests: []
---

## Prompt

Create a complete CRUD interface for managing hr_expert_master_table database entity: Model and database table already exist; only the interface layer is needed. Follow the exact same architectural pattern as the existing Industries and Nationalities modules. Implement RESTful routes (index, show, create, store, edit, update, delete) with controller that match the Industries/Nationalities structure, including proper request validation and error handling. Build views for index (displaying all records in a table format matching existing modules), show (displaying single record details), create (form to add new record), and edit (form to update existing record). Use existing Model and table with proper relationships and attributes accessible. Add designation reference in the hr_expert_master_table as designation_id and keep designation column for backward compatibility. Add sidebar link for HR Experts module so admins can access them from the main navigation. Match the coding style and conventions of existing modules while maintaining consistency with form validation, error messages, and UI/UX throughout.

## Response snapshot

Created feature specification for HR Experts CRUD (008-hr-experts-crud).
Defined user scenarios for Index, Create, Edit, Show, Delete.
Established functional requirements including sidebar link and existing model usage.
Validated spec against quality checklist.

## Outcome

- ✅ Impact: Specification created and validated.
- 🧪 Tests: N/A
- 📁 Files: spec.md, requirements.md
- 🔁 Next prompts: /sp.plan
- 🧠 Reflection: Reused existing branch 008-hr-experts-crud as it matched the request and was empty.

## Evaluation notes (flywheel)

- Failure modes observed: PowerShell script parameter binding issue (benign, bypassed).
- Graders run and results (PASS/FAIL): PASS
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): N/A
