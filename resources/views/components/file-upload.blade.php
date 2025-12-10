<div class="file-upload-component">
    <div class="flex items-center justify-center w-full">
        <label for="{{ $id ?? 'file-input' }}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ $accept ?? 'CSV or XLSX files' }} (MAX. {{ $maxSize ?? '100MB' }})
                </p>
                <p id="file-name" class="mt-2 text-sm text-gray-700 dark:text-gray-300"></p>
            </div>
            <input
                id="{{ $id ?? 'file-input' }}"
                type="file"
                name="{{ $name ?? 'file' }}"
                class="hidden"
                accept="{{ $acceptTypes ?? '.csv,.xlsx,.xls' }}"
                {{ $attributes }}
            />
        </label>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('{{ $id ?? 'file-input' }}');
    const fileNameDisplay = document.getElementById('file-name');

    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const fileName = e.target.files[0].name;
                const fileSize = (e.target.files[0].size / 1024 / 1024).toFixed(2);
                fileNameDisplay.textContent = `Selected: ${fileName} (${fileSize} MB)`;
            } else {
                fileNameDisplay.textContent = '';
            }
        });
    }
});
</script>
