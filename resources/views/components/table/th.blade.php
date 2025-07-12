@props([
    'label' => '',
    'label_ar' => '',
    'class' => '',
])

<th {{ $attributes->merge(['class' => "px-3 py-3 whitespace-nowrap $class"]) }}>
    <span class="block font-bold text-theme-xs text-white">
        @if ($label_ar)
            <span class="ibm-plex-sans-arabic-bold block text-xs leading-tigh mb-1" dir="rtl"
                lang="ar">{{ $label_ar }}</span>
        @endif
        <span class="block">{{ $label }}</span>
    </span>
</th>
