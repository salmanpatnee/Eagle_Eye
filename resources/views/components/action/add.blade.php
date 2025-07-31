@props([
    'route_name' => '',
    'param' => '',
])

<a href="{{ route($route_name, $param) }}" title="Add"
    class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-blue-400">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
    </svg>


</a>
