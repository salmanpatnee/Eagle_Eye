# Reusable Blade Components Documentation

This document describes the reusable generic components available in the application.

## Page Header Component

A beautiful gradient header with icon, title, subtitle, and description.

### Usage

```blade
<x-page-header
    title="ISO 27001"
    subtitle="Information Security Management System (ISMS)">
    <x-slot:icon>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
            <!-- Your SVG icon path -->
        </svg>
    </x-slot:icon>
    Your description text goes here...
</x-page-header>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `''` | The main title text |
| `subtitle` | string | `''` | Subtitle text below the title |
| `icon` | string/slot | `null` | SVG icon markup (can be passed as prop or slot) |
| `showDecorative` | boolean | `true` | Show decorative background pattern |
| `showDescription` | boolean | `true` | Show description card below header |

### Examples

**Minimal usage:**
```blade
<x-page-header title="Dashboard" subtitle="Welcome back" />
```

**Without decorative background:**
```blade
<x-page-header
    title="Simple Page"
    subtitle="Clean header"
    :showDecorative="false" />
```

**Without description card:**
```blade
<x-page-header
    title="Quick View"
    :showDescription="false" />
```

---

## Grid Layout Component

A flexible grid layout component for displaying collections of items with customizable columns, animations, and card components.

### Usage

```blade
<x-grid-layout
    :items="$allSections"
    itemComponent="report-card"
    routeName="iso-27001.show"
    routeParam="section_id"
    titleField="title"
    titleArField=""
    headerTitle="Browse Sections"
    headerDescription="Select a section to explore detailed information and requirements"
    wrapperClass="iso-card-wrapper"
/>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `items` | array/collection | `[]` | Collection of items to display |
| `itemComponent` | string | `null` | Name of the component to render for each item |
| `routeName` | string | `null` | Named route for item links |
| `routeParam` | string | `'id'` | Property name to use for route parameter |
| `titleField` | string | `'title'` | Property name for item title |
| `titleArField` | string | `'title_ar'` | Property name for Arabic title |
| `headerTitle` | string | `''` | Grid section header title |
| `headerDescription` | string | `''` | Grid section header description |
| `showHeader` | boolean | `true` | Show/hide the header section |
| `columns` | string | `'grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3'` | Tailwind grid column classes |
| `gap` | string | `'gap-6'` | Tailwind gap classes |
| `animationDelay` | float | `0.04` | Delay between item animations (in seconds) |
| `showAnimation` | boolean | `true` | Enable/disable fade-in animations |
| `wrapperClass` | string | `'card-wrapper'` | CSS class for item wrapper |

### Examples

**Minimal usage:**
```blade
<x-grid-layout
    :items="$products"
    itemComponent="product-card" />
```

**Custom grid columns (2 columns on large screens):**
```blade
<x-grid-layout
    :items="$posts"
    itemComponent="post-card"
    columns="grid-cols-1 lg:grid-cols-2" />
```

**Without header:**
```blade
<x-grid-layout
    :items="$items"
    itemComponent="simple-card"
    :showHeader="false" />
```

**Without animations (faster rendering):**
```blade
<x-grid-layout
    :items="$largeDataset"
    itemComponent="data-card"
    :showAnimation="false" />
```

**Custom gap and wrapper class:**
```blade
<x-grid-layout
    :items="$gallery"
    itemComponent="image-card"
    gap="gap-8"
    wrapperClass="gallery-item" />
```

**With slot instead of component:**
```blade
<x-grid-layout :items="$users">
    @foreach($items as $user)
        <div class="custom-card">
            <h3>{{ $user->name }}</h3>
            <p>{{ $user->email }}</p>
        </div>
    @endforeach
</x-grid-layout>
```

---

## Complete Page Example

```blade
@extends('layouts.app')

@section('content')
    <div class="min-h-screen">
        <x-page-header
            title="My Products"
            subtitle="Browse our collection">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-white">
                    <path d="M..." />
                </svg>
            </x-slot:icon>
            Explore our comprehensive product catalog with detailed information and specifications.
        </x-page-header>

        <x-grid-layout
            :items="$products"
            itemComponent="product-card"
            routeName="products.show"
            routeParam="slug"
            titleField="name"
            headerTitle="Featured Products"
            headerDescription="Discover our most popular items"
        />
    </div>
@endsection
```

---

## Creating Custom Item Components

When using the grid-layout component, you'll need to create item components that accept the standard props:

```blade
{{-- resources/views/components/product-card.blade.php --}}
@props(['route_name', 'route_param', 'title', 'title_ar', 'item'])

<a href="{{ route($route_name, $route_param) }}" class="block h-full group">
    <div class="bg-white rounded-lg shadow hover:shadow-xl transition">
        <h3 class="text-xl font-bold">{{ $title }}</h3>
        @if($title_ar)
            <p class="text-gray-600" lang="ar">{{ $title_ar }}</p>
        @endif
        <!-- Access full item data -->
        <p>{{ $item->description }}</p>
    </div>
</a>
```

---

---

## Section Header Component

A compact header component for section pages with icon, title, and subtitle.

### Usage

```blade
<x-section-header :title="$section->title">
    <x-slot:icon>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
            <!-- Your SVG icon path -->
        </svg>
    </x-slot:icon>
</x-section-header>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `''` | The main title text |
| `subtitle` | string | `'Comprehensive guide and resources'` | Subtitle text below the title |
| `icon` | string/slot | `null` | SVG icon markup (can be passed as prop or slot) |
| `showAnimation` | boolean | `true` | Enable/disable fade-in animation |

### Examples

**Minimal usage:**
```blade
<x-section-header title="Product Details" />
```

**Without animation:**
```blade
<x-section-header
    title="Quick View"
    subtitle="Fast loading page"
    :showAnimation="false" />
```

---

## Resource Sidebar Component

A sidebar component for displaying resources with title and description.

### Usage

```blade
<x-resource-sidebar>
    <x-iso-templates link="{{ route('templates') }}" />
    <x-iso-checklist link="{{ route('checklist') }}" />
    <x-iso-video link="{{ route('videos') }}" />
</x-resource-sidebar>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `'Resources'` | Sidebar section title |
| `description` | string | `'Access helpful materials and tools'` | Sidebar description text |
| `showAnimation` | boolean | `true` | Enable/disable slide-in animation |

### Examples

**Custom title and description:**
```blade
<x-resource-sidebar
    title="Downloads"
    description="Get helpful documents and templates">
    <!-- Your resource links -->
</x-resource-sidebar>
```

**Without animation:**
```blade
<x-resource-sidebar :showAnimation="false">
    <!-- Your content -->
</x-resource-sidebar>
```

---

## Two Column Layout Component

A responsive two-column grid layout with customizable column sizes and animations.

### Usage

```blade
<x-two-column-layout>
    <x-slot:main>
        <div class="bg-white p-6 rounded-lg">
            Main content goes here
        </div>
    </x-slot:main>

    <x-slot:sidebar>
        <div class="bg-gray-100 p-4 rounded-lg">
            Sidebar content goes here
        </div>
    </x-slot:sidebar>
</x-two-column-layout>
```

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `mainColumnSize` | string | `'lg:col-span-3'` | Tailwind grid span classes for main column |
| `sidebarColumnSize` | string | `'lg:col-span-2'` | Tailwind grid span classes for sidebar |
| `gap` | string | `'gap-6 lg:gap-8'` | Tailwind gap classes |
| `showAnimation` | boolean | `true` | Enable/disable slide-in animations |

### Examples

**Equal columns (50/50 split):**
```blade
<x-two-column-layout
    mainColumnSize="lg:col-span-1"
    sidebarColumnSize="lg:col-span-1">
    <x-slot:main>Left content</x-slot:main>
    <x-slot:sidebar>Right content</x-slot:sidebar>
</x-two-column-layout>
```

**70/30 split with larger gap:**
```blade
<x-two-column-layout
    mainColumnSize="lg:col-span-7"
    sidebarColumnSize="lg:col-span-3"
    gap="gap-8 lg:gap-12">
    <x-slot:main>Wide content</x-slot:main>
    <x-slot:sidebar>Narrow sidebar</x-slot:sidebar>
</x-two-column-layout>
```

**Without animations:**
```blade
<x-two-column-layout :showAnimation="false">
    <x-slot:main>Content</x-slot:main>
    <x-slot:sidebar>Sidebar</x-slot:sidebar>
</x-two-column-layout>
```

---

## Complete Section Page Example

```blade
@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-section-header :title="$item->title">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                    <path d="M..." />
                </svg>
            </x-slot:icon>
        </x-section-header>

        <x-two-column-layout>
            <x-slot:main>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h2 class="text-2xl font-bold mb-4">{{ $item->title }}</h2>
                    <p>{{ $item->description }}</p>
                </div>
            </x-slot:main>

            <x-slot:sidebar>
                <x-resource-sidebar>
                    <a href="#" class="block p-4 bg-white rounded-lg shadow hover:shadow-lg">
                        Download Template
                    </a>
                    <a href="#" class="block p-4 bg-white rounded-lg shadow hover:shadow-lg">
                        View Checklist
                    </a>
                </x-resource-sidebar>
            </x-slot:sidebar>
        </x-two-column-layout>
    </div>
@endsection
```

---

## Notes

- All components are fully responsive and support dark mode
- Icons should use Heroicons or similar SVG icons
- Components follow the brand color scheme (brand-* colors)
- All animations use GPU-accelerated properties for smooth performance
- Components are accessible and semantic HTML compliant
- Animations can be disabled globally or per component using the `showAnimation` prop
