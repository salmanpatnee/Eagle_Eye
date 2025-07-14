@props([
    'label' => '',
    'for' => '',
    'required' => false,
    'label_ar' => [],
])

<label @if ($for) for="{{ $for }}" @endif
    class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-1.5">
    <span class="font-bold sm:order-1 sm:text-right sm:w-auto text-left w-full">
        {{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </span>
    @if (!empty($label_ar))
        <span class="font-bold sm:ml-2 sm:order-2 sm:text-left sm:w-auto text-left text-sm w-full" dir="rtl"
            lang="ar" aria-label="{{ $label_ar }}">
            {{ $label_ar }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </span>
    @endif
</label>
