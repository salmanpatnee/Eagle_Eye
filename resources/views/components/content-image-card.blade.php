@props(['item', 'route_name', 'route_param' => null, 'title', 'title_ar'])

@if ($item?->image)
    @if ($route_name)
        <a href="{{ route($route_name, html_entity_decode($route_param)) }}" class="group block h-full bg-white rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
    @else
        <a href="#" class="group block h-full bg-white rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500">
    @endif
        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $title }}" class="w-full h-auto object-contain rounded-xl" />
    </a>
@else
    <x-report-card :route_name="$route_name" :route_param="$route_param" :title="$title" :title_ar="$title_ar ?? null" />
@endif
