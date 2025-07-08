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

        @include('4-Process.1-InitialSetup._partials.sidebar')
        <!-- SIDEBAR -->

        <!-- CONTENT -->
        <div class="IndiTable">
            <form id="form"
                action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}"
                method="POST">
                @csrf
                @if (isset($department))
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $department->id }}">
                @endif
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">القسم الجهة</p>
                        <p class="PageHeadEngTxt">Organization Departments</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('departments.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>

                        @if (request()->routeIs('departments.edit'))
                            <a href="{{ route('departments.create') }}" class="MoreButton">
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
                        <button type="button" id="btnDelete"
                        class="{{ request()->routeIs('departments.edit') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>

                    </div>
                </div>
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <x-input label="Department ID" label_ar="رمز القسم" name="department_id"
                                    placeholder="Enter Department ID" :value="$department?->department_id" required />
                            </div>
                            <div class="column">
                                <x-input label="Department Name" label_ar="اسم القسم" name="department_name"
                                    placeholder="Enter Department Name" :value="$department?->department_name" required />


                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <x-input label="Department Description" label_ar="وصف القسم"
                                    name="department_description" placeholder="Enter Department Description"
                                    :value="$department?->department_description" class="bg-tx" />
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Location Name</p>
                                    <p class="FieldHeadArbTxt">اسم الموقع</p>
                                </div>
                                <p>
                                    <select name="location_id" id="location_id" class="sh-tx">
                                        <option value="">Select Option</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->location_id }}"
                                                {{ $location->location_id == old('location_id', $department?->location_id) ? 'selected' : '' }}>
                                                {{ $location->location_id }} {{ $location->location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                        </div>
                </table>
            </form>
            <form method="POST" action="{{ route('departments.destroy') }}" id="delete_form">
                <input type="hidden" name="record" value="{{ $department?->id }}">
                @csrf
                @method('DELETE')
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

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('delete_form'));
        });
    </script>
</body>

</html>
