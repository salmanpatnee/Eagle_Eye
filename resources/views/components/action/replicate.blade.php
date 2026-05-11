@props(['route'])

@auth
    @if (auth()->user()->canWrite())
        <div x-data="{ open: false }" class="inline-block">
            <button type="button" @click="open = true"
                class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-indigo-50 hover:text-indigo-600 transition-colors dark:text-gray-200 dark:hover:bg-indigo-900/20 dark:hover:text-indigo-400"
                title="Replicate">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                </svg>
            </button>

            <div x-show="open" x-cloak class="fixed inset-0 z-50 bg-black/[0.6]">
                <div class="flex items-center justify-center min-h-screen p-4">
                    <div @click.away="open = false"
                        class="relative bg-white dark:bg-gray-900 rounded-lg shadow-lg p-6 w-full max-w-md z-60">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Replicate Assessment</h2>
                        <form action="{{ $route }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Assessment ID <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="control_assessment_id" required
                                    class="input-field" placeholder="e.g. CA-Q2-2025" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Assessment Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="control_assessment_name" required
                                    class="input-field" placeholder="Enter assessment name" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Description
                                </label>
                                <textarea name="control_assessment_description" rows="3"
                                    class="input-field" placeholder="Optional description"></textarea>
                            </div>
                            <div class="flex justify-end gap-3 pt-2">
                                <button type="button" @click="open = false"
                                    class="px-4 py-2 rounded-md border border-gray-300 text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700 transition">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 rounded-md bg-indigo-600 text-sm font-medium text-white hover:bg-indigo-700 transition">
                                    Replicate
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endauth
