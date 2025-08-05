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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <style>
        .regubutton {
            text-align: left;
            padding: 2em;
            margin: auto;
            width: 50%;
            height: auto;
        }

        select {
            width: 100%;
            padding: .375rem 2.25rem .375rem .75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            line-height: 1.5;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right .75rem center;
            background-size: 16px 12px;
            -moz-appearance: none;
            appearance: none;
            margin-bottom: 1em;
        }

        .regubutton:hover {
            transform: scale(1);
        }

        button,
        .button {
            background-color: black;
            color: white;
            border: none;
            /* padding: 1em; */
            border-radius: 10px;
            cursor: pointer;
        }

        button:hover,
        .button:hover {
            background-color: white;
            color: black;
        }

        .text-center {
            text-align: center;
        }

        p.date {
            font-size: 20px;
            padding: 0;
        }
        .buttonsec {
            padding-inline: 80px;
            margin-top: 120px;
        }
    </style>
</head>

<body class="regubg">
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="headertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
            <div class="headericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="headertext">
                <p>التقارير التنظيمية</p>
                <p>Regulatory Reports</p>
            </div>
        </div>
        <div class="headerright">
            <button type="button" class="button" onclick="window.location.href=('/compliance')">
                <p>للخلف</p>
                <p>Back</p>
            </button>
        </div>
    </div>
    <div class="buttonsec">
        <div class="firstrow">
            <div class="regubutton">
                @if (!count($controlAssessments))
                    <div class="text-center">
                        <p style="margin-bottom: 1em; font-size:20px;">No controls have been assessed under this best
                            practice yet.</p>
                        <a style="margin-right: 0" class="button"
                            href="{{ route('nca-regulatory-reports.index') }}">Back to Menu</a>
                    </div>
                @else
                    <form action="{{ route('regulatory-reports.show') }}">
                        <input type="hidden" name="best_practice" id="best_practice" value="{{ $bestPracticeId }}">
                        {{-- <div>
                            <p>Control Assessments ID</p>
                            <select name="control_assessments_id" id="control_assessments_id" required>
                                <option value="">Select Control Assessments ID</option>
                                @foreach ($controlAssessments as $controlAssessment)
                                    <option value="{{ $controlAssessment->control_assessment_id }}">
                                        {{ $controlAssessment->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        @if ($bestPracticeId === 'NCA-CCC-2020')
                            <div>
                                <p>Control Cloud Type</p>
                                <select name="cloud_control_type" id="cloud_control_type" required>
                                    <option value="csp">Cloud Service Provider (CSP)</option>
                                    <option value="cst">Cloud Service Tenants (CST)</option>
                                </select>
                            </div>
                        @endif
                        @if ($bestPracticeId === 'NCA-ECC-2018')
                            <div>
                                <p>Select Version</p>
                                <select name="version" id="version" required>
                                    <option value="v1">Version 1</option>
                                    <option value="v2">Version 2</option>
                                </select>
                            </div>
                        @endif
                        {{-- <div class="report-actions" style="display: none">
                            <p>Control Assessment Start Date</p>
                            <div id="control_assessments_start_date">
                                @foreach ($controlAssessments as $controlAssessment)
                                    <p class="date" data-id="{{ $controlAssessment->control_assessment_id }}"
                                        style="display: none">
                                        {{ $controlAssessment->formatted_start_date }}
                                    </p>
                                @endforeach
                            </div>

                        </div> --}}
                        <div class="text-center">
                            <button type="submit" style="padding: 1em;">Generate Report</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#control_assessments_id').change(function() {
                const controlAssessmentId = $(this).val();
                const reportActionDiv = $('.report-actions');
                $("p.date").hide();

                if (controlAssessmentId) {
                    $(reportActionDiv).show();
                    $("p[data-id='" + controlAssessmentId + "']").show();
                } else {
                    $(reportActionDiv).hide();
                }
            });
        });
    </script>
</body>

</html>
