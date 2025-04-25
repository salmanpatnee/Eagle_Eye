@props([
    'label' => '',
    'label_ar' => '',
    'name' => '',
    'placeholder' => '',
    'value' => '',
    'type' => 'text' 
])

<div class="FieldHead">
    <p class="FieldHeadEngTxt">{{ $label }}</p>
    <p class="FieldHeadArbTxt">{{ $label_ar }}</p>
</div>
<p>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" {{$attributes->merge(['class' => 'sh-tx'])}} 
        value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $attributes }}>
</p>
<x-error :name="$name" />
