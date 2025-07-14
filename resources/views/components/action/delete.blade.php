@props([
    'route_name' => '',
    'param' => '',
])

<div x-data="{ open: false }" class="inline-block">
    <!-- Delete Button -->
    <button type="button" title="Delete" @click="open = true"
        class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-red-50 hover:text-red-600 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
    </button>

    <!-- Modal without overlay color -->
    <div x-show="open" x-cloak class="fixed inset-0 z-50 bg-black/[0.6]">
        <!-- Removed overlay color div here -->
        <div class="flex items-center justify-center min-h-screen">
            <div @click.away="open = false" class="relative bg-white rounded-lg shadow-lg p-6 w-full max-w-xs z-60">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Are you sure?</h2>
                <p class="text-sm text-gray-600 mb-4">Do you really want to delete this item? This action cannot be
                    undone.</p>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="open = false"
                        class="px-3 py-1.5 rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                        Cancel
                    </button>
                    <form method="POST" action="{{ $route_name ? route($route_name, $param) : '#' }}"
                        @submit="open = false">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1.5 rounded-md bg-red-600 text-white hover:bg-red-700 transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
