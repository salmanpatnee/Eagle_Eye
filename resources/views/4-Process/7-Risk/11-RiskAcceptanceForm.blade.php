<!DOCTYPE html5>
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
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Function to generate the ID with a sequence
        //     function generateID() {
        //         // Get the input element
        //         var inputElement = document.getElementById('RiskAcceptId');

        //         // Generate a unique sequential number
        //         var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

        //         // Ensure the number is three digits by padding with zeros
        //         var formattedNumber = ('00' + sequenceNumber).slice(-3);

        //         // Combine the number with the prefix
        //         var generatedID = 'RSK-ACPT-' + formattedNumber;

        //         // Update the input field value
        //         inputElement.value = generatedID;

        //         // Increment and store the sequence number for the next use
        //         localStorage.setItem('sequenceNumber', sequenceNumber + 1);
        //     }

        //     // Call the generateID function when the page loads
        //     generateID();
        // });
    </script>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">قبول المخاطر</p>
                    <p class="EngTxt">Risk Acceptance</p>
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
        @include('4-Process/7-Risk/AcceptanceSidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->

    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تفاصيل قبول المخاطر</p>
                <p class="PageHeadEngTxt">Risk Acceptance Details</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-acceptance-list" class="MoreButton">
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
                    <input type="hidden" name="record" value="{{ $riskAcceptance?->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <form id="form"
            action="{{ isset($riskAcceptance) ? route('risk-acceptance.update', $riskAcceptance->id) : route('risk-acceptance.store') }}"
            method="post">
            @csrf
            @if (isset($riskAcceptance))
                @method('PUT')
            @endif

            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Acceptance ID</p>
                                <p class="FieldHeadArbTxt">رمز قبول المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_acceptance_id" id="risk_acceptance_id" class="sh-tx"
                                    placeholder="Risk Acceptance ID" required
                                    value="{{ old('risk_acceptance_id', $riskAcceptance?->risk_acceptance_id) }}"
                                    {{ $riskAcceptance?->risk_acceptance_id ? 'readonly' : null }}></p>
                            <x-error name="risk_acceptance_id" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Acceptance Description</p>
                                <p class="FieldHeadArbTxt">وصف قبول المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_acceptance_description" id="risk_acceptance_description"
                                    class="bg-tx" placeholder="Enter Risk Acceptance Description"
                                    value="{{ old('risk_acceptance_description', $riskAcceptance?->risk_acceptance_description) }}">
                            </p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Accepting Source</p>
                                <p class="FieldHeadArbTxt">مصدر قبول المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_acceptance_source" id="risk_acceptance_source"
                                    value="{{ old('risk_acceptance_source', $riskAcceptance?->risk_acceptance_source) }}"
                                    class="bg-tx" placeholder="Enter Risk Accepting Source" required></p>
                            <x-error name="risk_acceptance_source" />
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Acceptance Details</p>
                                <p class="FieldHeadArbTxt">تفاصيل قبول المخاطر</p>
                            </div>
                            <p><input type="text" name="risk_acceptance_details" id="risk_acceptance_details"
                                    class="bg-tx" placeholder="Enter Acceptance Details"
                                    value="{{ old('risk_acceptance_details', $riskAcceptance?->risk_acceptance_details) }}">
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Acceptance Start Date</p>
                                <p class="FieldHeadArbTxt">تاريخ بدء قبول المخاطر</p>
                            </div>
                            <p><input type="date" name="risk_acceptance_start_date"
                                    id="risk_acceptance_start_date" class="sh-tx" placeholder="Enter Location Area"
                                    value="{{ old('risk_acceptance_start_date', $riskAcceptance?->risk_acceptance_start_date) }}">
                            </p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Acceptance End Date</p>
                                <p class="FieldHeadArbTxt">تاريخ انتهاء قبول المخاطر</p>
                            </div>
                            <p><input type="date" name="risk_acceptance_end_date" id="risk_acceptance_end_date"
                                    class="sh-tx" placeholder="Enter Location Address"
                                    value="{{ old('risk_acceptance_end_date', $riskAcceptance?->risk_acceptance_end_date) }}">
                            </p>

                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Control Name</p>
                                <p class="FieldHeadArbTxt">اسم الضوابط</p>
                            </div>
                            <p>
                                <select name="control_id" id="control_id" class="sh-tx" required>
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($controlNames as $controlName)
                                        <option value="{{ $controlName->control_id }}"
                                            {{ $controlName->control_id == old('control_id', $riskAcceptance?->control_id) ? 'selected' : null }}>
                                            {{ $controlName->control_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                            <x-error name="control_id" />
                        </div>
                    </div>
            </table>
    </div>
    </form>
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

</html>
