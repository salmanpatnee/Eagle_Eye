---
id: 002-hr-expert-crud-plan
title: HR Expert CRUD Plan
stage: plan
date: 2026-01-01
surface: cli
model: gemini-pro
feature: 008-hr-experts-crud
branch: 008-hr-experts-crud
user: user
command: /sp.plan
labels: [plan, feature, crud]
links:
  spec: specs/008-hr-experts-crud/spec.md
  ticket: 
  adr: 
  pr: 
files:
  - specs/008-hr-experts-crud/research.md
  - specs/008-hr-experts-crud/data-model.md
  - specs/008-hr-experts-crud/contracts/routes.md
  - specs/008-hr-experts-crud/quickstart.md
tests: []
---

## Prompt

Create a complete CRUD interface for existing database entity: HR Experts (hr_expert_master_table). Start by analyzing the existing Industries and Nationalities modules to understand and document their architectural patterns...

## Response snapshot

Planned the implementation of HR Experts CRUD.
Refactoring HumanResourceController to Resource Controller.
Defining views in process/hr/experts/ matching Industries module pattern.
Updating sidebar navigation.
Leveraging existing HumanResource model and relationships.

## Outcome

- ✅ Impact: Implementation plan ready.
- 🧪 Tests: N/A
- 📁 Files: research.md, data-model.md, contracts/routes.md, quickstart.md
- 🔁 Next prompts: /sp.tasks
- 🧠 Reflection: Existing HumanResourceController logic for "search" will be preserved/adapted within the index method of the new Resource Controller.

## Evaluation notes (flywheel)

- Failure modes observed: None.
- Graders run and results (PASS/FAIL): PASS
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): N/A
