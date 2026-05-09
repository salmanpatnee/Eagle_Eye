@props([
    'type' => 'button',
    'class' => '',
    'label' => '',
    'label_ar' => '',
    'route_name' => '',
    'route_param' => '',
])

@php
    $isWriteRoute = str_ends_with($route_name, '.create') || str_ends_with($route_name, '.edit');
    $canRender = !$isWriteRoute || (auth()->check() && auth()->user()->canWrite());
@endphp

@if($canRender)
@if ($route_name)
    <a href="{{ route($route_name, $route_param) }}" {{ $attributes->merge(['class' => 'inline-block']) }}>
@endif
<button type="{{ $type }}"
    {{ $attributes->merge(['class' => "dark:bg-white/15 dark:hover:bg-brand-950 bg-brand-950 font-medium hover:bg-brand-600 inline-flex items-center p-3 rounded-lg shadow-theme-xs text-sm text-white transition $class"]) }}>

    <span class="inline mx-2">{{ $label }}</span>
    <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">{{ $label_ar }}</span>
</button>
@if ($route_name)
    </a>
@endif
@endif
