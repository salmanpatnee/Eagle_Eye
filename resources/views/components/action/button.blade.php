@props([
    'type' => 'button',
    'class' => '',
    'label' => '',
    'label_ar' => '',
])


<button type="{{ $type }}"
    {{ $attributes->merge(['class' => "bg-brand-950 font-medium hover:bg-brand-600 inline-flex items-center px-7 py-3 rounded-2xl shadow-theme-xs text-sm text-white transition $class"]) }}>
    <span class="inline mr-2">{{ $label }}</span>
    <span class="inline text-xs font-semibold leading-tight " dir="rtl" lang="ar">{{ $label_ar }}</span>
</button>
