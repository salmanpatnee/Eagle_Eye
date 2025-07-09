@props(['field'])

@error($field)
    <p class="text-error-500 text-xs mt-2">{{ $message }}</p>
@enderror
