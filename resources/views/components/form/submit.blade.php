@props([
    'class' => '',
    'label' => '',
    'label_ar' => '',
    'isUpdate' => '',
    'type' => 'submit',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => "submit-btn $class"]) }}>

    <span class="inline mx-2">{{ $isUpdate ? 'Update' : 'Add' }} {{ $label }}</span>
    {{-- <span class="inline text-xs font-semibold leading-tight " dir="rtl"
        lang="ar">{{ $isUpdate ? 'تحديث' : 'إضافة' }} {{ $label_ar }}</span> --}}
</button>
