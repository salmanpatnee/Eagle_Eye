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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <style>
        section#heatmap {
            margin-block: 3em;
            width: 97%;
        }

        section#heatmap th,
        section#heatmap td {
            border: 1px solid #fff;
            padding: 8px;
            font-size: 13px;
        }

        section#heatmap th {
            background-color: #fff;
            color: #505050;
            padding: 1em 0;
            text-align: center;
        }

        section#heatmap tr.heads th {
            background: #E6E7E8;
            text-transform: uppercase;
        }

        section#heatmap td p {
            line-height: 2em;
        }

        td.impact {
            font-weight: 500;
            background-color: white;
            padding: 1.5em 0;
        }

        .very-low {
            background-color: #00b050;
        }

        .low {
            background-color: #a8d08d;
        }

        .medium {
            background-color: #ffff00;
        }

        .high {
            background-color: #ffc000;
        }

        .critical {
            background-color: #ff0000;
            color: white;
        }

        div#riskAppetiteContent {
            background-color: #fff;
        }

        button.btn {
            background-color: black;
            padding: .5em;
            width: 120px;
            margin: .5em;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .text-end {
            text-align: right;
        }
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">الرغبة في المخاطرة</p>
                    <p class="EngTxt">Risk Appetite</p>
                </div>
                <div class="text-center d-flex gap-3" style="margin-left: auto">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @include('4-Process/7-Risk/AppetiteSidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <form method="POST" action="{{ route('risk-appetites.delete') }}" id="deleteForm">
            @csrf
            @method('DELETE')
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">الرغبة في المخاطرة</p>
                    <p class="PageHeadEngTxt">Risk Appetite</p>
                </div>
                <div class="ButtonContainer">
                    {{-- <a href="" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route($routeName . '.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>

                    <a href=""
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}"
                        id="btnUpdate">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>

                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('delete-data') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button> --}}
                </div>
            </div>
            <section id="heatmap">
                <table>
                    <tr class="heads">
                        <th rowspan="2">Impact</th>
                        <th colspan="5">Likelihood (Probability)</th>
                    </tr>
                    <tr>
                        <th>1 (Rare)</th>
                        <th>2 (Unlikely)</th>
                        <th>3 (Possible)</th>
                        <th>4 (Likely)</th>
                        <th>5 (Certain)</th>
                    </tr>
                    @foreach ($result->chunk(5) as $chunk)
                        <tr>
                            <td class="impact">{{ $loop->index + 1 }} ({{ $impacts[$loop->index] }})</td>
                            @foreach ($chunk as $data)
                                <td class="{{ $data->risk_appetite_color }}">
                                    <p><b>Risk ID:</b> {{ $data->risk_appetite_id }}</p>
                                    <p><b>Risk Name:</b> {{ $data->risk_appetite_name }}</p>
                                    <p><b>Risk Score:</b> {{ $data->risk_score }}</p>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
    
                </table>
            </section>
            {{-- <div class="table-container">

                <div class="ListTable">
                    <table cellspacing="0">
                        <tr class="table-header">
                            <th style="padding-right: 0px;"></th>
                            <th style="padding-right: 0px;">
                                <p class="ListHeadArbTxt">رمز</p>
                                <p class="ListHeadEngTxt">S.No</p>
                            </th>
                            <th style="padding-right: 0px;">
                                <p class="ListHeadArbTxt">رمز الرغبة في المخاطرة</p>
                                <p class="ListHeadEngTxt">Risk Appetite ID</p>
                            </th>
                            <th style="padding-right: 100px;">
                                <p class="ListHeadArbTxt">اسم الرغبة في المخاطرة</p>
                                <p class="ListHeadEngTxt">Risk Appetite Name</p>
                            </th>
                            <th style="padding-right: 0px;">
                                <p class="ListHeadArbTxt">درجة المخاطرة</p>
                                <p class="ListHeadEngTxt">Score</p>
                            </th>
                            <th style="padding-right: 0px;">
                                <p class="ListHeadArbTxt">لون الجوع للمخاطرة</p>
                                <p class="ListHeadEngTxt">Risk Appetite Color</p>
                            </th>
                        </tr>
                        @foreach ($riskAppetites as $riskAppetite)
                            <tr>
                                <td>
                                    <input type="radio" name="record" class="record"
                                        value="{{ $riskAppetite->$primaryKey }}" required>
                                </td>
    
    
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
            
                                    <a href="{{ route('risk-appetites.show', $riskAppetite->risk_appetite_id) }}">
                                        {{ $riskAppetite->risk_appetite_id }}
                                    </a>
                                </td>
                                <td>{{ $riskAppetite->risk_appetite_name }}</td>
                                <td>{{ $riskAppetite->risk_score }}</td>
                                <td>{{ $riskAppetite->risk_appetite_color }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div> --}}
        </form>
    </div>

    @include('components.delete-confirmation-modal')
    <script src="{{ asset('js/delete-confirmation.js') }}"></script>
    <script>
        document.getElementById('btnDelete').addEventListener('click', function() {
            const selectedRadio = document.querySelector('.record:checked');
            if (selectedRadio) {
                showDeleteConfirmation('deleteForm');
            } else {
                alert('Please select a record to delete.');
            }
        });

        document.getElementById('btnUpdate').addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRadio = document.querySelector('.record:checked');
            if (selectedRadio) {
                window.location.href = `/risk-appetites/edit/${selectedRadio.value}`;
            } else {
                alert('Please select a record.');
            }
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
