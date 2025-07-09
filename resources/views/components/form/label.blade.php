@props([
    'label' => '',
    'for' => '',
    'required' => false,
    'rtl' => [],
])

<div class="flex items-center justify-between">
    <label 
        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400" 
        for="{{ $for }}"
    >
        {{ $label }}@if(!empty($required) && $required !== 'false')<span class="text-error-500">*</span>@endif
    </label>
    @if(isset($rtl['label']))
        <label 
            for="{{ $for }}" 
            dir="rtl" 
            lang="ar"
            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400 text-right"
        >
            {{ $rtl['label'] }}
        </label>
    @endif
</div>
