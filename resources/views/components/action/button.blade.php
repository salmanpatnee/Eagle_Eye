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
    {{ $attributes->merge(['class' => "bg-brand-950 font-medium hover:bg-brand-600 inline-flex items-center p-3 rounded-lg shadow-theme-xs text-sm text-white transition $class"]) }}>

    <span class="inline mx-2">{{ $label }}</span>
    <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">{{ $label_ar }}</span>
</button>
@if ($route_name)
    </a>
@endif
