<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <style>
        .upload-file-wrap {
            border: 1px solid #ccc;
            margin-block: 1em;
            border-radius: 10px;
            padding: 1em;
            background-color: #fafafa;
        }

        .upload-file-wrap label {
            /* text-align: center; */
            display: block;
            margin-bottom: 1em;
        }
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="headerleft">
            @include('4-Process/headerleft')
            <div class="headertext">
                <p>نظام إدارة المحتوى: العملية</p>
                <p>CMS: Process</p>
            </div>

        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">
        @include('4-Process/cms/process/sidebar')

        <!-- CONTENT -->
        <div class="IndiTable">
            <form id="form"
                action="{{ isset($process) ? route('process.update', $process->id) : route('process.store') }}"
                method="POST">
                @csrf
                {{-- @if (isset($process))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $process->id }}">
                    @endif --}}
                <input type="hidden" id="resourceable_id" value="{{ $process->id }}">
                <input type="hidden" id="resourceable_type" value="App\Models\Process">
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">موارد</p>
                        <p class="PageHeadEngTxt">Resources</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('process.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>

                        @if (request()->routeIs('process.edit'))
                            <a href="{{ route('process.index') }}" class="MoreButton">
                                <p class="ButtonArbTxt">يضيف</p>
                                <p class="ButtonEngTxt">Add</p>
                            </a>
                            <button type="submit" form="form" class="MoreButton">
                                <p class="ButtonArbTxt">تحديث</p>
                                <p class="ButtonEngTxt">Update</p>
                            </button>
                        @else
                            <a href="{{ route('process.index') }}" class="MoreButton">
                                <p class="ButtonArbTxt">يضيف</p>
                                <p class="ButtonEngTxt">Add</p>
                            </a>
                            <a href="" class="DisabledButton">
                                <p class="ButtonArbTxt">تحديث</p>
                                <p class="ButtonEngTxt">Update</p>
                            </a>
                        @endif



                        <button type="submit" form="delete_form"
                            class="{{ request()->routeIs('process.edit') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>
                <div class="formcanvas">
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Process ID</p>
                                <p class="FieldHeadArbTxt">رمز العملية</p>
                            </div>
                            <p>
                                <input type="text" name="process_id" id="process_id" class="sh-tx"
                                    value="{{ $process->process_id }}" placeholder="Enter Process ID" readonly>
                            </p>
                        </div>
                        <div class="sidefiled">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Process Name</p>
                                <p class="FieldHeadArbTxt">اسم العملية</p>
                            </div>
                            <p>
                                <input type="text" name="title" id="title" class="sh-tx"
                                    value="{{ $process->title }}" placeholder="Enter Process Name" readonly>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="formcanvas">
                    <div class="onefieldrow">
                        <div class="upload-file-wrap">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Upload Videos</p>
                                <p class="FieldHeadArbTxt">تحميل مقاطع الفيديو</p>
                            </div>
                            
                            <input type="file" class="filepond" name="videoUploadEle" multiple credits="false"
                                id="videoUploadEle" accept="video/*">
                        </div>
                    </div>

                    <div class="onefieldrow">
                        <div class="upload-file-wrap">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Upload Checklist</p>
                                <p class="FieldHeadArbTxt">تحميل قائمة التحقق</p>
                            </div>
                            
                            <input type="file" class="filepond" name="checklistUploadEle" multiple
                                credits="false" id="checklistUploadEle">
                        </div>
                    </div>

                    <div class="onefieldrow">
                        <div class="upload-file-wrap">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Upload Implementation Templates</p>
                                <p class="FieldHeadArbTxt">تحميل قوالب التنفيذ</p>
                            </div>
                            
                            <input type="file" class="filepond" name="templateUploadEle" multiple credits="false"
                                id="templateUploadEle">
                        </div>
                    </div>

                    <div class="onefieldrow">
                        <div class="upload-file-wrap">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Upload Arabic English Glossary</p>
                                <p class="FieldHeadArbTxt">تحميل قاموس المصطلحات العربية والإنجليزية</p>
                            </div>
                            
                            <input type="file" class="filepond" name="glossaryUploadEle" multiple credits="false"
                                id="glossaryUploadEle">
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('process.destroy') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $process?->id }}">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>




    <script src="{{ asset('Css/4-Process/1-Form/1-Form.js') }}" async></script>
    <script src="{{ asset('/Css/7-Sidebar/2-Sidebar.js') }}" async></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        const resourceId = document.getElementById('resourceable_id').value;
        const resourceableType = document.getElementById('resourceable_type').value;

        function initFilePondUploader(inputId, resourceType, acceptedFileTypes = null) {
            const options = {
                server: {
                    process: {
                        url: '{{ route('upload.resource') }}',
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
        initFilePondUploader('#checklistUploadEle', 'checklist', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
        initFilePondUploader('#templateUploadEle', 'template', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
        initFilePondUploader('#glossaryUploadEle', 'glossary', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);

        // const videoUploadEle = document.querySelector('input[id="videoUploadEle"]');
        // FilePond.create(videoUploadEle).setOptions({
        //     server: {
        //         process: {
        //             url: '{{ route('upload.resource') }}',
        //             method: 'POST',
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             },
        //             ondata: (formData) => {
        //                 formData.append('resource_type', 'guide');
        //                 formData.append('resourceable_id', 1); // dynamic ID
        //                 formData.append('resourceable_type', 'App\\Models\\Process'); // or User, etc.
        //                 return formData;
        //             }
        //         }
        //     }
        // });

        // const checklistUploadEle = document.querySelector('input[id="checklistUploadEle"]');
        // FilePond.create(checklistUploadEle).setOptions({
        //     server: {
        //         process: '/uploads',
        //         revert: '/tmp/delete',
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //         }
        //     },
        // });

        // const templateUploadEle = document.querySelector('input[id="templateUploadEle"]');
        // FilePond.create(templateUploadEle).setOptions({
        //     server: {
        //         process: '/uploads',
        //         revert: '/tmp/delete',
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //         }
        //     },
        // });

        // const glossaryUploadEle = document.querySelector('input[id="glossaryUploadEle"]');
        // FilePond.create(glossaryUploadEle).setOptions({
        //     server: {
        //         process: '/uploads',
        //         revert: '/tmp/delete',
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //         }
        //     },
        // });



        function goBack() {
            window.history.back();
        }
    </script>


</body>

</html>
