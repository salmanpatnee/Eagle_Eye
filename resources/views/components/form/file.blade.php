@props([
    'name' => '',
    'required' => false,
    'class' => '',
    'placeholder' => '',
])

<input type="file" id="{{ $name }}" name="{{ $name }}" @if ($required) required @endif
    {{ $attributes->merge([
        'class' => "bg-transparent border border-gray-300 file:bg-gray-50 file:border-0 file:border-collapse file:border-gray-200 file:border-r file:border-solid file:cursor-pointer file:mr-5 file:pl-3.5 file:pr-3 file:py-3 file:rounded-l-lg file:text-gray-700 file:text-sm focus:border-ring-brand-300 focus:file:ring-brand-300 focus:outline-hidden h-11 hover:file:bg-gray-100 overflow-hidden placeholder:text-gray-400 rounded-lg shadow-theme-xs text-gray-500 text-sm transition-colors w-full $class",
    ]) }}>
