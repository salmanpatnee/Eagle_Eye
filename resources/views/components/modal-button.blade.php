@props(['modal_id' => '', 'label' => '', 'name' => '', 'data' => ''])
<style>
    .arrow {
        margin-left: 10px;
        width: 16px;
        height: 16px;
        fill: black
    }

    button.modal-btn {
        display: flex;
        justify-content: space-between;
    }
</style>
<button type="button" class="sh-tx modal-btn" data-toggle="modal" data-target="#{{ $modal_id }}">
    {{ $label }}
    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="1">
        <path d="M6 9l6 6 6-6H6z" /> <!-- Hollow down arrow SVG -->
    </svg>
</button>

@if (is_array($data))
    <input type="hidden" name="{{ $name }}" id="{{ $name }}" value="{{ implode(',', $data) }}">
@else
    <input type="hidden" name="{{ $name }}" id="{{ $name }}" value="{{ $data}}">
@endif


<div id="{{ $name }}Text">
</div>

<x-error name="{{ $name }}" />
