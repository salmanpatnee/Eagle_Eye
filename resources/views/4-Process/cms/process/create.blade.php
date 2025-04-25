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
                @if (isset($process))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $process->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">العملية</p>
                        <p class="PageHeadEngTxt">Process</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('process.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>

                        @if (request()->routeIs('process.edit'))
                            <a href="{{ route('process.create') }}" class="MoreButton">
                                <p class="ButtonArbTxt">يضيف</p>
                                <p class="ButtonEngTxt">Add</p>
                            </a>
                            <button type="submit" form="form" class="MoreButton">
                                <p class="ButtonArbTxt">تحديث</p>
                                <p class="ButtonEngTxt">Update</p>
                            </button>
                        @else
                            <button type="submit" form="form" class="MoreButton">
                                <p class="ButtonArbTxt">يضيف</p>
                                <p class="ButtonEngTxt">Add</p>
                            </button>
                            <a href="" class="DisabledButton">
                                <p class="ButtonArbTxt">تحديث</p>
                                <p class="ButtonEngTxt">Update</p>
                            </a>
                        @endif



                        <button type="button" onclick="showDeleteModal()"
                            class="{{ request()->routeIs('process.edit') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>
                <div class="formcanvas">
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Process ID" label_ar="رمز العملية" name="process_id"
                                placeholder="Enter Process ID" :value="$process?->process_id" required />
                        </div>
                        <div class="sidefiled">
                            <x-input label="Process Name" label_ar="اسم العملية" name="title"
                                placeholder="Enter Process Name" :value="$process?->title" required />

                        </div>
                    </div>
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Process Name Arabic" label_ar="اسم العملية عربي" name="title_ar"
                                placeholder="Enter Process Name" :value="$process?->title_ar" />


                        </div>

                    </div>
                    <div class="onefieldrow">

                        <x-input label="Process Description" label_ar="وصف العملية" name="description"
                            placeholder="Enter Process Description" :value="$process?->description" class="bg-tx" />


                    </div>


                    {{-- 
                    
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Process Area" label_ar="موقع المنطقة" name="process_area"
                                placeholder="Enter Process Area" :value="$process?->process_area" />

                        </div>
                        <div class="sidefiled">
                            <x-input label="Process Address" label_ar="موقع العنوان" name="process_address"
                                placeholder="Enter Process Address" :value="$process?->process_address" />


                        </div>
                    </div>
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Contact Person Name" label_ar="اسم جهة الاتصال بالعملية"
                                name="process_contact_name" placeholder="Enter Contact Person Name"
                                :value="$process?->process_contact_name" />


                        </div>
                        <div class="sidefiled">
                            <x-input label="Contact Person Number" label_ar="رقم الجوال"
                                name="process_contact_number" placeholder="Enter Contact Person Number"
                                :value="$process?->process_contact_number" type="tel" />


                        </div>
                    </div>
                    <div class="twofieldrow">
                        <div class="sidefiled">
                            <x-input label="Contact Person Email" label_ar="البريد الإلكتروني لجهة الاتصال"
                                name="process_contact_email" placeholder="Enter Contact Person Email"
                                :value="$process?->process_contact_email" type="email" />
                        </div>
                    </div> --}}
                </div>
            </form>
            <form method="POST" action="{{ route('process.destroy') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $process?->id }}">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
    @include('components.delete-confirmation-modal')



    <script src="{{ asset('Css/4-Process/1-Form/1-Form.js') }}" async></script>
    <script src="{{ asset('/Css/7-Sidebar/2-Sidebar.js') }}" async></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>


    <script>
        function goBack() {
            window.history.back();
        }
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
    </script>


</body>

</html>
