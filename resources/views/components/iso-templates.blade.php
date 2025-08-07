@props(['link'])


<a href="{{ $link }}">
    <div
        class="flex flex-col items-center bg-white rounded-lg shadow hover:shadow-lg transition p-6 cursor-pointer group">
        <div class="gap-3 flex space-x-4 mb-2">
            <div
                class="bg-gray-100 flex h-12 items-center justify-center mx-auto rounded-xl w-12 group-hover:bg-brand-200 transition-colors duration-300">
                <svg class="fill-gray-800 " width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </div>


        </div>
        <p class="text-gray-700 font-medium">Implementation Templates</p>
    </div>
</a>
