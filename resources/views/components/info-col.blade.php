@props([
    'label' => '',
    'label_ar' => '',
])


<div class="border border-gray-300 rounded-lg p-3 bg-white dark:border-gray-800 dark:bg-gray-900 dark:text-white">
    <x-form.label :label="$label" :label_ar="$label_ar" />

    <div class="px-0 py-2.5 text-base font-medium text-gray-600 dark:text-gray-300 text-left">
        {{ $slot }}
    </div>
</div>
