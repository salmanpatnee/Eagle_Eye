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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">

</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="headerleft">
            @include('4-Process/headerleft')
            @include('4-Process/6-Vulnerabilities/vaheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    ,<div class="wrapper">
        @include('4-Process/6-Vulnerabilities/VaSidebar')
        <!-- CONTENT -->
        <div class="IndiTable">

            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">نوع الضعف</p>
                    <p class="PageHeadEngTxt">Vulnerability Types</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/va-types-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    @if (request()->routeIs($routeName . '.edit'))
                        <a href="{{ route($routeName . '.create') }}" class="MoreButton">
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

                    <form method="POST" action="{{ route($routeName . '.delete') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{ $data?->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" id="btnDelete"
                            class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'DeleteButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </form>
                </div>
            </div>
            <form id="form" action="{{ isset($vatype) ? route('vatype.update', $vatype->id) : route('vatype.store') }}"
                method="POST">
                @csrf
                @if (isset($vatype))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $vatype->id }}">
                @endif

                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Type ID</p>
                                    <p class="FieldHeadArbTxt">رمز نوع الضعف</p>
                                </div>
                                <p><input type="text" name="va_type_id" id="va_type_id" class="sh-tx"
                                        placeholder="Enter VA Type ID"
                                        value="{{ old('va_type_id', $vatype?->va_type_id) }}"
                                        {{ $vatype?->va_type_id ? 'readonly' : '' }} required>
                                    @error('va_type_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Type Name</p>
                                    <p class="FieldHeadArbTxt">اسم نوع الضعف</p>
                                </div>
                                <p><input type="text" name="va_type_name" id="va_type_name" class="sh-tx"
                                        placeholder="Enter VA Type Name"
                                        value="{{ old('va_type_name', $vatype?->va_type_name) }}" required>
                                    @error('va_type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">VA Type Description</p>
                                    <p class="FieldHeadArbTxt">وصف نوع الضعف</p>
                                </div>
                                <p><input type="text" name="va_description" id="va_description" class="bg-tx"
                                        placeholder="Write VA Type Description"
                                        value="{{ old('va_description', $vatype?->va_description) }}">
                                    @error('va_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Remarks</p>
                                    <p class="FieldHeadArbTxt">ملاحظات</p>
                                </div>
                                <p><input type="text" name="va_remarks" id="va_remarks" class="bg-tx"
                                        placeholder="Write VA Type Remarks"
                                        value="{{ old('va_remarks', $vatype?->va_remarks) }}">
                                    @error('va_remarks')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                </table>
            </form>
        </div>
    </div>

    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
