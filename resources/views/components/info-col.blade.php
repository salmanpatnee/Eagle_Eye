@props([
    'label' => '',
    'label_ar' => '',
])


<div class="border rounded-lg p-3 bg-white">
    <x-form.label :label="$label" :label_ar="$label_ar" />

    <div class="px-0 py-2.5 text-base font-medium text-gray-600  text-left">
        {{ $slot }}
    </div>
</div>
