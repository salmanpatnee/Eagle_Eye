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
        @include('4-Process/9-Audit/Sidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <form action="/auditor-input/post" method="post">
        @csrf
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">معلومة المراجع</p>
                    <p class="PageHeadEngTxt">Auditor Information</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/auditor-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <button type="submit" class="{{ auth()->user()->can('manage-asset')  ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="/asset-group-input" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <button type="" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor ID</p>
                                <p class="FieldHeadArbTxt">رمز المراجع</p>
                            </div>
                            <p><input type="text" name="auditor_id" id="auditor_id" class="sh-tx"
                                    placeholder="Enter Auditor ID" required value="{{old('auditor_id')}}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor First Name</p>
                                <p class="FieldHeadArbTxt">مراجع الاسم الأول</p>
                            </div>
                            <p><input type="text" name="auditor_first_name" id="auditor_first_name" class="sh-tx"
                                    placeholder="Write Auditor First Name" required value="{{old('auditor_first_name')}}"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor Last Name</p>
                                <p class="FieldHeadArbTxt">مراجع الاسم الأخير</p>
                            </div>
                            <p><input type="text" name="auditor_last_name" id="auditor_last_name" class="sh-tx"
                                    placeholder="Write Auditor Last Name" value="{{old('auditor_last_name')}}"></p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor Organization</p>
                                <p class="FieldHeadArbTxt">مراجع الجهة</p>
                            </div>
                            <p><input type="text" name="auditor_organization" id="auditor_organization" class="bg-tx"
                                    placeholder="Write Auditor Organization Name" value="{{old('auditor_organization')}}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor Contact Number</p>
                                <p class="FieldHeadArbTxt">مراجع رقم الجوال</p>
                            </div>
                            <p><input type="tel" name="auditor_contact_number" id="auditor_contact_number" class="sh-tx"
                                    placeholder="Write Auditor Contact Number" value="{{old('auditor_contact_number')}}"></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Auditor Email Address</p>
                                <p class="FieldHeadArbTxt">مراجع عنوان البريد الإلكتروني</p>
                            </div>
                            <p><input type="email" name="auditor_contact_email" id="auditor_contact_email" class="sh-tx"
                                    placeholder="Write Auditor Email Address" value="{{old('auditor_contact_email')}}"></p>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </form>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
