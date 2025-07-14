@props([
    'type' => 'text',
    'label' => '',
    'label_ar' => '',
    'name' => '',
    'required' => false,
    'readonly' => false,
    'placeholder' => '',
    'value' => '',
])

<x-form.label label="{{ $label }}" label_ar="{{ $label_ar }}" for="{{ $name }}" />
<x-form.input name="{{ $name }}" required="{{ $required }}" readonly="{{ $readonly }}"
    placeholder="{{ $placeholder }}" value="{{ $value }}" type="{{ $type }}" />
<x-form.error name="{{ $name }}" />
