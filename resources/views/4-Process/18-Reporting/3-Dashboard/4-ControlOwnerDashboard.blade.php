<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool" />
    <meta name="description" content="Zain Cloud GRC Tool" />
    <!-- Boxicons Icons-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/11-Dashboard/1-Dashboard.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <style>
        .ListTable {
            max-width: 1200;
            margin: 120px auto 0;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section>
        <header>
            <div class="Header">
                <a href="/compliance">
                    <i class="bx bx-home"></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i style="padding-right: 30px" class="bx bx-right-arrow-alt"></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">لوحة التحكم بالامتثال الشامل</p>
                    <p class="EngTxt">Overall Compliance Dashboard</p>
                </div>
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
    </section>

    <body>

        <div>
            <div class="ListTable">
                <table cellspacing="0">
                    <tr>
                        <th class="TableHeads">Control ID</th>
                        <th class="TableHeads">Status</th>
                        <th class="TableHeads">Owner Name</th>
                        <th class="TableHeads">Custodian Name</th>
                    </tr>
                    @foreach ($controls as $row)
                        <tr>
                            <td>{{ $row->control_id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('ownerreg.show', $row->owner_id) }}" target="_blank">
                                    {{ $row->owner_name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('custodians.show', $row->custodian_name_id) }}" target="_blank">

                                    {{ $row->custodian_name }}
                            </td>
                            </a>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>



        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>

</html>
