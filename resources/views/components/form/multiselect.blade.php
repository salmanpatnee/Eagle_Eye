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

<div class="flex items-center justify-between mb-1.5">
    <label for="{{ $name }}" class="font-bold text-sm text-gray-700">
        {{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full text-[10px] font-semibold tracking-wide leading-none select-none"
          style="color: #00053C; background: rgba(0,5,60,0.06); border: 1px solid rgba(0,5,60,0.18);">
        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" aria-hidden="true">
            <rect x="0.5" y="0.5" width="2.8" height="2.8" rx="0.4" fill="currentColor"/>
            <rect x="4.7" y="0.5" width="2.8" height="2.8" rx="0.4" fill="currentColor" opacity="0.45"/>
            <rect x="0.5" y="4.7" width="2.8" height="2.8" rx="0.4" fill="currentColor" opacity="0.45"/>
            <rect x="4.7" y="4.7" width="2.8" height="2.8" rx="0.4" fill="currentColor" opacity="0.45"/>
        </svg>
        multi-select
    </span>
</div>

@if (!empty($label_ar))
    <div class="text-right -mt-1 mb-1.5" dir="rtl" lang="ar" aria-label="{{ $label_ar }}">
        <span class="font-bold text-sm text-gray-700">{{ $label_ar }}</span>
    </div>
@endif

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

<p class="mt-1.5 inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-medium leading-none"
   style="background: linear-gradient(135deg, rgba(0,5,60,0.07) 0%, rgba(59,130,246,0.08) 100%); border: 1px solid rgba(0,5,60,0.12); color: #1e3a8a;">
    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" aria-hidden="true" style="flex-shrink:0;">
        <circle cx="5.5" cy="5.5" r="5" stroke="#3b82f6" stroke-width="1"/>
        <circle cx="5.5" cy="3.2" r="0.7" fill="#3b82f6"/>
        <rect x="4.9" y="4.7" width="1.2" height="3.2" rx="0.5" fill="#3b82f6"/>
    </svg>
    You can select more than one option
</p>

<x-form.error name="{{ $name }}" />
