@props([
    'class' => '',
    'label' => '',
    'label_ar' => '',
    'isUpdate' => '',
])

<button type="submit"
    {{ $attributes->merge(['class' => "bg-brand-950 font-medium hover:bg-brand-600 inline-flex items-center p-3 rounded-lg shadow-theme-xs text-sm text-white transition w-fit $class"]) }}>

    <span class="inline mx-2">{{ $isUpdate ? 'Update' : 'Add' }} {{ $label }}</span>
    <span class="inline text-xs font-semibold leading-tight " dir="rtl"
        lang="ar">{{ $isUpdate ? 'تحديث' : 'إضافة' }} {{ $label_ar }}</span>
</button>
