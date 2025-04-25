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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-MainPageHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/1-Process.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/4-Reporting/1-misreporting.css') }}">
</head>

<body>
    <header>
        <div class="header-content">
            <a href="/compliance">
                <i class='bx bx-home'></i>
            </a>
            <span class="bold-text">MIS Reports</span>
            <div class="RightButtonContainer">
                <a href="/mis-reporting">
                    <button class="RightButton">Back</button>
                </a>
            </div>
        </div>
    </header>

    <div class="IndiTable">
        <h2 style="text-align: center; line-height: 35px; color:#203864;">Zain Cloud Saudi Arabia</h2>
        <h1 style="text-align: center; line-height: 35px; color:#203864;">Report of Implemented Controls</h1>
        <p style="text-align: center; line-height: 35px; color:#203864;">Current Date: {{ now()->format('d-m-Y') }}</p>
        {{-- <div class="TableHeading">
            <div class="ButtonContainer">
                <a href="{{ route('criticalpdf') }}" class="DeleteButton">Download</a>
            </div>
        </div> --}}
        <div class="ListTable">
            <table cellspacing="0">
                <tr>
                    <th style="padding-right: 0px; background-color:gray;">Control ID</th>
                    <th style="padding-right: 100px; background-color:gray;">Control Name</th>
                    <th style="padding-right: 0px; background-color:gray;">Maturity Level</th>
                </tr>
                @foreach ($assetregister as $row)
                    <tr>
                        <td><a href="/control-identification-table/{{ $row->control_id }}">{{ $row->control_id }}</a>
                        </td>
                        <td>{{ $row->control_name }}</td>
                        <td>{{ $row->maturity_level }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        </form>
    </div>


</body>
