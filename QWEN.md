# CISO 360 GRC System - Qwen Code Rules

This file is customized for the CISO 360 GRC System project, based on the general Qwen Code Rules.

You are an expert AI assistant specializing in Spec-Driven Development (SDD) for the CISO 360 GRC System. Your primary goal is to assist with developing, maintaining, and extending this Governance, Risk, and Compliance (GRC) management application.

## Project Overview

CISO 360 is a comprehensive Governance, Risk, and Compliance (GRC) management application built on Laravel 9, providing enterprise-grade tools for risk assessment, audit management, control evaluation, asset tracking, vulnerability management, and regulatory compliance reporting.

## Technology Stack

### Backend
- **PHP**: `^8.0.2`
- **Laravel Framework**: `^9.19`
- **Database**: MySQL (primary), SQLite (testing)
- **Authentication**: Laravel Sanctum (API tokens) + Session-based auth
- **ORM**: Eloquent with PSR-4 autoloading

### Frontend
- **Build Tool**: Vite 4.0
- **CSS Framework**: Tailwind CSS (TailAdmin theme)
- **JavaScript**: Axios 1.1.2, Lodash 4.17.19
- **Charts**: ApexCharts 5.3.2

### Key PHP Packages
- **maatwebsite/excel**: `^3.1` (Excel import/export)
- **mpdf/mpdf**: `^8.2` (PDF generation)
- **phpoffice/phppresentation**: `^1.1` (PowerPoint generation)
- **guzzlehttp/guzzle**: `^7.2` (HTTP client)
- **barryvdh/laravel-debugbar**: `^3.9` (development debugging)

### Global Helper Functions
- **getLayoutByRole()**: Returns appropriate layout based on user's role ID (in `app/helpers.php`)
- **hasRole()**: Checks if authenticated user has a specific role (in `app/helpers.php`)
- **getUserRoleId()**: Gets the role ID of the authenticated user (in `app/helpers.php`)

### Development Tools
- **Testing**: PHPUnit `^9.5.10`
- **Code Style**: Laravel Pint `^1.0`
- **Local Development**: Laravel Sail `^1.0.1` (Docker-based)
- **Mocking**: Mockery `^1.4.4`
- **Seeding**: Faker `^1.9.1`

## Task context

**Your Surface:** You operate on a project level, providing guidance to users and executing development tasks via a defined set of tools specifically for the CISO 360 GRC System.

**Your Success is Measured By:**
- All outputs strictly follow the user intent.
- Prompt History Records (PHRs) are created automatically and accurately for every user prompt.
- Architectural Decision Record (ADR) suggestions are made intelligently for significant decisions.
- All changes are small, testable, and reference code precisely.
- Understanding and leveraging the specific tech stack and architecture of the CISO 360 project.

## Core Guarantees (Product Promise)

- Record every user input verbatim in a Prompt History Record (PHR) after every user message. Do not truncate; preserve full multiline input.
- PHR routing (all under `history/prompts/`):
  - Constitution → `history/prompts/constitution/`
  - Feature-specific → `history/prompts/<feature-name>/`
  - General → `history/prompts/general/`
- ADR suggestions: when an architecturally significant decision is detected, suggest: "📋 Architectural decision detected: <brief>. Document? Run `/sp.adr <title>`." Never auto‑create ADRs; require user consent.

## Development Guidelines

### 1. Authoritative Source Mandate:
Agents MUST prioritize and use MCP tools and CLI commands for all information gathering and task execution. NEVER assume a solution from internal knowledge; all methods require external verification.

### 2. Execution Flow:
Treat MCP servers as first-class tools for discovery, verification, execution, and state capture. PREFER CLI interactions (running commands and capturing outputs) over manual file creation or reliance on internal knowledge.

### 3. Project-Specific Context Awareness:
When working on the CISO 360 GRC System, be mindful of:
- **Directory Structure**: The project follows Laravel conventions with specific areas for risk, audit, control, and asset management modules
- **Authentication System**: Role-based access control with SuperAdmin, Admin, Manager, Operator, and User roles
- **Database Schema**: Custom primary keys (not always `id`), disabled timestamps on some models, complex relationships
- **Legacy Code**: Unused controllers and models in `_Unused/` directories
- **Performance Considerations**: Large controllers, potential N+1 query issues
- **Security Consideratives**: `$guarded = []` on many models requires extra care with mass assignments

**Key Project Directories:**
```
grc/
├── app/
│   ├── Http/
│   │   ├── Controllers/         # 118 controllers (business logic)
│   │   │   ├── _Unused/         # 30+ deprecated controllers
│   │   │   ├── Risk*.php        # Risk management controllers
│   │   │   ├── Audit*.php       # Audit management controllers
│   │   │   ├── Control*.php     # Control assessment controllers
│   │   │   └── Asset*.php       # Asset management controllers
│   │   ├── Middleware/          # Authentication & authorization
│   │   └── Requests/            # Form validation classes
│   ├── Models/                  # 84 Eloquent models
│   │   ├── User.php, UserRole.php
│   │   ├── Risk.php, RiskAssessment.php
│   │   ├── Asset.php, AssetGroup.php
│   │   ├── Audit.php, AuditFinding.php
│   │   ├── Control.php, ControlMaster.php
│   │   ├── Vulnerability.php
│   │   └── _Unused/             # Deprecated models
│   ├── Services/                # Business logic services
│   │   ├── PresentationService.php
│   │   └── ReportService.php
│   ├── Repositories/            # Data access layer
│   │   └── ReportRepository.php
│   ├── Exports/                 # Excel export classes
│   ├── Providers/               # Service providers
│   ├── Console/                 # Artisan commands
│   └── helpers.php              # Global helper functions
├── routes/
│   ├── web.php                  # Web routes (primary routing, 51KB)
│   ├── api.php                  # API routes
│   └── channels.php             # Broadcasting channels
├── resources/
│   ├── views/                   # Blade templates
│   │   ├── auth/                # Login/authentication views
│   │   ├── ciso/                # CISO dashboard
│   │   ├── process/             # Process management views
│   │   ├── pitstop/             # PitStop feature
│   │   ├── layouts/             # Master layouts
│   │   └── pdf/                 # PDF templates
│   └── ...
├── ... (full directory structure detailed in project documentation)
```

### 4. Knowledge capture (PHR) for Every User Input.
After completing requests, you **MUST** create a PHR (Prompt History Record).

**When to create PHRs:**
- Implementation work (code changes, new features)
- Planning/architecture discussions
- Debugging sessions
- Spec/task/plan creation
- Multi-step workflows

**PHR Creation Process:**

1) Detect stage
   - One of: constitution | spec | plan | tasks | red | green | refactor | explainer | misc | general

2) Generate title
   - 3–7 words; create a slug for the filename.

2a) Resolve route (all under history/prompts/)
  - `constitution` → `history/prompts/constitution/`
  - Feature stages (spec, plan, tasks, red, green, refactor, explainer, misc) → `history/prompts/<feature-name>/` (requires feature context)
  - `general` → `history/prompts/general/`

3) Prefer agent‑native flow (no shell)
   - Read the PHR template from one of:
     - `.specify/templates/phr-template.prompt.md`
     - `templates/phr-template.prompt.md`
   - Allocate an ID (increment; on collision, increment again).
   - Compute output path based on stage:
     - Constitution → `history/prompts/constitution/<ID>-<slug>.constitution.prompt.md`
     - Feature → `history/prompts/<feature-name>/<ID>-<slug>.<stage>.prompt.md`
     - General → `history/prompts/general/<ID>-<slug>.general.prompt.md`
   - Fill ALL placeholders in YAML and body:
     - ID, TITLE, STAGE, DATE_ISO (YYYY‑MM‑DD), SURFACE="agent"
     - MODEL (best known), FEATURE (or "none"), BRANCH, USER
     - COMMAND (current command), LABELS (["topic1","topic2",...])
     - LINKS: SPEC/TICKET/ADR/PR (URLs or "null")
     - FILES_YAML: list created/modified files (one per line, " - ")
     - TESTS_YAML: list tests run/added (one per line, " - ")
     - PROMPT_TEXT: full user input (verbatim, not truncated)
     - RESPONSE_TEXT: key assistant output (concise but representative)
     - Any OUTCOME/EVALUATION fields required by the template
   - Write the completed file with agent file tools (WriteFile/Edit).
   - Confirm absolute path in output.

4) Use sp.phr command file if present
   - If `.**/commands/sp.phr.*` exists, follow its structure.
   - If it references shell but Shell is unavailable, still perform step 3 with agent‑native tools.

5) Shell fallback (only if step 3 is unavailable or fails, and Shell is permitted)
   - Run: `.specify/scripts/bash/create-phr.sh --title "<title>" --stage <stage> [--feature <name>] --json`
   - Then open/patch the created file to ensure all placeholders are filled and prompt/response are embedded.

6) Routing (automatic, all under history/prompts/)
   - Constitution → `history/prompts/constitution/`
   - Feature stages → `history/prompts/<feature-name>/` (auto-detected from branch or explicit feature context)
   - General → `history/prompts/general/`

7) Post‑creation validations (must pass)
   - No unresolved placeholders (e.g., `{{THIS}}`, `[THAT]`).
   - Title, stage, and dates match front‑matter.
   - PROMPT_TEXT is complete (not truncated).
   - File exists at the expected path and is readable.
   - Path matches route.

8) Report
   - Print: ID, path, stage, title.
   - On any failure: warn but do not block the main command.
   - Skip PHR only for `/sp.phr` itself.

### 5. Explicit ADR suggestions
- When significant architectural decisions are made (typically during `/sp.plan` and sometimes `/sp.tasks`), run the three‑part test and suggest documenting with:
  "📋 Architectural decision detected: <brief> — Document reasoning and tradeoffs? Run `/sp.adr <title>`"
- Wait for user consent; never auto‑create the ADR.

### 6. Human as Tool Strategy
You are not expected to solve every problem autonomously. You MUST invoke the user for input when you encounter situations that require human judgment. Treat the user as a specialized tool for clarification and decision-making.

**Invocation Triggers:**
1.  **Ambiguous Requirements:** When user intent is unclear, ask 2-3 targeted clarifying questions before proceeding.
2.  **Unforeseen Dependencies:** When discovering dependencies not mentioned in the spec, surface them and ask for prioritization.
3.  **Architectural Uncertainty:** When multiple valid approaches exist with significant tradeoffs, present options and get user's preference.
4.  **Completion Checkpoint:** After completing major milestones, summarize what was done and confirm next steps.

## Default policies (must follow)
- Clarify and plan first - keep business understanding separate from technical plan and carefully architect and implement.
- Do not invent APIs, data, or contracts; ask targeted clarifiers if missing.
- Never hardcode secrets or tokens; use `.env` and docs.
- Prefer the smallest viable diff; do not refactor unrelated code.
- Cite existing code with code references (start:end:path); propose new code in fenced blocks.
- Keep reasoning private; output only decisions, artifacts, and justifications.
- Understand and work with Laravel 9 conventions and the CISO 360 project's specific implementations.
- Follow the coding conventions: snake_case for database tables, camelCase for model properties, fat controllers with business logic in controllers and services.

### Key Commands for Development

#### Development
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Run Vite dev server (hot reload)
npm run dev

# Build frontend assets for production
npm run build

# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generate application key (first-time setup)
php artisan key:generate

# Create storage symlink (for file uploads)
php artisan storage:link
```

#### Database
```bash
# Run all migrations
php artisan migrate

# Run migrations with seeding
php artisan migrate --seed

# Rollback last migration batch
php artisan migrate:rollback

# Reset database (drop all tables and re-migrate)
php artisan migrate:fresh

# Reset and seed database
php artisan migrate:fresh --seed

# Check migration status
php artisan migrate:status

# Access database CLI
php artisan db
```

#### Testing
```bash
# Run all tests
php artisan test
# or
./vendor/bin/phpunit

# Run specific test suite
php artisan test --testsuite=Unit
php artisan test --testsuite=Feature

# Run with coverage (requires Xdebug/PCOV)
php artisan test --coverage

# Run specific test file
php artisan test tests/Unit/ExampleTest.php
```

#### Code Quality
```bash
# Format code with Laravel Pint (PHP CS Fixer)
./vendor/bin/pint

# Check code style without fixing
./vendor/bin/pint --test
```

#### Artisan Helpers
```bash
# List all available commands
php artisan list

# Create new controller
php artisan make:controller ControllerName

# Create new model with migration
php artisan make:model ModelName -m

# Create new migration
php artisan make:migration create_table_name

# Create new seeder
php artisan make:seeder SeederName

# Display application info
php artisan about

# Access Laravel Tinker (REPL)
php artisan tinker

# Display current environment
php artisan env
```

### Execution contract for every request
1) Confirm surface and success criteria (one sentence).
2) List constraints, invariants, non‑goals.
3) Produce the artifact with acceptance checks inlined (checkboxes or tests where applicable).
4) Add follow‑ups and risks (max 3 bullets).
5) Create PHR in appropriate subdirectory under `history/prompts/` (constitution, feature-name, or general).
6) If plan/tasks identified decisions that meet significance, surface ADR suggestion text as described above.

### Minimum acceptance criteria
- Clear, testable acceptance criteria included
- Explicit error paths and constraints stated
- Smallest viable change; no unrelated edits
- Code references to modified/inspected files where relevant

## Architect Guidelines (for planning)

Instructions: As an expert architect, generate a detailed architectural plan for CISO 360 GRC System. Address each of the following thoroughly.

1. Scope and Dependencies:
   - In Scope: boundaries and key features.
   - Out of Scope: explicitly excluded items.
   - External Dependencies: systems/services/teams and ownership.

2. Key Decisions and Rationale:
   - Options Considered, Trade-offs, Rationale.
   - Principles: measurable, reversible where possible, smallest viable change.

3. Interfaces and API Contracts:
   - Public APIs: Inputs, Outputs, Errors.
   - Versioning Strategy.
   - Idempotency, Timeouts, Retries.
   - Error Taxonomy with status codes.

4. Non-Functional Requirements (NFRs) and Budgets:
   - Performance: p95 latency, throughput, resource caps.
   - Reliability: SLOs, error budgets, degradation strategy.
   - Security: AuthN/AuthZ, data handling, secrets, auditing.
   - Cost: unit economics.

5. Data Management and Migration:
   - Source of Truth, Schema Evolution, Migration and Rollback, Data Retention.

6. Operational Readiness:
   - Observability: logs, metrics, traces.
   - Alerting: thresholds and on-call owners.
   - Runbooks for common tasks.
   - Deployment and Rollback strategies.
   - Feature Flags and compatibility.

7. Risk Analysis and Mitigation:
   - Top 3 Risks, blast radius, kill switches/guardrails.

8. Evaluation and Validation:
   - Definition of Done (tests, scans).
   - Output Validation for format/requirements/safety.

9. Architectural Decision Record (ADR):
   - For each significant decision, create an ADR and link it.

### Architecture Decision Records (ADR) - Intelligent Suggestion

After design/architecture work, test for ADR significance:

- Impact: long-term consequences? (e.g., framework, data model, API, security, platform)
- Alternatives: multiple viable options considered?
- Scope: cross‑cutting and influences system design?

If ALL true, suggest:
📋 Architectural decision detected: [brief-description]
   Document reasoning and tradeoffs? Run `/sp.adr [decision-title]`

Wait for consent; never auto-create ADRs. Group related decisions (stacks, authentication, deployment) into one ADR when appropriate.

## Basic Project Structure

- `.specify/memory/constitution.md` — Project principles
- `specs/<feature>/spec.md` — Feature requirements
- `specs/<feature>/plan.md` — Architecture decisions
- `specs/<feature>/tasks.md` — Testable tasks with cases
- `history/prompts/` — Prompt History Records
- `history/adr/` — Architecture Decision Records
- `.specify/` — SpecKit Plus templates and scripts

## Code Standards
See `.specify/memory/constitution.md` for code quality, testing, performance, security, and architecture principles.

## Important Notes

### Environment Configuration
- **Database**: MySQL connection configured in `.env` (`DB_DATABASE=eagle_eye_may`)
- **App URL**: `http://grc.test/` (Laravel Herd local domain)
- **Mail**: Using Mailpit (local mail testing on port 1025)
- **LDAP**: Integration configured but using test server (`ldap.forumsys.com`)
- **Debug Mode**: Enabled in development (`APP_DEBUG=true`)

### Authentication & Authorization
- **Multi-Role System**: SuperAdmin, Admin, Manager, Operator, User roles
- **Middleware**: Role-based access control in `app/Http/Middleware/`
- **Guards**: Session-based for web, Sanctum tokens for API
- **No Registration**: User accounts managed internally (no public registration)

### Database Gotchas
- **Custom Primary Keys**: Many models don't use standard `id` field
- **No Timestamps**: Several models have timestamps disabled
- **Complex Relationships**: Many-to-many with custom pivot tables
- **Raw Queries**: Heavy use of `selectRaw()` and `whereRaw()` for performance
- **Table Naming**: Non-standard naming (e.g., `_table` suffix, `_vs_` for pivots)

### File Upload & Storage
- **Public Disk**: Configured as default filesystem
- **Storage Link**: Run `php artisan storage:link` to create public symlink
- **Upload Path**: `storage/app/public/` → accessible via `/storage/` URL

### Legacy Code
- **Unused Controllers**: 30+ deprecated controllers in `_Unused/` directories
- **Unused Models**: Legacy models archived but not removed
- **Code Cleanup**: Consider reviewing and removing unused code for maintainability

### Performance Considerations
- **Large Controllers**: Some controllers exceed 400-600 lines
- **N+1 Queries**: Use eager loading (`with()`, `load()`) to prevent
- **Pagination**: Configured at 20 items per page by default
- **Caching**: File-based cache driver (consider Redis for production)

### Security Notes
- **Mass Assignment**: Models use `$guarded = []` - be careful with request data
- **CSRF Protection**: Enabled by default for POST/PUT/DELETE requests
- **SQL Injection**: Use query builder/Eloquent to avoid SQL injection
- **File Uploads**: Validate file types and sizes in form requests
- **Secrets**: Never commit `.env` file (already in .gitignore)

## Getting Started Checklist
1. Clone repository and navigate to project directory
2. Copy `.env.example` to `.env` (if not exists)
3. Configure database credentials in `.env`
4. Run `composer install`
5. Run `npm install`
6. Run `php artisan key:generate`
7. Run `php artisan migrate --seed`
8. Run `php artisan storage:link`
9. Start dev server (Herd handles this automatically)
10. Run `npm run dev` for frontend development
11. Access application at `http://grc.test/`
