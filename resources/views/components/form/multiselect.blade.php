@props([
    'label' => '',
    'label_ar' => '',
    'name' => '',
    'required' => false,
    'value' => '',
    'data' => [],
    'custom_data' => [],
    'id_key' => '',
    'value_key' => '',
    'attributes' => [],
    'show_key' => false,
])

<x-form.label label="{{ $label }}" label_ar="{{ $label_ar }}" for="{{ $name }}" />

@php $fieldName = rtrim($name, '[]'); @endphp

<div class="relative z-20 bg-transparent">
    <select id="{{ $name }}" name="{{ $name }}" multiple @if ($required) required @endif
        {{ $attributes->merge([
            'class' =>
                'multiselect shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10  h-11 w-full appearance-none rounded-lg border border-gray-300 dark:border-gray-800 bg-transparent bg-none dark:bg-gray-900 px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden',
        ]) }}>
        <option value="" class="text-gray-700">
            Select Option
        </option>
        @if (count($custom_data))
            @foreach ($custom_data as $row)
                <option value="{{ $row }}" class="text-gray-700"
                    @if (in_array($row, old($fieldName, $value ?? []))) selected @endif>
                    {{ $row }}
                </option>
            @endforeach
        @else
            @foreach ($data as $row)
                @if ($show_key)
                    <option value="{{ $row->$id_key }}" class="text-gray-700"
                        @if (in_array($row->$id_key, old($fieldName, $value ?? []))) selected @endif>
                        {{ $row->$id_key }}
                        - {{ $row->$value_key }}
                    </option>
                @else
                    <option value="{{ $row->$id_key }}" class="text-gray-700"
                        @if (in_array($row->$id_key, old($fieldName, $value ?? []))) selected @endif>
                        {{ $row->$value_key }}
                    </option>
                @endif
            @endforeach
        @endif

    </select>
</div>

<x-form.error name="{{ $name }}" />
