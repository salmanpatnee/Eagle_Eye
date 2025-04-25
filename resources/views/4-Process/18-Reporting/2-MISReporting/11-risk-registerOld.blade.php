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

<body style="background-color: #f6f6f6">
    <header>
        <div class="Header">
            <a href="/home">
                <i class="bx bx-home"></i>
            </a>
            <p class="bold-arbtext">العمليات</p>
            <p class="bold-text">Processes</p>
            <div class="RightButtonContainer">
                <a href="/compliance">
                    <button class="RightButton">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </a>
            </div>
        </div>
    </header>

    <div class="IndiTable">
        <h2 style="text-align: center; line-height: 35px; color:#203864;">ACME Cloud Saudi Arabia</h2>
        <h1 style="text-align: center; line-height: 35px; color:#203864;">Risk Status</h1>
        <p style="text-align: center; line-height: 35px; color:#203864;">Current Date: {{ now()->format('d-m-Y') }}</p>
        {{-- <div class="TableHeading">
            <div class="ButtonContainer">
                <a href="{{ route('criticalpdf') }}" class="DeleteButton">Download</a>
    </div>
    </div> --}}
        <div class="ListTable">
            <table cellspacing="0">
                <tr>
                    <th class="TableHeads">Risk Finding ID</th>
                    <th class="TableHeads">Risk Finding Name</th>
                    <th class="TableHeads">Risk Assessment Name</th>
                    <th class="TableHeads">Risk Name</th>
                    <th class="TableHeads">Implementation Status</th>
                    <th class="TableHeads">Expected Compliance Date</th>
                </tr>
                @foreach ($assetregister as $row)
                    <tr>
                        <td><a
                                href="/risk-assessment-finding-table/{{ $row->risk_finding_id }}">{{ $row->risk_finding_id }}</a>
                        </td>
                        <td>{{ $row->risk_finding_name }}</td>
                        <td>{{ $row->risk_assessment_name }}</td>
                        <td>{{ $row->risk_name }}</td>
                        <td>{{ $row->implementation_status }}</td>
                        <td>{{ $row->corrective_action_due_date }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        </form>
    </div>


</body>
