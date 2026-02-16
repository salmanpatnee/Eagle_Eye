@extends('layouts.content')
@section('title', 'Article Category Resources')
@section('content')
    <div>
        <x-table.action-wrapper title="Manage Resources - {{ $articleCategory->name }}">
            <x-action.button label="View" route_name="article-categories.index" />
        </x-table.action-wrapper>

        <form action="{{ route('article-categories.store-resource') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="resourceable_id" name="article_category_id" value="{{ $articleCategory->id }}">
            <input type="hidden" id="resourceable_type" value="App\Models\ArticleCategory">
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Category Name" name="category_name" required="true"
                            :readonly="true" placeholder="Category Name" :value="$articleCategory->name" />
                    </div>
                </x-form.grid-col>

                <div>
                    <x-form.label label="Upload Videos" for="videoUploadEle" />
                    <input type="file" class="filepond" name="videoUploadEle" multiple credits="false"
                        id="videoUploadEle">
                </div>

                <div>
                    <x-form.label label="Upload Checklist" for="checklistUploadEle" />
                    <input type="file" class="filepond" name="checklistUploadEle" multiple credits="false"
                        id="checklistUploadEle">
                </div>

                <div>
                    <x-form.label label="Upload Implementation Templates"
                        for="templateUploadEle" />
                    <input type="file" class="filepond" name="templateUploadEle" multiple credits="false"
                        id="templateUploadEle">
                </div>

                <div>
                    <x-form.label label="Upload Glossary"
                        for="glossaryUploadEle" />
                    <input type="file" class="filepond" name="glossaryUploadEle" multiple credits="false"
                        id="glossaryUploadEle">
                </div>

                <div class="flex justify-end">
                    <x-form.submit label="Upload Resources" />
                </div>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        const resourceId = document.getElementById('resourceable_id').value;
        const resourceableType = document.getElementById('resourceable_type').value;

        function initFilePondUploader(inputId, resourceType, acceptedFileTypes = null) {
            const options = {
                server: {
                    process: {
                        url: '{{ route('article-categories.store-resource') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        ondata: (formData) => {
                            formData.append('resource_type', resourceType);
                            formData.append('article_category_id', resourceId);
                            formData.append('resourceable_type', resourceableType);
                            return formData;
                        }
                    }
                }
            };

            if (acceptedFileTypes) {
                options.acceptedFileTypes = acceptedFileTypes;
            }

            FilePond.create(document.querySelector(inputId), options);
        }

        initFilePondUploader('#videoUploadEle', 'guide', ['video/*']);

        initFilePondUploader('#checklistUploadEle', 'checklist', ['application/pdf', 'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ]);
        initFilePondUploader('#templateUploadEle', 'template', ['application/pdf', 'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ]);
        initFilePondUploader('#glossaryUploadEle', 'glossary', ['application/pdf', 'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ]);
    </script>
@endpush
