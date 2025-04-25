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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 1em 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a,
        .pagination li span {
            display: block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #fff;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .pagination li a:hover {
            background-color: #2196F3;
            color: #fff;
        }

        .pagination li.active span {
            background-color: #2196F3;
            color: white;
            border-color: #2196F3;
        }

        .pagination li.disabled span {
            background-color: #e9ecef;
            color: #6c757d;
            pointer-events: none;
        }

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
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تحديد الضوابط</p>
                    <p class="EngTxt">Control Identification</p>
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
        @include('4-Process/8-Control/ControlSidebar')

    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تعريف الضوابط</p>
                <p class="PageHeadEngTxt">Control Definition</p>
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
            <form action="{{ route('controlmaster.index') }}" id="deleteForm">
                <div class="filter-row">

                    <div class="col">
                        <label class="form-label" for="control">
                            <p>Controls</p>
                            <p>الضوابط</p>
                        </label>
                        <select class="form-select" name="control" id="control" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($controlNames as $control)
                                <option value="{{ $control->control_id }}"
                                    {{ request('control') == $control->control_id ? 'selected' : null }}>
                                    {{ $control->control_id }} - {{ $control->control_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="bestPractice">
                            <p>Best Practices</p>
                            <p> أفضل الممارسات</p>
                        </label>
                        <select class="form-select" name="bestPractice" id="bestPractice" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($bestPractices as $bestPractice)
                                <option value="{{ $bestPractice->best_practices_id }}"
                                    {{ request('bestPractice') == $bestPractice->best_practices_id ? 'selected' : null }}>
                                    {{ $bestPractice->best_practices_id }} </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col">
                        <label class="form-label" for="risk">
                            <p>Risk</p>
                            <p> المخاطر</p>
                        </label>
                        <select class="form-select" name="risk" id="risk" onchange="this.form.submit()">
                            <option value="">All</option>
                            @foreach ($risks as $risk)
                                <option value="{{ $risk->risk_id }}"
                                    {{ request('risk') == $risk->risk_id ? 'selected' : null }}>
                                    {{ $risk->risk_id }} -
                                    {{ $risk->risk_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <form id="form" method="POST" action="{{ route('controlmaster.delete') }}">
            @csrf
            @method('DELETE')

            <div class="table-container">

                <div class="ListTable">
                    <table cellspacing="0">
                        <thead> <!-- Corrected the opening tag -->
                            <tr class="table-header">
                                <th style="padding-right: 0px;"></th>
                                <th style="padding-right: 0px">
                                    <p class="ListHeadArbTxt">رقم</p>
                                    <p class="ListHeadEngTxt">S.No</p>
                                </th>
                                <th style="padding-right: 0px; width: 200px;">
                                    <p class="ListHeadArbTxt">رمز الضوابط</p>
                                    <p class="ListHeadEngTxt">Control ID</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">اسم الضوابط</p>
                                    <p class="ListHeadEngTxt">Control Name</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">اسم مالك الضوابط</p>
                                    <p class="ListHeadEngTxt">Owner</p>
                                </th>
                                <th style="padding-right: 100px;">
                                    <p class="ListHeadArbTxt">المخاطر</p>
                                    <p class="ListHeadEngTxt">Risks</p>
                                </th>
                            </tr>
                        </thead> <!-- Moved it here -->
                        <tbody>
                            @foreach ($controls as $control)
                                <tr>
                                    <td>
                                        <input type="radio" name="record" class="record"
                                            value="{{ $control->$primaryKey }}" required>
                                    </td>
                                    <td>{{ ($controls->currentpage() - 1) * $controls->perpage() + $loop->index + 1 }}
                                    </td>
                                    {{-- <td>{{ $loop->index + 1 }}</td> --}}
                                    <td>
                                        <a href="/control-identification-table/{{ $control->control_id }}">
                                            {{ $control->control_id }}
                                        </a>
                                    </td>
                                    <td>{{ $control->control_name }}</td>
                                    <td>{{ $control->owner?->owner_name }}</td>
                                    <td>
                                        @foreach ($control->risks as $risk)
                                            <p>{{ $risk->risk_name }}</p>
                                        @endforeach
                                    </td>
                                    {{-- <td><a href="{{ route('controlmaster.edit', $control->control_id) }}"
                                            target="_blank">Edit</a></td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $controls->links() }}
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
                window.location.href = `/control-identification/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        function goBack() {
            window.history.back();
        }
        document.getElementById('btnDelete').addEventListener('click', function(event) {
    event.preventDefault();
    const selectedRadio = document.querySelector('.record:checked');

    if (selectedRadio) {
        window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
    } else {
        alert('Please select a record to delete.');
    }
});
    </script>
</body>

</html>
