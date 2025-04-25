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
                    <p class="ArbTxt">إدارة الأدلة</p>
                    <p class="EngTxt">Evidence Management</p>
                </div>
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
        <ul class="side-menu top">
            <li class="active">
                <a href="/evidence-list">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تقرير الأدلة</h3>
                        <span class="text">Evidence Report</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/evidence-input">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تسجيل الأدلة</h3>
                        <span class="text">Record an Evidence</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/evidence-list">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تحرير الأدلة</h3>
                        <span class="text">Edit an Evidence</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->


    <!-- CONTENT -->
    <div class="IndiTable">
        <form method="POST" action="{{ route('delete.evidence') }}">
            @csrf
            @method('DELETE')
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تقرير الأدلة</p>
                    <p class="PageHeadEngTxt">Evidence Report</p>
                </div>
                <div class="ButtonContainer">
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="/evidence-input" class="MoreButton">
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
                            <p class="ListHeadArbTxt">رمز الأدلة</p>
                            <p class="ListHeadEngTxt">Evidence ID</p>
                        </th>
                        <th style="padding-right: 100px;">
                            <p class="ListHeadArbTxt">اسم الأدلة</p>
                            <p class="ListHeadEngTxt">Evidence Name</p>
                        </th>
                        <th></th>
                    </tr>
                    @foreach ($columns as $data)
                        <tr>
                            <td><input type="checkbox" name="selecteddelete[]" value="{{ $data->evidence_id }}">
                            </td>
                            <td><a href="/evidence-table/{{ $data->evidence_id }}">{{ $data->evidence_id }}</a>
                            </td>
                            <td>{{ $data->evidence_name }}</td>
                            <td><a href="{{ route('evidence.view', $data->evidence_id) }}">View</a></td>
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
