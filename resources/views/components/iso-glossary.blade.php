@props(['link'])


<a href="{{ $link }}">
    <div
        class="gap-3 flex flex-col items-center bg-white rounded-lg shadow hover:shadow-lg transition p-6 cursor-pointer group">
        <div
            class="bg-gray-100 flex h-12 items-center justify-center mx-auto rounded-xl w-12 group-hover:bg-brand-200 transition-colors duration-300">
            <svg class="fill-gray-800 " width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>


        </div>
        <p class="text-gray-700 font-medium">Arabic English Glossary</p>
    </div>
</a>
