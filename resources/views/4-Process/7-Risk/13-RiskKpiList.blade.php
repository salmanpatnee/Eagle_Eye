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
                    <p class="ArbTxt">تحديد المخاطر</p>
                    <p class="EngTxt">Risk Identification</p>
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
        @include('4-Process/7-Risk/risksidebar')
    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">
        <form method="POST" action="{{ route('riskkpi.delete') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">مؤشرات الأداء الرئيسية</p>
                    <p class="PageHeadEngTxt">Key Performance Indicators</p>
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
                                <p class="ListHeadArbTxt">رمز مؤشر الأداء الرئيسية</p>
                                <p class="ListHeadEngTxt">KPI ID</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">اسم مؤشر الأداء الرئيسية
                                </p>
                                <p class="ListHeadEngTxt">KPI Name</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">قيمة مؤشر الأداء الرئيسية</p>
                                <p class="ListHeadEngTxt">KPI Value</p>
                            </th>
                        </tr>
                        @foreach ($columns as $data)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record" value="{{ $data->$primaryKey }}"
                                        required>
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a
                                        href="/kpi-table/{{ $data->key_performance_indicatory_id }}">{{ $data->key_performance_indicatory_id }}</a>
                                </td>
                                <td><a
                                        href="/kpi-table/{{ $data->key_performance_indicatory_id }}">{{ $data->key_performance_indicatory_name }}</a>
                                </td>
                                <td>{{ $data->key_performance_indicatory_value }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>
    </div>
    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>

    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
    event.preventDefault();
    const selectedRadio = document.querySelector('.record:checked');

    if (selectedRadio) {
        window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
    } else {
        alert('Please select a record to delete.');
    }
});
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/kpi/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
