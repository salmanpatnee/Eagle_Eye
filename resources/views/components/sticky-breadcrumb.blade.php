@props(['class' => ''])

<div
    x-data="{ scrolled: false }"
    x-init="scrolled = window.scrollY > 10"
    @scroll.window="scrolled = window.scrollY > 10"
    :class="{ 'shadow-sm': scrolled }"
    {{ $attributes->merge(['class' => 'sticky top-0 md:top-[88px] z-99995 p-4 bg-[#F9FAFB] transition-shadow duration-200 ' . $class]) }}
>
    @include('partials.breadcrumbs-ciso')
</div>
