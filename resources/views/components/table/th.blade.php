@props([
    'label' => '',
    'label_ar' => '',
    'class' => '',
])

<th {{ $attributes->merge(['class' => "px-3 py-3 whitespace-nowrap $class"]) }}>
    <span class="font-bold text-theme-xs text-white" style="white-space: nowrap;">
        @if ($label_ar)
            <span class="ibm-plex-sans-arabic-bold text-xs leading-tight" dir="rtl" lang="ar"
                style="display: inline;">{{ $label_ar }}</span>
            &nbsp;
        @endif
        <span class="block">{{ $label }}</span>
    </span>
</th>
