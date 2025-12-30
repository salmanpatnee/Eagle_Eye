# Research Findings: Nationalities CRUD

## Decision: Database Table Structure
**Rationale**: Following Laravel conventions and the pattern used in other tables in the system
**Details**: Create a nationalities table with id, name, and timestamp columns, with soft deletes

## Decision: Model Implementation
**Rationale**: Following the same pattern as the User model and other models in the application
**Details**: Create a Nationality model with fillable fields, relationships, and soft deletes

## Decision: Controller Implementation
**Rationale**: Following the same CRUD pattern as the UserController
**Details**: Create a NationalityController with index, create, store, show, edit, update, and destroy methods

## Decision: Views Implementation
**Rationale**: Following the same layout and components as the User views
**Details**: Create views for index, create/edit, and show using the same x-components as the User module, located in resources/views/process/hr/nationalities

## Decision: Routing Implementation
**Rationale**: Following the same pattern as other resource routes in the system
**Details**: Add resource routes for nationalities in web.php, with appropriate middleware

## Decision: Sidebar Menu Implementation
**Rationale**: Following the same pattern as other modules in the system
**Details**: Create a sidebar menu item for nationalities similar to the users and content management items

## Decision: Foreign Key Implementation
**Rationale**: Following the requirement to update hr_expert_master_table to use nationality_id while maintaining backward compatibility
**Details**: Modify the hr_expert_master_table to add a nationality_id foreign key while keeping the existing nationality column for backward compatibility

## Decision: Testing Approach
**Rationale**: Following the requirement to skip tests for this implementation
**Details**: No unit or integration tests will be written for this feature, focusing only on implementation following existing patterns

## Alternatives Considered

### Database Structure
- Option 1: Use Laravel's default naming and conventions (chosen)
- Option 2: Custom naming conventions (rejected - would be inconsistent with the rest of the application)

### View Components
- Option 1: Use existing x-components like the User module (chosen)
- Option 2: Create new custom components (rejected - would create inconsistency with the rest of the application)

### Routing
- Option 1: Use Laravel's resource routes like other modules (chosen)
- Option 2: Custom route patterns (rejected - would be inconsistent with the rest of the application)

### HR Expert Table Modification
- Option 1: Replace nationality column with nationality_id foreign key (rejected - would break backward compatibility)
- Option 2: Add nationality_id foreign key while keeping existing nationality column (chosen - maintains backward compatibility)

### Testing Approach
- Option 1: Implement comprehensive tests (rejected - as per requirements to skip tests)
- Option 2: Skip tests and focus on implementation (chosen - as per requirements)