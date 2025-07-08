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
            @include('4-Process/1-InitialSetup/initialheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">

        @include('4-Process/1-InitialSetup/_partials/sidebar')
        <!-- SIDEBAR -->





        <!-- CONTENT -->
        <div class="IndiTable">

            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تسجيل صاحب</p>
                    <p class="PageHeadEngTxt">Owner Registration</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/owner-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    @if (request()->routeIs('ownerreg.edit'))
                        <a href="{{ route('ownerreg.create') }}" class="MoreButton">
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
                        class="{{ request()->routeIs('ownerreg.edit') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                    <form method="POST" action="{{ route('ownerreg.delete') }}" id="delete_form">
                        <input type="hidden" name="record" value="{{ $ownerreg?->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
            <form id="form" action="{{ isset($ownerreg) ? route('ownerreg.update', $ownerreg?->id) : route('ownerreg.store') }}"
                method="POST">
                @csrf
                @if (isset($ownerreg))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $ownerreg->id }}">
                @endif
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner ID</p>
                                    <p class="FieldHeadArbTxt">رمز صاحب</p>
                                </div>
                                <p><input type="text" name="owner_id" id="owner_id" class="sh-tx"
                                        placeholder="Enter ID" value="{{ old('owner_id', $ownerreg?->owner_id) }}"
                                        {{ $ownerreg?->owner_id ? 'readonly' : '' }} required>
                                    @error('owner_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Name</p>
                                    <p class="FieldHeadArbTxt">اسم صاحب</p>
                                </div>
                                <p><input type="text" name="owner_name" id="owner_name" class="sh-tx"
                                        placeholder="Enter Name"
                                        value="{{ old('owner_name', $ownerreg?->owner_name) }}" required>
                                    @error('owner_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Role Name</p>
                                    <p class="FieldHeadArbTxt">اسم دور الصاحب</p>
                                </div>
                                <p>
                                    <select name="owner_role_id" id="owner_role_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($ownerroles as $ownerrolesdata)
                                            <option value="{{ $ownerrolesdata->owner_role_id }}"
                                                {{ $ownerrolesdata->owner_role_id == old('owner_role_id', $ownerreg?->owner_role_id) ? 'selected' : '' }}>
                                                {{ $ownerrolesdata->owner_role_id }}
                                                {{ $ownerrolesdata->owner_role_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Department Name</p>
                                    <p class="FieldHeadArbTxt">اسم قسم صاحب</p>
                                </div>
                                <p>
                                    <select name="department_id" id="department_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($department as $departmentdata)
                                            <option value="{{ $departmentdata->department_id }}"
                                                {{ $departmentdata->department_id == old('department_id', $ownerreg?->department_id) ? 'selected' : '' }}>
                                                {{ $departmentdata->department_id }}
                                                {{ $departmentdata->department_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Details</p>
                                    <p class="FieldHeadArbTxt">تفاصيل المالك</p>
                                </div>
                                <p><input type="text" name="specification" id="specification" class="bg-tx"
                                        placeholder="Enter Specification"
                                        value="{{ old('specification', $ownerreg?->specification) }}">
                                    @error('specification')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Contact Number</p>
                                    <p class="FieldHeadArbTxt">رقم الجوال للصاحب</p>
                                </div>
                                <p><input type="text" name="owner_contact_numbner" id="owner_contact_numbner"
                                        class="sh-tx" placeholder="Enter Number" style="margin-top: 24px;"
                                        value="{{ old('owner_contact_numbner', $ownerreg?->owner_contact_numbner) }}">
                                    @error('owner_contact_numbner')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Owner Email Address</p>
                                    <p class="FieldHeadArbTxt">عنوان البريد الإلكتروني للصاحب</p>
                                </div>
                                <p><input type="text" name="owner_email_address" id="owner_email_address"
                                        class="sh-tx" placeholder="Enter Email Address"
                                        value="{{ old('owner_email_address', $ownerreg?->owner_email_address) }}">
                                    @error('owner_email_address')
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
        function goBack() {
            window.history.back();
        }
        function showDeleteModal() {
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        }
    </script>

</body>

</html>
