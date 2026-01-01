# API Contract: HR Experts

## Routes

| Method | URI | Action | Name | Description |
|---|---|---|---|---|
| GET | `/hr-experts` | `index` | `hr-experts.index` | List all HR experts with filtering |
| GET | `/hr-experts/create` | `create` | `hr-experts.create` | Show form to create new expert |
| POST | `/hr-experts` | `store` | `hr-experts.store` | Store new expert in database |
| GET | `/hr-experts/{human_resource}` | `show` | `hr-experts.show` | Show details of specific expert |
| GET | `/hr-experts/{human_resource}/edit` | `edit` | `hr-experts.edit` | Show form to edit expert |
| PUT/PATCH | `/hr-experts/{human_resource}` | `update` | `hr-experts.update` | Update expert details |
| DELETE | `/hr-experts/{human_resource}` | `destroy` | `hr-experts.destroy` | Delete expert |

*Note: `human_resource` parameter binds to `HumanResource` model.*

## Controller Methods

### `index()`
*   **Input**: Query parameters (`nationality`, `industry`, `organization`, `certification`, `expertise`, `designation` filters).
*   **Output**: View `process.hr.experts.index` with `humanResource` (paginated collection) and filter options.

### `create()`
*   **Input**: None.
*   **Output**: View `process.hr.experts.create` with lists for `nationalities`, `industries`, `organizations`, `designations`, `certifications`, `experties`.

### `store(Request $request)`
*   **Input**: Form data matching data model.
*   **Logic**: Validate, Create `HumanResource`, Sync pivot tables (`certifications`, `experties`), Redirect to index.

### `show(HumanResource $humanResource)`
*   **Input**: Route param `humanResource`.
*   **Output**: View `process.hr.experts.show` with loaded relationships.

### `edit(HumanResource $humanResource)`
*   **Input**: Route param `humanResource`.
*   **Output**: View `process.hr.experts.create` (reused) with `$humanResource` data and selected IDs for pivots.

### `update(Request $request, HumanResource $humanResource)`
*   **Input**: Route param `humanResource`, Form data.
*   **Logic**: Validate, Update `HumanResource`, Sync pivot tables, Redirect to index.

### `destroy(HumanResource $humanResource)`
*   **Input**: Route param `humanResource`.
*   **Logic**: Detach pivot records (optional/handled by DB?), Delete record, Redirect to index.
