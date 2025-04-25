<!DOCTYPE html5>
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
    <section>
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تقييم الضوابط</p>
                    <p class="EngTxt">Control Assessment</p>
                </div>
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <form method="POST" action="{{ route('delete.controlAss') }}">
            @csrf
            @method('DELETE')
            <div class="ButtonContainer">
                <a href="" class="DisabledButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="/control-assessment-finding-input" class="MoreButton">
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
            <div class="ContAssListTable">
                <table cellspacing="0">
                    <tr>
                        <th style="padding-right: 0px;"></th>
                        <th style="padding-right: 0px;">
                            <p class="ListHeadArbTxt">رمز تقييم الضوابط</p>
                            <p class="ListHeadEngTxt">Control Assessment ID</p>
                        </th>
                        <th style="padding-right: 100px;">
                            <p class="ListHeadArbTxt">اسم تقييم الضوابط</p>
                            <p class="ListHeadEngTxt">Control Assessment Name</p>
                        </th>
                        <th style="padding-right: 0px;">
                            <p class="ListHeadArbTxt">تاريخ بدء</p>
                            <p class="ListHeadEngTxt">Start Date</p>
                        </th>
                        <th style="padding-right: 0px;">
                            <p class="ListHeadArbTxt">تاريخ انتهاء</p>
                            <p class="ListHeadEngTxt">End Date</p>
                        </th>
                    </tr>
                    @foreach ($columns as $data)
                        <tr>
                            <td><input type="checkbox" name="selecteddelete[]"
                                    value="{{ $data->control_assessment_id }}">
                            </td>
                            <td><a
                                    href="/control-assessment-table/{{ $data->control_assessment_id }}">{{ $data->control_assessment_id }}</a>
                            </td>
                            <td>{{ $data->control_assessment_name }}</td>
                            <td>{{ $data->control_assessment_start_date }}</td>
                            <td>{{ $data->control_assessment_end_date }}</td>
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
</body
