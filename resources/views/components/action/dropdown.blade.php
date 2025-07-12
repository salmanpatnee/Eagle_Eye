<div class="flex items-center justify-center">
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="text-gray-500 dark:text-gray-400 focus:outline-none" type="button"
            :aria-expanded="open" aria-haspopup="true">
            <svg class="fill-current relative z-0" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                    fill=""></path>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95" @click.outside="open = false"
            class="absolute bg-white border border-gray-200 dark:bg-gray-dark dark:border-gray-800 mt-2 p-1 right-0 rounded-2xl shadow-theme-lg space-y-1 top-1/2 w-40 z-50"
            style="display: none;" x-cloak>
            <a href="{{ route('organizations.show', 1) }}">
                <button
                    class="flex items-center font-medium hover:bg-gray-100 hover:text-gray-700 px-3 py-2 rounded-lg text-gray-500 text-left text-xs w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mr-2 h-4 w-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    View
                </button>
            </a>
            <a href="{{ route('organizations.edit', 1) }}">
                <button
                    class="flex items-center font-medium hover:bg-gray-100 hover:text-gray-700 px-3 py-2 rounded-lg text-gray-500 text-left text-xs w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mr-2 h-4 w-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                    Edit
                </button>
            </a>
            <button
                class="flex items-center font-medium hover:bg-red-50 hover:text-red-600 px-3 py-2 rounded-lg text-gray-500 text-left text-xs w-full transition-colors">
                <svg class="mr-2 h-4 w-4 text-red-400" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="text-red-500">Delete</span>
            </button>
        </div>
    </div>
</div>
