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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to generate the ID with a sequence
            function generateID() {
                // Get the input element
                var inputElement = document.getElementById('RiskApptiteId');

                // Generate a unique sequential number
                var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

                // Ensure the number is three digits by padding with zeros
                var formattedNumber = ('00' + sequenceNumber).slice(-3);

                // Combine the number with the prefix
                var generatedID = 'RSK-APT-' + formattedNumber;

                // Update the input field value
                inputElement.value = generatedID;

                // Increment and store the sequence number for the next use
                localStorage.setItem('sequenceNumber', sequenceNumber + 1);
            }

            // Call the generateID function when the page loads
            generateID();
        });
    </script>
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

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">الرغبة في المخاطرة</p>
                <p class="PageHeadEngTxt">Risk Appetite</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-appetites" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                @if (request()->routeIs($routeName . '.edit'))
                    <a href="{{ route($routeName . '.create') }}" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <button type="submit" form="form" class="MoreButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </button>
                @else
                    <a href="#form_head" form="form" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                @endif

                <button type="submit" form="delete_form"
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>
            </div>
        </div>

        <section id="heatmap" style="display: none ">
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

        {{-- <h2 id="form_head">Add / Update Risk Appetite</h2> --}}
        <div class="ContentTableSection" id="riskAppetiteContent">
            <div class="sk-chase" style="display: none">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
            <div id="riskAppetiteContentRow">
                <form method="POST"
                    action="{{ $data?->risk_appetite_id ? route('risk-appetites.update', $data->risk_appetite_id) : '' }}">
                    @csrf
                    @method('PUT')
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite ID</p>
                                <p class="FieldHeadArbTxt">رمز الرغبة في المخاطرة</p>
                            </div>

                            <select name="risk_appetite_id" id="risk_appetite_id" class="sh-tx" required>
                                <option value="">Select Risk ID</option>
                                @foreach ($result as $risk)
                                    <option value="{{ $risk->risk_appetite_id }}"
                                        {{ old('risk_appetite_id', $risk->risk_appetite_id) == $data?->risk_appetite_id ? 'selected' : '' }}>
                                        {{ $risk->risk_appetite_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_appetite_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Name</p>
                                <p class="FieldHeadArbTxt">اسم الرغبة في المخاطرة</p>
                            </div>
                            <p><input type="text" name="risk_appetite_name" id="risk_appetite_name"
                                    class="sh-tx" placeholder="Write Name"
                                    value="{{ old('risk_appetite_name', $data?->risk_appetite_name) }}" required>
                                @error('risk_appetite_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Description</p>
                                <p class="FieldHeadArbTxt">وصف الرغبة في المخاطرة</p>
                            </div>
                            <p><input type="text" name="risk_appetite_description" id="risk_appetite_description"
                                    class="bg-tx" placeholder="Write Description"
                                    value="{{ old('risk_appetite_description', $data?->risk_appetite_description) }}">
                                @error('risk_appetite_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Likelihood</p>
                                <p class="FieldHeadArbTxt">احتمالات المخاطرة</p>
                            </div>
                            <select name="risk_likelihood" id="riskLikelihood" class="sh-tx">
                                @foreach (range(1, 5) as $item)
                                    <option value="{{ $item }}"
                                        {{ old('risk_likelihood', $item) == $data?->risk_likelihood ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_likelihood')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Impact</p>
                                <p class="FieldHeadArbTxt">تأثير المخاطر</p>
                            </div>
                            <select name="risk_impact" id="riskImpact" class="sh-tx">
                                @foreach (range(1, 5) as $item)
                                    <option value="{{ $item }}"
                                        {{ old('risk_impact', $item) == $data?->risk_impact ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_impact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Score</p>
                                <p class="FieldHeadArbTxt">درجة المخاطرة</p>
                            </div>
                            <p>
                                <input type="text" name="risk_score" id="riskScore" class="sh-tx"
                                    value="{{ old('risk_score', optional($data)->risk_score) }}" readonly>
                                @error('risk_score')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Color</p>
                                <p class="FieldHeadArbTxt">لون الجوع للمخاطرة</p>
                            </div>
                            <p><input type="text" name="risk_appetite_color" id="appetiteColor"
                                    class="sh-tx {{ $data?->risk_appetite_color }}"
                                    style="text-transform: capitalize"
                                    value="{{ old('risk_appetite_color', $data?->risk_appetite_color) }}" readonly>
                                @error('risk_appetite_color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Uppler Limit</p>
                                <p class="FieldHeadArbTxt">الحد الأعلى لمخاطر الجوع</p>
                            </div>
                            <p><input type="text" name="risk_appetite_upper_limit" id="risk_appetite_upper_limit"
                                    class="sh-tx" placeholder="Enter Upper Limit"
                                    value="{{ old('risk_appetite_upper_limit', $data?->risk_appetite_upper_limit) }}">
                                @error('risk_appetite_upper_limit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Lower Limit</p>
                                <p class="FieldHeadArbTxt">الحد السفلي مخاطر الجوع</p>
                            </div>
                            <p><input type="text" name="risk_appetite_lower_limit" id="risk_appetite_lower_limit"
                                    class="sh-tx" placeholder="Enter Lower Limit"
                                    value="{{ old('risk_appetite_lower_limit', $data?->risk_appetite_lower_limit) }}">
                                @error('risk_appetite_lower_limit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Sensitivity</p>
                                <p class="FieldHeadArbTxt">حساسية المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_sensitivity" id="risk_sensitivity" class="bg-tx"
                                    placeholder="Write Risk Sensitity"
                                    value="{{ old('risk_sensitivity', $data?->risk_sensitivity) }}">
                                @error('risk_sensitivity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Implication</p>
                                <p class="FieldHeadArbTxt">آثار المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_implication" id="risk_implication" class="bg-tx"
                                    placeholder="Write Risk Implication"
                                    value="{{ old('risk_implication', $data?->risk_implication) }}">
                                @error('risk_implication')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="text-end">

                        <button type="submit" class="btn">
                            <p class="ButtonArbTxt">تحديث</p>
                            <p class="ButtonEngTxt">Update</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const riskLikelihoodSelect = document.getElementById("riskLikelihood");
            const riskImpactSelect = document.getElementById("riskImpact");
            const riskScoreInput = document.getElementById("riskScore");
            const appetiteColorInput = document.getElementById("appetiteColor");

            function updateRiskScore() {
                const likelihood = parseInt(riskLikelihoodSelect.value);
                const impact = parseInt(riskImpactSelect.value);
                const score = likelihood * impact;
                riskScoreInput.value = score;

                // Determine appetite color based on the score and set the background color
                if (score <= 2) {
                    appetiteColorInput.value = "Very Low";
                    appetiteColorInput.style.backgroundColor = "#00850A"; // Green for Low
                } else if (score <= 4) {
                    appetiteColorInput.value = "Low";
                    appetiteColorInput.style.backgroundColor = "#00FF78"; // Yellow for Moderate
                } else if (score <= 9) {
                    appetiteColorInput.value = "Medium";
                    appetiteColorInput.style.backgroundColor = "#ECFF00"; // Orange for High
                } else if (score <= 15) {
                    appetiteColorInput.value = "High";
                    appetiteColorInput.style.backgroundColor = "#FFB600"; // Orange for High
                } else {
                    appetiteColorInput.value = "Critical";
                    appetiteColorInput.style.backgroundColor = "#FF0000"; // Red for Very High
                }
            }

            riskLikelihoodSelect.addEventListener("change", updateRiskScore);
            riskImpactSelect.addEventListener("change", updateRiskScore);
        });

        function goBack() {
            window.history.back();
        }

        $(document).ready(function() {
            $('#risk_appetite_id').change(function() {
                const riskAppetiteId = $(this).val();
                $('#riskAppetiteContentRow form').attr('action', `/risk-appetites/${riskAppetiteId}`);
                $('#riskAppetiteContentRow').css('visibility', 'hidden');
                $('.sk-chase').show();

                $.ajax({
                    url: `/risk-appetites/${riskAppetiteId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log('Response:', response);

                        $('#risk_appetite_name').val(response.risk_appetite_name);
                        $('#risk_appetite_description').val(response.risk_appetite_description);
                        $('#riskLikelihood').val(response.risk_likelihood);
                        $('#riskImpact').val(response.risk_impact);
                        $('#riskScore').val(response.risk_score);
                        $('#appetiteColor').val(response.risk_appetite_color).addClass(response
                            .risk_appetite_color);
                        $('#risk_appetite_upper_limit').val(response.risk_appetite_upper_limit);
                        $('#risk_appetite_lower_limit').val(response.risk_appetite_lower_limit);
                        $('#risk_sensitivity').val(response.risk_sensitivity);
                        $('#risk_implication').val(response.risk_implication);

                        $('.sk-chase').hide();
                        $('#riskAppetiteContentRow').css('visibility', 'visible');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

            });

        });
    </script>

</body>
