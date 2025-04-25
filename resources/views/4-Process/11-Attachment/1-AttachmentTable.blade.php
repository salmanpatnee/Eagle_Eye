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
            @include('4-Process/11-Attachment/attachmentheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <section id="sidebar">
        <ul class="side-menu top">
            <li>
                <a href="/attachment-list">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>قائمة المرفقات</h3>
                        <span class="text">Attachment List</span>
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="/attachment-input">
                    <i class='bx bxs-label'></i>
                    <div class="MenuTxt">
                        <h3>أضف المرفقات</h3>
                        <span class="text">Add Attachments</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <h1>Attachments</h1>
            <div class="ButtonContainer">
                <a href="/attachment-input" class="MoreButton">Update Information</a>
                <a href="/attachment-input" class="DeleteButton">Delete Information</a>
            </div>
        </div>
        <table cellspacing="0">
            <form action="/location-input/post" method="post">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment ID</h4>
                            <p class="sh-tx">ATT-001</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Name</h4>
                            <p class="sh-tx">Audit Report 2022</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <h4>Attachment Description</h4>
                            <p class="bg-tx">Audit Report 2022 is a concise summary of the financial and compliance
                                status of an organization for the year 2022, highlighting key findings and
                                recommendations.</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Creation Date</h4>
                            <p class="sh-tx">22 January 2023</p>
                        </div>
                        <div class="column">
                            <h4>Attachment System</h4>
                            <p class="sh-tx">Compliance Software</p>
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Classification ID</h4>
                            <p><span class="sh-tx" id="ClassId">CLASS-003</span></p>
                        </div>
                        <div class="column">
                            <h4>Classification Name</h4>
                            <p class="sh-tx">Confidential</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Category ID</h4>
                            <p class="sh-tx">CAT-004</p>
                        </div>
                        <div class="multiselect">
                            <h4>Category Name</h4>
                            <p class="sh-tx">Compliance Audit Report</p>
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment Exclusively Related to Critical Assets?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Exclusively Related to Cloud?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment Exclusively Related to Telework?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Exclusively Related to Social Media?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment Exclusively Related to Data Privacy?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Exclusively Related to PII?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment Exclusively Related to PCI/DSS?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Exclusively Related to E-Commerce?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment Exclusively Related to Infrastructure?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Exclusively Related to Application?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment Exclusively Related to HR?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Exclusively Related to Physical Security?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Attachment Exclusively Related to Third Party?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                        <div class="column">
                            <h4>Attachment Exclusively Related to Operational Technology?</h4>
                            <p class="sh-tx">No</p>
                        </div>
                    </div>
                </div>
                <div class="ListTable">
                    <table cellspacing="0">
                        <tr>
                            <th style="padding-right: 0px;">#</th>
                            <th style="padding-right: 0px;">Attached Files</th>
                            <th style="padding-right: 0px;"></th>
                            <th style="padding-right: 0px;"></th>
                            <th style="padding-right: 0px;"></th>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>Financial Stats Zain KSA</td>
                            <td><a href="{{ asset('Images/Financial Stats Zain KSA.pdf') }}" target="_blank">View
                                    File</a></td>
                            <td><a href="{{ asset('Images/Financial Stats Zain KSA.pdf') }}" download>Download File</a>
                            </td>
                            <td><a href="#">Delete File</a></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Share Statistics Zain KSA</td>
                            <td><a href="{{ asset('Images/Share Statistics Zain KSA.pdf') }}" target="_blank">View
                                    File</a></td>
                            <td><a href="{{ asset('Images/Share Statistics Zain KSA.pdf') }}" download>Download
                                    File</a></td>
                            <td><a href="#">Delete File</a></td>
                        </tr>
                    </table>
                </div>
            </form>
        </table>
    </div>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body
