# Data Model: Nationalities

## Entity: Nationality

### Fields
- **id**: Integer, Primary Key, Auto-increment
- **name**: String, Required, Unique, Max 255 characters
- **created_at**: Timestamp
- **updated_at**: Timestamp
- **deleted_at**: Timestamp (for soft deletes)

### Relationships
- **One-to-Many**: Nationality has many HR Experts (via hr_expert_master_table.nationality_id)

### Validation Rules
- Name field must be required
- Name field must be unique
- Name field must not exceed 255 characters
- Name field must not be empty

### State Transitions
- Active (default) → Soft Deleted (when deleted via the UI)

## Entity: HR Expert (Modified)

### Modified Fields
- **nationality_id**: Integer, Foreign Key referencing Nationalities table
- **nationality**: String, Text column (maintained for backward compatibility)

### Relationships
- **Many-to-One**: HR Expert belongs to Nationality (via nationality_id)