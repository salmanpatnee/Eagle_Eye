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
            <form method="POST" action="{{ route('ownerrole.delete') }}" id="deleteForm">
                @csrf
                @method('DELETE')
                <input type="hidden" name="record" id="deleteRecordId">
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">دور الصاحب</p>
                        <p class="PageHeadEngTxt">Owner Roles</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        <a href="{{ route('ownerrole.create') }}"
                            class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يضيف</p>
                            <p class="ButtonEngTxt">Add</p>
                        </a>

                        <a href="" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}" id="btnUpdate">
                            <p class="ButtonArbTxt">تحديث</p>
                            <p class="ButtonEngTxt">Update</p>
                        </a>

                        <button type="button" id="btnDelete"
                            class="{{ auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>
                @if (session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
                @endif
        
                <div class="table-container">

                    <div class="ListTable">
                        <table cellspacing="0">
                            <tr class="table-header">
                                <th style="padding-right: 0px;"></th>
                                <th style="padding-right: 0px">
                                    <p class="ListHeadArbTxt">رقم</p>
                                    <p class="ListHeadEngTxt">S.No</p>
                                  </th>
                                <th style="padding-right: 0px;">
                                    <p class="ListHeadArbTxt">رمز دور الصاحب</p>
                                    <p class="ListHeadEngTxt">Owner Role ID</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">اسم دور الصاحب</p>
                                    <p class="ListHeadEngTxt">Owner Role Name</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">وصف دور الصاحب</p>
                                    <p class="ListHeadEngTxt">Owner Role Description</p>
                                </th>
                            </tr>
                            @foreach ($OwnerRole as $data)
                                <tr>
                                    <td>
                                        <input type="radio" name="record" class="record" value="{{ $data->owner_role_id }}" required>
                                    </td>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td style="width: 170px;"><a href="/owner-role-table/{{ $data->owner_role_id }}">{{ $data->owner_role_id }}</a>
                                    </td>
                                    <td>{{ $data->owner_role_name }}</td>
                                    <td>{{$data->owner_role_description}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/owner-role/edit/${selectedRadio.value}`;
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
