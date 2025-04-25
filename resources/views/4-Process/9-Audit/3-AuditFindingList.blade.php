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
                <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
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
        <ul class="side-menu top">
            <li>
                <a href="/audit-plan-list">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تخطيط مراجعة</h3>
                        <span class="text">Audit Planning</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/href="{{ route('audit-registrations.index') }}"">
                    <i class='bx bxs-report'></i>
                    <div class="MenuTxt">
                        <h3>إدارة مراجعة</h3>
                        <span class="text">Audit Master Information</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="/audit-finding-list">
                    <i class='bx bxs-report'></i>
                    <div class="MenuTxt">
                        <h3>إدارة مراجعة</h3>
                        <span class="text">Audit Fidnings</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/auditor-list">
                    <i class='bx bxs-doughnut-chart'></i>
                    <div class="MenuTxt">
                        <h3>المراجع</h3>
                        <span class="text">Auditors</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/auditee-list">
                    <i class='bx bxs-doughnut-chart'></i>
                    <div class="MenuTxt">
                        <h3>مراجعة التفاصيل</h3>
                        <span class="text">Auditee Details</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <div class="IndiTable">
        <form method="POST" action="{{ route('delete.auditfinding') }}">
            @csrf
            @method('DELETE')
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">إدارة مراجعة</p>
                    <p class="PageHeadEngTxt">Audit Management</p>
                </div>
                <div class="ButtonContainer">
                    <a href="" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="/audit-finding-input" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <button type="submit" class="DeleteButton">
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
                            <p class="ListHeadArbTxt">رمز العثور على</p>
                            <p class="ListHeadEngTxt">Finding ID</p>
                        </th>
                        <th style="padding-right: 0px;">
                            <p class="ListHeadArbTxt">اسم العثور على</p>
                            <p class="ListHeadEngTxt">Finding Name</p>
                        </th>
                        <th style="padding-right: 0px;">
                            <p class="ListHeadArbTxt">تاريخ الالتزام المتوقع</p>
                            <p class="ListHeadEngTxt">Compliance Due Date</p>
                        </th>
                    </tr>
                    @foreach ($columns as $data)
                        <tr>
                            <td><input type="checkbox" name="selecteddelete[]" value="{{ $data->audit_finding_id }}">
                            </td>
                            <td><a
                                    href="/audit-finding-table/{{ $data->audit_finding_id }}">{{ $data->audit_finding_id }}</a>
                            </td>

                            <td>{{ $data->audit_finding_name }}</td>
                            <td>{{ $data->correction_action_due_date }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </form>
    </div>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
