# API Contract: Download Template Endpoint

**Feature**: 001-template-download
**Date**: 2025-12-11
**Status**: Specification

## Endpoint Definition

### Route

```
GET /admin/mappings/{mapping_id}/download-template
```

**Route Name**: `mappings.downloadTemplate`

**HTTP Method**: GET

**Response Type**: Binary (Excel file stream)

## Request

### Path Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `mapping_id` | integer | Yes | Primary key of ImportMapping record |

### Query Parameters

None

### Headers

```
Accept: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
```

### Body

None (GET request)

### Authentication

```
Required: Yes
Method: Session-based (Laravel auth:web)
Roles: Must have permission to view import mappings (existing middleware)
```

## Response

### Success Response (200 OK)

```
HTTP/1.1 200 OK
Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
Content-Disposition: attachment; filename="mapping-name_template.xlsx"
Content-Length: [file-size-in-bytes]
Cache-Control: no-cache, no-store, must-revalidate
Pragma: no-cache
Expires: 0

[Binary Excel file content]
```

### Response Headers Detail

| Header | Value | Purpose |
|--------|-------|---------|
| Content-Type | `application/vnd.openxmlformats-officedocument.spreadsheetml.sheet` | Identifies file as Excel (.xlsx) |
| Content-Disposition | `attachment; filename="..."` | Triggers browser download dialog |
| Content-Length | `[bytes]` | File size for progress tracking |
| Cache-Control | `no-cache, no-store, must-revalidate` | Prevent caching of download |
| Pragma | `no-cache` | HTTP/1.0 cache prevention |
| Expires | `0` | Disable browser caching |

### File Content

**Format**: XLSX (Office Open XML Spreadsheet)

**Structure**:
```
Sheet 1: "Import Template"
  Row 1: [left_entity_label] | [right_entity_label]
  Row 2-∞: [empty cells ready for user data]
```

**Example**:
```
Sheet 1: "Import Template"
  A1: "Risk ID"      B1: "Control ID"
  A2: [empty]        B2: [empty]
  A3: [empty]        B3: [empty]
  ...
```

**Filename Pattern**:
- Format: `{slug}_template.xlsx`
- Slug: Lowercased mapping name with special chars replaced by hyphens
- Examples:
  - "Risk to Control" → `risk-to-control_template.xlsx`
  - "Asset vs. Vulnerability" → `asset-vs-vulnerability_template.xlsx`
  - "Process Control (Draft v2)" → `process-control-draft-v2_template.xlsx`

**File Size**:
- Typical: 5-50 KB
- Maximum: <100 KB (even for very long entity labels)
- No data rows = minimal file size

### Error Responses

#### 404 Not Found
```
HTTP/1.1 404 Not Found
Content-Type: application/json

{
  "message": "Not found"
}
```

**Causes**:
- `mapping_id` doesn't exist
- Mapping was deleted

#### 401 Unauthorized
```
HTTP/1.1 401 Unauthorized
Content-Type: application/json

{
  "message": "Unauthorized"
}
```

**Causes**:
- User not authenticated
- Session expired

#### 403 Forbidden
```
HTTP/1.1 403 Forbidden
Content-Type: application/json

{
  "message": "Forbidden"
}
```

**Causes**:
- User lacks permission to view mappings
- User role insufficient (not admin/manager)

#### 500 Internal Server Error
```
HTTP/1.1 500 Internal Server Error
Content-Type: application/json

{
  "message": "Server error"
}
```

**Causes**:
- Excel file generation failed
- Server resource exhaustion
- Unexpected exception in controller

## Request/Response Examples

### Example 1: Successful Download

**Request**:
```
GET /admin/mappings/5/download-template HTTP/1.1
Host: grc.test
Cookie: XSRF-TOKEN=...; laravel_session=...
```

**Response**:
```
HTTP/1.1 200 OK
Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
Content-Disposition: attachment; filename="risk-to-control_template.xlsx"
Content-Length: 8547
Cache-Control: no-cache, no-store, must-revalidate

[Binary XLSX content: 8547 bytes]
```

### Example 2: Not Found

**Request**:
```
GET /admin/mappings/999/download-template HTTP/1.1
Host: grc.test
Cookie: XSRF-TOKEN=...; laravel_session=...
```

**Response**:
```
HTTP/1.1 404 Not Found
Content-Type: application/json

{
  "message": "Not found"
}
```

### Example 3: Unauthorized

**Request** (no session cookie):
```
GET /admin/mappings/5/download-template HTTP/1.1
Host: grc.test
```

**Response**:
```
HTTP/1.1 401 Unauthorized
Content-Type: application/json

{
  "message": "Unauthorized"
}
```

## Behavioral Specifications

### Idempotency

**Status**: Idempotent

- Calling this endpoint multiple times produces identical files
- No side effects (no records created, no state changed)
- Safe to retry on failure

### Caching

**Status**: Not cacheable

- Each request generates fresh template
- Cache headers explicitly prevent caching
- Users always get current mapping configuration

### File Encoding

**Character Set**: UTF-8

- Supports international characters in entity labels
- Excel file format (XLSX) natively supports UTF-8
- No character conversion needed

### File Integrity

**Verification**: File is valid XLSX format
- Can be opened in Excel, Google Sheets, LibreOffice without errors
- Column widths auto-adjusted for visibility
- No corruption on download/transfer

## Implementation Notes

### Content-Type Header

The response MUST include the correct Excel content-type:
```
application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
```

Incorrect types (e.g., `application/octet-stream`) may cause browser issues on some systems.

### Filename Handling

The filename in Content-Disposition must be properly encoded:
```
Content-Disposition: attachment; filename="risk-to-control_template.xlsx"
```

For filenames with non-ASCII characters, use RFC 5987 encoding:
```
Content-Disposition: attachment; filename*=UTF-8''risk-to-control_template.xlsx
```

Maatwebsite/Excel handles this automatically.

### Browser Behavior

Expected behavior across browsers:
- **Chrome/Edge**: Shows "Save As" dialog, defaults to Downloads folder
- **Firefox**: Shows download manager with save option
- **Safari**: Might auto-open in Numbers or Excel if installed
- **Mobile browsers**: May open inline (depends on browser and OS)

The `attachment` disposition ensures download behavior across all platforms.

### Performance Targets

- **Generation**: <100ms (in-memory spreadsheet creation)
- **Transfer**: <500ms (typical 50KB file over broadband)
- **Total**: <2 seconds (requirement SC-004)

No caching or optimization needed for this response time.

## Testing Checklist

- [ ] Endpoint returns 200 OK with valid Excel file
- [ ] Content-Type header is correct
- [ ] Filename follows naming convention
- [ ] File opens in Excel without errors
- [ ] File opens in Google Sheets without errors
- [ ] File opens in LibreOffice without errors
- [ ] Headers match mapping entity labels
- [ ] File has no pre-filled data
- [ ] Unauthorized requests return 401
- [ ] Non-existent mappings return 404
- [ ] Multiple downloads produce identical files
- [ ] Special characters in labels are preserved
- [ ] Response time is <2 seconds
- [ ] File size is <100KB

## Related Endpoints

### GET /admin/mappings
- **Purpose**: List all import mappings (includes download button)
- **Response**: HTML page with mapping table
- **Relationship**: Download button links to this endpoint

### GET /admin/mappings/{id}/edit
- **Purpose**: Edit form for single mapping
- **Relationship**: Same mapping detail, different operation

### POST /admin/imports/upload
- **Purpose**: Upload filled-in template for import
- **Relationship**: User downloads template, populates, then uploads via this endpoint

## Version History

| Version | Date | Changes |
|---------|------|---------|
| 1.0 | 2025-12-11 | Initial specification |

## Approval Status

- [ ] Architecture Review
- [ ] Security Review
- [ ] Performance Review
- [ ] API Design Review
- [ ] Ready for Implementation
