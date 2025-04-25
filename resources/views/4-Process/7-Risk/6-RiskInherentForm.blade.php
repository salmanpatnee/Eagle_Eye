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
                var inputElement = document.getElementById('RiskInherentId');

                // Generate a unique sequential number
                var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

                // Ensure the number is three digits by padding with zeros
                var formattedNumber = ('00' + sequenceNumber).slice(-3);

                // Combine the number with the prefix
                var generatedID = 'RSK-INH-' + formattedNumber;

                // Update the input field value
                inputElement.value = generatedID;

                // Increment and store the sequence number for the next use
                localStorage.setItem('sequenceNumber', sequenceNumber + 1);
            }

            // Call the generateID function when the page loads
            generateID();
        });
    </script>
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
                <p class="PageHeadArbTxt">المخاطر الكامنة</p>
                <p class="PageHeadEngTxt">Risk Inherent</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-inherent-list" class="MoreButton">
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
                    <button type="submit" form="form" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                @endif

                <button type="button" onclick="showDeleteModal()"
                    class="{{ auth()->user()->can('delete-data') && request()->routeIs($routeName . '.edit') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>


                <form method="POST" action="{{ route($routeName . '.delete') }}" id="delete_form">
                    <input type="hidden" name="record" value="{{ $data?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($RiskInherent) ? route('RiskInherent.update', $RiskInherent->id) : route('RiskInherent.store') }}"
            method="POST">
            @csrf
            @if (isset($RiskInherent))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $RiskInherent->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Inherent ID</p>
                                <p class="FieldHeadArbTxt">رمز المخاطر الكامنة</p>
                            </div>
                            <p><input type="text" name="risk_inherent_id" id="risk_inherent_id" class="sh-tx"
                                    placeholder="Enter ID"
                                    value="{{ old('risk_inherent_id', $RiskInherent?->risk_inherent_id) }}"
                                    {{ $RiskInherent?->risk_inherent_id ? 'readonly' : '' }} required>
                                @error('risk_inherent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Inherent Description</p>
                                <p class="FieldHeadArbTxt">وصف المخاطر الكامنة</p>
                            </div>
                            <p><input type="text" name="risk_inherent_description" id="risk_inherent_description"
                                    class="bg-tx" placeholder="Write Description"
                                    value="{{ old('risk_inherent_description', $RiskInherent?->risk_inherent_description) }}">
                                @error('risk_inherent_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Appetite Name</p>
                                <p class="FieldHeadArbTxt">اسم الرغبة في المخاطرة</p>
                            </div>
                            <p>
                                <select name="risk_appetite_id" id="risk_appetite_id" class="sh-tx" required>
                                    <option value="" disabled selected>Select Option</option>
                                    @foreach ($RiskAppetite as $row)
                                        <option value="{{ $row->risk_appetite_id }}"
                                            {{ $row->risk_appetite_id == old('risk_appetite_id', $RiskInherent?->risk_appetite_id) ? 'selected' : '' }}>

                                            {{ $row->risk_appetite_id }} {{ $row->risk_appetite_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">

                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Likelihood</p>
                                <p class="FieldHeadArbTxt">احتمالات المخاطرة</p>
                            </div>
                            <select name="risk_inherent_likelihood" id="riskLikelihood" class="sh-tx">
                                <option value="">Select Option</option>
                                @foreach (range(1, 5) as $item)
                                    <option value="{{ $item }}"
                                        {{ old('risk_inherent_likelihood', $item) == $RiskInherent?->risk_inherent_likelihood ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_inherent_likelihood')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            {{-- <p><input type="text" name="risk_inherent_impact" id="risk_inherent_impact"
                                    class="sh-tx"
                                    value="{{ old('risk_inherent_impact', $RiskInherent?->risk_inherent_impact) }}"
                                    required>
                            </p> --}}
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Impact</p>
                                <p class="FieldHeadArbTxt">تأثير المخاطر</p>
                            </div>
                            <select name="risk_inherent_impact" id="riskImpact" class="sh-tx">
                                <option value="">Select Option</option>
                                @foreach (range(1, 5) as $item)
                                    <option value="{{ $item }}"
                                        {{ old('risk_inherent_impact', $item) == $RiskInherent?->risk_inherent_impact ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('risk_inherent_impact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                            {{-- <p><input type="text" name="risk_inherent_likelihood" id="risk_inherent_likelihood"
                                    class="sh-tx"
                                    value="{{ old('risk_inherent_likelihood', $RiskInherent?->risk_inherent_likelihood) }}"
                                    required>
                                @error('risk_inherent_likelihood')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p> --}}
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Score</p>
                                <p class="FieldHeadArbTxt">درجة المخاطرة</p>
                            </div>
                            <p><input type="text" name="risk_inherent_score" id="riskScore" class="sh-tx"
                                    readonly placeholder="Enter Upper Limit"
                                    value="{{ old('risk_inherent_score', $RiskInherent?->risk_inherent_score) }}"
                                    required>
                                @error('risk_inherent_score')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
            </table>
        </form>
    </div>
    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    
    <script>
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
        document.addEventListener("DOMContentLoaded", function() {
            const riskLikelihoodSelect = document.getElementById("riskLikelihood");
            const riskImpactSelect = document.getElementById("riskImpact");
            const riskScoreInput = document.getElementById("riskScore");
            // const appetiteColorInput = document.getElementById("appetiteColor");

            function updateRiskScore() {
                const likelihood = parseInt(riskLikelihoodSelect.value);
                const impact = parseInt(riskImpactSelect.value);
                const score = likelihood * impact;
                riskScoreInput.value = score;

                // Determine appetite color based on the score and set the background color
                // if (score <= 3) {
                //     appetiteColorInput.value = "Very Low";
                //     appetiteColorInput.style.backgroundColor = "#00850A"; // Green for Low
                // } else if (score <= 6) {
                //     appetiteColorInput.value = "Low";
                //     appetiteColorInput.style.backgroundColor = "#00FF78"; // Yellow for Moderate
                // } else if (score <= 9) {
                //     appetiteColorInput.value = "Medium";
                //     appetiteColorInput.style.backgroundColor = "#ECFF00"; // Orange for High
                // } else if (score <= 15) {
                //     appetiteColorInput.value = "High";
                //     appetiteColorInput.style.backgroundColor = "#FFB600"; // Orange for High
                // } else {
                //     appetiteColorInput.value = "Critical";
                //     appetiteColorInput.style.backgroundColor = "#FF0000"; // Red for Very High
                // }
            }

            riskLikelihoodSelect.addEventListener("change", updateRiskScore);
            riskImpactSelect.addEventListener("change", updateRiskScore);
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>
