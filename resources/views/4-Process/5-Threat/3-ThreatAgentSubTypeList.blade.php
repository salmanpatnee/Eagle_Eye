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
            @include('4-Process/5-Threat/threatheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>

    <div class="wrapper">
        @include('4-Process/5-Threat/threat-sidebar')
        <!-- CONTENT -->
        <div class="IndiTable">
            <form method="POST" action="{{ route('threatsubtype.delete') }}" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="TableHeading">
                    <div class="PageHead">
                        <p class="PageHeadArbTxt">النوع الفرعي الوكيل التهديد</p>
                        <p class="PageHeadEngTxt">Threat Agents Sub-Types</p>
                    </div>
                    <div class="ButtonContainer">
                        <a href="" class="MoreButton">
                            <p class="ButtonArbTxt">منظر</p>
                            <p class="ButtonEngTxt">View</p>
                        </a>
                        <a href="{{ route($routeName . '.create') }}"
                            class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يضيف</p>
                            <p class="ButtonEngTxt">Add</p>
                        </a>

                        <a href=""
                            class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}"
                            id="btnUpdate">
                            <p class="ButtonArbTxt">تحديث</p>
                            <p class="ButtonEngTxt">Update</p>
                        </a>

                        <button type="button" id="btnDelete"
                            class="{{ auth()->user()->can('delete-data') ? 'DeleteButton' : 'DisabledButton' }}">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </div>
                </div>

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
                                    <p class="ListHeadArbTxt">رمز نوع وكيل التهديد</p>
                                    <p class="ListHeadEngTxt">Threat Sub-Type ID</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">رمز نوع وكيل التهديد</p>
                                    <p class="ListHeadEngTxt">Threat Sub-Type Name</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">نوع وكيل التهديد</p>
                                    <p class="ListHeadEngTxt">Threat Agent Type</p>
                                </th>
                            </tr>
                            @foreach ($threatsubTypes as $threatsubType)
                                <tr>
                                    <td>
                                        <input type="radio" name="record" class="record"
                                            value="{{ $threatsubType->$primaryKey }}" required>
                                    </td>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><a
                                            href="/threat-agent-sub-type-table/{{ $threatsubType->threat_agent_sub_type_id }}">{{ $threatsubType->threat_agent_sub_type_id }}</a>
                                    </td>
                                    <td>{{ $threatsubType->threat_agent_sub_type_name }}</td>
                                    <td>{{ $threatsubType->type?->threat_agent_type_name }}</td>
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
                window.location.href = `/threat-agent-sub-type/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
            } else {
                alert('Please select a record to delete.');
            }
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
