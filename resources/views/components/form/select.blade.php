@props([
    'label' => '',
    'label_ar' => '',
    'name' => '',
    'required' => false,
    'value' => '',
    'data' => [],
    'id_key' => '',
    'value_key' => '',
    'attributes' => [],
])

<x-form.label label="{{ $label }}" label_ar="{{ $label_ar }}" for="{{ $name }}" />

<div class="relative z-20 bg-transparent">
    <select id="{{ $name }}" name="{{ $name }}" @if ($required) required @endif
        {{ $attributes->merge([
            'class' =>
                'shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10  h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden',
        ]) }}>
        <option value="" class="text-gray-700">
            Select Option
        </option>
        @foreach ($data as $row)
            <option value="{{ $row->$id_key }}" class="text-gray-700" @if (old($name, $value) == $row->$id_key) selected @endif>
                {{ $row->$id_key }} {{ $row->$value_key }}
            </option>
        @endforeach
    </select>

    <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </span>
</div>

<x-form.error name="{{ $name }}" />
