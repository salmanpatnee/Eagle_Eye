# Generic Page Components Documentation

This document explains how to use the generic page components that can be reused across multiple pages.

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
    subtitle="Custom Subtitle">
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
@endsection
```

## Benefits

- **Reusable**: Components can be used across multiple pages with different content
- **Maintainable**: Changes to header or grid layout only need to be made in one place
- **Consistent**: Ensures consistent styling and layout across pages
- **Flexible**: Components accept content via props and slots for maximum customization