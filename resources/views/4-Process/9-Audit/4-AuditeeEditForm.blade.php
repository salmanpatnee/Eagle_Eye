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
                    <p class="ArbTxt">تخطيط مراجعة والتسجيل</p>
                    <p class="EngTxt">Audit Planning and Registration</p>
                </div>
                @include('partials.roles')
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
        @include('4-Process/9-Audit/Sidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->

    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">معلومات التدقيق </p>
                <p class="PageHeadEngTxt">Auditee Information</p>
            </div>
            <div class="ButtonContainer">
                <a href="/auditee-list" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="{{ route($routeName . '.create') }}" class="MoreButton">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <button type="submit" form="form" class="MoreButton">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </button>
                <button type="button" onclick="showDeleteModal()"
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>


                <form method="POST" action="{{ route($routeName . '.delete') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $data?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form action="/auditee/{{ $auditee->id }}" method="post" id="form">
            @csrf
            @method('PATCH')
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee ID</p>
                                <p class="FieldHeadArbTxt">رمز مراجعة</p>
                            </div>
                            <p><input type="text" name="auditee_id" id="auditee_id" class="sh-tx"
                                    placeholder="Enter Auditee ID" value="{{ old('auditee_id', $auditee->auditee_id) }}"
                                    required readonly></p>
                            <x-error name="auditee_id" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee First Name</p>
                                <p class="FieldHeadArbTxt">مراجع الاسم الأول</p>
                            </div>
                            <p><input type="text" name="auditee_first_name" id="auditee_first_name" class="sh-tx"
                                    placeholder="Write Auditee First Name"
                                    value="{{ old('auditee_first_name', $auditee->auditee_first_name) }}" required></p>
                            <x-error name="auditee_first_name" />
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee Last Name</p>
                                <p class="FieldHeadArbTxt">مراجع الاسم الأخير</p>
                            </div>
                            <p><input type="text" name="auditee_last_name" id="auditee_last_name" class="sh-tx"
                                    placeholder="Write Auditee Last Name"
                                    value="{{ old('auditee_last_name', $auditee->auditee_last_name) }}"></p>
                            <x-error name="auditee_last_name" />
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditee Department</p>
                                <p class="FieldHeadArbTxt">مراجع القسم</p>
                            </div>
                            <p>
                                <select name="auditee_department" id="auditee_department" class="sh-tx" required>
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($DepartNames as $DepartName)
                                        <option value="{{ $DepartName->department_id }}"
                                            {{ old('auditee_department', $auditee->auditee_department) == $DepartName->department_id ? 'selected' : null }}>
                                            {{ $DepartName->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="auditee_department" />
                        </div>
                    </div>
                </div>
            </table>
    </div>
    </form>
    
@include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
