@props([
    'label' => '',
    'label_ar' => '',
    'name' => '',
    'required' => false,
    'placeholder' => '',
    'value' => '',
    'html' => 'false',
])

<x-form.label label="{{ $label }}" label_ar="{{ $label_ar }}" for="{{ $name }}" />
<x-form.textarea name="{{ $name }}" required="{{ $required }}" html="{{ $html }}"
    placeholder="{{ $placeholder }}" value="{{ $value }}" />
<x-form.error name="{{ $name }}" />
