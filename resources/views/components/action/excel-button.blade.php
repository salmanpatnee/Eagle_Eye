@props([
    'type' => 'button',
    'class' => '',
    'label' => 'Download in Excel',
    'label_ar' => 'تنزيل بصيغة إكسل',
    'route_name' => '',
    'route_param' => '',
    'query_params' => '',
])


@if ($route_name)
    <a href="{{ route($route_name, $route_param) }}{{ $query_params }}"
        {{ $attributes->merge(['class' => 'inline-block']) }}>
@endif
<button type="{{ $type }}"
    {{ $attributes->merge(['class' => "bg-brand-950 font-medium hover:bg-brand-600 inline-flex items-center p-3 rounded-lg shadow-theme-xs text-sm text-white transition $class"]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
    </svg>



    <span class="inline mx-2">{{ $label }}</span>
    {{-- <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">{{ $label_ar }}</span> --}}
</button>
@if ($route_name)
    </a>
@endif
