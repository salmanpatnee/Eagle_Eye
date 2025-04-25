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
    <style>
        .wrapper {
            display: flex;
            gap: 30px;
        }

        #sidebar {
            position: initial;
        }

        .IndiTable {
            padding-top: 100px;
            margin-left: 0;
            padding-bottom: 50px;
            width: 80%;
        }

        .IndiTable .ButtonContainer {
            display: flex;
            gap: 10px;
            justify-content: start;
            /* padding-right: 20px; */
        }

        .DisabledButton,
        .MoreButton,
        .DeleteButton {
            margin-right: auto;
        }
    </style>
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
        @include('4-Process.1-InitialSetup._partials.sidebar')
        <!-- SIDEBAR -->



        <!-- CONTENT -->
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">إعداد الجهة</p>
                    <p class="PageHeadEngTxt">Organization Setup</p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{ route('organizations.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>

                    <a href="{{ route('organizations.create') }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('organizations.edit', $organization->id) }}"
                        class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <form method="POST" action="{{ route('organizations.destroy') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{$organization->id}}">
                        <button type="button" class="{{ auth()->user()->can('manage-initial-setup') ? 'DeleteButton' : 'DisabledButton' }}" id="btnDelete">
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
                                <p class="FieldHeadEngTxt">Organization ID</p>
                                <p class="FieldHeadArbTxt">رمز الجهة</p>
                            </div>
                            <p class="sh-tx">{{ $organization->organization_id }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Organization Name (English)</p>
                                <p class="FieldHeadArbTxt"></p>
                            </div>
                            <p class="sh-tx">{{ $organization->organization_name_english }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt"></p>
                                <p class="FieldHeadArbTxt">(بالعربي) الاسم الكامل للجهة</p>
                            </div>
                            <p class="sh-tx">{{ $organization->organization_name_arabic }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Organization Address</p>
                                <p class="FieldHeadArbTxt">عنوان الجهة</p>
                            </div>
                            <p class="bg-tx">{{ $organization->organization_address }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner Name</p>
                                <p class="FieldHeadArbTxt">اسم صاحب المبادرة</p>
                            </div>
                            <p class="sh-tx">{{ $organization->initiative_owner_name }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Owner Title</p>
                                <p class="FieldHeadArbTxt">تسمية صاحب المبادرة</p>
                            </div>
                            <p class="sh-tx">{{ $organization->initiative_owner_title }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Contact Number</p>
                                <p class="FieldHeadArbTxt">رقم الاتصال</p>
                            </div>
                            <p class="sh-tx">{{ $organization->initiative_owner_contact_number }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Email Address</p>
                                <p class="FieldHeadArbTxt">عنوان البريد الإلكتروني</p>
                            </div>
                            <p class="sh-tx">{{ $organization->initiative_owner_email }}</p>
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
