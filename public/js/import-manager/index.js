document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('import-form');
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const loadingSpinner = document.getElementById('loading-spinner');
    const uploadProgress = document.getElementById('upload-progress');
    const progressMessage = document.getElementById('progress-message');

    if (form) {
        form.addEventListener('submit', function(e) {
            // Validate that a file is selected
            const fileInput = document.getElementById('import-file');
            if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
                e.preventDefault();
                alert('Please select a file to upload');
                return false;
            }

            // Validate that a mapping is selected
            const mappingSelect = document.getElementById('mapping_id');
            if (!mappingSelect || !mappingSelect.value) {
                e.preventDefault();
                alert('Please select an import mapping');
                return false;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitText.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');
            uploadProgress.classList.remove('hidden');
            progressMessage.textContent = 'Uploading file and starting import process...';
        });
    }

    // Handle form errors (if redirected back)
    const errors = document.querySelectorAll('.text-red-600');
    if (errors.length > 0) {
        submitBtn.disabled = false;
        submitText.classList.remove('hidden');
        loadingSpinner.classList.add('hidden');
        uploadProgress.classList.add('hidden');
    }
});
