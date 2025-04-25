<!DOCTYPE html>
<html lang="en">

{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head> --}}

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
    <table>
        <thead>
            <tr>
                <th colspan="2">١- حوكمة الأمن السيبراني (Cybersecurity Governance)</th>
            </tr>
            <tr>
                <th>إستراتيجية الأمن السيبراني (Cybersecurity Strategy)</th>
                <th>١-١</th>
            </tr>
        </thead>
    </table>
    <table>
        <thead> <!-- Corrected the opening tag -->
            <tr>
                <th style="padding-right: 0px;"></th>
                <th style="padding-right: 0px;">
                    <p class="ListHeadArbTxt">رمز الضوابط</p>
                    <p class="ListHeadEngTxt">Control ID</p>
                </th>
                <th style="padding-right: 100px;">
                    <p class="ListHeadArbTxt">اسم الضوابط</p>
                    <p class="ListHeadEngTxt">Control Name</p>
                </th>
            </tr>
        </thead> <!-- Moved it here -->
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td><input type="checkbox" name="selectedcontrolidenti[]" value="{{ $row->control_id }}">
                    </td>
                    <td><a href="/control-identification-table/{{ $row->control_id }}">{{ $row->control_id }}</a>
                    </td>
                    <td>{{ $row->control_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
