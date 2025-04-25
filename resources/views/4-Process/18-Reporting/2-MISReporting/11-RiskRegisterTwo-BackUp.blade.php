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
            <div class="dheaderright">
                <button type="dbutton" class="dbutton" onclick="window.location.href=('/compliance')">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
        <div class="herosec">
            <div class="herosecleft">
                <h3>سجل المخاطر</h3>
                <h3>Risk Register</h3>
            </div>
        </div>
    </div>
    <div class="rtablearea">
        <table class="table-response">
            <thead class="tablehead">
                <tr>
                    <th colspan="7">
                        <p>تفاصيل المخاطر</p>
                        <p>Risk Details</p>
                    </th>
                    <th colspan="3">
                        <p>مخاطرة</p>
                        <p>Risk</p>
                    </th>
                    <th colspan="6">
                        <p>تقييم السيطرة</p>
                        <p>Control Assessment</p>
                    </th>
                    <th colspan="3">
                        <p>المخاطر المتبقية</p>
                        <p>Residual Risk</p>
                    </th>
                    <th colspan="6">
                        <p>تقييم المخاطر</p>
                        <p>Risk Assessment</p>
                    </th>
                    <th colspan="4">
                        <p>مراقبة المخاطر</p>
                        <p>Risk Monitoring</p>
                    </th>
                </tr>
                <tr>
                    <th style="width: 200px; position:sticky; left: 0; z-index: 3;">
                        <p>رمز المخاطر</p>
                        <p>Risk ID</p>
                    </th>
                    <th style="width: 500px">
                        <p>اسم المخاطرة</p>
                        <p>Risk Name</p>
                    </th>
                    <th style="width: 500px">
                        <p>وصف المخاطر</p>
                        <p>Risk Description</p>
                    </th>
                    <th style="width: 500px">
                        <p>أهداف</p>
                        <p>Objectives</p>
                    </th>
                    <th style="width: 200px">
                        <p>وكلاء التهديد</p>
                        <p>Threats</p>
                    </th>
                    <th style="width: 200px">
                        <p>التهديدات</p>
                        <p>Vulnerabilities</p>
                    </th>
                    <th style="width: 200px">
                        <p>الفئة الخطوره</p>
                        <p>Risk Category</p>
                    </th>
                    <th style="width: 100px">
                        <p>تأثير</p>
                        <p>Impact</p>
                    </th>
                    <th style="width: 100px">
                        <p>احتمالية</p>
                        <p>Likelihood</p>
                    </th>
                    <th style="width: 100px">
                        <p>نتيجة</p>
                        <p>Score</p>
                    </th>
                    <th style="width: 500px">
                        <p>اسم التحكم</p>
                        <p>Control Name</p>
                    </th>
                    <th style="width: 200px">
                        <p>حالة</p>
                        <p>Status</p>
                    </th>
                    <th style="width: 200px">
                        <p>افضل الممارسات</p>
                        <p>Best Practice</p>
                    </th>
                    <th style="width: 200px">
                        <p>اسم المراجع</p>
                        <p>Auditor Name</p>
                    </th>
                    <th style="width: 200px">
                        <p>تاريخ البدء</p>
                        <p>Start Date</p>
                    </th>
                    <th style="width: 200px">
                        <p>تاريخ الانتهاء</p>
                        <p>End Date</p>
                    </th>
                    <th style="width: 100px">
                        <p>تأثير</p>
                        <p>Impact</p>
                    </th>
                    <th style="width: 100px">
                        <p>احتمالية</p>
                        <p>Likelihood</p>
                    </th>
                    <th style="width: 100px">
                        <p>تقييم</p>
                        <p>Rating</p>
                    </th>
                    <th style="width: 200px">
                        <p>حالة</p>
                        <p>Status</p>
                    </th>
                    <th style="width: 500px">
                        <p>وصف العثور على</p>
                        <p>Finding Description</p>
                    </th>
                    <th style="width: 300px">
                        <p>العثور على الوصف</p>
                        <p>Assessment Master Name</p>
                    </th>
                    <th style="width: 200px">
                        <p>اسم المراجع</p>
                        <p>Auditor Name</p>
                    </th>
                    <th style="width: 200px">
                        <p>تاريخ البدء</p>
                        <p>Start Date</p>
                    </th>
                    <th style="width: 200px">
                        <p>تاريخ الانتهاء</p>
                        <p>End Date</p>
                    </th>
                    <th style="width: 300px">
                        <p>رمز مؤشر المخاطر الرئيسي</p>
                        <p>Risk KRI ID</p>
                    </th>
                    <th style="width: 500px">
                        <p>وصف</p>
                        <p>Description</p>
                    </th>
                    <th style="width: 200px">
                        <p>يكتب</p>
                        <p>Type</p>
                    </th>
                    <th style="width: 200px">
                        <p>مصدر</p>
                        <p>Source</p>
                    </th>
                </tr>
            </thead>
            <tbody class="tablebody">
                @foreach ($riskregister as $rows)
                    <tr>
                        <td
                            style="position:sticky; left: 0; z-index: 1; background-color: #a9c9e8; color: black; font-weight: 700">
                            <a href="/risk-identification-table/{{ $rows->risk_id }}">
                                {{ $rows->risk_id }}
                            </a>
                        </td>
                        <td class="control-description-cell">{{ $rows->risk_name }}</td>
                        <td>{{ $rows->risk_description }}</td>
                        <td>{{ $rows->objectives }}</td>
                        <td>{{ $rows->threats }}</td>
                        <td>{{ $rows->vulnerabilities }}</td>
                        <td>{{ $rows->category_name }}</td>
                        <td>{{ $rows->impact }}</td>
                        <td>{{ $rows->likelihood }}</td>
                        <td>{{ $rows->score }}</td>
                        <td>{{ $rows->control_name }}</td>
                        <td>{{ $rows->status }}</td>
                        <td>{{ $rows->best_practices_name }}</td>
                        <td>{{ $rows->auditor_name }}</td>
                        <td>{{ $rows->start_date }}</td>
                        <td>{{ $rows->end_date }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ $rows->implementation_status }}</td>
                        <td>{{ $rows->risk_finding_description }}</td>
                        <td>-</td>
                        <td>{{ $rows->auditor_name }} </td>
                        <td>{{ $rows->risk_assessment_start_date }}</td>
                        <td>{{ $rows->risk_assessment_end_date }}</td>
                        <td>{{ $rows->risk_kri_id }}</td>
                        <td>{{ $rows->key_risk_indicator_description }}</td>
                        <td>-</td>
                        <td>{{ $rows->key_risk_indicator_source }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
