@props(['link'])


<a href="{{ $link }}">
    <div
        class="gap-3 flex flex-col items-center bg-white rounded-lg shadow hover:shadow-lg transition p-6 cursor-pointer group">
        <div
            class="bg-gray-100 flex h-12 items-center justify-center mx-auto rounded-xl w-12 group-hover:bg-brand-200 transition-colors duration-300">
            <svg class="fill-gray-800 " width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
        </div>

        <p class="text-gray-700 font-medium">Video Explanation</p>
    </div>
</a>
