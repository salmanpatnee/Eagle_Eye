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
            <form method="POST" action="{{ route('locations.destroy') }}" id="deleteForm">
                @csrf
                @method('DELETE')
                <input type="hidden" name="record" id="deleteRecordId">
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">إعداد الموقع</p>
                        <p class="PageHeadEngTxt">Location Setup</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="{{ route('locations.index') }}" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>

                        <a href="{{ route('locations.create') }}"
                            class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يضيف</p>
                            <p class="ButtonEngTxt">Add</p>
                        </a>

                        <a href="" class="{{ auth()->user()->can('manage-initial-setup') ? 'MoreButton' : 'DisabledButton' }}" id="btnUpdate">
                            <p class="ButtonArbTxt">تحديث</p>
                            <p class="ButtonEngTxt">Update</p>
                        </a>

                        <button type="button"
                            class="{{ auth()->user()->can('manage-initial-setup') ? 'DeleteButton' : 'DisabledButton' }}"
                            id="btnDelete">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>
                <div class="ListTable">
                    <table cellspacing="0">
                        <tr>
                            <th style="padding-right: 0px;"></th>
                            <th style="padding-right: 0px;">
                                <p class="ListHeadArbTxt">رقم</p>
                                <p class="ListHeadEngTxt">S.No</p>
                            </th>
                            <th style="padding-right: 0px;">
                                <p class="ListHeadArbTxt">رمز الموقع</p>
                                <p class="ListHeadEngTxt">Location ID</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">اسم الموقع</p>
                                <p class="ListHeadEngTxt">Location Name</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">العنوان</p>
                                <p class="ListHeadEngTxt">Address</p>
                            </th>
                        </tr>
                        @foreach ($locations as $location)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record" value="{{ $location->id }}"
                                        required>
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a
                                        href="{{ route('locations.show', $location->id) }}">{{ $location->location_id }}</a>
                                </td>
                                <td>{{ $location->location_name }}</td>
                                <td>{{ $location->location_address }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>
        </div>
    </div>

    @include('components.delete-confirmation-modal')

    <script src="/css/4-Process/1-Form/1-Form.js"></script>
    <script src="/css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/locations/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            
            const selectedRadio = document.querySelector('.record:checked');
            
            if (selectedRadio) {
                document.getElementById('deleteRecordId').value = selectedRadio.value;
                window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
            } else {
                alert('Please select a record.');
            }
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
