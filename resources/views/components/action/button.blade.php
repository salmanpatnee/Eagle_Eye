@props([
    'type' => 'button',
    'class' => '',
    'label' => '',
    'label_ar' => '',
    'route_name' => '',
])


@if ($route_name)
    <a href="{{ route($route_name) }}" {{ $attributes->merge(['class' => 'inline-block']) }}>
@endif
<button type="{{ $type }}"
    {{ $attributes->merge(['class' => "bg-brand-950 font-medium hover:bg-brand-600 inline-flex items-center rounded-lg shadow-theme-xs text-white transition px-3 py-1.5 text-xs md:px-7 md:py-3 md:text-sm $class"]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        width="20" height="20">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    <span class="inline mx-2">{{ $label }}</span>
    <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">{{ $label_ar }}</span>
</button>
@if ($route_name)
    </a>
@endif
