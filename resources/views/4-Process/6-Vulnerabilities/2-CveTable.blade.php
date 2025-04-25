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
            @include('4-Process/6-Vulnerabilities/vaheader')
        </div>
        @include('4-Process/backbutton')
    </div>
    <section id="sidebar">
        <ul class="side-menu top">
            <li>
                <a href="/va-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3> سجل الضعف</h3>
                        <span class="text">Vulnerability Record</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="/cve-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>نقاط الضعف والتعرضات الشائعة</h3>
                        <span class="text">CVE</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/cvss-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>نظام تسجيل نقاط الضعف المشترك</h3>
                        <span class="text">CVSS</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/va-types-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>نوع الضعف</h3>
                        <span class="text">Vulnerability Types</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/va-sub-type-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>النوع الفرعي للضعف</h3>
                        <span class="text">Vulnerability Sub-Types</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">نقاط الضعف والتعرضات الشائعة</p>
                <p class="PageHeadEngTxt">Common Vulnerabilities and Exposures</p>
            </div>
            <div class="ButtonContainer">
                <a href="/cve-list" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="/cve-input" class="MoreButton">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="{{ route('cve.edit', $cve_id->cve_id) }}" class="MoreButton">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
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
                            <p class="FieldHeadEngTxt">CVE ID</p>
                            <p class="FieldHeadArbTxt">رمز نقاط الضعف والتعرضات الشائعة</p>
                        </div>
                        <p class="sh-tx">{{ $cve_id->cve_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">CVE Name</p>
                            <p class="FieldHeadArbTxt">اسم نقاط الضعف والتعرضات الشائعة</p>
                        </div>
                        <p class="sh-tx">{{ $cve_id->cve_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">CVE Number</p>
                            <p class="FieldHeadArbTxt">رقم نقاط الضعف والتعرضات الشائعة</p>
                        </div>
                        <p class="sh-tx">{{ $cve_id->cve_number }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">CVE Description</p>
                            <p class="FieldHeadArbTxt">وصف نقاط الضعف والتعرضات الشائعة</p>
                        </div>
                        <p class="bg-tx">{{ $cve_id->cve_description }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Remarks</p>
                            <p class="FieldHeadArbTxt">الملاحظات</p>
                        </div>
                        <p class="bg-tx">{{ $cve_id->cve_ramarks }}</p>
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
</body
