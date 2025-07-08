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
                    <a href="{{ route('custodian.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('custodian.edit', $custodian->custodian_name_id) }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <form method="POST" action="{{ route('custodian.delete') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{ $custodian->id }}">
                        <button type="button" id="btnDelete"
                            class="{{ auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
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
                                <p class="FieldHeadEngTxt">Custodian ID</p>
                                <p class="FieldHeadArbTxt">رمز الوصي</p>
                            </div>
                            <p class="sh-tx">{{ $custodian->custodian_name_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Name</p>
                                <p class="FieldHeadArbTxt">اسم الوصي</p>
                            </div>
                            <p class="sh-tx">{{ $custodian->custodian_name_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Details</p>
                                <p class="FieldHeadArbTxt">تفاصيل الوصي</p>
                            </div>
                            <p class="bg-tx">{{ $custodian->custodian_name_department }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Contact Number</p>
                                <p class="FieldHeadArbTxt">رقم الجوال الوصي</p>
                            </div>
                            <p class="sh-tx">{{ $custodian->custodian_name_contact_number }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Contact Email Address</p>
                                <p class="FieldHeadArbTxt">عنوان البريد الإلكتروني للوصي</p>
                            </div>
                            <p class="sh-tx">{{ $custodian->custodian_name_email_address }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Role Title</p>
                                <p class="FieldHeadArbTxt">عنوان دور الوصي</p>
                            </div>
                            <p class="sh-tx">{{ $custodian->role?->custodian_role_title }}</p>
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
