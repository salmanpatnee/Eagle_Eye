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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body style="background-color: #f6f6f6">
    <div class="headersec">
        <div class="headerleft">
            <div class="headericon">
                <i class='bx bx-home'></i>
            </div>
            <div class="headertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
            <div class="headericon">
                <i class='bx bx-right-arrow-alt'></i>
            </div>
            <div class="headertext">
                <p>ملخص سجل المخاطر</p>
                <p>Risk Register Summary</p>
            </div>
        </div>
        <div class="headerright">
            <button type="button" class="button" onclick="window.location.href=('/process')">
                <p>للخلف</p>
                <p>Back</p>
            </button>
        </div>
    </div>
    <div class="rtheadingtext">
        <h1>ملخص سجل المخاطر</h1>
        <h3>Risk Register Summary</h3>
    </div>
    <div class="table">
        <table>
            <tr>
                <th style="width: 100px">
                    <p>المخاطر حالة</p>
                    <p>Risk Status</p>
                </th>
                <th style="width: 100px">
                    <p>تصنيف المخاطر المتبقية</p>
                    <p>Risk Residual Rating</p>
                </th>
                <th style="width: 100px">
                    <p>الضوابط حالة التنفيذ</p>
                    <p>Comtrol Implementation Status</p>
                </th>
                <th style="width: 50px">
                    <p>اسم الضوابط</p>
                    <p>Control Owner</p>
                </th>
                <th style="width: 120px">
                    <p>رمز الضوابط</p>
                    <p>Control ID</p>
                </th>
                <th style="width: 70px">
                    <p>المخاطر الكامنة</p>
                    <p>Risk Inherent Score</p>
                </th>
                <th style="width: 50px">
                    <p>صاحب المخاطر</p>
                    <p>Risk Owner</p>
                </th>
                <th style="width: 200px">
                    <p>اسم المخاطر</p>
                    <p>Risk Name</p>
                </th>
                <th style="width: 30px">
                    <p>رمز المخاطر</p>
                    <p>Risk ID</p>
                </th>
            </tr>
            @foreach ($riskregsumry as $rows)
                <tr>
                    <td>{{ $rows->risk_description }}</td>
                    <td>{{ $rows->risk_description }}</td>
                    <td>{{ $rows->risk_description }}</td>
                    <td>{{ $rows->risk_description }}</td>
                    <td>{{ $rows->risk_description }}</td>
                    <td>{{ $rows->risk_name }}</td>
                    <td>{{ $rows->risk_id }}</td>
                </tr>
            @endforeach
        </table>
    </div>
