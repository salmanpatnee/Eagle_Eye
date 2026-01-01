# Research: HR Experts CRUD

## Technical Decisions

### 1. Controller Architecture
*   **Decision**: Refactor `App\Http\Controllers\HumanResourceController` from a single-action (`__invoke`) controller to a standard RESTful Resource Controller.
*   **Rationale**: 
    *   Matches the `HumanResource` model name and existing namespace.
    *   The existing controller is already serving the "HR Experts" / "People" view, so upgrading it to full CRUD is the logical evolution.
    *   Allows keeping the existing filtering logic within the `index` method while adding `create`, `store`, `edit`, `update`, `destroy`.

### 2. Route Definition
*   **Decision**: Use `Route::resource('hr-experts', HumanResourceController::class)` in `routes/web.php`.
*   **Rationale**: Standard Laravel pattern. Maps to `index`, `create`, `store`, `show`, `edit`, `update`, `destroy` actions.
*   **Impact**: Will replace the existing `Route::get('/hr-experts', ...)` which was named `hr-expert.index`. The new route name will be `hr-experts.index` (plural), consistent with `industries.index`.

### 3. View Structure
*   **Decision**: Create new views in `resources/views/process/hr/experts/` to match the `process.hr.industries` pattern.
    *   `index.blade.php`: List with filters and standard `<x-table.table>` components.
    *   `create.blade.php`: Form for Create/Edit using `<x-form.*>` components.
    *   `show.blade.php`: Detail view using `<x-info-*>` components (inferred from standard).
*   **Migration**: The existing `resources/views/ciso/people/index.blade.php` will be effectively replaced/migrated to the new location and refactored to use the project's standard table components (`<x-table.table>`, `<x-table.th>`, etc.) instead of raw HTML tables, ensuring visual consistency with "Industries".

### 4. Data Model & Relationships
*   **Model**: `App\Models\HumanResource` (Existing).
*   **Table**: `hr_expert_master_table`.
*   **Relationships**:
    *   `industry`: BelongsTo `Industry` (`industry_id`).
    *   `organization`: BelongsTo `HROrganization` (`organization_id`).
    *   `nationality`: BelongsTo `Nationality` (`nationality_id`).
    *   `designation`: BelongsTo `Designation` (`designation_id`).
    *   `certifications`: BelongsToMany `HRCertification` (Pivot: `hr_expert_master_vs_certification_table`).
    *   `experties`: BelongsToMany `Experties` (Pivot: `hr_expert_master_vs_expertise_table`).
*   **Schema Updates**:
    *   Use `nationality_id` (ignore `nationality` column).
    *   Use `designation_id` (ignore `designation` column).
    *   Use `industry_id` and `organization_id`.

### 5. Sidebar Integration
*   **Decision**: Create `resources/views/partials/sidebar-menus/hr-experts.blade.php`.
*   **Implementation**: Add `@include('partials.sidebar-menus.hr-experts')` to `resources/views/partials/sidebar.blade.php` inside the sidebar menu list (e.g., under "People" or alongside Industries/Nationalities).

### 6. Component Usage
*   **Multiselect**: Use `<x-form.multiselect>` for Certifications and Experties in the form.
    *   Pattern: Pass all options (`$certifications`) and selected IDs (`$certificationIds`) to the view.
    *   Controller: `sync()` relationships in `store`/`update`.

## Alternatives Considered
*   **New Controller**: Creating `HrExpertController`. Rejected to avoid confusion with the existing `HumanResourceController` which occupies the logical model namespace. Refactoring is cleaner.
*   **API-First**: Creating API routes and a JS frontend. Rejected as the project uses server-side Blade templates with Inertia/Livewire not explicitly requested for this (standard Blade/Components requested).

## Unknowns
*   None. Patterns and existing code are clear.
