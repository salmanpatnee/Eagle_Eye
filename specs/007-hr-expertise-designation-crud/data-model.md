# Data Model: HR Expertise and Designation CRUD Interface

## Overview
This document defines the data models and database schema for the HR Expertise and Designation CRUD interface, following the same patterns as existing Industries and Nationalities modules.

## Existing Expertise Entity

### Database Table: `hr_expertise_table`
- **Primary Key**: `expertise_id` (integer, auto-increment)
- **Fields**:
  - `expertise_id` (integer, primary key)
  - `expertise_title` (string, required)
- **Constraints**:
  - `expertise_title` must be unique
- **Properties**:
  - No timestamps (timestamps = false)
  - All fields guarded (guarded = [])

### Model: `App\Models\Experties`
- **Table**: `hr_expertise_table`
- **Fillable**: All fields (guarded = [])
- **Timestamps**: Disabled (public $timestamps = false)
- **Relationships**: Many-to-many with HumanResource through pivot table

### Model: `App\Models\HrExperties`
- **Table**: `hr_expertise_table`
- **Fillable**: All fields (guarded = [])
- **Timestamps**: Disabled (public $timestamps = false)
- **Relationships**: Many-to-many with HumanResource through pivot table

## New Designation Entity

### Database Table: `hr_designation_table`
- **Primary Key**: `id` (integer, auto-increment)
- **Fields**:
  - `id` (integer, primary key, auto-increment)
  - `designation_id` (string, required, unique)
  - `designation_name` (string, required)
- **Constraints**:
  - `designation_id` must be unique
  - `designation_name` required
- **Properties**:
  - No timestamps (timestamps = false)
  - Soft deletes (use SoftDeletes trait)

### Model: `App\Models\Designation`
- **Table**: `hr_designation_table`
- **Fillable**: `['designation_id', 'designation_name']`
- **Timestamps**: Disabled (public $timestamps = false)
- **Soft Deletes**: Enabled (use SoftDeletes trait)
- **Relationships**: One-to-many with HumanResource (designation_id foreign key)

## Updated HR Expert Master Table

### Database Table: `hr_expert_master_table`
- **Additional Field**:
  - `designation_id` (integer, nullable, foreign key referencing hr_designation_table.id)
- **Backward Compatibility**:
  - Keep existing `designation` column (string) for backward compatibility
- **Relationships**:
  - Belongs to Designation via designation_id
  - Has many Expertise via pivot table

## Validation Rules

### Expertise Entity
- **Create**:
  - `expertise_title`: required, string, max:255, unique
- **Update**:
  - `expertise_title`: required, string, max:255, unique:except_current_record

### Designation Entity
- **Create**:
  - `designation_id`: required, string, max:255, unique
  - `designation_name`: required, string, max:255
- **Update**:
  - `designation_id`: required, string, max:255, unique:except_current_record
  - `designation_name`: required, string, max:255

## State Transitions

### Expertise Entity
- Active: Default state when created
- No soft delete for Expertise (following existing pattern)

### Designation Entity
- Active: Default state when created
- Soft Deleted: When marked for deletion (recoverable)

## Relationships

### Expertise to HumanResource
- Many-to-Many relationship through `hr_expert_master_vs_expertise_table` pivot table
- HumanResource can have multiple Expertise
- Expertise can be assigned to multiple HumanResource

### Designation to HumanResource
- One-to-Many relationship
- HumanResource belongs to one Designation
- Designation can be assigned to multiple HumanResource

## Migration Requirements

### 1. Create hr_designation_table
- Create new table with id, designation_id, designation_name fields
- Add unique constraint on designation_id
- No timestamps

### 2. Update hr_expert_master_table
- Add designation_id column (integer, nullable, foreign key)
- Keep existing designation column for backward compatibility
- Add foreign key constraint from designation_id to hr_designation_table.id