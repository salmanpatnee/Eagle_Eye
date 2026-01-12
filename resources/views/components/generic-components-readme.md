# Generic Page Components Documentation

This document explains how to use the generic page components that can be reused across multiple pages.

## Status Note
The ISO 27001 index page has been reverted to its original form for compatibility purposes. However, these generic components remain available for future use and are preserved in index-componentized.blade.php as an example.

## Components

### page-header (Generic Page Header)
A reusable header component with customizable content via props and slots.

#### Props
- `title` (optional): The main title text (default: 'Page Title')
- `subtitle` (optional): The subtitle text (default: 'Page Subtitle')
- `icon` (optional): SVG icon content (default: security icon)

#### Slot
- Content passed between opening and closing tags will be used as the description text

#### Usage
```blade
<x-page-header
    title="Custom Title"
    subtitle="Custom Subtitle"
    icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white"><path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" /></svg>'>
    This is the description content passed via slot
</x-page-header>
```

### grid-layout (Generic Grid)
A reusable grid component to display items with customizable content.

#### Props
- `items` (required): Array of items to display in the grid
- `itemComponent` (optional): Name of the component to use for each item (e.g., 'report-card')
- `routeName` (optional): Route name for links
- `routeParam` (optional): Parameter name for route
- `titleField` (optional): Field name for title
- `titleArField` (optional): Field name for Arabic title
- `headerTitle` (optional): Title for the grid header (default: 'Browse Items')
- `headerDescription` (optional): Description for the grid header (default: Standard description)

#### Slot
- Alternative content to display for each item if itemComponent is not specified

#### Usage
```blade
<x-grid-layout
    :items="$items"
    itemComponent="report-card"
    routeName="custom.route.name"
    routeParam="id"
    titleField="name"
    titleArField="name_ar"
    headerTitle="Custom Header"
    headerDescription="Custom Description"
/>
```

## Example Implementation

```blade
@extends('layouts.ciso-full')
@section('title', 'Page Title')
@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="Page Title"
            subtitle="Page Subtitle">
            This is the page description content passed via slot
        </x-page-header>

        <x-grid-layout
            :items="$items"
            itemComponent="report-card"
            routeName="custom.route"
            routeParam="id"
            titleField="name"
            titleArField=""
            headerTitle="Browse Items"
            headerDescription="Select an item to explore"
        />
    </div>
@endsection>
```

## Benefits

- **Reusable**: Components can be used across multiple pages with different content
- **Maintainable**: Changes to header or grid layout only need to be made in one place
- **Consistent**: Ensures consistent styling and layout across pages
- **Flexible**: Components accept content via props and slots for maximum customization