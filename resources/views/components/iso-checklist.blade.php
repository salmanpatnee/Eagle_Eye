@props(['link'])


<a href="{{ $link }}">
    <div
        class="gap-3 flex flex-col items-center bg-white rounded-lg shadow hover:shadow-lg transition p-6 cursor-pointer group">
        <div
            class="bg-gray-100 flex h-12 items-center justify-center mx-auto rounded-xl w-12 group-hover:bg-brand-200 transition-colors duration-300">
            <svg class="fill-gray-800 group-hover:fill-brand-700 transition-colors duration-300" width="24"
                height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
        </div>
        <p class="text-gray-700 font-medium group-hover:text-brand-700 transition-colors duration-300">
            Checklist for ITSM Manager</p>
    </div>
</a>
