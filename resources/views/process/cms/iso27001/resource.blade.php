@extends('layouts/user')
@section('title', 'Section')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $section?->id ? 'Update' : 'New' }} Resource">
            <x-action.button label="View" route_name="iso27001.index" />
        </x-table.action-wrapper>

        <form action="{{ route('iso27001.show', $section->id) }}">
            @csrf
            <input type="hidden" id="resourceable_id" value="{{ $section->id }}">
            <input type="hidden" id="resourceable_type" value="App\Models\ISO27001">
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Section ID" name="section_id" required="true"
                            :readonly="$section?->section_id" placeholder="Enter Section ID" :value="$section?->section_id" />
                    </div>
                    <div>
                        <x-form.field label="Section Name" name="title" required="true"
                            placeholder="Enter Section Name" :value="$section?->title" />
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
                    <x-form.label label="Upload Arabic English Glossary"
                        for="glossaryUploadEle" />
                    <input type="file" class="filepond" name="glossaryUploadEle" multiple credits="false"
                        id="glossaryUploadEle">
                </div>



                <div class="flex justify-end">
                    <x-form.submit label="Section" :isUpdate="$section?->id" />
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
                        url: '{{ route('iso27001.resource.store') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        ondata: (formData) => {
                            formData.append('resource_type', resourceType);
                            formData.append('resourceable_id', resourceId);
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
