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
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <style>
        .filter-row .col {
            width: 33%;
        }
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance">
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
    <!-- CONTENT -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تحديد المخاطر</p>
                <p class="PageHeadEngTxt">Risk Identification</p>
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

                <a href="" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}"
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

        <div>
            <form action="{{ route('riskmaster.index') }}">
                <div class="filter-row">

                    <div class="col">
                        <label class="form-label" for="control">

                            <p>Risk</p>
                            <p> المخاطر</p>


                        </label>
                        <select class="form-select" name="risk" id="risk" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($riskNames as $risk)
                                <option value="{{ $risk->risk_id }}"
                                    {{ request('risk') == $risk->risk_id ? 'selected' : null }}>
                                    {{ $risk->risk_id }} - {{ $risk->risk_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="risk">
                            <p>Risk Group</p>
                            <p> مجموعة المخاطر</p>
                        </label>
                        <select class="form-select" name="group" id="group" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($riskGroups as $riskGroup)
                                <option value="{{ $riskGroup->risk_group_id }}"
                                    {{ request('group') == $riskGroup->risk_group_id ? 'selected' : null }}>
                                    {{ $riskGroup->risk_group_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="owner">
                            <p>Owner</p>
                            <p> صاحب الضوابط </p>
                        </label>
                        <select class="form-select" name="owner" id="owner" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->owner_role_id }}"
                                    {{ request('owner') == $owner->owner_role_id ? 'selected' : null }}>
                                    {{ $owner->owner_role_id }} -
                                    {{ $owner->owner_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </form>
        </div>

        <form method="POST" action="{{ route('riskmaster.delete') }}" id="deleteForm">
            @csrf
            @method('DELETE')
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
                                <p class="ListHeadArbTxt">رمز المخاطر</p>
                                <p class="ListHeadEngTxt">Risk ID</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">اسم المخاطر</p>
                                <p class="ListHeadEngTxt">Risk Name</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">اسم مجموعة المخاطر</p>
                                <p class="ListHeadEngTxt">Risk Group Name</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">اسم صاحب المخاطر</p>
                                <p class="ListHeadEngTxt">Owner </p>
                            </th>
                            {{-- <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">مؤشرات المخاطر الرئيسية</p>
                                <p class="ListHeadEngTxt">Key Risk Indicators </p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">مؤشر الأداء الرئيسي</p>
                                <p class="ListHeadEngTxt">Key Performance Indicator </p>
                            </th> --}}
                        </tr>
                        @foreach ($risks as $risk)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record"
                                        value="{{ $risk->$primaryKey }}" required>
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><a href="/risk-identification-table/{{ $risk->risk_id }}">{{ $risk->risk_id }}</a>
                                </td>
                                <td>{{ $risk->risk_name }}</td>
                                <td>{{ $risk->group->risk_group_name }}</td>
                                <td>{{ $risk->owner?->owner_name }}</td>
                                {{-- <td>
                                    @foreach ($risk->kris as $kri)
                                        <p>{{ $kri->key_risk_indicator_name }}</p>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($risk->kpis as $kpi)
                                        <p>{{ $kpi->key_performance_indicatory_name }}</p>
                                    @endforeach
                                </td> --}}
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
        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();

            const selectedRadio = document.querySelector('.record:checked');

            if (selectedRadio) {
                window.location.href = `/risk-identification/edit/${selectedRadio.value}`;
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
