@props([
    'label' => '',
    'for' => '',
    'required' => false,
    'label_ar' => [],
])

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-1.5">
    <span class="font-bold sm:order-1 sm:text-right sm:w-auto text-left w-full">
        {{ $label }}
    </span>
    @if (isset($label_ar))
        <span class="font-bold sm:ml-2 sm:order-2 sm:text-left sm:w-auto text-left text-sm w-full" dir="rtl"
            lang="ar" aria-label="{{ $label_ar }}">
            {{ $label_ar }}
        </span>
    @endif
</div>
