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
        table {
            width: 100%;
        }

        .tablehead tr th {
            background-color: #373E49;
            padding: .5em 0;
            border: 1px solid #fff;
        }

        .tablehead tr th p {
            margin: 0;
            line-height: 1.5em;
            white-space: nowrap;
        }

        th.bg-light-gray {
            background-color: #203864 !important;
            color: #FFF !important;
            padding: 0.7em !important;
            font-weight: 500;
        }

        .rtablearea {
            line-height: 10px;
            position: absolute;
            width: 100%;
            top: 340px;
        }

        tbody tr {
            vertical-align: top;
        }

        tbody td {
            white-space: nowrap;
            border: 1px solid #000;
            padding: 12px;
            line-height: 1.2em;
            text-align: center;
        }

        tbody td.list {

            text-align: left;
        }

        tbody td span {
            line-height: 1.5em;
        }

        tbody td a {
            margin-bottom: .5em;
            display: inline-block;
            color: #000;
        }

        tr:nth-child(even) {
            background-color: #D9D9D9;
            /* White for even rows */
        }

        .dheadersec>div {
            width: 33%;
            text-align: center;
        }

        @media (min-width: 1024px) and (max-width: 1179px) {
            .rtablearea {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="fixposition">
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
            </div>
            <div style="margin-left: -50px;">
                 <a href="{{ route('audit.plan.report.index') }}" class="btn-report">
                    <p>تقرير مفصل</p>
                    <p>Detailed Report</p>
                </a>
                <a href="{{ route('audit.plan.summarize.excel.report', request()->query()) }}" class="btn-report">
                    <p>تنزيل بصيغة إكسل</p>
                    <p>Download in Excel</p>
                </a>
                <a href="{{ route('audit.plan.report.summarize', array_merge(request()->query(), ['pdf' => 1])) }}" class="btn-report">
                
                    <p>تنزيل بصيغة بي دي إف</p>
                    <p>Download as PDF</p>
                </a>
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
        <div class="herosec">
            <div class="herosecleft">
                <h3>ملخص خطة التدقيق</h3>
                <h3>Audit Plan Summary</h3>
            </div>
            <div>
                <form action="">
                    <div class="filter-row">
                        <div class="col"></div>
                        <div class="col">
                            <label class="form-label" for="team_responsible">
                                <p>Team Responsible</p>
                                <p>فريق المسؤول</p>
                            </label>
                            <select class="form-select" name="team_responsible" id="team_responsible"
                                onchange="this.form.submit()">
                                <option value="">All</option>
                                @foreach ($teamResponsible as $team)
                                    <option value="{{ $team->auditor_organization }}"
                                        @if ($team->auditor_organization == request('team_responsible')) selected @endif>
                                        {{ $team->auditor_organization }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label" for="status">
                                <p>Audit Start Date</p>
                                <p>تاريخ بدء التدقيق</p>
                            </label>



                            <input type="date" class="form-select" name="audit_start_date" id="audit_start_date"
                                value="{{ old('audit_start_date', request('audit_start_date')) }}"
                                onchange="this.form.submit()">

                        </div>
                        <div class="col"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="rtablearea">
        <table class="table-response">
            <thead class="tablehead">
                <tr>
                    <th class="bg-light-gray">
                        <p>S.No</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Audit ID</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Audit Name</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Audit Start</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Audit End</p>
                    </th>

                    <th class="bg-light-gray">
                        <p>Auditee</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Team Responsible</p>
                    </th>
                    <th class="bg-light-gray">
                        <p>Lead Auditor</p>
                    </th>
                </tr>
            </thead>
            <tbody style="background-color: white">
                @foreach ($auditPlanSummary as $auditPlan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a
                                href="{{ route('audit.plan.show', $auditPlan['audit_id']) }}">{{ $auditPlan['audit_id'] }}</a>
                        </td>
                        <td>{{ $auditPlan['audit_name'] }}</td>
                        <td>{{ $auditPlan['audit_plan_start_date'] }}</td>
                        <td>{{ $auditPlan['audit_plan_end_date'] }}</td>
                        <td><a
                                href="{{ route('auditees.show', $auditPlan['auditee_id']) }}">{{ $auditPlan['auditee'] }}</a>
                        </td>
                        <td>{{ $auditPlan['auditor_organization'] }}</td>
                        <td><a
                                href="{{ route('auditors.show', $auditPlan['auditor_id']) }}">{{ $auditPlan['auditor'] }}</a>
                        </td>
                @endforeach
            </tbody>


        </table>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
