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
                    <a href="/owners" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('owners.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('owners.edit', $owner->owner_id) }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <form method="POST" action="{{ route('owners.destroy') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{ $owner->id }}">
                        <button type="button"
                            class="{{ auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}"
                            id="btnDelete">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner ID</p>
                                <p class="FieldHeadArbTxt">رمز صاحب</p>
                            </div>
                            <p class="sh-tx">{{ $owner->owner_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner Name</p>
                                <p class="FieldHeadArbTxt">اسم صاحب</p>
                            </div>
                            <p class="sh-tx">{{ $owner->owner_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner Role Name</p>
                                <p class="FieldHeadArbTxt">اسم دور الصاحب</p>
                            </div>
                            <p class="sh-tx">{{ $owner->role?->owner_role_name }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner Department Name</p>
                                <p class="FieldHeadArbTxt">اسم قسم صاحب</p>
                            </div>
                            <p class="sh-tx">{{ $owner->department?->department_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner Details</p>
                                <p class="FieldHeadArbTxt">تفاصيل المالك</p>
                            </div>
                            <p class="bg-tx">{{ $owner->specification }}</p>
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
                            <p class="sh-tx" style="margin-top: 24px">{{ $owner->owner_contact_numbner }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner Email Address</p>
                                <p class="FieldHeadArbTxt">عنوان البريد الإلكتروني للصاحب</p>
                            </div>
                            <p class="sh-tx">{{ $owner->owner_email_address }}</p>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
    @include('components.delete-confirmation-modal')




    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });
    </script>
</body>

</html>
