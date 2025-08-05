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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <style>
        .filter-row {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0 4em 0 0;
            margin-top: 3em;
        }

        .filter-row .col {
            width: 20%;
            padding: 0 .5em;
        }

        label {
            display: inline-block;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.5;
            color: #000;
        }

        .form-label {
            margin-bottom: .5rem;
            display: flex;
            justify-content: space-between
        }

        .form-select {
            display: block;
            width: 100%;
            padding: .375rem 2.25rem .375rem .75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 16px 12px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin-bottom: 1em;
        }

        .alert.alert-error {
            background-color: tomato;
            color: #fff;
            padding: 1em;
            max-width: 300px;
            margin: auto;
            border-radius: 10px;
            text-align: center;
        }

        .tablearea {
            margin-top: 50px;
        }

        .tablebody tr td {
            line-height: 0px;
            padding-top: 20px;
            padding-bottom: 10px;
        }

        .attachment {
            cursor: pointer;
            color: rgb(0, 134, 251);
        }
    </style>
</head>

<body>
    <div class="dheadersec">
        <div class="dheaderleft">
            <div class="dheadericon">
                <a href="/compliance" class="text-white">

                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="dheadertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
            <div class="dheadericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="dheadertext">
                <p>الأدلة والأطر</p>
                <p>Evidences and Frameworks</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
        @include('partials.roles')
        <div class="dheaderright">
            <button type="dbutton" class="dbutton" onclick="goBack()">
                <p>للخلف</p>
                <p>Back</p>
            </button>
        </div>
        </div>
    </div>
    {{-- <div class="herosec">
        <div class="herosecleft">
            <!--<div class="paraArea">-->
            <!--    <h3>الضوابط مقابل الأدلة</h3>-->
            <!--    <h3>Control vs Evidence</h3>-->
            <!--</div>-->
            <div class="cveButton">
                <a href="/evidence-control">
                    <div class="leftButton">
                        <p>الضوابط مقابل الأدلة</p>
                        <p>Control vs Evidence</p>
                    </div>
                </a>
                <a href="/control-evidence">
                    <div class="rightButton">
                        <p>الأدلة مقابل الضوابط</p>
                        <p>Evidence vs Control</p>
                    </div>
                </a>
            </div>
        </div>
    </div> --}}
    <div class="tablearea">
        <table class="table">
            <thead class="tablehead">
                <tr>
                    <th>
                        <p>#</p>
                    </th>
                    <th style="column-width: 500px;">
                        <p>Mandatory Regulatory Evidences and Frameworks</p>
                    </th>
                    <th style="column-width: 134px;">
                        <p>Reference</p>
                    </th>
                    <th style="column-width: 134px;">
                        <p>Attachment</p>
                    </th>
                    <th style="column-width: 50px;">
                        <p>Status</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                <tr>
                    <td>
                        <p>01</p>
                    </td>
                    <td>
                        <p>Cybersecurity Strategy</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-1, NCA-CSCC-1-1</p>
                    </td>
                    <td>
                        <div class="attachment" id="strategyframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>02</p>
                    </td>
                    <td>
                        <p>Cybersecurity Management and Committee Charter</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-2</p>
                    </td>
                    <td>
                        <div class="attachment" id="charterframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>03</p>
                    </td>
                    <td>
                        <p>Roles and Responsibilities Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-4, NCA-CCC-1-1</p>
                    </td>
                    <td>
                        <div class="attachment" id="rolesframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>04</p>
                    </td>
                    <td>
                        <p>Risk Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-5, NCA-CSCC-1-2</p>
                    </td>
                    <td>
                        <div class="attachment" id="riskframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>05</p>
                    </td>
                    <td>
                        <p>Project Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-6</p>
                    </td>
                    <td>
                        <div class="attachment" id="projectframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>06</p>
                    </td>
                    <td>
                        <p>Compliance Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-7, NCA-CCC-1-3</p>
                    </td>
                    <td>
                        <div class="attachment" id="complianceframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>07</p>
                    </td>
                    <td>
                        <p>Review and Audit Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-8, NCA-CSCC-1-4</p>
                    </td>
                    <td>
                        <div class="attachment" id="reviewframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>08</p>
                    </td>
                    <td>
                        <p>Human Resource Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-9</p>
                    </td>
                    <td>
                        <div class="attachment" id="humanframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>09</p>
                    </td>
                    <td>
                        <p>Cybersecurity Awareness and Training Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-1-10</p>
                    </td>
                    <td>
                        <div class="attachment" id="awarenessframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>10</p>
                    </td>
                    <td>
                        <p>Asset Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-1</p>
                    </td>
                    <td>
                        <div class="attachment" id="assetframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>11</p>
                    </td>
                    <td>
                        <p>Identity and Access Management</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-2</p>
                    </td>
                    <td>
                        <div class="attachment" id="identityframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>12</p>
                    </td>
                    <td>
                        <p>Anti-Malware Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-3-3-1</p>
                    </td>
                    <td>
                        <div class="attachment" id="antimalwareframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>13</p>
                    </td>
                    <td>
                        <p>Clock Synchronization Guidelines</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-3-3-4</p>
                    </td>
                    <td>
                        <div class="attachment" id="clockframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>14</p>
                    </td>
                    <td>
                        <p>Data Center Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-3</p>
                    </td>
                    <td>
                        <div class="attachment" id="dataframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>15</p>
                    </td>
                    <td>
                        <p>Patch Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-3</p>
                    </td>
                    <td>
                        <div class="attachment" id="patchframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>16</p>
                    </td>
                    <td>
                        <p>Storage Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-3</p>
                    </td>
                    <td>
                        <div class="attachment" id="storageframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>17</p>
                    </td>
                    <td>
                        <p>Email Protection Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-4</p>
                    </td>
                    <td>
                        <div class="attachment" id="emailframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>18</p>
                    </td>
                    <td>
                        <p>Network Security Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-5</p>
                    </td>
                    <td>
                        <div class="attachment" id="networkframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>19</p>
                    </td>
                    <td>
                        <p>Mobile Device Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-6</p>
                    </td>
                    <td>
                        <div class="attachment" id="mobileframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>20</p>
                    </td>
                    <td>
                        <p>Data and Information Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-7</p>
                    </td>
                    <td>
                        <div class="attachment" id="dataandinformationframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>21</p>
                    </td>
                    <td>
                        <p>Cryptography Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-8</p>
                    </td>
                    <td>
                        <div class="attachment" id="cryptographyframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>22</p>
                    </td>
                    <td>
                        <p>Backup & Recovery Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-9</p>
                    </td>
                    <td>
                        <div class="attachment" id="backupframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>23</p>
                    </td>
                    <td>
                        <p>Vulnerability Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-10</p>
                    </td>
                    <td>
                        <div class="attachment" id="vulnerabilityframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>24</p>
                    </td>
                    <td>
                        <p>Pen Test Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-11</p>
                    </td>
                    <td>
                        <div class="attachment" id="pentestframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>25</p>
                    </td>
                    <td>
                        <p>Event Log and Monitoring Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-12</p>
                    </td>
                    <td>
                        <div class="attachment" id="eventframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>26</p>
                    </td>
                    <td>
                        <p>Incident and Threat Managment Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-13</p>
                    </td>
                    <td>
                        <div class="attachment" id="incidentframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>27</p>
                    </td>
                    <td>
                        <p>Physical Security Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-14</p>
                    </td>
                    <td>
                        <div class="attachment" id="physicalframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>28</p>
                    </td>
                    <td>
                        <p>Application, System Development</p>
                    </td>
                    <td>
                        <p>NCA-ECC-2-15</p>
                    </td>
                    <td>
                        <div class="attachment" id="applicationframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>29</p>
                    </td>
                    <td>
                        <p>Business Continuity Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-3-1</p>
                    </td>
                    <td>
                        <div class="attachment" id="businessframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>30</p>
                    </td>
                    <td>
                        <p>Third Party Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-4-1</p>
                    </td>
                    <td>
                        <div class="attachment" id="thirdpartyframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>31</p>
                    </td>
                    <td>
                        <p>Cloud Deployment Framework</p>
                    </td>
                    <td>
                        <p>NCA-ECC-4-2</p>
                    </td>
                    <td>
                        <div class="attachment" id="cloudframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>32</p>
                    </td>
                    <td>
                        <p>Change Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-CCC-1-5</p>
                    </td>
                    <td>
                        <div class="attachment" id="changeframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>33</p>
                    </td>
                    <td>
                        <p>Capacity Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-CSCC-1-3</p>
                    </td>
                    <td>
                        <div class="attachment" id="capacityframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <!--<tr>-->
                <!--    <td>-->
                <!--        <p>34</p>-->
                <!--    </td>-->
                <!--    <td>-->
                <!--        <p>Peripherals Security Framework</p>-->
                <!--    </td>-->
                <!--    <td>-->
                <!--        <p>NCA-DCC-2-7</p>-->
                <!--    </td>-->
                <!--    <td>-->
                <!--        <div class="attachment" id="peripheralsframework">-->
                <!--            <p>View Attachment</p>-->
                <!--        </div>-->
                <!--    </td>-->
                <!--    <td>-->
                <!--        <p>Linked</p>-->
                <!--    </td>-->
                <!--</tr>-->
                <tr>
                    <td>
                        <p>34</p>
                    </td>
                    <td>
                        <p>Configuration Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-DCC-2-7</p>
                    </td>
                    <td>
                        <div class="attachment" id="configurationframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>35</p>
                    </td>
                    <td>
                        <p>Telework Management Framework</p>
                    </td>
                    <td>
                        <p>NCA-TCC-1-1</p>
                    </td>
                    <td>
                        <div class="attachment" id="teleworkframework">
                            <p>View Attachment</p>
                        </div>
                    </td>
                    <td>
                        <p>Linked</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        document.getElementById('strategyframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/01. RCD-1-1.STRG - Cybersecurity Strategy - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('charterframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/02. RCD-1-2.MNGT-Cybersecurity Management and Committee Charter - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('rolesframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/04. RCD-1-4.R&R-Roles and Responsibilities - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('riskframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/05. RCD-1-5.RSK-Risk Management - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('projectframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/06. RCD-1-6.PMO-1012 - Project Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('complianceframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/07. RCD-1-7.RGL-1013 - Compliance Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('reviewframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/08. RCD-1-8.A&A-1014 - Review and Audit Management Framework.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('humanframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/09. RCD-1-9.HR-1015 - Human Resource Framework - Ver 1.01.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('awarenessframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/10. RCD-1-10.TRG-1016 - Cybersecurity Awareness and Training Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('assetframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/11. RCD-2-1.AST-1017 - Asset Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('identityframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/12. RCD-2-2.IAM - Identity and Access Management - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('antimalwareframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/13A. RCD-2-3.AMW-1019 - Anti-Malware Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('clockframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/13B. RCD-2-3.CSYN-1021 - Clock Synchronization Guidelines - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('dataframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/13C. RCD-2-3.DC&DRC-1046 - Data Center Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('patchframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/13D. RCD-2-3.PTH-1020 - Patch Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('storageframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/13E. RCD-2-3.STG-1037 - Storage Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('emailframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/14. RCD-2-4.EML-1022 - Email Protection Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('networkframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/15. RCD-2-5.NSEC-1023 - Network Security Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('mobileframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/16. RCD-2-6.MDM-1024 - Mobile Device Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('dataandinformationframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/17. RCD-2-7.D&I-1025 - Data and Information Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('cryptographyframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/18. RCD-2-8.CRYP-1026 - Cryptography Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('backupframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/19. RCD-2-9.B&R-1027 - Backup & Recovery Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('vulnerabilityframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/20. RCD-2-10.VA-1028 - VA Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('pentestframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/21. RCD-2-11.PEN-1029 - Pen Test Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('eventframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/22. RCD-2-12.EVT-1030 - Event Log and Monitoring Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('incidentframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/23. RCD-2-13.CTI-1031 - Incident and Threat Managment Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('physicalframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/24. RCD-2-14.PHY-1032 - Physical Security Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('applicationframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/25. AIS  - RCD-2-15.WAS-1033 - Application, System Development - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('businessframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/26. RCD-3-1.BCM-1034 - Business Continuity Framework - Ver  1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('thirdpartyframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/27. RCD-4-1.TPT-1035 - Third Party Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('cloudframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/28. RCD-4-2.CCH-1036 - Cloud Deployment Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('changeframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/29. RCD-31-1.CHG-1043 - Change Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('capacityframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/30. RCD-37-1.CAP-1045 - Capacity Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('peripheralsframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/31. RCD-32-1.PRP-1040 - Peripherals Security Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('configurationframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/32. 1027 - Configuration Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('teleworkframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                'Images/frameworks/33. RCD-35-1.TCC-1041 - Telework Management Framework - Ver 1.0.pdf';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
    </script>
</body>
