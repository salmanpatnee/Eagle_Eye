@props([
    'rows' => '6',
    'name' => '',
    'value' => '',
    'required' => false,
    'class' => '',
    'placeholder' => '',
])

<textarea id="{{ $name }}" name="{{ $name }}" row="{{ $rows }}"
    @if ($required) required @endif placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => "bg-transparent border border-gray-300 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 placeholder:text-gray-400 px-4 py-2.5 rounded-lg shadow-theme-xs text-gray-800 text-sm w-full $class",
    ]) }}>{{ old($name, $value) }}</textarea>
