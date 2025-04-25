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
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ route('control-assessments.index') }}">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تقييم الضوابط</h3>
                        <span class="text">Control Assessment Master</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/control-assessment-finding-list">
                    <i class='bx bxs-report'></i>
                    <div class="MenuTxt">
                        <h3>تقييم الضوابط</h3>
                        <span class="text">Control Assessment Findings</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <form action="/control-assessment-input/post" method="post">
        @csrf
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تقييم الضوابط</p>
                    <p class="PageHeadEngTxt">Control Assessment</p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{ route('control-assessments.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <button type="submit" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="" class="DisabledButton">
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
                            <div class="MenuTxt">
                                <h3>رمز تقييم الضوابط</h3>
                                <span class="text">Control Assessment ID</span>
                            </div>
                            <p><input type="text" name="ContAsstId" id="ContAsstId" class="sh-tx"
                                    placeholder="Enter ID"></p>
                        </div>
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>اسم تقييم الضوابط</h3>
                                <span class="text">Control Assessment Name</span>
                            </div>
                            <p><input type="text" name="ContAsstName" id="ContAsstName" class="sh-tx"
                                    placeholder="Enter Name"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>وصف تقييم الضوابط</h3>
                                <span class="text">Control Assessment Description</span>
                            </div>
                            <p><input type="text" name="ContAsstDes" id="ContAsstDes" class="bg-tx"
                                    placeholder="Write Description"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>تاريخ بدء تقييم الضوابط</h3>
                                <span class="text">Control Assessment Start Date</span>
                            </div>
                            <p><input type="date" name="ContAsstStartDate" id="ContAsstStartDate" class="sh-tx"></p>
                        </div>
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>تاريخ انتهاء تقييم الضوابط</h3>
                                <span class="text">Control Assessment End Date</span>
                            </div>
                            <p><input type="date" name="ContAsstEndDate" id="ContAsstEndDate" class="sh-tx"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>نوع تقييم الضوابط</h3>
                                <span class="text">Control Assessment Type</span>
                            </div>
                            <p><input type="text" name="ContAsstType" id="ContAsstType" class="bg-tx"
                                    placeholder="Write Control Assessment Type Name"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>تقييم الضوابط الداخلية أو الخارجية</h3>
                                <span class="text">Control Assessment Internal or External</span>
                            </div>
                            <select class="sh-tx" name="ContAsstIntExt" id="ContAsstIntExt">
                                <option value="Internal" selected>Internal</option>
                                <option value="External">External</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>نهج تقييم الضوابط</h3>
                                <span class="text">Control Assessment Approach</span>
                            </div>
                            <p><input type="text" name="ContAsstApp" id="ContAsstApp" class="bg-tx"
                                    placeholder="Write Control Assessment Approach"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>أهداف تقييم الضوابط</h3>
                                <span class="text">Control Assessment Objectives</span>
                            </div>
                            <p><input type="text" name="ContAsstObj" id="ContAsstObj" class="bg-tx"
                                    placeholder="Write Control Assessment Objectives"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>نطاق تقييم الضوابط</h3>
                                <span class="text">Control Assessment Scope</span>
                            </div>
                            <p><input type="text" name="ContAsstScope" id="ContAsstScope" class="bg-tx"
                                    placeholder="Write Control Assessment Scope"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>مراجع معايير</h3>
                                <span class="text">Standard References</span>
                            </div>
                            <p><input type="text" name="ContAsstStandRef" id="ContAsstStandRef" class="bg-tx"
                                    placeholder="Write Control Assessment Standard References"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>اسم أفضل الممارسات</h3>
                                <span class="text">Best Practice Name</span>
                            </div>
                            <p>
                                <select name="BestPractName" id="BestPractName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($bestPracts as $bestPract)
                                        <option value="{{ $bestPract->best_practices_name }}">
                                            {{ $bestPract->best_practices_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>اسم الموقع</h3>
                                <span class="text">Location Name</span>
                            </div>
                            <p>
                                <select name="LocName" id="LocName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($LocNames as $LocName)
                                        <option value="{{ $LocName->location_name }}">
                                            {{ $LocName->location_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>اسم مدقق</h3>
                                <span class="text">Auditor Name</span>
                            </div>
                            <p>
                                <select name="AuditorName" id="AuditorName" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($auditorNames as $auditorName)
                                        <option value="{{ $auditorName->auditor_first_name }}">
                                            {{ $auditorName->auditor_first_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>اسم التصنيف</h3>
                                <span class="text">Classification Name</span>
                            </div>
                            <p>
                                <select name="className" id="className" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($classNames as $className)
                                        <option value="{{ $className->classification_name }}">
                                            {{ $className->classification_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="MenuTxt">
                                <h3>ضوابط تقييم الجهة</h3>
                                <span class="text">Control Assessing Entity</span>
                            </div>
                            <p><input type="text" name="ContAsstEntity" id="ContAsstEntity" class="bg-tx"
                                    placeholder="Write Control Assessment Entity Name"></p>
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
</body
