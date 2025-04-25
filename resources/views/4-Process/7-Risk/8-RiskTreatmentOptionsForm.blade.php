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
                var inputElement = document.getElementById('RiskTreatId');

                // Generate a unique sequential number
                var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

                // Ensure the number is three digits by padding with zeros
                var formattedNumber = ('00' + sequenceNumber).slice(-3);

                // Combine the number with the prefix
                var generatedID = 'RSK-TREAT-' + formattedNumber;

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
                    <p class="ArbTxt">تحديد المخاطر</p>
                    <p class="EngTxt">Risk Identification</p>
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
        @include('4-Process/7-Risk/risksidebar')
    </section>
    <!-- SIDEBAR -->
    <div class="IndiTable">

        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">خيارات علاج المخاطر</p>
                <p class="PageHeadEngTxt">Risk Treatment Options</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-treatment-option-list" class="MoreButton">
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
            action="{{ isset($risktreatment) ? route('risktreatment.update', $risktreatment->id) : route('risktreatment.store') }}"
            method="POST">
            @csrf
            @if (isset($risktreatment))
                @method('PUT')
                <input type="hidden" name="id" value="{{ $risktreatment->id }}">
            @endif
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Treatment Option ID</p>
                                <p class="FieldHeadArbTxt">رمز خيارات علاج المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_treatment_id" id="risk_treatment_id" class="sh-tx"
                                    placeholder="Enter ID"
                                    value="{{ old('risk_treatment_id', $risktreatment?->risk_treatment_id) }}"
                                    {{ $risktreatment?->risk_treatment_id ? 'readonly' : '' }} required>
                                @error('risk_treatment_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Treatment Option Name</p>
                                <p class="FieldHeadArbTxt">اسم خيارات علاج المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_treatment_name" id="risk_treatment_name" class="sh-tx"
                                    placeholder="Enter Name"
                                    value="{{ old('risk_treatment_name', $risktreatment?->risk_treatment_name) }}"
                                    required>
                                @error('risk_treatment_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Treatment Option Description</p>
                                <p class="FieldHeadArbTxt">وصف خيارات علاج المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_treatment_description"
                                    id="risk_treatment_description" class="bg-tx" placeholder="Write Description"
                                    value="{{ old('risk_treatment_description', $risktreatment?->risk_treatment_description) }}">
                                @error('risk_treatment_description')
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
        function goBack() {
            window.history.back();
        }
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
    </script>
</body>
