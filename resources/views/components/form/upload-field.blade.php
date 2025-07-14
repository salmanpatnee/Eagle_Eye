@props([
    'label' => '',
    'label_ar' => '',
    'name' => '',
    'required' => false,
    'placeholder' => '',
])

<x-form.label label="{{ $label }}" label_ar="{{ $label_ar }}" for="{{ $name }}" />
<x-form.file name="{{ $name }}" required="{{ $required }}" placeholder="{{ $placeholder }}" />
<x-form.error name="{{ $name }}" />
