@props([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'required' => false,
    'readonly' => false,
    'class' => '',
    'placeholder' => '',
])


<input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
    @if ($required) required @endif @if ($readonly) readonly @endif
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' => "h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10  $class",
    ]) }} />
