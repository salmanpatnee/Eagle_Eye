---
name: update-table
description: "Use this skill when updating any Eagle Eye index table to use the x-table.scroll-table component. Triggers on: requests to update/migrate/convert a table, fix horizontal scroll issues, fix sticky header issues, or improve table UX on any index page."
---

# Update Table to x-table.scroll-table

Converts old `x-table.table` + `x-table.thead` + `x-table.tbody` to the reusable `x-table.scroll-table` component which fixes horizontal scroll, sticky headers, and column width control.

## Component Location

`resources/views/components/table/scroll-table.blade.php`

## Props

| Prop | Default | Purpose |
|------|---------|---------|
| `height-offset` | `280` | Subtracted from `100vh` to get container height. Larger = shorter table. |
| `min-width` | `900px` | Minimum table width. Forces horizontal scroll on narrow screens. |

## Usage Pattern

```blade
<x-table.scroll-table height-offset="280" min-width="900px">
    <x-slot:head>
        <x-table.th label="S.No" label_ar="..." />
        <x-table.th label="Name" label_ar="..." />
        {{-- more th --}}
    </x-slot:head>
    <x-slot:body>
        @forelse ($items as $item)
            <tr>
                <x-table.td>...</x-table.td>
                <x-table.td min-width="250px" max-width="500px">...</x-table.td>
            </tr>
        @empty
            <tr>
                <td colspan="N" class="px-3 py-6 text-center text-gray-500">No items found.</td>
            </tr>
        @endforelse
    </x-slot:body>
</x-table.scroll-table>
```

## Choosing height-offset

Count elements above the table. Each element adds to the offset:

| Element | Approx height |
|---------|--------------|
| Navbar (in layout) | ~64px |
| `x-table.action-wrapper` | ~50px |
| Filter form (1-row) | ~120px |
| Filter form (2-row) | ~200px |
| Summary/stat cards section | ~220px |
| Pagination below table | ~50px |

Add them up and round up ~20px for padding. Examples:
- Action wrapper only → `180`
- Action wrapper + 1-row filter + pagination → `280` (default)
- Action wrapper + 2-row filter + pagination → `350`
- Action wrapper + 1-row filter + summary cards + pagination → `450`

**Rule:** If vertical scroll is not appearing, increase offset (shorter container). If table is too short, decrease offset (taller container).

## Choosing min-width for the table

| Columns | Recommended |
|---------|-------------|
| 4–6 | `900px` (default) |
| 7–10 | `1100–1400px` |
| 11–15 | `1600–2000px` |
| 20+ | `2400–3000px` |

## x-table.td Props

`x-table.td` supports `min-width` and `max-width` props. Set these instead of wrapping content in inner `<div>` elements with inline styles.

```blade
{{-- Short identifier — no width needed, stays nowrap --}}
<x-table.td>{{ $item->item_id }}</x-table.td>

{{-- Name column — wraps, min enforces width --}}
<x-table.td min-width="300px" max-width="600px">{{ $item->name }}</x-table.td>

{{-- Short label column — floor width to prevent squeezing --}}
<x-table.td min-width="150px" max-width="200px">{{ $item->status }}</x-table.td>

{{-- HTML content (GROUP_CONCAT output) --}}
<x-table.td min-width="200px">{!! $item->html_list !!}</x-table.td>

{{-- Action column — unchanged --}}
<x-table.td action_col="true">
    <x-action.view ... />
    <x-action.edit ... />
    <x-action.delete ... />
</x-table.td>
```

**Width logic:**
- `min-width` + `max-width` set → `whitespace-normal` + `word-break: break-word` applied automatically
- `min-width` only → wraps, no cap
- Neither set, `wrap="false"` (default) → `whitespace-nowrap`
- Neither set, `wrap="true"` → `whitespace-normal max-w-[260px]` (legacy behavior preserved)

## Migration Steps

1. **Read the file** to understand columns, data, and layout context
2. **Count height offset** from elements above the table
3. **Estimate min-width** from column count
4. **Replace** the old wrapper:
   - `<div class="overflow-auto ..."><x-table.table>` → `<x-table.scroll-table ...>`
   - `<x-table.thead>...</x-table.thead>` → `<x-slot:head>...</x-slot:head>` (drop the `<tr>` wrapper if present)
   - `<x-table.tbody>...</x-table.tbody>` → `<x-slot:body>...</x-slot:body>`
5. **Remove inner `<div>`/`<span>` wrappers** on cells — move styles to `min-width`/`max-width` props on `x-table.td`
6. **Remove `<span class="whitespace-nowrap">` wrappers** — default td behavior is nowrap
7. **Keep** `wrap="true"`, `action_col="true"`, `class=`, `style=` (e.g. background-color) on `x-table.td` unchanged
8. **Keep** all `@forelse`/`@foreach`, `@empty` blocks unchanged
9. **Move pagination** outside the scroll-table (it should be a sibling, not inside)

## Common Mistakes

- Do NOT put pagination inside the scroll-table body slot
- Do NOT add `<tr>` inside `<x-slot:head>` — the component wraps it automatically
- Do NOT modify `x-table.table` or other existing components — scroll-table is additive
- If `@endforeach` was used without `@empty`, keep it (don't convert to `@forelse` unless adding empty state)
