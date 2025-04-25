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
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">الطرف الثالث</p>
                    <p class="EngTxt">Third Party</p>
                </div>
                <div class="text-center d-flex gap-3" style="margin-left: auto">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @include('4-Process/TptExperts/Sidebar')
    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt"> الطرف الثالث</p>
                <p class="PageHeadEngTxt">Third Party</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{ route('third-party.index') }}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="{{ route($routeName . '.create') }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="{{ route($routeName . '.edit', $data->$primaryKey) }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
                <form method="POST" action="{{ route($routeName . '.delete') }}" id="deleteForm">
                    <input type="hidden" name="record" value="{{ $data->tpt_id }}">
                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
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
                            <p class="FieldHeadEngTxt">Third Party ID</p>
                            <p class="FieldHeadArbTxt">رمز الطرف الثالث</p>
                        </div>
                        <p class="sh-tx">{{ $thirdParty->tpt_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Third Party Name</p>
                            <p class="FieldHeadArbTxt"> اسم الطرف الثالث</p>
                        </div>
                        <p class="sh-tx">{{ $thirdParty->tpt_name }}</p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Contact Person Name</p>
                            <p class="FieldHeadArbTxt">اسم جهة الاتصال </p>
                        </div>
                        <p class="sh-tx">{{ $thirdParty->tpt_contact_person_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Third Party Address</p>
                            <p class="FieldHeadArbTxt"> عنوان الطرف الثالث</p>
                        </div>
                        <p class="sh-tx">{{ $thirdParty->tpt_address }}</p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Country Origin</p>
                            <p class="FieldHeadArbTxt">بلد منشأ الطرف الثالث</p>
                        </div>
                        <p class="sh-tx">{{ $thirdParty->tpt_country_origin }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Established Date</p>
                            <p class="FieldHeadArbTxt"> تاريخ تأسيس الطرف الثالث</p>
                        </div>
                        <p class="sh-tx">{{ $thirdParty->tpt_established_date }}</p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Experties</p>
                            <p class="FieldHeadArbTxt">اسم فئة</p>
                        </div>
                        <ol class="resource-list" >
                            @foreach ($thirdParty->experties as $experty)
                                <li style="margin-left: 0">{{ $experty->tpt_experties_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>

            </div>
        </table>
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
