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
            <li>
                <a href="/cve-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>نقاط الضعف والتعرضات الشائعة</h3>
                        <span class="text">CVE</span>
                    </div>
                </a>
            </li>
            <li class="active">
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
        <form action="{{ isset($cvss) ? route('cvss.update', $cvss->id) : route('cvss.store') }}" method="POST">
            @csrf
            @if (isset($cvss))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $cvss->id }}">
            @endif
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">نظام تسجيل نقاط الضعف المشترك</p>
                    <p class="PageHeadEngTxt">Common Vulnerability Scoring System</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/cvss-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <button type="submit" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="/cvss-input" class="DisabledButton">
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
                                <p class="FieldHeadEngTxt">CVSS ID</p>
                                <p class="FieldHeadArbTxt">رمز نقاط الضعف والتعرضات الشائعة</p>
                            </div>
                            <p><input type="text" name="cvss_id" id="cvss_id" class="sh-tx"
                                    placeholder="Enter CVSS ID" value="{{ old('cvss_id', $cvss?->cvss_id) }}"
                                    {{ $cvss?->cvss_id ? 'readonly' : '' }} required>
                                @error('cvss_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">CVSS Name</p>
                                <p class="FieldHeadArbTxt">اسم نقاط الضعف والتعرضات الشائعة</p>
                            </div>
                            <p><input type="text" name="cvss_name" id="cvss_name" class="sh-tx"
                                    placeholder="Enter CVSS Name" value="{{ old('cvss_name', $cvss?->cvss_name) }}"
                                    required>
                                @error('cvss_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">CVSS Number</p>
                                <p class="FieldHeadArbTxt">رقم نقاط الضعف والتعرضات الشائعة</p>
                            </div>
                            <p><input type="text" name="cvss_number" id="cvss_number" class="sh-tx"
                                    placeholder="Enter CVSS Number"
                                    value="{{ old('cvss_number', $cvss?->cvss_number) }}">
                                @error('cvss_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">CVSS Description</p>
                                <p class="FieldHeadArbTxt">وصف نقاط الضعف والتعرضات الشائعة</p>
                            </div>
                            <p><input type="text" name="cvss_description" id="cvss_description" class="bg-tx"
                                    placeholder="Write CVSS Description"
                                    value="{{ old('cvss_description', $cvss?->cvss_description) }}">
                                @error('cvss_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Remarks</p>
                                <p class="FieldHeadArbTxt">ملاحظات</p>
                            </div>
                            <p><input type="text" name="cvss_remarks" id="cvss_remarks" class="bg-tx"
                                    placeholder="Write CVSS Remarks"
                                    value="{{ old('cvss_remarks', $cvss?->cvss_remarks) }}">
                                @error('cvss_remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
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
