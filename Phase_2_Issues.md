# Phase 2 Review: Artifact → Evidence → Control Verification

## What Is This?

Think of it like an audit for a company office.

Imagine a rule says: *"All doors must be locked after 6pm."*

To prove the rule is followed, you need:
1. **A document** (the log sheet showing who checked the doors) — this is your **Artifact**
2. **A folder** collecting all those log sheets — this is your **Evidence**
3. **The rule itself** ("lock doors after 6pm") — this is your **Control**
4. **Someone checking** if the log sheets actually prove the doors were locked — this is **Verification**

The system does exactly this — but for IT security rules instead of office doors.

---

## What We're Doing Correctly ✓

| What | Why it's good |
|------|--------------|
| Artifacts linked to Evidence | Correctly groups documents into one package |
| Evidence linked to Controls | Correctly ties proof to the rule it proves |
| Controls have hierarchy (parent/child) | Matches how real frameworks organize rules |
| Assessment records implementation status | Can track "rule followed" vs "rule broken" |
| SAMA maturity levels tracked | Industry-specific, shows how mature each control is |
| Bidirectional reports (Control→Evidence, Evidence→Control) | Auditors can look from both directions |

---

## What's Missing ✗

### 1. Verification has no result
Right now the system only records **"evidence is connected to a control."**
It does NOT record **"and someone checked it and it passed/failed."**

Like stamping a folder "REVIEWED" without writing whether it passed or failed.

**Fix:** Add a result to the connection — Passed / Failed / Partial — plus who checked it and when.

**Files affected:**
- `app/Models/EvidenceControl.php`
- `database/` — new migration for `control_verification` table

---

### 2. Evidence has no expiry date
A log from 2 years ago cannot prove a rule is being followed today.

Right now the system stores evidence with no date range. Auditors will reject old evidence.

**Fix:** Add `valid_from` and `valid_until` dates to every Evidence record.

**Files affected:**
- `app/Models/Evidence.php`
- `database/` — new migration to add columns to `evidence_table`

---

### 3. No history of changes
If someone changes a verification result from "Passed" to "Failed" — the system doesn't remember the old value.

Auditors require a full history of every change: who changed it, when, what it was before.

**Fix:** Add a change log table for verification records.

**Files affected:**
- `database/` — new migration for `control_verification_history` table
- Model observer on `ControlVerification`

---

### 4. If a control fails, the risk is not updated
Risks are linked to Controls. If a control is verified as "not working," the risk it was supposed to reduce is now unprotected.

But nothing happens automatically — the risk record stays unchanged.

**Fix:** When verification = Failed, automatically flag the linked risk for re-review.

**Files affected:**
- `app/Models/EvidenceControl.php` — add model observer
- `app/Models/Risk.php` — add flag/status field

---

### 5. No record of what evidence was used during an assessment
When an assessor checks a control, they look at evidence. But the system doesn't save **which evidence they actually looked at** for that specific check.

**Fix:** Link evidence directly to the assessment finding, not just to the control.

**Files affected:**
- `app/Models/ControlAssessmentFinding.php`
- `database/` — new pivot `assessment_finding_vs_evidence_table`
- `app/Http/Controllers/ControlAssessmentFindingController.php`

---

## Summary Table

| # | Issue | Priority | Status |
|---|-------|----------|--------|
| 1 | Verification has no pass/fail result | Critical | ✗ Missing |
| 2 | Evidence has no expiry date | High | ✗ Missing |
| 3 | No change history on verification | Critical | ✗ Missing |
| 4 | Risk not updated when control fails | High | ✗ Missing |
| 5 | Evidence not linked to specific assessment finding | Medium | ✗ Missing |

---

## Industry Standards This Affects

| Standard | What it requires | Which issue |
|----------|-----------------|-------------|
| ISO 27001:2022 Clause 9.1 | Who reviews, when, how often | Issue 1, 2 |
| ISO 27001:2022 Clause 7.5.3 | Protect documented information, version history | Issue 3 |
| SOC 2 | Test of Design (ToD) AND Test of Operating Effectiveness (ToE) as separate concepts | Issue 1 |
| NIST SP 800-53A | Assessment method: Examine / Interview / Test | Issue 1 |
| NIST CSF 2.0 | Risk feedback loop from control verification | Issue 4 |

---

## Recommended Fix Order

1. **First:** Expand `evidence_vs_control_table` into a proper `ControlVerification` model with status, reviewer, date, test type
2. **Second:** Add `valid_from`, `valid_to`, `status` to `evidence_table`
3. **Third:** Add immutable change history table for verifications
4. **Fourth:** Auto-flag linked risks when control verification = Failed/Partial
5. **Fifth:** Link evidence directly to `control_assessment_details_table` (assessment findings)
