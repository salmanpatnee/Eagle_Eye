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
            @include('4-Process/1-InitialSetup/roleheader')
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
                    <p class="PageHeadArbTxt">تسجيل الوصي</p>
                    <p class="PageHeadEngTxt">Custodian Registration</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/custodian-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    @if (request()->routeIs('custodian.edit'))
                        <a href="{{ route('custodian.create') }}" class="MoreButton">
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
                        class="{{ request()->routeIs('custodian.edit') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>
            <form method="POST" action="{{ route('custodian.delete') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $custodian?->id }}">
                @csrf
                @method('DELETE')
            </form>
    
            <form id="form" action="{{ isset($custodian) ? route('custodian.update', $custodian->id) : route('custodian.store') }}"
                method="POST">
                @csrf
                @if (isset($custodian))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $custodian->id }}">
                @endif
    
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian ID</p>
                                    <p class="FieldHeadArbTxt">رمز الوصي</p>
                                </div>
                                <p><input type="text" name="custodian_name_id" id="custodian_name_id" class="sh-tx"
                                        placeholder="Enter Custodian ID"
                                        value="{{ old('custodian_name_id', $custodian?->custodian_name_id) }}"
                                        {{ $custodian?->custodian_name_id ? 'readonly' : '' }} required>
                                    @error('custodian_name_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Name</p>
                                    <p class="FieldHeadArbTxt">اسم الوصي</p>
                                </div>
                                <p><input type="text" name="custodian_name_name" id="custodian_name_name" class="sh-tx"
                                        placeholder="Enter Custodian Name"
                                        value="{{ old('custodian_name_name', $custodian?->custodian_name_name) }}"
                                        required>
                                    @error('custodian_name_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Details</p>
                                    <p class="FieldHeadArbTxt">تفاصيل الوصي</p>
                                </div>
                                <p><input type="text" name="custodian_name_department" id="custodian_name_department"
                                        class="bg-tx" placeholder="Enter Custodian Description"
                                        value="{{ old('custodian_name_department', $custodian?->custodian_name_department) }}">
                                    @error('custodian_name_department')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Contact Number</p>
                                    <p class="FieldHeadArbTxt">رقم الجوال الوصي</p>
                                </div>
                                <p style="margin-top: 22px;"><input type="text" name="custodian_name_contact_number"
                                        id="custodian_name_contact_number" class="sh-tx"
                                        placeholder="Enter Custodian Contact Number"
                                        value="{{ old('custodian_name_contact_number', $custodian?->custodian_name_contact_number) }}">
                                    @error('custodian_name_contact_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Contact Email Address</p>
                                    <p class="FieldHeadArbTxt">عنوان البريد الإلكتروني للوصي</p>
                                </div>
                                <p><input type="text" name="custodian_name_email_address"
                                        id="custodian_name_email_address" class="sh-tx"
                                        placeholder="Enter Custodian Contact Email"
                                        value="{{ old('custodian_name_email_address', $custodian?->custodian_name_email_address) }}">
                                    @error('custodian_name_email_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Custodian Role Title</p>
                                    <p class="FieldHeadArbTxt">عنوان دور الوصي</p>
                                </div>
                                <p>
                                    <select name="custodian_role_id" id="custodian_role_id" class="sh-tx" required>
                                        <option value="">Select Option</option>
                                        @foreach ($custodianrole as $custodianroledata)
                                            <option value="{{ $custodianroledata->custodian_role_id }}"
                                                {{ $custodianroledata->custodian_role_id == old('custodian_role_id', $custodian?->custodian_role_id) ? 'selected' : '' }}>
                                                {{ $custodianroledata->custodian_role_id }}
                                                {{ $custodianroledata->custodian_role_title }}
                                            </option>
                                        @endforeach
                                    </select>
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
