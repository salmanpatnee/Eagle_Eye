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
                <i class='bx bx-home'></i>
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
                        <p>Mandatory Regulatory Evidences and Documentation</p>
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
                        <p>Personal Data Protection Strategy</p>
                    </td>
                    <td>
                        <p>NDMO:2021-PDP.1</p>
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
                        <p>Data Catalog</p>
                    </td>
                    <td>
                        <p>NDMO:2021-MCM.1</p>
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
                        <p>Privacy Impact Assessments</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DC.3</p>
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
                        <p>Data Protection Policies and Procedures</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DG.1</p>
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
                        <p>Privacy Consent</p>
                    </td>
                    <td>
                        <p>NDMO:2021-PDP.4</p>
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
                        <p>Data Breach Response Plan</p>
                    </td>
                    <td>
                        <p>NDMO:2021-PDP.3</p>
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
                        <p>Third Party Risk Assessment</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DS.5</p>
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
                        <p>Anonymization Procedure</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DS.11</p>
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
                        <p>Consent Management System</p>
                    </td>
                    <td>
                        <p>NDMO:2021-PDP.4</p>
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
                        <p>Data Decommissioning Procedure</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DS.11</p>
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
                        <p>Data Protection Officer Responsibilities</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DG.4</p>
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
                        <p>Third Party Data Sharing Agreement</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DS.5</p>
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
                        <p>Data Retention And Deletion</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DO.2</p>
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
                        <p>Privacy Notices and Consent Mechanisms</p>
                    </td>
                    <td>
                        <p>NDMO:2021-PDP.4</p>
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
                        <p>Cross-Border Data Transfer Assessments</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DSI.8</p>
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
                        <p>Privacy Governance Structure</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DG.1</p>
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
                        <p>Quarter Compliance Reviews</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DG.5</p>
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
                        <p>Yearly Privacy Audit Report</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DG.5</p>
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
                        <p>Data Deletion Procedure</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DO.2</p>
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
                        <p>Data Sanitization Procedure</p>
                    </td>
                    <td>
                        <p>NDMO:2021-DO.2</p>
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
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('charterframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('rolesframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('riskframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('projectframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('complianceframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('reviewframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('humanframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('awarenessframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('assetframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('identityframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('antimalwareframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('clockframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('dataframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('patchframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('storageframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('emailframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('networkframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('mobileframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
        document.getElementById('dataandinformationframework').addEventListener('click', function() {
            // URL of the PDF file
            const pdfUrl =
                '/';

            // Open the PDF file in a new tab
            window.open(pdfUrl, '_blank');
        });
    </script>
</body>
