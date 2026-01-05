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

<div class="relative z-20 bg-transparent">
    <select id="{{ $name }}" name="{{ $name }}" multiple @if ($required) required @endif
        {{ $attributes->merge([
            'class' =>
                'multiselect shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10  h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden',
        ]) }}>
        <option value="" class="text-gray-700">
            Select Option
        </option>
        @if (count($custom_data))
            @foreach ($custom_data as $row)
                <option value="{{ $row }}" class="text-gray-700"
                    @if (in_array(old($name, $row), $value)) selected @endif>
                    {{ $row }}
                </option>

                {{-- <option value="{{ $row->$id_key }}" class="text-gray-700" @if (old($name, $value) == $row->$id_key) selected @endif>
            {{ $row->$id_key }} {{ $row->$value_key }}</option> --}}
            @endforeach
        @else
            @foreach ($data as $row)
                @if ($show_key)
                    <option value="{{ $row->$id_key }}" class="text-gray-700"
                        @if (in_array($row->$id_key, old($name, $value))) selected @endif>
                        {{ $row->$id_key }}
                        - {{ $row->$value_key }}
                    </option>
                @else
                    <option value="{{ $row->$id_key }}" class="text-gray-700"
                        @if (in_array($row->$id_key, old($name, $value))) selected @endif>
                        {{ $row->$value_key }}
                    </option>
                @endif

                {{-- <option value="{{ $row->$id_key }}" class="text-gray-700" @if (old($name, $value) == $row->$id_key) selected @endif>
                {{ $row->$id_key }} {{ $row->$value_key }}</option> --}}
            @endforeach
        @endif

    </select>


    <span class="pointer-events-none absolute top-1/2 right-3 z-30 -translate-y-1/3 text-gray-500 dark:text-gray-400 flex items-center justify-center">
        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </span>
</div>

<x-form.error name="{{ $name }}" />
