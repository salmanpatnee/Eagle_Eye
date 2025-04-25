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
        @include('4-Process/backbutton')
    </div>
    <section id="sidebar">
        <ul class="side-menu top">
            <li>
                <a href="/organization/create">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>إعداد الجهة</h3>
                        <span class="text">Organization</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/location-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>الموقع</h3>
                        <span class="text">Location</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="/department-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>قسم</h3>
                        <span class="text">Department</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/sub-department-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>قسم فرعى</h3>
                        <span class="text">Sub-Department</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/classification-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>تصنيف</h3>
                        <span class="text">Classification</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/category-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>فئة</h3>
                        <span class="text">Category</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/sub-category-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>تصنيف فرعي</h3>
                        <span class="text">Sub-Category</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/best-practices-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>أفضل الممارسات</h3>
                        <span class="text">Best Practices</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/main-domain-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>قائمة المجالات</h3>
                        <span class="text">Domains List</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/sub-domain-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>قائمة النطاقات الفرعية</h3>
                        <span class="text">Sub-Domains List</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('users.create') }}">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>المستخدمين</h3>
                        <span class="text">Users</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <form action="{{ route('update.department', ['id' => $data->id]) }}" method="POST">
        {{-- <form method="POST" action="{{ route('update.department', $data->department_id) }}"> --}}
        @csrf
        @method('PUT')
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">المواقع الجهة</p>
                    <p class="PageHeadEngTxt">Organization Departments</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/department-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="/department-input" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <button type="submit" class="MoreButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </button>
                    <a href="" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </a>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Department ID</p>
                                <p class="FieldHeadArbTxt">رمز القسم</p>
                            </div>
                            <p><input type="text" name="department_id" id="department_id" class="sh-tx"
                                    value="{{ $data->department_id }}" readonly></p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Department Name</p>
                                <p class="FieldHeadArbTxt">اسم القسم</p>
                            </div>
                            <p><input type="text" name="department_name" id="department_name" class="sh-tx"
                                    value="{{ $data->department_name }}"></p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Department Description</p>
                                <p class="FieldHeadArbTxt">وصف القسم</p>
                            </div>
                            <p><input type="text" name="department_description" id="department_description"
                                    class="bg-tx" value="{{ $data->department_description }}"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Location ID</p>
                                <p class="FieldHeadArbTxt">رمز الموقع</p>
                            </div>
                            <p><input type="text" name="location_id" id="location_id" class="sh-tx"
                                    value="{{ $data->location_id }}"></p>
                        </div>
                    </div>
                </div>
        </div>
        </table>
        </div>
    </form>

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
</body
