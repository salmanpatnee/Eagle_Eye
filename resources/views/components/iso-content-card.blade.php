@props(['title'])

<h3 class="font-bold mb-2 text-2xl">{{ $title }}</h3>
<div class="text-theme-xl leading-relaxed">
    {{ $slot }}
</div>