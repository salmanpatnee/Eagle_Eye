---
id: 003-hr-expert-crud-tasks
title: HR Expert CRUD Tasks
stage: tasks
date: 2026-01-01
surface: cli
model: gemini-pro
feature: 008-hr-experts-crud
branch: 008-hr-experts-crud
user: user
command: /sp.tasks
labels: [tasks, feature, crud]
links:
  spec: specs/008-hr-experts-crud/spec.md
  plan: specs/008-hr-experts-crud/plan.md
  tasks: specs/008-hr-experts-crud/tasks.md
files:
  - specs/008-hr-experts-crud/tasks.md
tests: []
---

## Prompt

Generate an actionable, dependency-ordered tasks.md for the feature based on available design artifacts.

## Response snapshot

Generated tasks.md with 18 tasks organized by phase and user story.
Phase 1: Setup (Directories, Sidebar)
Phase 2: Foundational (Routes, Controller Refactor)
Phase 3: US1 (List View)
Phase 4: US2 (Create)
Phase 5: US3 (Edit)
Phase 6: US4 (Show)
Phase 7: US5 (Delete)
Phase 8: Polish

## Outcome

- ✅ Impact: Actionable task list created.
- 🧪 Tests: N/A
- 📁 Files: tasks.md
- 🔁 Next prompts: /sp.implement
- 🧠 Reflection: Tasks are granular and follow the requested checklist format.

## Evaluation notes (flywheel)

- Failure modes observed: None.
- Graders run and results (PASS/FAIL): PASS
- Prompt variant (if applicable): N/A
- Next experiment (smallest change to try): N/A
