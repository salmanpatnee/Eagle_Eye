# Data Model: HR Experts

## Entities

### HumanResource
*   **Table**: `hr_expert_master_table`
*   **Attributes**:
    *   `expert_id` (PK, int)
    *   `name` (string)
    *   `email` (string, nullable)
    *   `phone` (string, nullable)
    *   `linkedin_profile` (string, nullable)
    *   `experience` (string/int, nullable)
    *   `organization_id` (FK -> `hr_organization_table.organization_id`)
    *   `industry_id` (FK -> `hr_industry_table.industry_id`)
    *   `nationality_id` (FK -> `nationalities.id`)
    *   `designation_id` (FK -> `hr_designation_table.id`)
    *   `nationality` (deprecated, string - ignore/sync)
    *   `designation` (deprecated, string - ignore/sync)
    *   `created_at`, `updated_at` (managed by Eloquent if enabled, model says `$timestamps = false` but user might want them. Will respect existing Model settings: `public $timestamps = false;`)

### Relationships
*   `industry` (BelongsTo `Industry`)
*   `organization` (BelongsTo `HROrganization`)
*   `nationality` (BelongsTo `Nationality`)
*   `designation` (BelongsTo `Designation`)
*   `certifications` (BelongsToMany `HRCertification` via `hr_expert_master_vs_certification_table`)
*   `experties` (BelongsToMany `Experties` via `hr_expert_master_vs_expertise_table`)
*   `roles` (BelongsToMany `HRRole` via `hr_expert_master_vs_roles_table` - Existing but not requested to be managed in this feature? "Model and database table already exist... Add sidebar link... Match coding style". Will include in View if easy, but focus on requested relations).

## Validation Rules
*   `name`: required, string, max:255
*   `organization_id`: required, exists:hr_organization_table,organization_id
*   `industry_id`: required, exists:hr_industry_table,industry_id
*   `nationality_id`: required, exists:nationalities,id
*   `designation_id`: required, exists:hr_designation_table,id
*   `linkedin_profile`: nullable, url
*   `experience`: nullable, numeric/string
*   `certifications`: array, nullable
*   `certifications.*`: exists:hr_certification_table,certification_id
*   `experties`: array, nullable
*   `experties.*`: exists:hr_expertise_table,expertise_id
