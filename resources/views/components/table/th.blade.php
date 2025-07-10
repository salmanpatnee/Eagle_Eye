@props([
    'label' => '',
    'label_ar' => '',
    'class' => '',
])

<th {{ $attributes->merge(['class' => "px-6 py-3 whitespace-nowrap $class"]) }}>
    <span class="block font-bold text-gray-500 text-theme-xs dark:text-gray-400">
        <span class="inline">{{ $label }}</span>
        @if ($label_ar)
            <span class="inline-block w-2"></span>
            <span class="ibm-plex-sans-arabic-bold inline text-xs  leading-tight" dir="rtl"
                lang="ar">{{ $label_ar }}</span>
        @endif
    </span>
</th>
